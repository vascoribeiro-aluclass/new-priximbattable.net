<?php



class Cart extends CartCore
{

    public function getPackageShippingCost(
        $id_carrier = null,
        $use_tax = true,
        Country $default_country = null,
        $product_list = null,
        $id_zone = null,
        bool $keepOrderPrices = false
    ) {
        if ($this->isVirtualCart()) {
            return 0;
        }

        if (!$default_country) {
            $default_country = Context::getContext()->country;
        }

        if (!is_null($product_list)) {
            foreach ($product_list as $key => $value) {
                if ($value['is_virtual'] == 1) {
                    unset($product_list[$key]);
                }
            }
        }

        if (is_null($product_list)) {
            $products = $this->getProducts(false, false, null, false);
        } else {
            $products = $product_list;
        }

        if (Configuration::get('PS_TAX_ADDRESS_TYPE') == 'id_address_invoice') {
            $address_id = (int) $this->id_address_invoice;
        } elseif (is_array($product_list) && count($product_list)) {
            $prod = current($product_list);
            $address_id = (int) $prod['id_address_delivery'];
        } else {
            $address_id = null;
        }
        if (!Address::addressExists($address_id)) {
            $address_id = null;
        }

        if (is_null($id_carrier) && !empty($this->id_carrier)) {
            $id_carrier = (int) $this->id_carrier;
        }

        $cache_id = 'getPackageShippingCost_' . (int) $this->id . '_' . (int) $address_id . '_' . (int) $id_carrier . '_' . (int) $use_tax . '_' . (int) $default_country->id . '_' . (int) $id_zone;
        if ($products) {
            foreach ($products as $product) {
                $cache_id .= '_' . (int) $product['id_product'] . '_' . (int) $product['id_product_attribute'];
            }
        }

        if (Cache::isStored($cache_id)) {
            return Cache::retrieve($cache_id);
        }

        // Order total in default currency without fees
        $order_total = $this->getOrderTotal(true, Cart::BOTH_WITHOUT_SHIPPING, $product_list);

        // Start with shipping cost at 0
        $shipping_cost = 0;
        // If no product added, return 0
        if (!count($products)) {
            Cache::store($cache_id, $shipping_cost);

            return $shipping_cost;
        }

        if (!isset($id_zone)) {
            // Get id zone
            if (
                !$this->isMultiAddressDelivery()
                && isset($this->id_address_delivery) // Be carefull, id_address_delivery is not usefull one 1.5
                && $this->id_address_delivery
                && Customer::customerHasAddress($this->id_customer, $this->id_address_delivery)
            ) {
                $id_zone = Address::getZoneById((int) $this->id_address_delivery);
            } else {
                if (!Validate::isLoadedObject($default_country)) {
                    $default_country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'), Configuration::get('PS_LANG_DEFAULT'));
                }

                $id_zone = (int) $default_country->id_zone;
            }
        }

        if ($id_carrier && !$this->isCarrierInRange((int) $id_carrier, (int) $id_zone)) {
            $id_carrier = '';
        }

        if (empty($id_carrier) && $this->isCarrierInRange((int) Configuration::get('PS_CARRIER_DEFAULT'), (int) $id_zone)) {
            $id_carrier = (int) Configuration::get('PS_CARRIER_DEFAULT');
        }

        $total_package_without_shipping_tax_inc = $this->getOrderTotal(true, Cart::BOTH_WITHOUT_SHIPPING, $product_list);
        if (empty($id_carrier)) {
            if ((int) $this->id_customer) {
                $customer = new Customer((int) $this->id_customer);
                $result = Carrier::getCarriers((int) Configuration::get('PS_LANG_DEFAULT'), true, false, (int) $id_zone, $customer->getGroups());
                unset($customer);
            } else {
                $result = Carrier::getCarriers((int) Configuration::get('PS_LANG_DEFAULT'), true, false, (int) $id_zone);
            }

            foreach ($result as $k => $row) {
                if ($row['id_carrier'] == Configuration::get('PS_CARRIER_DEFAULT')) {
                    continue;
                }

                if (!isset(self::$_carriers[$row['id_carrier']])) {
                    self::$_carriers[$row['id_carrier']] = new Carrier((int) $row['id_carrier']);
                }

                /** @var Carrier $carrier */
                $carrier = self::$_carriers[$row['id_carrier']];

                $shipping_method = $carrier->getShippingMethod();
                // Get only carriers that are compliant with shipping method
                if (($shipping_method == Carrier::SHIPPING_METHOD_WEIGHT && $carrier->getMaxDeliveryPriceByWeight((int) $id_zone) === false)
                    || ($shipping_method == Carrier::SHIPPING_METHOD_PRICE && $carrier->getMaxDeliveryPriceByPrice((int) $id_zone) === false)
                ) {
                    unset($result[$k]);
                    continue;
                }

                // If out-of-range behavior carrier is set on "Desactivate carrier"
                if ($row['range_behavior']) {
                    $check_delivery_price_by_weight = Carrier::checkDeliveryPriceByWeight($row['id_carrier'], $this->getTotalWeight(), (int) $id_zone);

                    $total_order = $total_package_without_shipping_tax_inc;
                    $check_delivery_price_by_price = Carrier::checkDeliveryPriceByPrice($row['id_carrier'], $total_order, (int) $id_zone, (int) $this->id_currency);

                    // Get only carriers that have a range compatible with cart
                    if (($shipping_method == Carrier::SHIPPING_METHOD_WEIGHT && !$check_delivery_price_by_weight)
                        || ($shipping_method == Carrier::SHIPPING_METHOD_PRICE && !$check_delivery_price_by_price)
                    ) {
                        unset($result[$k]);
                        continue;
                    }
                }

                if ($shipping_method == Carrier::SHIPPING_METHOD_WEIGHT) {
                    $shipping = $carrier->getDeliveryPriceByWeight($this->getTotalWeight($product_list), (int) $id_zone, $product_list);
                } else {
                    $shipping = $carrier->getDeliveryPriceByPrice($order_total, (int) $id_zone, (int) $this->id_currency);
                }

                if (!isset($min_shipping_price)) {
                    $min_shipping_price = $shipping;
                }

                if ($shipping <= $min_shipping_price) {
                    $id_carrier = (int) $row['id_carrier'];
                    $min_shipping_price = $shipping;
                }
            }
        }

        if (empty($id_carrier)) {
            $id_carrier = Configuration::get('PS_CARRIER_DEFAULT');
        }

        if (!isset(self::$_carriers[$id_carrier])) {
            self::$_carriers[$id_carrier] = new Carrier((int) $id_carrier, Configuration::get('PS_LANG_DEFAULT'));
        }

        $carrier = self::$_carriers[$id_carrier];

        // No valid Carrier or $id_carrier <= 0 ?
        if (!Validate::isLoadedObject($carrier)) {
            Cache::store($cache_id, 0);

            return 0;
        }
        $shipping_method = $carrier->getShippingMethod();

        if (!$carrier->active) {
            Cache::store($cache_id, $shipping_cost);

            return $shipping_cost;
        }

        // Free fees if free carrier
        if ($carrier->is_free == 1) {
            Cache::store($cache_id, 0);

            return 0;
        }

        // Select carrier tax
        if ($use_tax && !Tax::excludeTaxeOption()) {
            $address = Address::initialize((int) $address_id);

            if (Configuration::get('PS_ATCP_SHIPWRAP')) {
                // With PS_ATCP_SHIPWRAP, pre-tax price is deduced
                // from post tax price, so no $carrier_tax here
                // even though it sounds weird.
                $carrier_tax = 0;
            } else {
                $carrier_tax = $carrier->getTaxesRate($address);
            }
        }

        $configuration = Configuration::getMultiple(array(
            'PS_SHIPPING_FREE_PRICE',
            'PS_SHIPPING_HANDLING',
            'PS_SHIPPING_METHOD',
            'PS_SHIPPING_FREE_WEIGHT',
        ));

        // Free fees
        $free_fees_price = 0;
        if (isset($configuration['PS_SHIPPING_FREE_PRICE'])) {
            $free_fees_price = Tools::convertPrice((float) $configuration['PS_SHIPPING_FREE_PRICE'], Currency::getCurrencyInstance((int) $this->id_currency));
        }
        $orderTotalwithDiscounts = $this->getOrderTotal(true, Cart::BOTH_WITHOUT_SHIPPING, null, null, false);
        if ($orderTotalwithDiscounts >= (float) ($free_fees_price) && (float) ($free_fees_price) > 0) {
            $shipping_cost = $this->getPackageShippingCostFromModule($carrier, $shipping_cost, $products);
            Cache::store($cache_id, $shipping_cost);

            return $shipping_cost;
        }

        if (
            isset($configuration['PS_SHIPPING_FREE_WEIGHT'])
            && $this->getTotalWeight() >= (float) $configuration['PS_SHIPPING_FREE_WEIGHT']
            && (float) $configuration['PS_SHIPPING_FREE_WEIGHT'] > 0
        ) {
            $shipping_cost = $this->getPackageShippingCostFromModule($carrier, $shipping_cost, $products);
            Cache::store($cache_id, $shipping_cost);

            return $shipping_cost;
        }

        // Get shipping cost using correct method
        if ($carrier->range_behavior) {
            if (!isset($id_zone)) {
                // Get id zone
                if (
                    isset($this->id_address_delivery)
                    && $this->id_address_delivery
                    && Customer::customerHasAddress($this->id_customer, $this->id_address_delivery)
                ) {
                    $id_zone = Address::getZoneById((int) $this->id_address_delivery);
                } else {
                    $id_zone = (int) $default_country->id_zone;
                }
            }

            if (($shipping_method == Carrier::SHIPPING_METHOD_WEIGHT && !Carrier::checkDeliveryPriceByWeight($carrier->id, $this->getTotalWeight(), (int) $id_zone))
                || ($shipping_method == Carrier::SHIPPING_METHOD_PRICE && !Carrier::checkDeliveryPriceByPrice($carrier->id, $total_package_without_shipping_tax_inc, $id_zone, (int) $this->id_currency)
                )
            ) {
                $shipping_cost += 0;
            } else {
                if ($shipping_method == Carrier::SHIPPING_METHOD_WEIGHT) {
                    $shipping_cost += $carrier->getDeliveryPriceByWeight($this->getTotalWeight($product_list), $id_zone, $product_list);
                } else { // by price
                    $shipping_cost += $carrier->getDeliveryPriceByPrice($order_total, $id_zone, (int) $this->id_currency);
                }
            }
        } else {
            if ($shipping_method == Carrier::SHIPPING_METHOD_WEIGHT) {
                $shipping_cost += $carrier->getDeliveryPriceByWeight($this->getTotalWeight($product_list), $id_zone, $product_list);
            } else {
                $shipping_cost += $carrier->getDeliveryPriceByPrice($order_total, $id_zone, (int) $this->id_currency);
            }
        }
        // Adding handling charges
        if (isset($configuration['PS_SHIPPING_HANDLING']) && $carrier->shipping_handling) {
            $shipping_cost += (float) $configuration['PS_SHIPPING_HANDLING'];
        }

        // Additional Shipping Cost per product
        foreach ($products as $product) {
            if (!$product['is_virtual']) {
                $shipping_cost += $product['additional_shipping_cost'] * $product['cart_quantity'];
            }
        }

        $shipping_cost = Tools::convertPrice($shipping_cost, Currency::getCurrencyInstance((int) $this->id_currency));

        //get external shipping cost from module
        $shipping_cost = $this->getPackageShippingCostFromModule($carrier, $shipping_cost, $products);
        if ($shipping_cost === false) {
            Cache::store($cache_id, false);

            return false;
        }

        if (Configuration::get('PS_ATCP_SHIPWRAP')) {
            if (!$use_tax) {
                // With PS_ATCP_SHIPWRAP, we deduce the pre-tax price from the post-tax
                // price. This is on purpose and required in Germany.
                $shipping_cost /= (1 + $this->getAverageProductsTaxRate());
            }
        } else {
            // Apply tax
            if ($use_tax && isset($carrier_tax)) {
                $shipping_cost *= 1 + ($carrier_tax / 100);
            }
        }

        $shipping_cost = (float) Tools::ps_round((float) $shipping_cost, 2);
        Cache::store($cache_id, $shipping_cost);

        return $shipping_cost;
    }


