<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*         DISCLAIMER   *
* *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
*
* @package    bestkit_ordersexport
* @author     BEST-KIT.COM (contact@best-kit.com)
* @copyright  http://best-kit.com
*/
if (!defined('_PS_VERSION_')) {
    exit;
}

class bestkit_ordersexport extends Module
{
    public function __construct()
    {
        $this->name = 'bestkit_ordersexport';
        $this->tab = 'administration';
        $this->version = '1.0.1';
        $this->author = 'best-kit.com';
        $this->need_instance = 0;
        $this->module_key = '5bb97f06ece458ef9a153f1f0449cf89';
        parent::__construct();
        $this->displayName = $this->l('Export orders to XML');
        $this->description = $this->l('Export your orders to XML format');
    }

    public function install()
    {
        return (parent::install()
            && $this->registerHook('newOrder')
            && $this->registerHook('updateOrderStatus')
            && $this->registerHook('actionPaymentCCAdd')
        );
    }

    protected function _prepareField($value)
    {
        return ucfirst(str_replace('_', ' ', $value));
    }

    protected function _renderProperties($object, $fields, $type = 'xml')
    {
        $string = '';
        $csv = array();
        foreach ($fields as $field) {
            $has = false;
            if (property_exists($object, $field)) {
                if (is_string($object->{$field}) || is_float($object->{$field})) {
                    $has = true;
                    $value = strval($object->{$field});
                    $string .= ' ' . $field . '="' . $value . '"';
                    $csv[$field] = $value;
                }
            }
            if (!$has) {
                $value = '';
                $string .= ' ' . $field . '="' . $value . '"';
                $csv[$field] = $value;
            }
        }
        if ($type == 'csv') {
            return $csv;
        }
        return $string;
    }

