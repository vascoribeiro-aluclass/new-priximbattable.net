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

class AdminGptchatboxProductsFeedController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
    }

    public function initContent()
    {
        parent::initContent();

        $uploadResult = null;

        if (Tools::isSubmit('submitUploadToOpenAI')) {
            $uploadResult = $this->handleUpload();
        }

        $uploadResult = null;

        if (Tools::isSubmit('submitUploadToOpenAI')) {
            $uploadResult = $this->handleUpload();
        } elseif (Tools::isSubmit('submitDeleteFromOpenAI')) {
            $uploadResult = $this->handleDelete();
        }

        // Assign categories to the template
        $this->context->smarty->assign([
            'upload_result' => $uploadResult,
            'available_categories' => $this->getFormattedCategoriesWithDepth(),
        ]);

        // Load submitted or saved config values
        $selectedFields = Tools::getValue('feed_fields', json_decode(Configuration::get('GPTCHATBOX_SELECTED_FIELDS'), true) ?: []);
        $selectedCategories = Tools::getValue('selected_categories', json_decode(Configuration::get('GPTCHATBOX_SELECTED_CATEGORIES'), true) ?: []);

        // Assign variables to Smarty
        $this->context->smarty->assign([
            'upload_result' => $uploadResult,
            'available_categories' => $this->getFormattedCategoriesWithDepth(),
            'selected_fields' => $selectedFields,
            'selected_categories' => $selectedCategories,
        ]);

        $remoteFileInfo = $this->getRemoteProductsFileInfo();
        if ($remoteFileInfo['exists']) {
            $remoteFileInfo['size_formatted'] = self::formatBytes($remoteFileInfo['size']);
        }
        $this->context->smarty->assign([
            'remote_file_info' => $remoteFileInfo,
        ]);

        $this->setTemplate('products_feed.tpl');
    }

    /**
     * Handles form submission: file generation + upload to OpenAI + vector store.
     */
    private function handleUpload()
    {
        $selectedFields = Tools::getValue('feed_fields', []);
        $selectedCategories = Tools::getValue('selected_categories', []);

        if (empty($selectedFields)) {
            return 'No fields selected.';
        }

        if (empty($selectedCategories)) {
            return 'No categories selected.';
        }

        $products = $this->getProductsData($selectedCategories, $selectedFields);
        $filePath = $this->generateJsonFile($products);

        $selectedFields = Tools::getValue('feed_fields', []);
        $selectedCategories = Tools::getValue('selected_categories', []);

        Configuration::updateValue('GPTCHATBOX_SELECTED_FIELDS', json_encode($selectedFields));
        Configuration::updateValue('GPTCHATBOX_SELECTED_CATEGORIES', json_encode($selectedCategories));

        return $this->uploadToOpenAI($filePath);
    }

    /**
     * Loads all categories and returns a simplified array for the template.
     */
    private function getFormattedCategoriesWithDepth()
    {
        $rootCategory = Category::getRootCategory();
        $categories = Category::getNestedCategories($rootCategory->id, $this->context->language->id);

        return $this->flattenCategoryTree($categories);
    }

    private function flattenCategoryTree($categories, $depth = 0)
    {
        $flat = [];
        foreach ($categories as $cat) {
            $flat[] = [
                'id_category' => $cat['id_category'],
                'name' => str_repeat('— ', $depth) . $cat['name'],
            ];
            if (!empty($cat['children'])) {
                $flat = array_merge($flat, $this->flattenCategoryTree($cat['children'], $depth + 1));
            }
        }

        return $flat;
    }

    /**
     * Generates the JSON file with product data.
     */
    private function generateJsonFile($products)
    {
        $dir = _PS_MODULE_DIR_ . 'gptchatbox/files/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $filePath = $dir . 'products.json';
        file_put_contents($filePath, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return $filePath;
    }

    /**
     * Builds the data array based on selected fields and categories.
     */
    private function getProductsData($categoryIds, $fields)
    {
        $data = [];

        foreach ($categoryIds as $id_category) {
            $products = Product::getProducts(
                $this->context->language->id,
                0,
                0,
                'id_product',
                'ASC',
                $id_category,
                true
            );

            foreach ($products as $product) {
                $productObj = new Product($product['id_product'], false, $this->context->language->id);
                $item = [];

                foreach ($fields as $field) {
                    $item[$field] = $this->getProductField($productObj, $field);
                }

                $data[] = $item;
            }
        }

        return $data;
    }

    /**
     * Returns the value for a given field from a Product object.
     */
    private function getProductField(Product $product, $field)
    {
        switch ($field) {
            case 'name':
                return $product->name;
            case 'short_description':
                return $product->description_short;
            case 'description':
                return $product->description;
            case 'reference':
                return $product->reference;
            case 'price':
                return Product::getPriceStatic($product->id, false);
            case 'discount_price':
                return Product::getPriceStatic($product->id, true);
            case 'category':
                return $this->getMainCategoryName($product->id_category_default);
            case 'stock':
                return StockAvailable::getQuantityAvailableByProduct($product->id);
            case 'url':
                return $this->context->link->getProductLink($product);
            default:
                return '';
        }
    }

    /**
     * Returns the name of the main category.
     */
    private function getMainCategoryName($id_category)
    {
        $category = new Category($id_category, $this->context->language->id);

        return $category->name;
    }

    /**
     * Uploads file to OpenAI and creates a vector store.
     */
    private function uploadToOpenAI($filePath)
    {
        if (!file_exists($filePath)) {
            return 'File does not exist: ' . $filePath;
        }

        $apiKey = Configuration::get('GPTCHATBOX_API_KEY');
        $fileName = basename($filePath);
        $message = '';

        // 1. Find or create the vector store
        // $storeId = $this->getExistingVectorStoreId('Product Vector Store', $apiKey);
        $storeId = Configuration::get('GPTCHATBOX_VECTOR_STORE_ID');
        if (!$storeId) {
            $storeId = $this->createVectorStore('Product Vector Store', $apiKey);
            if (!$storeId) {
                return 'Failed to create vector store.';
            }
            $message .= "Created new vector store: {$storeId}<br>";
        }
        Configuration::updateValue('GPTCHATBOX_VECTOR_STORE_ID', $storeId);

        // 2. Get current files attached to the vector store
        $attachedFiles = $this->getVectorStoreFiles($storeId, $apiKey);

        // 3. Remove existing 'products.json' file if present
        foreach ($attachedFiles as $file) {
            $fileDetails = $this->getFileDetails($file['id'], $apiKey);

            if ($fileDetails && isset($fileDetails['filename']) && $fileDetails['filename'] === $fileName) {
                $this->deleteFileFromVectorStore($storeId, $file['id'], $apiKey);
                $message .= "Removed old '{$fileName}' from vector store.<br>";
                break;
            }
        }

        // 4. Upload the new file
        $uploadCurl = curl_init('https://api.openai.com/v1/files');
        curl_setopt_array($uploadCurl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_POSTFIELDS => [
                'purpose' => 'assistants',
                'file' => new CURLFile($filePath, mime_content_type($filePath), $fileName),
            ],
        ]);
        $uploadResponse = curl_exec($uploadCurl);
        curl_close($uploadCurl);

        $uploadData = json_decode($uploadResponse, true);
        $fileId = $uploadData['id'] ?? null;

        if (!$fileId) {
            return 'File upload failed. Response: ' . $uploadResponse;
        }

        $message .= "Uploaded new '{$fileName}' file. File ID: {$fileId}<br>";

        // 5. Attach the file to the vector store
        $addCurl = curl_init("https://api.openai.com/v1/vector_stores/{$storeId}/files");
        curl_setopt_array($addCurl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
                'Content-Type: application/json',
            ],
            CURLOPT_POSTFIELDS => json_encode(['file_id' => $fileId]),
        ]);
        $addResponse = curl_exec($addCurl);
        curl_close($addCurl);

        $addData = json_decode($addResponse, true);
        if (!isset($addData['id'])) {
            return 'Failed to attach file to vector store. Response: ' . $addResponse;
        }

        $message .= "File attached to vector store: {$storeId}<br>";

        return $message;
    }

    private function getExistingVectorStoreId($name, $apiKey)
    {
        $curl = curl_init('https://api.openai.com/v1/vector_stores');
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        if (!isset($data['data'])) {
            return null;
        }

        foreach ($data['data'] as $store) {
            if (isset($store['name']) && $store['name'] === $name) {
                return $store['id'];
            }
        }

        return null;
    }

    private function createVectorStore(string $storeName, string $apiKey): ?string
    {
        $url = 'https://api.openai.com/v1/vector_stores';

        $data = [
            'name' => $storeName,
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
                'Content-Type: application/json',
            ],
            CURLOPT_POSTFIELDS => json_encode($data),
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 && $httpCode !== 201) {
            error_log("Vector store creation failed. HTTP $httpCode. Response: $response");

            return null;
        }

        $result = json_decode($response, true);

        return $result['id'] ?? null;
    }

    private function getVectorStoreFiles($storeId, $apiKey)
    {
        $curl = curl_init("https://api.openai.com/v1/vector_stores/{$storeId}/files");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        return $data['data'] ?? [];
    }

    private function deleteFileFromVectorStore($storeId, $fileId, $apiKey)
    {
        // 1. Delete from the vector store
        $curl = curl_init("https://api.openai.com/v1/vector_stores/{$storeId}/files/{$fileId}");
        curl_setopt_array($curl, [
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
            ],
        ]);
        curl_exec($curl);
        curl_close($curl);

        // 2. Delete the file from OpenAI storage
        $curl = curl_init("https://api.openai.com/v1/files/{$fileId}");
        curl_setopt_array($curl, [
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
            ],
        ]);
        curl_exec($curl);
        curl_close($curl);
    }

    private function getFileDetails($fileId, $apiKey)
    {
        $curl = curl_init("https://api.openai.com/v1/files/{$fileId}");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }

    private function getRemoteProductsFileInfo()
    {
        $apiKey = Configuration::get('GPTCHATBOX_API_KEY');

        $fileName = 'products.json';

        // $storeId = $this->getExistingVectorStoreId('Product Vector Store', $apiKey);
        $storeId = Configuration::get('GPTCHATBOX_VECTOR_STORE_ID');
        if (!$storeId) {
            return [
                'exists' => false,
                'message' => $this->l('No product file has been found in OpenAI. Please configure and upload the file to import the information.'),
            ];
        }

        $files = $this->getVectorStoreFiles($storeId, $apiKey);

        foreach ($files as $file) {
            // Aquí reutilizas getFileDetails ya existente
            $details = $this->getFileDetails($file['id'], $apiKey);
            if ($details && isset($details['filename']) && $details['filename'] === $fileName) {
                return [
                    'exists' => true,
                    'filename' => $details['filename'],
                    'id' => $details['id'],
                    'size' => $details['bytes'],
                    'created_at' => date('Y-m-d H:i:s', $details['created_at']),
                    'message' => $this->l('File "products.json" found in OpenAI.'),
                ];
            }
        }

        return [
            'exists' => false,
            'message' => $this->l('No product file has been found in OpenAI. Please configure and upload the file to import the information.'),
        ];
    }

    private function handleDelete()
    {
        $apiKey = Configuration::get('GPTCHATBOX_API_KEY');
        $fileName = 'products.json';

        // $storeId = $this->getExistingVectorStoreId('Product Vector Store', $apiKey);
        $storeId = Configuration::get('GPTCHATBOX_VECTOR_STORE_ID');
        if (!$storeId) {
            return $this->l('Vector store not found.');
        }

        foreach ($this->getVectorStoreFiles($storeId, $apiKey) as $file) {
            $details = $this->getFileDetails($file['id'], $apiKey);
            if (isset($details['filename']) && $details['filename'] === $fileName) {
                $this->deleteFileFromVectorStore($storeId, $file['id'], $apiKey);

                return $this->l('File "products.json" has been deleted from OpenAI');
            }
        }

        return $this->l('File "products.json" was not found on OpenAI');
    }

    private static function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