    public function infoCustomerToCrawler($reference)
    {

        $sql_orderInfo = Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . "orders WHERE reference=$reference");
        $id_customer = $sql_orderInfo[0]["id_customer"];
        $id_address = $sql_orderInfo[0]["id_address_delivery"];

        $sql_customerInfo = Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . "customer WHERE id_customer=$id_customer");
        $data["email"] = $sql_customerInfo[0]["email"];
        $data["first_name"] = $sql_customerInfo[0]["firstname"];
        $data["last_name"] = $sql_customerInfo[0]["lastname"];

        $sql_customerAddressInfo = Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . "address WHERE id_address=$id_address");
        $data["street"] = $sql_customerAddressInfo[0]["address1"];
        $data["city"] = $sql_customerAddressInfo[0]["city"];
        $data["postal_code"] = $sql_customerAddressInfo[0]["postcode"];
        $data["phone_number"] = empty($sql_customerAddressInfo[0]["phone"]) ? $sql_customerAddressInfo[0]["phone_mobile"] : $sql_customerAddressInfo[0]["phone"];
        $id_country = $sql_customerAddressInfo[0]["id_country"];

        $sql_customerAddressCountryInfo = Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . "country_lang WHERE id_country=$id_country");
        $data["country"] = $sql_customerAddressCountryInfo[0]["name"];

        return $data;
    }

    public function linkCustomization($id_product_customization)
    {
        $link_customization = false;
        $bd_link_customization = Db::getInstance()->executeS("Select
      lcp.title,
      lcp.id_product_original,
      GROUP_CONCAT('" . _PS_BASE_URL_ . "','/ajax/index.php?setaction=dupliceproduct&idproduct=',(lcp.id_product_customization)) AS `Product_URL_dulplice`,
      GROUP_CONCAT('" . _PS_BASE_URL_ . "','/',(cl.link_rewrite),'/',(lcp.id_product_original),'-',(pl.link_rewrite),'.html','?action=googlecustomization',lcp.`link`) AS `Product_URL`,
      GROUP_CONCAT('" . _PS_BASE_URL_ . "','/',(cl.link_rewrite),'/',(lcp.id_product_original),'-',(pl.link_rewrite),'.html','?editproduct=',lcp.id_product_customization,'&action=googlecustomizationedit',lcp.`link`) AS `Product_URL_edit`
      FROM `" . _DB_PREFIX_ . "link_customization_product` lcp
      INNER JOIN `" . _DB_PREFIX_ . "product_lang` pl ON(lcp.id_product_original = pl.id_product) AND pl.id_lang = " . (int)Context::getContext()->language->id . "
      INNER JOIN `" . _DB_PREFIX_ . "product` p ON(lcp.id_product_original = p.id_product)
      INNER JOIN `" . _DB_PREFIX_ . "category_lang` cl ON(cl.id_category = p.`id_category_default`)  AND cl.id_lang = " . (int)Context::getContext()->language->id . "
      WHERE lcp.`id_product_customization`=" . $id_product_customization);

        if (count($bd_link_customization) > 0) {
            $link_customization = array();
            $link_customization['title'] = $bd_link_customization[0]['title'];
            $link_customization['Product_URL_dulplice'] = $bd_link_customization[0]['Product_URL_dulplice'];
            $link_customization['Product_URL'] = $bd_link_customization[0]['Product_URL'];
            $link_customization['Product_URL_edit'] = $bd_link_customization[0]['Product_URL_edit'];
        }



        return $link_customization;
    }

    public function addressMessage($idcart)
    {
        $messagedelivery = '';
        $messageResult = Db::getInstance()->executeS("SELECT `message` FROM `" . _DB_PREFIX_ . "message` WHERE  `id_cart` = " . $idcart);
        if ($messageResult) {
            $messagedelivery = $messageResult[0]['message'];
        }

        return $messagedelivery;
    }

    public function addressCart($id_address_delivery = false, $id_address_invoice = false)
    {


        $array_address = array();

        if ($id_address_invoice) {
            $bd_address_invoice = Db::getInstance()->executeS(" SELECT a.`firstname`,a.`lastname`,a.`address1`,a.`address2`,a.`postcode`,a.`city`,a.`phone`,a.`phone_mobile`,a.`vat_number`, cl.`name` as country
        FROM `" . _DB_PREFIX_ . "address` a
        inner join `" . _DB_PREFIX_ . "country_lang` cl on cl.id_country = a.id_country and `id_lang` = " . (int)Context::getContext()->language->id . "
        where a.`id_address` =  " . $id_address_invoice);

            if (count($bd_address_invoice) > 0) {

                $array_address['invoice']['firstname'] = $bd_address_invoice[0]['firstname'];
                $array_address['invoice']['lastname'] = $bd_address_invoice[0]['lastname'];
                $array_address['invoice']['address1'] = $bd_address_invoice[0]['address1'];
                $array_address['invoice']['address2'] = $bd_address_invoice[0]['address2'];
                $array_address['invoice']['postcode'] = $bd_address_invoice[0]['postcode'];
                $array_address['invoice']['city'] = $bd_address_invoice[0]['city'];
                $array_address['invoice']['phone'] = $bd_address_invoice[0]['phone'];
                $array_address['invoice']['phone_mobile'] = $bd_address_invoice[0]['phone_mobile'];
                $array_address['invoice']['vat_number'] = $bd_address_invoice[0]['vat_number'];
                $array_address['invoice']['country'] = $bd_address_invoice[0]['country'];
            }
        }

        if ($id_address_delivery) {
            $bd_address_deliver = Db::getInstance()->executeS(" SELECT a.`firstname`,a.`lastname`,a.`address1`,a.`address2`,a.`postcode`,a.`city`,a.`phone`,a.`phone_mobile`,a.`vat_number`, cl.`name` as country
        FROM `" . _DB_PREFIX_ . "address` a
        inner join `" . _DB_PREFIX_ . "country_lang` cl on cl.id_country = a.id_country and `id_lang` = " . (int)Context::getContext()->language->id . "
        where a.`id_address` = " . $id_address_delivery);

            if (count($bd_address_deliver) > 0 && empty(Tools::getValue('shipfree'))) {

                $array_address['deliver']['firstname'] = $bd_address_deliver[0]['firstname'];
                $array_address['deliver']['lastname'] = $bd_address_deliver[0]['lastname'];
                $array_address['deliver']['address1'] = $bd_address_deliver[0]['address1'];
                $array_address['deliver']['address2'] = $bd_address_deliver[0]['address2'];
                $array_address['deliver']['postcode'] = $bd_address_deliver[0]['postcode'];
                $array_address['deliver']['city'] = $bd_address_deliver[0]['city'];
                $array_address['deliver']['phone'] = $bd_address_deliver[0]['phone'];
                $array_address['deliver']['phone_mobile'] = $bd_address_deliver[0]['phone_mobile'];
                $array_address['deliver']['vat_number'] = $bd_address_deliver[0]['vat_number'];
                $array_address['deliver']['country'] = $bd_address_deliver[0]['country'];
            } else {

                $bd_address_deliver = Db::getInstance()->executeS("SELECT   a.`phone`,`city`,`postcode`
          , cl.`name` country, sl.*
          FROM `" . _DB_PREFIX_ . "store` a
                      INNER JOIN `sp_country_lang` cl
                          ON (cl.`id_country` = a.`id_country`
                          AND cl.`id_lang` = " . (int)Context::getContext()->language->id . ")
                                      INNER JOIN `sp_store_lang` sl
                          ON (sl.`id_store` = a.`id_store`
                          AND sl.`id_lang` = " . (int)Context::getContext()->language->id . ")
            WHERE a.`active` = 1

            ORDER BY a.id_store ASC ");

                if (count($bd_address_deliver) > 0) {
                    $array_address['deliver']['firstname'] = $bd_address_deliver[0]['name'];
                    $array_address['deliver']['lastname'] = '';
                    $array_address['deliver']['address1'] = $bd_address_deliver[0]['address1'];
                    $array_address['deliver']['address2'] = $bd_address_deliver[0]['address2'];
                    $array_address['deliver']['postcode'] = $bd_address_deliver[0]['postcode'];
                    $array_address['deliver']['city'] = $bd_address_deliver[0]['city'];
                    $array_address['deliver']['phone'] = $bd_address_deliver[0]['phone'];
                    $array_address['deliver']['phone_mobile'] = '';
                    $array_address['deliver']['vat_number'] = '';
                    $array_address['deliver']['country'] = $bd_address_deliver[0]['country'];
                }
            }
        }

        return $array_address;
    }
}