    private function initForm()
    {
        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->identifier = $this->identifier;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->toolbar_scroll = TRUE;
//$helper->toolbar_btn = $this->initToolbar();
        $helper->title = $this->displayName;
        $helper->submit_action = $this->name;
        $this->fields_form[0]['form'] = array(
            'tinymce' => TRUE,
            'legend' => array('title' => $this->displayName, 'image' => $this->_path . 'logo.gif'),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Start ID order:'),
                    'name' => 'from',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('End ID order:'),
                    'name' => 'to',
                ),
            ),
            'submit' => array(
                'name' => $this->name,
                'title' => $this->l('Generate the ') . 'XML',
            ),
        );
        return $helper;
    }

    protected static function _addLine(&$xml, $string, $padding = 0)
    {
        for ($i = 0; $i < (int)$padding; $i++) {
            $xml .= '   ';
        }
        $xml .= $string . chr(10);
    }

    public function getCsvLine($fields = array(), $delimiter = ',', $enclosure = '"')
    {
        $str = '';
        $escape_char = '\\';
        foreach ($fields as $value) {
            if (strpos($value, $delimiter) !== false ||
                strpos($value, $enclosure) !== false ||
                strpos($value, "\n") !== false ||
                strpos($value, "\r") !== false ||
                strpos($value, "\t") !== false ||
                strpos($value, ' ') !== false) {
                $str2 = $enclosure;
                $escaped = 0;
                $len = strlen($value);
                for ($i = 0; $i < $len; $i++) {
                    if ($value[$i] == $escape_char) {
                        $escaped = 1;
                    } else if (!$escaped && $value[$i] == $enclosure) {
                        $str2 .= $enclosure;
                    } else {
                        $escaped = 0;
                    }
                    $str2 .= $value[$i];
                }
                $str2 .= $enclosure;
                $str .= $str2 . $delimiter;
            } else {
                $str .= $enclosure . $value . $enclosure . $delimiter;
            }
        }
        $str = substr($str, 0, -1);
        $str .= "\n";
        return $str;
    }

    protected function postProcess()
    {
        $output = FALSE;
        if (Tools::getIsset($this->name)) {
            $from = (int)Tools::getValue('from', 1);
            $to = (int)Tools::getValue('to', 100);
            $_orders = new Collection('Order');
            $_orders->where('id_order', '>=', $from);
            $_orders->where('id_order', '<=', $to);
            header("Expires: Thu, 19 Feb 1998 13:24:18 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-cache, must-revalidate");
            header("Cache-Control: post-check=0,pre-check=0");
            header("Cache-Control: max-age=0");
            header("Pragma: no-cache");
            header("Content-Type: text/xml");
            $filename = 'from' . $from . 'to' . $to . '.xml';
            $xml = $this->generateOrdersXMLforPOS($_orders, $filename);
            header("Content-disposition: attachment; filename=\"Orders from " . $from . " to " . $to . ".xml\"");
            ob_clean();
            die(trim($xml));
        }
    }

    public function getContent()
    {
        $this->bootstrap = true;
        $_orders = new Collection('Order');
        $_orders->setPageSize(1);
        $_orders->setPageNumber(1);
        if ($_orders->count() == 0) {
            return '<div class="panel">
                            <div class="panel-heading">
                                    <img src="../modules/bestkit_ordersexport/logo.gif" alt="Export orders to CSV or XML">' . $this->displayName . '
                            </div><br>
                            <h4>' . $this->l('You have no orders!') . '</h4>
                    </div>';
        }
        $this->postProcess();
        $helper = $this->initForm();
        foreach ($this->fields_form[0]['form']['input'] as $input) {
            $helper->fields_value['from'] = '1';
            $helper->fields_value['to'] = '100';
            $helper->fields_value['order_fields[]'] = array("payment", "module", "total_discounts", "total_paid", "total_products", "date_add", "reference", "id", "message");
            $helper->fields_value[$this->name] = $this->l('Upload ') . 'CSV';
            $helper->fields_value['status'] = '0';
            $helper->fields_value['payment'] = '1';
            $helper->fields_value['shipping'] = '1';
            $helper->fields_value['customer'] = '1';
            $helper->fields_value['customer_fields[]'] = array("id", "lastname", "firstname", "email");
            $helper->fields_value['delivery'] = '1';
            $helper->fields_value['invoice'] = '1';
            $helper->fields_value['products'] = '1';
            $helper->fields_value['product_fields[]'] = array("product_id", "product_attribute_id", "product_name", "product_quantity", "product_price", "product_reference", "total_price_tax_incl");
            $helper->fields_value['address_fields[]'] = array("id_customer", "country", "company", "lastname", "firstname", "address1", "address2", "postcode", "city", "phone", "phone_mobile", "id");
        }
        $html = '<link href="../modules/bestkit_ordersexport/css/admin.css" rel="stylesheet" type="text/css" media="all" />';
        $html .= '<script type="text/javascript" src="../modules/bestkit_ordersexport/js/admin.js"></script>';
        return $html . $helper->generateForm($this->fields_form);
    }

    private function initToolbar()
    {
        $this->toolbar_btn['save'] = array('href' => '#', 'desc' => $this->l('Save'));
        return $this->toolbar_btn;
    }

    public function hookNewOrder($params)
    {
        if (Validate::isLoadedObject($params['order'])) {
            $this->generateOrdersXMLforPOS(array($params['order']), 'order_' . $params['order']->id . '.xml');
        }
    }

    public function hookUpdateOrderStatus($params)
    {
        $order = new Order((int)$params['id_order']);
        if (Validate::isLoadedObject($order)) {
            $this->generateOrdersXMLforPOS(array($order), 'order_' . $order->id . '.xml');
        }
    }

    public function hookActionPaymentCCAdd($params)
    {
        $reference = $params['paymentCC']->order_reference;
        $orders = Order::getByReference($reference);
        foreach ($orders as $order) {
            if (Validate::isLoadedObject($order)) {
                $this->generateOrdersXMLforPOS(array($order), 'order_' . $order->id . '.xml');
            }
        }
    }

    public function generateOrdersXMLforPOS($orders, $filename, $path_name = false)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
