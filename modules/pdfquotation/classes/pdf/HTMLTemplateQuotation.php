<?php

/**
 * Class  HTMLTemplateQuotation
 *
 * @author    Empty
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once _PS_CLASS_DIR_ . 'AluclassCarrier.php';
class HTMLTemplateQuotation extends HTMLTemplate
{

  public function __construct(QuotationObject $quotation, $smarty)
  {
    $this->quotation = $quotation;
    $this->smarty = $smarty;
    $this->title = HTMLTemplateQuotation::l('Estimate / Order');
    $this->shop = new Shop(Context::getContext()->shop->id);
  }

  protected function getLogo()
  {
    $logo = '';

    $shopId = (int)Context::getContext()->shop->id;

    if (Configuration::get('PS_LOGO_INVOICE', null, null, $shopId) != false && file_exists(_PS_IMG_DIR_ . Configuration::get('PS_LOGO_INVOICE', null, null, $shopId)))
      $logo = _PS_IMG_DIR_ . Configuration::get('PS_LOGO_INVOICE', null, null, $shopId);
    elseif (Configuration::get('PS_LOGO', null, null, $shopId) != false && file_exists(_PS_IMG_DIR_ . Configuration::get('PS_LOGO', null, null, $shopId)))
      $logo = _PS_IMG_DIR_ . Configuration::get('PS_LOGO', null, null, $shopId);
    return $logo;
  }

  public function getHeader()
  {
    $path_logo = $this->getLogo();

    $width = 0;
    $height = 0;
    if (!empty($path_logo))
      list($width, $height) = getimagesize($path_logo);

    $this->smarty->assign(array(
      'shop_name' => Configuration::get('PS_SHOP_NAME'),
      'first_name' => $this->quotation->first_name,
      'last_name' => $this->quotation->last_name,
      'reference' => $this->quotation->ref_quotation,
      'email' => $this->quotation->email,
      'logo_path' => $path_logo,
      'width_logo' => $width,
      'height_logo' => $height,
      'customer_id' => (int)Context::getContext()->customer->id,
      'date' => date("Y-m-d h:i:sa"),
      'header' => htmlentities(Configuration::get('PDFQUOTATION_HEADER', Context::getContext()->language->id)),
      'link_cart_quo' => $this->quotation->link_cart,
      'qr_code_url' => $this->quotation->link_qrcode
    ));

    if (file_exists(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/header.tpl')) {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/header.tpl');
    } else {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/en/header.tpl');
    }
  }

  /**
   * Returns the template filename
   * @return string filename
   */
  public function getFooter()
  { //d(Configuration::get('PDFQUOTATION_FOOTER', Context::getContext()->language->id));
    $this->smarty->assign(array(
      'footer' => htmlentities(Configuration::get('PDFQUOTATION_FOOTER', Context::getContext()->language->id))
    ));

    if (file_exists(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/footer.tpl')) {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/footer.tpl');
    } else {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/en/footer.tpl');
    }
  }

  /**
   * Returns the template's HTML content
   * @return string HTML contentProd
   */
  public function getContentProd($productname, $priceproduct_lessIVA, $description, $imgProd, $idproduct, $porteprice_lessIVA)
  {
    $productObj = new Product($idproduct, false, Context::getContext()->language->id, Context::getContext()->shop->id);
    $tax_calculator = $productObj->getTaxesRate();
    $tax = $tax_calculator;


    if (preg_match('/\[@(\d+)@\]/', $productObj->description_short, $findNum)) {
        $id_category = $findNum[1];
    }else{
        $id_category = $productObj->id_category_default;
    }
    if (preg_match('/\[!(\d+)!\]/', $productObj->description_short, $findNum)) {
        $idproduct_customaze = $findNum[1];
    }else{
        $idproduct_customaze = $productObj->id_category_default;
    }
    $tax_calculator = ($tax_calculator / 100) + 1;
    $checaDescontosCatalogo = Product::checaDescontosCatalogo($id_category,$idproduct_customaze);


    if (!$priceproduct_lessIVA) {
      $priceproduct_lessIVA = $productObj->price;
    }

    if (!$porteprice_lessIVA) {
      $idzone = 1;
      $idcarrier = 0;
      $position = -1;
      $resultCarrier = Carrier::getCarriersForOrder((int) $idzone);
      foreach ($resultCarrier as $arraycarrier) {
        if ($position == -1) {
          $position = $arraycarrier['position'];
        }
        if ($arraycarrier['position'] < $position) {
          $position = $arraycarrier['position'];
          $idcarrier = $arraycarrier['id_carrier'];
        }
      }

      $Carrier = new Carrier((int) $idcarrier);
      $porteprice_lessIVA =  $Carrier->getDeliveryPriceByWeight($productObj->weight, (int) $idzone);
    }


    $priceproduct_withIVA = ($priceproduct_lessIVA * $tax_calculator);
    $priceproduct_withIVA_withDiscount = (float)$priceproduct_withIVA - ((float)$priceproduct_withIVA * ((float)$checaDescontosCatalogo['reduction'] / 100));
    $priceproduct_withDiscount_LessIVA = ($priceproduct_withIVA_withDiscount / $tax_calculator);


    $porteprice_withIVA = ($porteprice_lessIVA * $tax_calculator);
    $priceTotal_withIVA_withDiscount_withPortes = $porteprice_withIVA+$priceproduct_withIVA_withDiscount;
    $IVA = $priceTotal_withIVA_withDiscount_withPortes - ($priceTotal_withIVA_withDiscount_withPortes/ $tax_calculator);

    $description =  preg_replace('/\d{1,4}(?:[.,]\d{3})*[.,]\d{2}(?:\s|&nbsp;)?€/u','', $description);

    $this->smarty->assign(array(
      'productname' => $productname,
      'id_category_default' => $id_category,
      'pricetotal' => $priceTotal_withIVA_withDiscount_withPortes,
      'precentagem' => $checaDescontosCatalogo['reduction'],
      'description' => $description,
      'imgProd' => $imgProd,
      'priceHT' => $priceproduct_withDiscount_LessIVA,
      'Portes' =>  round($porteprice_lessIVA, 2),
      'priceIVA' => $IVA,
      'iva' => $tax,
      'pricetotalproducts' => $priceproduct_withIVA_withDiscount,
      'idproduct' => $idproduct,

    ));

    if (file_exists(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/quotation.tpl')) {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/quotation_prod.tpl');
    } else {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/en/quotation_prod.tpl');
    }
  }


  /**
   * Returns the template's HTML content
   * @return string HTML content
   */
  public function getContent()
  {
    $products = Context::getContext()->cart->getProducts();
    foreach ($products as $i => $product) {

      $titleproduct = Db::getInstance()->executeS(
        'SELECT `title` FROM `' . _DB_PREFIX_ . 'link_customization_product`
            where `id_product_customization` =  ' .  (int) $product['id_product']
      );

      $products[$i]['title'] = '';
      if (count($titleproduct) > 0) {
        $products[$i]['title'] = $titleproduct[0]['title'];
      }


      $productObj = new Product($product['id_product'], false, Context::getContext()->language->id, Context::getContext()->shop->id);

      if ($product['id_category_default'] == 102) {

        $textdescr =  preg_replace('/\d{1,4}(?:[.,]\d{3})*[.,]\d{2}(?:\s|&nbsp;)?€/u', '', $productObj->description);

        $products[$i]['description'] = str_replace('/([1-9][0-9]*|0)(\,[0-9]{2})? €/g', '', $textdescr);
      } else {
        $products[$i]['description'] = '';
      }

      //Features**********************************************************
      $products[$i]['features_name'] = "";
      foreach ($product['features'] as $feature) {
        $featureValue = new FeatureValue($feature['id_feature_value']);
        $products[$i]['features_name'] .= $featureValue->value[Context::getContext()->language->id] . ", ";
      }
      if (!empty($products[$i]['features_name'])) {
        $products[$i]['features_name'] = Tools::substr($products[$i]['features_name'], 0, -2);
      }

      //Combinations******************************************************
      $combinations = $productObj->getAttributeCombinationsById($product['id_product_attribute'], Context::getContext()->language->id);
      $products[$i]['combination'] = "";
      foreach ($combinations as $combination) {
        $products[$i]['combination'] .= $combination['group_name'] . ": " . $combination['attribute_name'] . ", ";
      }
      if (!empty($products[$i]['combination'])) {
        $products[$i]['combination'] = Tools::substr($products[$i]['combination'], 0, -2);
      }
      $products[$i]['price_without_reduction'] = Product::getPriceStatic($products[$i]['id_product'], false, $products[$i]['id_product_attribute'], _PS_PRICE_COMPUTE_PRECISION_, null, false, false);
      $products[$i]['reduction'] = Product::getPriceStatic($products[$i]['id_product'], false, $products[$i]['id_product_attribute'], _PS_PRICE_COMPUTE_PRECISION_, null, true);
    }

    $cartInfo = Context::getContext()->cart->getSummaryDetails(Context::getContext()->language->id);
    if ($cartInfo['total_shipping'] < $cartInfo['total_shipping_tax_exc']) {
      $extra = $cartInfo['total_shipping_tax_exc'] - ($cartInfo['total_shipping'] / 1.2);
      $cartInfo['total_shipping_tax_exc'] = ($cartInfo['total_shipping'] / 1.2);
      $cartInfo['total_tax'] = $cartInfo['total_tax'] + $extra;
    }

    $this->smarty->assign(array(
      'before' => htmlentities(Configuration::get('PDFQUOTATION_BEFORE', Context::getContext()->language->id)),
      'after' => htmlentities(Configuration::get('PDFQUOTATION_AFTER', Context::getContext()->language->id)),
      'products' => $products,
      'cart_info' => $cartInfo,
      'is_discount' => ($cartInfo['total_discounts'] > 0 ? true : false)
    ));

    if (file_exists(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/quotation.tpl')) {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/' . Context::getContext()->language->iso_code . '/quotation.tpl');
    } else {
      return $this->smarty->fetch(_PS_MODULE_DIR_ . 'pdfquotation/views/templates/front/pdf/en/quotation.tpl');
    }
  }

  /**
   * Returns the template filename
   * @return string filename
   */
  public function getFilename()
  {
    return $this->quotation->ref_quotation . '.pdf';
  }

  /**
   * Returns the template filename when using bulk rendering
   * @return string filename
   */
  public function getBulkFilename()
  {
    return 'quotation.pdf';
  }
}
