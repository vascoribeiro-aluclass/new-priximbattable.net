<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    Carlos Ucha
 * @copyright 2010-2100 Carlos Ucha
 * @license   see file: LICENSE.txt
 * This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER
 * carlosucha92@gmail.com
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class ChatbotContext
{
    private $systemMessage;
    private $systemProducts;
    private $systemShipping;
    private $speculation;
    private $errorHandling;
    private $contactInfo;
    private $dataProtection;
    private $productsFeed;
    private $ordersFeed;
    private $productsName;
    private $productsReference;
    private $productsPrice;
    private $productsDescription;
    private $productsShortDescription;
    private $productsUrl;

    public function __construct()
    {
        $lang = Context::getContext()->language->id;

        // Load context settings from PrestaShop configuration
        $this->systemMessage = Configuration::get('GPTCHATBOX_CONTEXT');
        $this->systemProducts = Configuration::get('GPTCHATBOX_CONTEXT_PRODUCTS');
        $this->systemShipping = Configuration::get('GPTCHATBOX_CONTEXT_SHIPPING');
        $this->speculation = Configuration::get('GPTCHATBOX_SPECULATION');
        $this->errorHandling = Configuration::get('GPTCHATBOX_ERROR_HANDLING');
        $this->contactInfo = Configuration::get('GPTCHATBOX_CUSTOMER_SUPPORT_ML', $lang);
        $this->dataProtection = Configuration::get('GPTCHATBOX_DATA_PROTECTION');
        $this->productsFeed = Configuration::get('GPTCHATBOX_PRODUCTS_FEED');
        $this->ordersFeed = Configuration::get('GPTCHATBOX_ORDERS_FEED');
        $this->productsName = Configuration::get('GPTCHATBOX_PRODUCTS_NAME');
        $this->productsReference = Configuration::get('GPTCHATBOX_PRODUCTS_REFERENCE');
        $this->productsPrice = Configuration::get('GPTCHATBOX_PRODUCTS_PRICE');
        $this->productsDescription = Configuration::get('GPTCHATBOX_PRODUCTS_DESCRIPTION');
        $this->productsShortDescription = Configuration::get('GPTCHATBOX_PRODUCTS_SHORTDESCRIPTION');
        $this->productsUrl = Configuration::get('GPTCHATBOX_PRODUCTS_URL');
        // $this->maxTokens = Configuration::get('GPTCHATBOX_MAX_TOKENS');
    }

    public function getContextMessage()
    {
        $context = [];

        // General Chat Context
        if (!empty($this->systemMessage)) {
            $context['chat_context'] = $this->systemMessage;
        }

        // Product Information
        if (!empty($this->systemProducts)) {
            $context['product_info'] = $this->systemProducts;
        }

        // Shipping Information
        if (!empty($this->systemShipping)) {
            $context['shipping_info'] = $this->systemShipping;
        }

        // Error Handling Policy
        if (!empty($this->errorHandling)) {
            $context['error_handling'] = 'If unsure, direct the user to customer support.';
        }

        // Speculation Policy
        if (!empty($this->speculation)) {
            $context['no_speculation'] = 'Do not guess information. If data is unavailable, inform the user.';
        }

        // Customer Support Contact
        if (!empty($this->contactInfo)) {
            $context['customer_support'] = $this->contactInfo;
        }

        // Data Protection Policy
        if (!empty($this->dataProtection)) {
            $context['data_protection'] = 'Never request or store personal data such as credit cards, addresses, or private information.';
        }

        // Order History (JSON)
        $customer = Context::getContext()->customer;

        if (!$customer || !$customer->isLogged()) {
            $context['order_history'] = 'Customer needs to log in to access the order information.';
        } else {
            $ordersData = json_decode($this->getOrderDataForAIContext(), true);
            if (!empty($ordersData)) {
                $context['order_history'] = $ordersData;
            } else {
                $context['order_history'] = 'Customer has no previous orders.';
            }
        }

        // Language Requirement
        $context['user_language'] = 'IMPORTANT Detect the language that the user is talking and answer in the same language.';
        // debug context
        // echo "<pre>" . json_encode($context, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "</pre>";

        return json_encode($context, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    private function getOrderDataForAIContext()
    {
        if (!Context::getContext()->customer->isLogged()) {
            return 'The customer is not logged in. Please ask them to log in to access order information.';
        }

        $customerId = Context::getContext()->customer->id;
        $orderData = [];
        $orders = $this->getRecentCustomerOrders($customerId, 3);
        $orderStatuses = OrderState::getOrderStates(Context::getContext()->language->id);

        foreach ($orders as $order) {
            $orderObject = new Order($order['id_order']);
            $products = $orderObject->getProducts();

            $orderProducts = [];
            foreach ($products as $product) {
                $orderProducts[] = [
                    'name' => $product['product_name'],
                    'quantity' => $product['product_quantity'],
                    'price' => $product['product_price'],
                ];
            }

            $orderStatus = null;
            foreach ($orderStatuses as $status) {
                if ($status['id_order_state'] === $order['current_state']) {
                    $orderStatus = $status['name'];
                    break;
                }
            }

            $orderCarrier = new OrderCarrier($orderObject->getIdOrderCarrier());
            $shippingNumber = $orderCarrier->tracking_number ?: 'N/A';

            // Fetch Carrier Name and URL
            $carrier = new Carrier($orderCarrier->id_carrier);
            $carrierName = $carrier->name ?: 'Unknown';
            $carrierUrl = $carrier->url ?: 'N/A';

            $orderData[] = [
                'order_reference' => $orderObject->reference,
                'date_add' => $orderObject->date_add,
                'total_paid' => $orderObject->total_paid,
                'status' => $orderStatus ?: 'Unknown',
                'products' => $orderProducts,
                'shipping_number' => $shippingNumber,
                'carrier_name' => $carrierName,
                'carrier_tracking_url' => $carrierUrl,
            ];
        }

        return json_encode($orderData, JSON_UNESCAPED_UNICODE);
    }

    private function getRecentCustomerOrders($customerId, $limit = 3)
    {
        $sql = new DbQuery();
        $sql->select('*');
        $sql->from('orders');
        $sql->where('id_customer = ' . (int) $customerId);
        $sql->orderBy('date_add DESC');
        $sql->limit($limit);

        return Db::getInstance()->executeS($sql);
    }

    private function getProductDataForAIContext()
    {
        $productData = [];
        $context = Context::getContext();
        $products = Product::getProducts($context->language->id, 0, 0, 'id_product', 'ASC', false, true);
        $link = $context->link;

        foreach ($products as $product) {
            $productObject = new Product($product['id_product'], true, $context->language->id);

            $tempProduct = [];

            if ($productObject->visibility !== 'none') {
                if ($this->productsName) {
                    $tempProduct['name'] = htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8');
                }

                if ($this->productsReference) {
                    $tempProduct['reference'] = htmlspecialchars($product['reference'], ENT_QUOTES, 'UTF-8');
                }

                if ($this->productsPrice) {
                    $tempProduct['price'] = Tools::displayPrice(Product::getPriceStatic($product['id_product'], true, null, 6, null, false, false)); // Original price (no discounts)
                    $tempProduct['price_discount'] = Tools::displayPrice(Product::getPriceStatic($product['id_product'], true, null, 3, null, false, true)); // Discounted price
                }

                if ($this->productsDescription) {
                    $tempProduct['description'] = htmlspecialchars(strip_tags($product['description']), ENT_QUOTES, 'UTF-8');
                }

                if ($this->productsShortDescription) {
                    $tempProduct['short_description'] = htmlspecialchars(strip_tags($product['description_short']), ENT_QUOTES, 'UTF-8');
                }

                if ($this->productsUrl) {
                    $tempProduct['url'] = $link->getProductLink($productObject);
                }

                $productData[] = $tempProduct;
            }
        }

        return json_encode($productData, JSON_UNESCAPED_UNICODE);
    }
}