<Orders>
<Shop>
<GUID>54752FCF-DBEB-E119-1FC8-0A48354B9B38</GUID>
</Shop>';
        // foreach ($orders as $_order) {
        //     $xml .= $this->generateXMLforPOS($_order);
        // }
        // $xml .= '</Orders>';
        // $_filename = _PS_MODULE_DIR_ . 'bestkit_ordersexport/pos/' . $filename;
        // @file_put_contents($_filename, $xml);
        // return $xml;

        foreach ($orders as $_order) {
            $xml .= $this->generateXMLforPOS($_order);
        }
        $xml .= '</Orders>';

        if ($path_name) {
            $_filename = rtrim($path_name, '/') .'/'. $filename;
        } else {
            $_filename = _PS_MODULE_DIR_ . 'bestkit_ordersexport/pos/' . $filename;
        }

        @file_put_contents($_filename, $xml);

        return $xml;
    }

    protected function generateXMLforPOS(Order $order)
    {
        $module_dir = _PS_MODULE_DIR_ . 'bestkit_ordersexport/';
        $order_template = Tools::file_get_contents($module_dir . 'pos_order_template.xml');
        $product_line_template = Tools::file_get_contents($module_dir . 'pos_product_line_template.xml');
        $payments_template = Tools::file_get_contents($module_dir . 'pos_payments_template.xml');
//Product lines:
        $product_lines_xml = '';
        $_products = $order->getProducts();
        $i = 1;
        $portesFinal = 0;
        $total_sum = 0;
        // var_dump($_products);
        // exit;
        foreach ($_products as $_product) {
            $product = new Product($_product['product_id'], false, 1);
            $product->description_short;
            $nofree = str_replace('[%FREE%]','',$product->description_short);
            $tag_pose = strpos($product->description_short, '[%POSE%]');
            if($tag_pose !== false){
              $_product['tag_pose'] = 1;
            }else{
              $_product['tag_pose'] = 0;
            }
            $products[0]['description_short'] =  $nofree;
            $products[0]['cart_quantity'] = 1;
            $_product['rate'] = (float)$_product['tax_rate']/100;
            $getPortes = AluclassCarrier::getCarrierPrice($products);
            if ($_product['id_product']) {
                $product_line_xml = $product_line_template;
                $product = new Product($_product['id_product'], false, 1);
                $_product['name'] = $product->name;
                $_idProduct = $_product['id_product'];
                // print_r($_product['name']);
                # ------
                if ($_product['id_customization'] == "0") {
                    $_product['product_name'] = str_replace($_product['name'], '', $_product['product_name']);
                    $_product['product_name'] = ltrim($_product['product_name'], ' - ');
                } else {
                    $desc_prod = Db::getInstance()->getValue('SELECT x.description FROM (SELECT description FROM `'. _DB_PREFIX_ .'product_lang` WHERE   `id_product` = '. (int)$_product['id_product'].'
                    UNION
                    SELECT description FROM `'. _DB_PREFIX_ .'ndk_product_lang` WHERE   `id_product` = '. (int)$_product['id_product'].') x');

                    $desc_prod = str_replace("</p><p>", " - ", $desc_prod);
                    $desc_prod = strip_tags($desc_prod);
                    $desc_prod = str_replace(" ".$_product['name']." ", '', $desc_prod);
                    $_product['product_name'] = $desc_prod;
                }
                # ------
                $customization_text = '';
                $customized_datas = Product::getAllCustomizedDatas((int) $order->id_cart, null, true, null, (int) $_product['id_customization']);
                if (isset($customized_datas[$_product['id_product']][0])) {
                  foreach ($customized_datas[$_product['id_product']][0][$order->id_address_delivery] as $customization) {
                    if (isset($customization['datas'][Product::CUSTOMIZE_TEXTFIELD])) {
                      foreach ($customization['datas'][Product::CUSTOMIZE_TEXTFIELD] as $text) {
                        if (strpos($text['value'], "render")) {
                          $customization_text = $text['value'];
                        }
                      }
                    }
                  }
                }
                // $_product['product_name'] = str_replace($_product['name'], '', $_product['product_name']);
                // $_product['product_name'] = ltrim($_product['product_name'], ' - ');
                $_product['line_number'] = $i++;
                $_product['id_tax_rules_group'] = (int)$_product['id_tax_rules_group'];
                $_product['hour'] = date('His', strtotime($order->date_add));
                $_product['product_attribute_id'] = (int)$_product['product_attribute_id'];
                $_product['preview_image'] = $customization_text;

                $stringname = str_replace('Personnalisé -  ','',$_product['name']);

                $infoCatproduct = Db::getInstance()->getRow('SELECT ps_product.id_category_default,ps_product.id_product, c.id_parent
                FROM   ps_product_lang
                INNER JOIN ps_product ON ps_product_lang.id_product = ps_product.id_product
                INNER JOIN ps_category c on c.id_category = ps_product.id_category_default
                where ps_product_lang.name = "'.$stringname.'" AND ps_product_lang.id_lang =1');

                $percentage = DB::getInstance()->getRow("SELECT * FROM ps_specific_price Where  '$order->date_add' BETWEEN ps_specific_price.from AND ps_specific_price.to AND ps_specific_price.id_product = 0");
                $cupaoDesconto = DB::getInstance()->getRow("SELECT * FROM ps_cart_rule
                inner join ps_order_cart_rule ON ps_order_cart_rule.id_cart_rule = ps_cart_rule.id_cart_rule where ps_order_cart_rule.id_order = ".$order->id."");

                $_product['id_product']  = (int)$infoCatproduct['id_product'];
                $_product['id_category'] = (int)$infoCatproduct['id_category_default'];
                $_product['id_parent']   = (int)$infoCatproduct['id_parent'];
                $_product['testeporte'] = 0;
                $iva_portes = $getPortes * 1.20;
                if(strpos($product->description_short, '[%FREE%]') !== false){
                    $desconto = $iva_portes / 0.7;
                    $portesFinal = $desconto-($desconto*$percentage['reduction']);
                    if($cupaoDesconto == true ){
                        $cupao_percentage = $cupaoDesconto['reduction_percent'] / 100;
                        $portesFinal = $portesFinal-($portesFinal*$cupao_percentage);
                    }
                    $_product['testeporte'] = number_format($portesFinal,2,'.','') ;
                    $total_sum += $_product['testeporte'];
                }
                $reductionCode = $cupaoDesconto['code'];
                $reductionValue = $cupaoDesconto['value'];

                // ++ paulo - pormenores das redes rigidas
                // id prod
                $id_lang = 1;
                $palavra_customizada_ndk = "Personnalisé -";
                $num_caract_descon = mb_strlen($palavra_customizada_ndk) + 3;
                $productName = Db::getInstance()->getValue('SELECT x.name FROM (SELECT name FROM `'. _DB_PREFIX_ .'product_lang` WHERE `id_lang` = '.$id_lang.' AND `id_product` = '. (int)$_idProduct.'
                UNION
                SELECT name FROM `'. _DB_PREFIX_ .'ndk_product_lang` WHERE  `id_lang` = '.$id_lang.' AND `id_product` = '. (int)$_idProduct.') x');

                $titleproduct = Db::getInstance()->executeS(
                  'SELECT `title` FROM `' . _DB_PREFIX_ . 'link_customization_product`
                  where `id_product_customization` =  ' .  (int) $_idProduct);

                $titleproducttext = false;
                if(count($titleproduct) > 0){
                  $titleproducttext = $titleproduct[0]['title'];
                }

                $_product['name'] =  $productName . ($titleproducttext ? ' - ' . $titleproducttext : '');

                if (strpos($productName, $palavra_customizada_ndk) !== false) { // se tem a palavra costumizada, refina e retorna o id do produto
                    $repete = substr_count( ' '.$productName.' ', $palavra_customizada_ndk );
                    if ($repete == 1) {
                        $nom = substr($productName, $num_caract_descon);
                    } else {
                        for ($i=1; $i <= $repete; $i++) {
                            if ($i == 1) {
                                $nom = substr($productName, $num_caract_descon);
                            } else {
                                $nom = substr($nova_frase, $num_caract_descon);
                            }
                            $nova_frase = $nom;
                        }
                    }
                    $nom = str_replace("'", "\'", $nom);
                    $sql_select = "select x.id_product FROM (SELECT id_product FROM `ps_product_lang` WHERE id_lang='$id_lang' AND name = '$nom'  UNION SELECT id_product FROM `ps_ndk_product_lang` WHERE id_lang='$id_lang' AND name = '$nom') x";
                    $sql_id_product = Db::getInstance()->getValue($sql_select);
                } else { // se nao tem a palavra customizada, retorna o id do produto
                    // $sql_select = "SELECT id_product FROM `ps_product_lang` WHERE id_lang='$id_lang' AND name = '$nom'";
                    $sql_select = "select x.id_product FROM (SELECT id_product FROM `ps_product_lang` WHERE id_lang='$id_lang' AND name = '$productName'  UNION SELECT id_product FROM `ps_ndk_product_lang` WHERE id_lang='$id_lang' AND name = '$productName') x";
                    $sql_id_product = Db::getInstance()->getValue($sql_select);
                }

                // verifica e consulta arquivo csv
                $str = $_product['product_name'];
                $verificaArquivo = "modules/bestkit_ordersexport/csv_info/".(int)$sql_id_product.".csv";
                $ids_grillage_rigide = array("48485", "640023", "640024", "640025", "68627", "68667");
                $ids_cloture_aluminium_starter = array("13814", "640026");
                $ids_cloture_aluminium_panneau = array("640124", "640130");
                if (file_exists($verificaArquivo)) {
                  if(in_array($sql_id_product,$ids_grillage_rigide)){

                    // largura kit - longeur du kit
                    $array_kit = array("Kit de 5m","Kit de 7,5m", "Kit de 10m","Kit de 12,5m", "Kit de 15m","Kit de 15,5m", "Kit de 20m","Kit de 22,5m", "Kit de 25m", "Kit de 27,5m", "Kit de 30m","Kit de 32,5m", "Kit de 35m", "Kit de 37,5m", "Kit de 40m",
                     "Kit de 42,5m", "Kit de 45m", "Kit de 47,5m", "Kit de 50m", "Kit de 52,5m", "Kit de 55m", "Kit de 57,m", "Kit de 60m", "Kit de 62,5m", "Kit de 65m", "Kit de 67,5m", "Kit de 70m", "Kit de 72,5m", "Kit de 75m", "Kit de 77,5m", "Kit de 80m");
                    foreach ($array_kit as $value) {
                        $pattern = '/' . $value . '/';
                        if (preg_match($pattern, $str)) {
                            $analise["kit"] = $value;
                        }
                    }

                    // altura - hauteur du kit
                    // $array_altura = array("1020", "1220", "1520", "1720", "1920");
                    $array_altura = array("1025", "1225", "1525", "1725", "1925","1020", "1220", "1520", "1720", "1920");
                    foreach ($array_altura as $value) {
                        $pattern = '/' . $value . '/';
                        if (preg_match($pattern, $str)) {
                            $analise["altura"] = $value;
                        }
                    }

                    // sapata - type de fixation
                    $array_sapata = array("platine", "sceller");
                    foreach ($array_sapata as $value) {
                        $pattern = '/' . $value . '/';
                        if (preg_match($pattern, $str)) {
                            $analise["sapata"] = ucfirst($value);
                        }
                    }

                    // kit ocultacao - kit d'occultation
                    if ($analise["sapata"] == "Sceller") {
                        $array_kit_ocultacao = array(
                          "Avec kit d'occultation",
                          "Sans kit d'occultation",
                          "Avec kit d'occultation 200 5F SC",
                          "Sans kit d'occultation 200 5F SC",
                          "Sans kit d'occultation 200 5F P",
                          "Avec kit d'occultation 200 5F",
                          "Sans kit d'occultation 200 5F"
                        );
                        foreach ($array_kit_ocultacao as $value) {
                            $pattern = '/' . $value . '/';
                            if (preg_match($pattern, $str)) {
                                $analise["kit_ocultacao"] = $value;
                            }
                        }
                    } else {
                        $analise["kit_ocultacao"] = "-";
                    }

                    // base - soubassement
                    $array_base = array("Sans soubassement", "Avec 1 soubassement 250mm");
                    foreach ($array_base as $value) {
                        $pattern = '/' . $value . '/';
                        if (preg_match($pattern, $str)) {
                            $analise["base"] = $value;
                        }
                    }

                    // $criterios = array($analise["kit"], $analise["altura"], $analise["sapata"], $analise["kit_ocultacao"], $analise["base"]);
                    if (!empty(@$analise["base"])) {
                      $criterios = array($analise["kit"], $analise["altura"], $analise["sapata"], $analise["kit_ocultacao"], $analise["base"]);
                    } else {
                      $criterios = array($analise["kit"], $analise["altura"], $analise["sapata"], $analise["kit_ocultacao"]);
                    }
                    $row = 1;
                    if (($handle = fopen($verificaArquivo, "r")) !== FALSE) {
                        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                          if (!empty(@$analise["base"])) {
                            if ($data[0] == $criterios[0] && $data[1] == $criterios[1] && $data[2] == $criterios[2] && $data[3] == $criterios[3] && $data[4] == $criterios[4]) {
                              $retorno_csv = $data[5];
                            }
                          } else {
                            if ($data[0] == $criterios[0] && $data[1] == $criterios[1] && $data[2] == $criterios[2] && $data[3] == $criterios[3]) {
                              $retorno_csv = $data[4];
                            }
                          }
                        }
                        fclose($handle);
                    }

                    $_product['info_extra'] = $retorno_csv;
                    // $_product['info_extra'] = $sql_id_product;
                  }else if(in_array($sql_id_product,$ids_cloture_aluminium_starter)){
                    $array_kit_aluminium = array("2m", "4m", "6m", "8m", "10m", "12m", "14m", "16m", "18m", "20m", "22m", "24m", "26m", "28m", "30m", "32m", "34m", "36m", "38m", "40m", "42m", "44m", "46m", "48m", "50m");
                    foreach ($array_kit_aluminium as $value) {
                        $pattern = '/' . $value . '/';
                        if (preg_match($pattern, $str)) {
                        $analise["kit"] = $value; //panneau & starter
                        }
                    }

                    $array_altura_kit_aluminium = array("120", "220", "320", "420", "500", "520", "620", "700", "720", "820", "900", "920", "1020", "1100", "1120");
                    foreach ($array_altura_kit_aluminium as $value) {
                        $string_sem_ace = $str;
                        //aqui é onde remove todo o conteudo a frente de "- Accessoires" incluindo "- Accessoires"
                        $pos2 = strpos($string_sem_ace, "- Accessoires");
                        if ($pos2 !== false) {
                            $string_sem_ace = substr($string_sem_ace, 0, $pos2) . str_repeat('', strlen($string_sem_ace) - $pos2);
                        }
                        //--------
                        $pattern = '/' .$value. '/';
                        if (preg_match($pattern, $string_sem_ace)) {
                            $analise["altura"] = $value; //panneau & starter
                        }
                    }

                    // sapata - type de fixation
                    $array_sapata_aluminium = array("platine", "sceller");
                    foreach ($array_sapata_aluminium as $value) {
                        $pattern = '/' . $value . '/';
                        if (preg_match($pattern, $str)) {
                            $analise["sapata"] = ucfirst($value);//rigide
                        }
                    }

                    $criterios = array($analise["kit"], $analise["altura"], $analise["sapata"]);

                    if (($handle = fopen($verificaArquivo, "r")) !== FALSE) {
                      while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                        // var_dump($data[1]);
                        // $data_excel[0] == $criterios_cliente... is true then envia data com os materias
                        if ($data[0] == $criterios[0] && $data[1] == $criterios[1] && $data[2] == $criterios[2]) {
                            $string_ace = $str;
                            $concat = "";
                            $pos = strpos($string_ace, "Accessoires");
                            if ($pos !== false) {
                                $concat = substr($string_ace, $pos);
                            }
                            $retorno_csv = $data[3] ." ". $concat;
                        }
                      }
                      fclose($handle);
                    }

                    $_product['info_extra'] = $retorno_csv;

                  }else if(in_array($sql_id_product,$ids_cloture_aluminium_panneau)){
                    $array_kit_aluminium_panneau = array("2m", "4m", "6m", "8m", "10m", "12m", "14m", "16m", "18m", "20m", "22m", "24m", "26m", "28m", "30m", "32m", "34m", "36m", "38m", "40m", "42m", "44m", "46m", "48m", "50m");
                    foreach ($array_kit_aluminium_panneau as $value) {
                      $pattern = '/' . $value . '/';
                      if (preg_match($pattern, $str)) {
                        $analise["kit"] = $value; //panneau & starter
                      }
                    }

                    $array_altura_kit_aluminium_panneau = array("120", "220", "320", "420", "500", "520", "620", "700", "720", "820", "900", "920", "1020", "1100", "1120");
                    foreach ($array_altura_kit_aluminium_panneau as $value) {
                        $string_sem_ace = $str;
                        $pos2 = strpos($string_sem_ace, "- Accessoires");
                        if ($pos2 !== false) {
                            $string_sem_ace = substr($string_sem_ace, 0, $pos2) . str_repeat('', strlen($string_sem_ace) - $pos2);
                        }
                        $pattern = '/' .$value. '/';
                        if (preg_match($pattern, $string_sem_ace)) {
                            $analise["altura"] = $value; //panneau & starter
                        }
                    }

                    $criterios = array($analise["kit"], $analise["altura"]);

                    if (($handle = fopen($verificaArquivo, "r")) !== FALSE) {
                      while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                        // $data_excel[0] == $criterios_cliente... is true then envia data com os materias
                        if ($data[0] == $criterios[0] && $data[1] == $criterios[1]) {
                            $string_ace = $str;
                            $concat = "";
                            $pos = strpos($string_ace, "Accessoires");
                            if ($pos !== false) {
                                $concat = substr($string_ace, $pos);
                            }
                            $retorno_csv = $data[2] ." ". $concat;
                        }
                      }
                      fclose($handle);
                    }
                    $_product['info_extra'] = $retorno_csv;
                  }else{
                    $_product['info_extra'] = "";
                  }
                } else {
                    $_product['info_extra'] = "";
                    // $_product['info_extra'] = $sql_id_product;
                }
                // -- paulo - pormenores das redes rigidas

                foreach ($_product as $field => $value) {
                    if (is_array($value) || is_object($value)) {
                        continue;
                    }

                    $product_line_xml = str_replace('{{' . $field . '}}', htmlspecialchars($value), $product_line_xml);
                }
                $product_lines_xml .= $product_line_xml;
            }
        }
        //End of Product lines.
        //Payment lines:
        $payments_xml = '';
        $payments = OrderPayment::getByOrderReference($order->reference);
        foreach ($payments as $payment) {
            $payment_xml = $payments_template;
            $payment->currency = (new Currency($payment->id_currency))->iso_code;
            foreach ($payment as $field => $value) {
                if (is_array($value)) {
                    continue;
                }
                $payment_xml = str_replace('{{' . $field . '}}', htmlspecialchars($value), $payment_xml);
            }
            $payments_xml .= $payment_xml;
        }
        //End of Payment lines.
        //Customer data:
        $_customer = new Customer($order->id_customer);
        $_delivery_address = new Address($order->id_address_delivery);
        $order->customer_firstname = $_delivery_address->firstname;
        $order->customer_lastname = $_delivery_address->lastname;
        $order->customer_company = $_delivery_address->company;
        $order->customer_postcode = $_delivery_address->postcode;
        $order->customer_address = $_delivery_address->address1 . ($_delivery_address->address2 ? ', ' . $_delivery_address->address2 : '');
        $order->customer_city = $_delivery_address->city;
        $order->customer_state = '';
        if ($_delivery_address->id_state) {
            $order->customer_state = State::getNameById($_delivery_address->id_state);
        }
        $order->customer_country = Country::getNameById($order->id_lang, $_delivery_address->id_country);
        $order->customer_country_iso = Country::getIsoById($_delivery_address->id_country);
        $order->customer_phone = $_delivery_address->phone;
        $order->customer_phone_mobile = $_delivery_address->phone_mobile;
        if (!$order->customer_phone_mobile) {
            $order->customer_phone_mobile = $order->customer_phone;
        }
        $order->customer_email = $_customer->email;
        $order->customer_vat_included = ($_delivery_address->vat_number ? 1 : 0);
        $order->customer_vat_number = $_delivery_address->vat_number;
        $order->customer_zone = Country::getIdZone($_delivery_address->id_country);
//invoice:
        $_invoice_address = new Address($order->id_address_invoice);
        $order->icustomer_firstname = $_invoice_address->firstname;
        $order->icustomer_lastname = $_invoice_address->lastname;
        $order->icustomer_company = $_invoice_address->company;
        $order->icustomer_postcode = $_invoice_address->postcode;
        $order->icustomer_address = $_invoice_address->address1 . ($_invoice_address->address2 ? ', ' . $_invoice_address->address2 : '');
        $order->icustomer_city = $_invoice_address->city;
        $order->icustomer_state = '';
        if ($_invoice_address->id_state) {
            $order->icustomer_state = State::getNameById($_invoice_address->id_state);
        }
        $order->icustomer_country = Country::getNameById($order->id_lang, $_invoice_address->id_country);
        $order->icustomer_country_iso = Country::getIsoById($_invoice_address->id_country);
        $order->icustomer_phone = $_invoice_address->phone;
        $order->icustomer_phone_mobile = $_invoice_address->phone_mobile;
        $order->icustomer_vat_included = ($_invoice_address->vat_number ? 1 : 0);
        $order->icustomer_vat_number = $_invoice_address->vat_number;
        $order->icustomer_zone = Country::getIdZone($_invoice_address->id_country);
//End of Customer data.
//Order:
        $order->linkCart = ShareCart::getlinksahrecart($order->id_customer,$order->id_cart);
        $order->portestotal = $total_sum;
        $order->reduction = $reductionCode;
        $order->reduction_value = $reductionValue;
        $order->product_lines_xml = $product_lines_xml;
        $order->total_tax = $order->total_products_wt - $order->total_products;
        $order->payments_xml = $payments_xml;
        $order->number_of_payments = count($payments);
        $order->product_lines_count = count($_products);
//$order->date = date('Ymd', strtotime($order->date_add));
        $order->date = date('c', strtotime($order->date_add));
        $order->hour = date('His', strtotime($order->date_add));
        $order->currency = (new Currency($order->id_currency))->iso_code;


        $order->messages = [];
        $messages = Message::getMessagesByOrderId($order->id);
        foreach ($messages as $message) {
            $order->messages[] = $message['message'];
        }

        $order->message = implode(chr(10) . '---------' . chr(10), $order->messages);
        $carrier = new Carrier($order->id_carrier, $order->id_lang);
        $order->carrier = $carrier->name;
        $order->delivery_date = date('c', strtotime($order->delivery_date));
        foreach ($order as $field => $value) {
            if (is_array($value)) {
                continue;
            }
            if (!in_array($field, array('product_lines_xml', 'payments_xml'))) {
                $value = htmlspecialchars($value);
            }
            $order_template = str_replace('{{' . $field . '}}', $value, $order_template);
        }
        return $order_template;
    }

    public function getPPOrders($id_order)
    {
        if (!(int)$id_order) {
            $id_order = (int)Db::getInstance()->getValue('SELECT `id_order` FROM `'. _DB_PREFIX_ .'orders` ORDER BY `id_order` asc');//LIMIT 1
        }

        $orderIDs = Db::getInstance()->getValue('SELECT GROUP_CONCAT(`id_order`) FROM `'. _DB_PREFIX_ .'orders` WHERE `id_order` > '. (int)$id_order);

        if (!$orderIDs) {
            return false;
        }

        $orders = array();
        $xplIDs = explode(',', $orderIDs);

        foreach ($xplIDs as $idOrder) {
            $orders[] = new Order((int)$idOrder);
        }

        return $orders;
    }
}
