<?php

/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author    Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
 */


include(dirname(__FILE__) . '/../../config/config.inc.php');
include(dirname(__FILE__) . '/../../init.php');
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/ndk_advanced_custom_fields.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCf.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCfValues.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCfRecipients.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCfSpecificPrice.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkProdCreator.php';
$ndkPc = new ndkProdCreator();


$return = array();
$context = Context::getContext();
$default_currency = new Currency((int)Configuration::get('PS_CURRENCY_DEFAULT'));
$user_currency = $context->currency;

$disabe_product_price = false;

$languages = Language::getLanguages();
$id_lang = Context::getContext()->language->id;
$product = new Product((int)Tools::getValue('id_product'), (int)$id_lang);
$category_id = $product->id_category_default;
$wholesale_price = $product->wholesale_price;
$real_pprice = $product->base_price;
$empty_form = true;
$is_recipient = false;
$newWeight = 0;
$packitemlist = array();
/*$cookieRealPrice = new Cookie('ndkRealPrice_'.(int)Tools::getValue('id_product'));
$cookieRealPrice->price = $real_pprice;
if (isset($cookieRealPrice)) {
    if (isset($cookieRealPrice->price)){
        $real_pprice = $cookieRealPrice->price;
    }
    else {
       $cookieRealPrice->price = $real_pprice;
    }
}*/


//$product->customizable = 1;
//$product->price = $real_pprice;
//$product->setFieldsToUpdate(array('customizable' => 1));
//$product->update();
Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'product` SET customizable = 1 WHERE id_product = ' . (int)$product->id);
Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'product_shop` SET customizable = 1 WHERE id_product = ' . (int)$product->id);
//Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'product` SET minimal_quantity = 0 WHERE id_product = '.(int)$product->id);
//Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'product_shop` SET minimal_quantity = 0 WHERE id_product = '.(int)$product->id);

if (Tools::getValue('id_product_edit')) {
  $customizationoldedit = Db::getInstance()->getRow('SELECT `id_customization` FROM `' . _DB_PREFIX_ . 'customization` where `id_product` =  ' . (int)Tools::getValue('id_product_edit'));

  $context->cart->updateQty(1, (int)Tools::getValue('id_product_edit'), 0, (int)$customizationoldedit['id_customization'], 'down');
  // $customisationedit = new Customization((int)$customizationoldedit['id_customization']);
  // $customisationedit->delete();
  // Db::getInstance()->execute('DELETE FROM `ps_link_customization_product` where `id_product_customization` =  ' . (int)Tools::getValue('id_product_edit'));
}

if ((int)Tools::getValue('old_id_customization') > 0) {


  $customisation = new Customization((int)Tools::getValue('old_id_customization'));
  $customProd = new Product((int)$customisation->id_product);
  //var_dump($customisation);


  if ($customProd->id != Tools::getValue('id_product')) {

    $context->cart->updateQty((int)Tools::getValue('qty'), (int)$customProd->id, 0, (int)Tools::getValue('old_id_customization'), 'down');

    if ((int)Tools::getValue('ndkcf_id_combination') > 0) {
      $combNames = $product->getAttributesResume($id_lang);
      foreach ($combNames as $row) {
        if ($row['id_product_attribute'] == (int)Tools::getValue('ndkcf_id_combination'))
          $combName = $row['attribute_designation'];
      }
    } else {
      $combName = false;
    }



    foreach ($languages as $lang) {
      $customProd->name[$lang['id_lang']] = Tools::truncateString(Tools::getValue('cusText') . ' ' . $product->name[$id_lang] . (isset($combName) && $combName != '' ? ' - ' . $combName : ''), 125);
      $customProd->link_rewrite[$lang['id_lang']] = Tools::str2url($product->name[$id_lang] . (isset($combName) && $combName != '' ? ' - ' . $combName : ''));
      $customProd->description_short[$lang['id_lang']] = Tools::getValue('cusText') . ' :' . $product->name[$id_lang] . (isset($combName) && $combName != '' ? ' - ' . $combName : '');
    }
    $customProd->save();

    $newCustomProd = $customProd->id;
    //Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'image` WHERE id_product = '.(int)$newCustomProd);
    //Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'image_shop` WHERE id_product = '.(int)$newCustomProd);
    Db::getInstance()->execute('DELETE FROM `' . _DB_PREFIX_ . 'pack` WHERE id_product_pack = ' . (int)$newCustomProd);
    Db::getInstance()->execute('DELETE FROM `' . _DB_PREFIX_ . 'ndk_customization_field_configuration` WHERE id_ndk_customization_field_configuration = ' . (int)Tools::getValue('old_conf'));
    Db::getInstance()->execute('DELETE FROM `' . _DB_PREFIX_ . 'ndk_customization_field_configuration_lang` WHERE id_ndk_customization_field_configuration = ' . (int)Tools::getValue('old_conf'));
  } else {
    $newCustomProd = NdkCf::createProductCustom($product, (int)Tools::getValue('ndkcf_id_combination'), 0, Tools::getValue('cusText'));
    $context->cart->updateQty((int)Tools::getValue('qty'), (int)Tools::getValue('id_product'), (int)Tools::getValue('ndkcf_id_combination'), (int)Tools::getValue('old_id_customization'), 'down');
  }

  $customisation->delete();
} else {
  $devischeck = false;
  $newCustomProd = NdkCf::createProductCustom($product, (int)Tools::getValue('ndkcf_id_combination'), 0, Tools::getValue('cusText'), $devischeck);
  // if ($devischeck) {
  //   $newCustomProdDevis = $newCustomProd;
  //   $newCustomProd = 0;
  // }
}


$id_address = (int)Context::getContext()->cart->id_address_invoice;
$address = Address::initialize($id_address, true);
$tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
$product_tax_calculator = $tax_manager->getTaxCalculator();
$usetax = Product::$_taxCalculationMethod == PS_TAX_INC;




if (Tools::getValue('id_product') && sizeof(Tools::getValue('ndkcsfield')) > 0) {
  // If cart has not been saved, we need to do it so that customization fields can have an id_cart
  // We check that the cookie exists first to avoid ghost carts


  if (!$context->cart->id) {
    $context->cart->add();
    $context->cookie->id_cart = (int)$context->cart->id;
  }
  $images = Tools::getValue('image-url');
  //$decoded = base64_decode(str_replace('data:image/png;base64,', '', $image));
  $im = 1;
  $cartImgs = array();
  $cover_id = Image::getCover((int)Tools::getValue('id_product'));
  $baseImage = new Image((int)$cover_id['id_image']);

  $cartImgs[0] = _PS_PROD_IMG_DIR_ . $baseImage->getImgPath() . '.' . $baseImage->image_format;
  foreach ($images as $image) {
    $decoded = mb_convert_encoding(str_replace('data:image/png;base64,', '', $image), "UTF-8", "BASE64");
    $name = time();
    file_put_contents(_PS_UPLOAD_DIR_ . 'ndkacf_' . $context->cart->id . '-' . $im . '.png', $decoded);
    $cartImgs[$im] = _PS_UPLOAD_DIR_ . 'ndkacf_' . $context->cart->id . '-' . $im . '.png';
    $im++;

    //print('<img src="'.$image.'"/>');
  }

  $i = 0;
  $labels_detail = array();
  $labels_image = array();
  $labels_price = array();
  $labels_index = array();
  $labels_comb = array();
  $labels_base = array();
  $labels_preview = array();
  $labels_preview_img = array();
  $labels_custom_reference = array();

  $new_desc = array();
  foreach ($languages as $language) {
    $new_desc[$language['id_lang']] = '';
  }
  //$prices_text = $product->name[$id_lang].' : '.Tools::displayPrice(Product::getPriceStatic($product->id, $usetax)).'  ' ."\n" ;
  $prices_text = '';
  foreach ($languages as $language) {
    $labels_detail[$language['id_lang']][0]['name'] = NdkCf::l('Details');
    $labels_price[$language['id_lang']][0]['name'] = Tools::getValue('cusTextTotal');
    $labels_index[$language['id_lang']][0]['name'] = Tools::getValue('cusTextRef');
    $labels_comb[$language['id_lang']][0]['name'] = Tools::getValue('cusTextComb');
    $labels_base[$language['id_lang']][0]['name'] = NdkCf::l('Base product');
    $labels_preview[$language['id_lang']][0]['name'] = Tools::getValue('previewText');
    $labels_preview_img[$language['id_lang']][0]['name'] = NdkCf::l('Preview (image)');
    $labels_custom_reference[$language['id_lang']][0]['name'] = NdkCf::l('reference');
  }

  $customizationPrice = 0;
  $ndkcustomvalue = array();
  $ndkPrices = Tools::getValue('prices');
  $recipientDetails = '';
  $accessoryProdQuantity = array();
  $dimensions = array();
  $percent_price = array();
  $surfaceQuantity = array();
  $encountredSurface = array();
  $orientations = array();
  //$ndkFields = NdkCf::getCustomFieldsForCreation(Tools::getValue('id_product'), $product->id_category_default);
  $custom_reference = '';

  $customizationLink = "";


  foreach (Tools::getValue('ndkcsfield') as $field => $value) {

    $arrayNDKs = Tools::getValue('ndkcsfield');

    $checkposeservice = false;
    $checkposetva = false;

    $arrayidstva = array(5475,5476,5477,5478,5479,5480,5481,5482,5483,5516,5517,5520,5525);
    $arrayidsservice = array(5426,5417,5424,5425,5439,5440,5441,5442,5443,5444,5445,5446,5447,5448,5449,5450,5452,5453,5454,5455,5456,5457,5458,5459,5460,5462,5463,5465,5466,5467,5472,5473,5518,5522,5524);


    if (in_array($field, $arrayidstva)){
      $checkposetva = true;
    }

    foreach($arrayNDKs as $keysndk => $valuendk){
      if (in_array($keysndk, $arrayidsservice)){
          $checkposeservice = true;
      }
    }

    if($checkposetva){
      if(!$checkposeservice){
        continue;
      }
    }


    if (!empty($value) && $value != '') {

      $type = Db::getInstance()->executeS(
        'SELECT cf.`type`
       FROM `' . _DB_PREFIX_ . 'ndk_customization_field`cf
       WHERE cf.`id_ndk_customization_field` = ' . (int)$field
      );



      switch ($type[0]['type']) {
        case '0':
          $customizationLink .= "-" . $field . "=" . $value;
          break;
        case '1':
          $value =  str_replace("=", "XX", $value);
          $customizationLink .= "-" . $field . "=" . $value;
          break;
        case '2':
          $ndk_customization_field_CUS = ndkCustomizationFieldCUS($value, $field);
          $customizationLink .= "-" . $field . "=" . $ndk_customization_field_CUS[0]['id_ndk_customization_field_value'];
          break;
        case '3':
          $ndk_customization_field_CUS = ndkCustomizationFieldCUS($value, $field);
          $customizationLink .= "-" . $field . "=" . $ndk_customization_field_CUS[0]['id_ndk_customization_field_value'];
          break;
        case '4':
          $ndk_customization_field_CUS = ndkCustomizationFieldCUS($value, $field);
          $customizationLink .= "-" . $field . "=" . $ndk_customization_field_CUS[0]['id_ndk_customization_field_value'];
          break;

        case '11':
          $customizationLink .= "-" . $field . "=";
          foreach ($value['quantity'] as $k => $v) {
            $ndk_customization_field_CUS = ndkCustomizationFieldCUS($k, $field);
            $customizationLink .= $ndk_customization_field_CUS[0]['id_ndk_customization_field_value'] . "_" . $v . "|";
          }
          $customizationLink = rtrim($customizationLink, '|');

          break;
        case '23':
          $customizationLink .= "-" . $field . "=";

          foreach ($value['quantity'] as $k => $v) {
            $ndk_customization_field_CUS = ndkCustomizationFieldCUS($k, $field);
            $customizationLink .=  $ndk_customization_field_CUS[0]['id_ndk_customization_field_value'] . "_";
          }
          $customizationLink = rtrim($customizationLink, '_');

          break;

        case '18':
          if (!empty($value['width']) && !empty($value['height']))
            $customizationLink .= "-" . $field . "=" . $value['width'] . "|" . $value['height'];

          break;
        case '19':
          $value['width'] =  str_replace("=", "XX", $value['width']);
          $value['height'] =  str_replace("=", "XX", $value['height']);
          if (!empty($value['width']) && !empty($value['height']))
            $customizationLink .= "-" . $field . "=" . $value['width'] . "|" . $value['height'];

          break;
      }
    }
  }

   $reductionDiscount = Product::checaDescontosCatalogo($category_id,(int)Tools::getValue('id_product'));

  //aaaaaaaa
  foreach (Tools::getValue('ndkcsfield') as $field => $value) {
    $arrayNDKs = Tools::getValue('ndkcsfield');

    $checkposeservice = false;
    $checkposetva = false;

    $arrayidstva = array(5475,5476,5477,5478,5479,5480,5481,5482,5483,5516,5517,5520,5525);
    $arrayidsservice = array(5426,5417,5424,5425,5439,5440,5441,5442,5443,5444,5445,5446,5447,5448,5449,5450,5452,5453,5454,5455,5456,5457,5458,5459,5460,5462,5463,5465,5466,5467,5472,5473,5518,5522,5523,5524,5546);


    if (in_array($field, $arrayidstva)){
      $checkposetva = true;
    }

    foreach($arrayNDKs as $keysndk => $valuendk){
      if (in_array($keysndk, $arrayidsservice)){
          $checkposeservice = true;
      }
    }

    if($checkposetva){
      if(!$checkposeservice){
        continue;
      }
    }

    /*foreach($ndkFields as $ndkField){
   	$field = $ndkField['id_ndk_customization_field'];
   	$value = Tools::getValue('ndkcsfield')[$ndkField['id_ndk_customization_field']];*/

    if ($field == 'orientation')
      foreach ($value as $k => $v)
        $orientations[$k] = $v;

    if (!empty($value) && $value != '') {
      $values = array();
      $empty_form = false;
      //1 on crée les champs
      $labels = array();
      $required = Db::getInstance()->executeS(
        'SELECT cf.`required`
         FROM `' . _DB_PREFIX_ . 'ndk_customization_field`cf
         WHERE cf.`id_ndk_customization_field` = ' . (int)$field
      );

      foreach ($languages as $language) {
        $labels[$language['id_lang']] = Db::getInstance()->executeS(
          'SELECT ' . (Configuration::get('NDK_USE_ADMIN_NAME') == 1 ? 'cfl.`admin_name`' : 'cfl.`name`') . ' as name
         FROM `' . _DB_PREFIX_ . 'ndk_customization_field_lang`cfl
         WHERE cfl.`id_ndk_customization_field` = ' . (int)$field . ' AND cfl.`id_lang` = ' . (int)$language['id_lang']
        );
      }

      createLabel($languages, 1, (int)Tools::getValue('id_product'), $labels, $required[0]['required']);

      //$product->customizable = 1;
      //$product->update(array('customizable' =>1));
      //Db::getInstance()->update('product', array('customizable' => 1), '`id_product` = '.(int)$product->id, 0, false);

      /* on gère les quantités */
      $accessoryQuantity = array();
      $custom_value = '';
      if (is_array($value)) {

        foreach ($value as $k => $v) {
          if ($k == 'quantity') {
            //var_dump($v);
            foreach ($v as $k2 => $v2) {
              $values[] = $k2;
              $accessoryQuantity[$k2] = $v2;
            }
          } elseif ($k == 'surface') {
            //var_dump($v);
            foreach ($v as $k2 => $v2) {
              $values[] = $k2;
              $surfaceQuantity[$k2] = $v2;
            }
          } elseif ($k == 'quantityProd') {
            foreach ($v as $k2 => $v2) {
              $values[] = $k2;
              $accessoryProdQuantity[$k2]['quantity'] = $v2;
            }
          } elseif ($k == 'accessory_customization') {
            foreach ($v as $k2 => $v2)
              if (empty($v2))
                unset($v[$k2]);

            $custom_value = 'FORMAT|' . sizeof($v) . '|';
            foreach ($v as $k2 => $v2) {
              if ($v2 != '') {
                $splited = explode('|', $k2);
                $attr_name = $splited[4];
                $number = $splited[3];

                $custom_value .= 'JUMPLINE|' . $attr_name . '|' . $number . '|' . $v2 . '|' . $attr_name . '|';
              }
            }
            //$values[$field] = $custom_value;
            $values[] = $custom_value;
          } elseif ($k == 'checkbox') {
            //var_dump($v);
            foreach ($v as $k2 => $v2) {
              $values[] = $v2;
              $accessoryQuantity[$k2] = 1;
            }
          } elseif ($k == 'width') {
            $dimensions[$field] = $value;
            $values[] = $field;
          } elseif ($k == 'recipient') {
            $is_recipient = false;
            $imp = 1;
            $imploded = '';
            $recipientInfos = $v;
            $recipientField = new NdkCf((int)$field, $id_lang);
            $recipientInfos['availability'] = $recipientField->validity;
            $recipientInfos['title'] = $recipientField->notice;
            $recipientInfos['id_ndk_customization_field'] = (int)$field;
            $ndk = new ndk_advanced_custom_fields();
            foreach ($v as $k2 => $v2) {
              if ($k2 == 'send_mail') {
                if ($v2 == 1)
                  $v2 = $ndk->l('yes');
                else
                  $v2 = $ndk->l('no');
              }

              if ($k2 == 'email' && $v2 != '')
                $is_recipient = true;


              $imploded .= '<strong>' . $ndk->l($k2) . ' </strong>' . $v2 . ($imp < sizeof($v) ? ' </br> ' : '');
              $imp++;
            }
            if ($is_recipient)
              $values[] = $imploded;
          }
        }
      } else {
        //var_dump($value);
        $values[] = $value;
      }

      //var_dump($values);
      //on demarra la boucle - começamos o loop
      if (!$is_recipient)
        $recipientDetails .= $labels[$language['id_lang']][0]['name'] . ' : ';


      foreach ($values as $value) {
        if (count($accessoryProdQuantity) > 0 && isset($accessoryProdQuantity[$value])) {
          //on ajoute les accessoires produits
          $line = '';
          $incart = 0;
          //$newWeight = 0;
          $pack_available_quantity = 0;
          $last_quantity_encountred = 999999999999;

          foreach ($accessoryProdQuantity as $key => $v) {
            if ($v['quantity'] > 0 && $key == $value) {

              $id_value = explode('|', $key)[0];

              $id_product = explode('|', $key)[1];
              $id_product_attribute = explode('|', $key)[2];
              if ((int)$id_product == (int)Tools::getValue('id_product'))
                $disabe_product_price = true;

              $maxP = $v['quantity'];
              $prodItem = NdkCf::getProductInfos((int)$id_product, (int)$id_product_attribute);
              $prodItem = $prodItem[0];

              $sql_prices =
                'SELECT f.price as fieldPrice, v.price as valuePrice, v.reference FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` v
               	   		            			LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field` f ON f.id_ndk_customization_field = v.id_ndk_customization_field
               	   		            			WHERE (v.price > 0 OR f.price > 0) AND v.id_ndk_customization_field_value = ' . (int)$id_value;

              $itemPrices = Db::getInstance()->getRow($sql_prices);
              if (!$context) {
                $context = Context::getContext();
              }

              //$context->cart->updateQty((int)$v['quantity'], (int)$id_product, (int)$id_product_attribute, null, 'up');
              if ((int)$id_product_attribute == 0)
                $id_product_attribute = null;

              $item_quantity = (int)$v['quantity'];
              if ((int)Tools::getValue('totalprodquantity-' . (int)$id_value . '-' . (int)$id_product) > 0)
                $item_quantity = (int)Tools::getValue('totalprodquantity-' . (int)$id_value . '-' . (int)$id_product);

              $item_price =  Product::getPriceStatic((int)$id_product, $usetax, $id_product_attribute, 6, null, false, true, (int)$item_quantity, false, (int)$context->customer->id, (int)$context->cart->id);


              if ($itemPrices) {
                if ($itemPrices['reference'] != '')
                  $custom_reference .= '-' . str_replace('[:id_product]', (int)$newCustomProd, $itemPrices['reference']);


                if ($itemPrices['valuePrice'] > 0) {
                  $item_price = $itemPrices['valuePrice'];
                  $dontUseTax = false;
                } elseif ($itemPrices['fieldPrice'] > 0) {
                  $item_price = $itemPrices['fieldPrice'];
                  $dontUseTax = false;
                } else {
                  $item_price = $prodItem['orderprice'];
                  //$item_price = $prodItem['price'];
                  $dontUseTax = true;
                }

                $id_address = (int)Context::getContext()->cart->id_address_invoice;
                $address = Address::initialize($id_address, true);
                $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$product->id, Context::getContext()));
                $product_tax_calculator = $tax_manager->getTaxCalculator();
                $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

                if ($usetax && !$dontUseTax)
                  $item_price = $product_tax_calculator->addTaxes($item_price);
              }

              if ($id_product_attribute > 0) {
                $p = new Product((int)$id_product);
                $accessorycombNames = $p->getAttributesResume(Context::getContext()->language->id);
                foreach ($accessorycombNames as $comb) {
                  //var_dump($comb);
                  if ($comb['id_product_attribute'] == $id_product_attribute)
                    $accessorycombName = $comb['attribute_designation'];
                }
              }
              $item_price = Tools::convertPriceFull($item_price, $user_currency, $default_currency, 6);

              if ($item_price > 0)
                $price_details = ' = ' . Tools::displayPrice(Tools::convertPriceFull((float)($item_price * $maxP), $default_currency, $user_currency, 6)) . ' ';
              else
                $price_details = '';

              $tax_name = new TaxRulesGroup(Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));

              $line .= $maxP . ' X ' . Tools::displayPrice(Tools::convertPriceFull((float)($item_price), $default_currency, $user_currency, 6)) . ' - ' . $prodItem['name'] . ' ' . ($id_product_attribute > 0 ? ' - ' . $accessorycombName : '') . ' ' . $price_details . ($usetax ? ' (' . $tax_name->name . ')' : '') . '<br/>';
              $customizationPrice += (float)($item_price * $maxP);
              if ((float)$prodItem['attrWeight'] > 0)
                $newWeight += $prodItem['attrWeight'] * $maxP;
              else
                $newWeight += $prodItem['weight'] * $maxP;
              //var_dump($newWeight);
              $packitemlist[] = array('id_product' => (int)$id_product, 'quantity' => (int)$maxP, 'id_product_attribute' => (int)$id_product_attribute);
              //Pack::addItem((int)$newCustomProd, (int)$id_product, (int)$maxP, (int)$id_product_attribute);
              $wholesale_price += $prodItem['wholesale_price'] * $maxP;
              $incart += $maxP;
              $prod_available = StockAvailable::getQuantityAvailableByProduct($id_product, $id_product_attribute) / $maxP;

              //$context->cart->updateQty((int)$v['quantity'], (int)$id_product, (int)$id_product_attribute, null, 'down');

              if ($prod_available < $last_quantity_encountred) {
                $pack_available_quantity = $prod_available;
                $last_quantity_encountred = $prod_available;
              }
              createLabel($languages, 1, (int)Tools::getValue('id_product'), $labels, $required[0]['required']);
              $ndkcustomvalue[] = array('index' => createLabel($languages, 1, $newCustomProd, $labels, $required[0]['required']), 'value' => $line);
            }
          }
        } elseif (count($dimensions) > 0 && isset($dimensions[$value])) {


          if (
            isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
            && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
            && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
          ) {
            //vasco - Aluclass codigo feito
            if ($value == '949' || $value == '1048')
              $item_price = $_POST["prices"][$value];
            else
              $item_price = NdkCf::getDimensionPrice((int)$field, $dimensions[$value]['width'], $dimensions[$value]['height']);

            $id_address = (int)Context::getContext()->cart->id_address_invoice;
            $address = Address::initialize($id_address, true);
            $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$product->id, Context::getContext()));
            $product_tax_calculator = $tax_manager->getTaxCalculator();
            $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;
            if ($usetax && $value != '949' && $value != '1048')
              $item_price = $product_tax_calculator->addTaxes($item_price);

            // if ($value == '5042' || $value == '5046' || $value == '5050' || $value == '5054'  || $value == '5021' || $value == '4997' || $value == '5018' || $value == '5019' || $value == '5023' || $value == '5027' || $value == '5031' || $value == '5035') {
            //   $item_price =  $item_price - ($item_price * 0.4);
            //   $item_price = $item_price / 0.7;
            // }

            $item_price = Tools::convertPriceFull($item_price, $user_currency, $default_currency, 6);

            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - start
            $nfi_PriceCSV = NdkCf::getDimensionPrice((int)$field, $dimensions[$value]['width'], $dimensions[$value]['height']);
            $nfi_getPrice = Db::getInstance()->executeS(
              '
                           SELECT `price` FROM `' . _DB_PREFIX_ . 'ndk_customization_field_csv` WHERE width>=' . $dimensions[$value]['width'] . ' AND height>=' . $dimensions[$value]['height'] . ' AND id_ndk_customization_field=' . (int)$field . ' LIMIT 1'
            );
            //list($preco, $icu) = explode('|', $nfi_getPrice[0]['price']);
            if ($nfi_getPrice[0]['price'] == "") {
              list($preco, $icu) = explode('|', $nfi_PriceCSV);
            } else {
              list($preco, $icu) = explode('|', $nfi_getPrice[0]['price']);
            }
            $nfi_IDU = $icu;
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - end

            $customizationPrice += $item_price;

            $arrayNDKs = Tools::getValue('ndkcsfield');
            $checkposeservice = false;
            $arrayidsservice = array(5475,5476,5477,5478,5479,5480,5481,5482,5483,5516,5517,5520,5525);

            foreach($arrayNDKs as $keysndk => $valuendk){
              if (in_array($keysndk, $arrayidsservice)){
                if(strpos($valuendk,"10") !== false){
                  $checkposeservice = true;
                }
              }
            }

            if ($checkposeservice) {
              $item_price = ($item_price / 1.2) * 1.1;
            }

            $item_price = $item_price - ($item_price * ($reductionDiscount['reduction_value'] / 100));


            //original $price_detail = ' '.Tools::displayPrice(Tools::convertPriceFull($item_price, $default_currency, $user_currency, 6)).' ';
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - start
            $price_detail = ' ' . Tools::displayPrice(Tools::convertPriceFull($item_price, $default_currency, $user_currency, 6)) . ' ' . $nfi_IDU;
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - end

            //var_dump($item_price);
            $line = str_replace('mmmm', 'mm', $dimensions[$value]['width'] . 'mm X ' . $dimensions[$value]['height'] . 'mm' . $price_detail);
            createLabel($languages, 1, (int)Tools::getValue('id_product'), $labels, $required[0]['required']);
            $ndkcustomvalue[] = array('index' => createLabel($languages, 1, $newCustomProd, $labels, $required[0]['required']), 'value' => $line);
          }
        } elseif ((count($surfaceQuantity) > 0 && isset($surfaceQuantity[$value])) || in_array($field, $encountredSurface)) {
          //var_dump($field);



          if (!in_array($field, $encountredSurface)) {
            //var_dump($surfaceQuantity);
            $prices = NdkCf::getCustomizationPrice($field, $value, Tools::getValue('id_product'),$reductionDiscount);
            $item_price = $prices[0]['price'];

            $line = '';
            foreach ($surfaceQuantity as $key => $value) {
              $valObj = new NdkCfValues((int)$key, $id_lang);
              $item_price = $item_price * (float)$value;
              $line .= $valObj->value . '  ' . $value . ' ; ';
              unset($surfaceQuantity[$key]);
            }

            //original $item_price = Tools::convertPriceFull($item_price, $user_currency, $default_currency, 6);
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - start
            $nfi_PriceCSV = NdkCf::getDimensionPrice((int)$field, $dimensions[$value]['width'], $dimensions[$value]['height']);
            $nfi_getPrice = Db::getInstance()->executeS(
              '
                                 SELECT `price` FROM `' . _DB_PREFIX_ . 'ndk_customization_field_csv` WHERE width>=' . $dimensions[$value]['width'] . ' AND height>=' . $dimensions[$value]['height'] . ' AND id_ndk_customization_field=' . (int)$field . ' LIMIT 1'
            );
            list($preco, $icu) = explode('|', $nfi_getPrice[0]['price']);
            $nfi_IDU = $icu;
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - end

            $customizationPrice += $item_price;
            //original $price_detail = ' '.Tools::displayPrice(Tools::convertPriceFull($item_price, $default_currency, $user_currency, 6)).' ';
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - start
            $price_detail = ' ' . Tools::displayPrice(Tools::convertPriceFull($item_price, $default_currency, $user_currency, 6)) . ' ' . $nfi_IDU;
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - capture code after | - end

            //var_dump($item_price);

            createLabel($languages, 1, (int)Tools::getValue('id_product'), $labels, $required[0]['required']);
            $ndkcustomvalue[] = array('index' => createLabel($languages, 1, $newCustomProd, $labels, $required[0]['required']), 'value' => $line . $price_detail);
            $encountredSurface[] = $field;
          }
        } else {
          //2 on renseigne les personnalisations
          //var_dump($value);

          //$custom_value .= '<p class="cus_sub"><span class="cust_title">'.$attr_name.' '.$number.'</span>'." \n".$v2.'</p>'."\n";
          //FORMAT|10|JUMPLINE|Taille - XS, Couleur - Gris chiné|0|hendrik  12 |Taille - XS, Couleur - Gris chiné|JUMPLINE|Taille - XS, Couleur - Gris chiné|1|Luce 03 |Taille - XS, Couleur - Gris chiné|JUMPLINE|Taille - S, Couleur - Gris chiné|0|Marilou 99 |Taille - S, Couleur - Gris chiné|
          $formated_value = false;
          $my_multiplicator = 1;
          $value = $value;
          //var_dump(substr($value, 0, 7));
          if (substr($value, 0, 7) == 'FORMAT|') {
            $valable_string = '';
            $lines = explode('JUMPLINE', $value);
            $formated_value = '';
            $value = '';
            $l = 0;
            foreach ($lines as $line) {
              if ($l == 0) {
                $my_multiplicator = (int)str_replace('FORMAT|', '', $line);
              } else {
                $vars = explode('|', $line);
                $valable_string .= explode('[', str_replace(' ', '', $vars[3]))[0];
                $value = $vars[3];

                $formated_value .= '<p class="cus_sub col-xs-6 col-md-3"><span class="cus_sub_container"><span class="cust_title">' . $vars[1] . ' ' . $vars[2] . '</span>' . " \n" . $vars[3] . '</span></p>';
              }

              $l++;
            }
          }

          //var_dump($valable_string);
          //var_dump($my_multiplicator);

          $prices = NdkCf::getCustomizationPrice($field, $value, Tools::getValue('id_product'),$reductionDiscount);

          if ($i + 1 < sizeof(Tools::getValue('ndkcsfield'))) {
            $suffix = ' - ' . "\n";
            $virgule = '<br />';
          } else {
            $suffix = ' ';
            $virgule = '';
          }

          $cprice = 0;
          $priced = false;

          //$price = $ndkPrices;
          //$cprice = $ndkPrices[$field];

          //vasco a
          $reductionauto = 0;
          $sql = "SELECT `reduction`,`reduction_type`  FROM `" . _DB_PREFIX_ . "specific_price` where  `id_product` = 0 and '" . date("Y-m-d H:i:s") . "' BETWEEN `from` AND `to`";
          $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
          if (count($result) > 0) {
            if ($result[0]['reduction_type'] == 'percentage') {
              $reductionauto = $result[0]['reduction'];
            }
          }

          $percent = false;

          for ($j = 0; $j < sizeof($prices); $j++) {

            if ($prices[$j]['reference'] != '')
              $custom_reference .= '-' . str_replace('[:id_product]', (int)$newCustomProd, $prices[$j]['reference']);

            if (empty($value) || $value == '') {
              if (!$priced) {
                $price = $prices[$j];
                $cprice = 0;
                $priced = true;
              }
            } elseif ($prices[$j]['valuePrice'] && $prices[$j]['valuePrice'] > 0 && $prices[$j]['value'] && ($prices[$j]['value'] == $value)) {

              if (!$priced) {
                $price = $prices[$j];
                if ($prices[$j]['valuePrice'] > 0) {
                  $cprice = $prices[$j]['valuePrice'];
                  //on recupère les discount pour la valeur
                  $specificPrices = NdkCfSpecificPrice::getSpecificPrices((int)$prices[$j]['id_ndk_customization_field'], $prices[$j]['id_ndk_customization_field_value'], (int)Tools::getValue('qty'));
                  if ($specificPrices && sizeof($specificPrices) > 0) {
                    if ((float)$specificPrices[0]['reduction'] > 0) {
                      if ($specificPrices[0]['reduction_type'] == 'amount')
                        $cprice = $cprice - (float)$specificPrices[0]['reduction'];
                      else
                        $cprice = $cprice - ($cprice * ((float)$specificPrices[0]['reduction'] / 100));
                    }
                  }
                } elseif ($prices[$j]['price'] > 0) {
                  $cprice = $prices[$j]['price'];

                  //on recupère les discount pour le champs
                  $specificPrices = NdkCfSpecificPrice::getSpecificPrices((int)$prices[$j]['id_ndk_customization_field'], 0, 0);
                  if ($specificPrices && sizeof($specificPrices) > 0) {
                    if ((float)$specificPrices[0]['reduction'] > 0) {
                      if ($specificPrices[0]['reduction_type'] == 'amount')
                        $cprice = $cprice - (float)$specificPrices[0]['reduction'];
                      else
                        $cprice = $cprice - ($cprice * ((float)$specificPrices[0]['reduction'] / 100));
                    }
                  }
                } else
                  $cprice = 0;

                $priced = true;
              }
            } elseif ($prices[$j]['valuePrice'] <= 0 && $prices[$j]['price_per_caracter'] <= 0) {
              if (!$priced) {
                $price = $prices[$j];
                if ($prices[$j]['price'] > 0)
                  $cprice = $prices[$j]['price'];
                else
                  $cprice = 0;
                $priced = true;
              }
            } else {
              if (isset($prices[$j]['type']) && ($prices[$j]['type'] == 0 || $prices[$j]['type'] == 13 || $prices[$j]['type'] == 14 || $prices[$j]['type'] == 6)) {
                if (!isset($valable_string)) {
                  $value = str_replace('¶', '', $value);
                  $valable_string = explode('[', str_replace(' ', '', $value));
                }
              }

              if (!$prices[$j]['valuePrice']) {
                if (isset($valable_string)) {
                  if (!$priced && $valable_string[0] != '') {
                    $price = $prices[$j];
                    if ($prices[$j]['price_per_caracter'] > 0) {
                      $my_multiplicator = 1;
                      $valable_string = explode('[', str_replace(' ', '', $value));

                      $cprice = $prices[$j]['price_per_caracter'] * (Tools::strlen($valable_string[0]));
                    } else {
                      $cprice = $prices[$j]['price'];
                    }
                    $priced = true;
                  }
                }
              }
            }


            if ($prices[$j]['price_type'] == 'percent') {
              $percent_price[$prices[$j]['id_ndk_customization_field']] = $cprice;
              $percent = true;
            }
          }


          if (count($accessoryQuantity) == 0) {
            $accessoryQuantity[$value] = 0;
            //$value ='';
          } else {
            $cprice = $cprice * $accessoryQuantity[$value];
            if ($accessoryQuantity[$value] == 0)
              $value = '';
          }




          $price_detail = '';
          if (isset($prices[$j])) {
            if ($prices[$j]['price_type'] == 'one_time') {
              $cprice = $cprice / (int)Tools::getValue('qty');
            }
          }


          $cprice = $cprice * $my_multiplicator;
          $customizationPrice += (float)($cprice);

          // if ($prices[0]['type'] == 11 || $prices[0]['type'] == 23 || $prices[0]['type'] == 2) {
          //   if ($prices[0]['id_ndk_customization_field_value'] == 17486 || $prices[0]['id_ndk_customization_field_value'] == 26893 || $prices[0]['id_ndk_customization_field_value'] == 16918 || $prices[0]['id_ndk_customization_field_value'] == 29911  || $prices[0]['id_ndk_customization_field_value'] == 29910 || $prices[0]['id_ndk_customization_field_value'] == 1544 || $prices[0]['id_ndk_customization_field_value'] == 1495 || $prices[0]['id_ndk_customization_field_value'] == 27296 || $prices[0]['id_ndk_customization_field_value'] == 27297 || $prices[0]['id_ndk_customization_field_value'] == 1470 || $prices[0]['id_ndk_customization_field_value'] == 1471 || $prices[0]['id_ndk_customization_field_value'] == 1518 || $prices[0]['id_ndk_customization_field_value'] == 6525) {
          //     $cprice = round($cprice - ($cprice * $reductionauto));
          //   }
          // }


          $arrayNDKs = Tools::getValue('ndkcsfield');

          $checkposeservice = false;
          $arrayidsservice = array(5475,5476,5477,5478,5479,5480,5481,5482,5483,5516,5517,5520,5525);

          foreach($arrayNDKs as $keysndk => $valuendk){
            if (in_array($keysndk, $arrayidsservice)){
              if(strpos($valuendk,"10") !== false){
                $checkposeservice = true;
              }
            }
          }


          if ($cprice > 0) {
            if ($percent) {
              $price_detail = ' +' . $product_tax_calculator->removeTaxes($cprice) . '% ';
            } else {

              if ($checkposeservice) {
                $cprice = ($cprice / 1.2) * 1.1;
              }


              $cprice = $cprice - ($cprice * ($reductionDiscount['reduction_value'] / 100));
              $price_detail = ' ' . Tools::displayPrice(Tools::convertPriceFull($cprice, $default_currency, $user_currency, 6)) . ' ';
            }
          }




          $prices_text .= $labels[$id_lang][0]['name'] . ' : +' . Tools::displayPrice(Tools::convertPriceFull($cprice, $default_currency, $user_currency, 6)) . $suffix;


          if (!empty($value) && $value != '') {
            $orientation = '';
            if (isset($orientations[$field]))
              $orientation = ' [' . $orientations[$field] . ']';

            $ndkcustomvalue[] = array('index' => createLabel($languages, 1, $newCustomProd, $labels, $required[0]['required']), 'value' => ($formated_value ? $formated_value : $value) . ($accessoryQuantity[$value] > 0 ? ' x' . $accessoryQuantity[$value] : '') . $orientation . ' ' . $price_detail);
            // $ndkcustomvalue[]= array('index' => createLabel($languages, 1, $newCustomProd, $labels, $required[0]['required']), 'value' => ($formated_value ? $formated_value : $value). ($accessoryQuantity[$value] > 0 ? ' ' : '').$orientation.' '.$price_detail);

            //var_dump($value);
            if (!$is_recipient)
              $recipientDetails .= '- ' . ($accessoryQuantity[$value] > 0 ? $accessoryQuantity[$value] : '') . ' ' . (isset($formated_value) ? $formated_value : $value) . $virgule;

            createLabel($languages, 1, (int)Tools::getValue('id_product'), $labels, $required[0]['required']);
            //addTextFieldToProduct(Tools::getValue('id_product'), $index_field, 1, $value);

            foreach ($languages as $language) {
              if (!empty($value))
                $new_desc[$language['id_lang']] .= $labels[$language['id_lang']][0]['name'] . ' : ' . (isset($formated_value) ? $formated_value : $value) . ($accessoryQuantity[$value] > 0 ? ' x' . $accessoryQuantity[$value] : '') . '<br/>';
              // $new_desc[$language['id_lang']] .= $labels[$language['id_lang']][0]['name'] .' : '.(isset($formated_value) ? $formated_value : $value). ($accessoryQuantity[$value] > 0 ? ' ' : '').'<br/>';
            }
          }
        } //else
      }

      $i++;
    }
  }

  // vasco Chiffres à coller
  if ((int)$product->id == 4511) {
    $customizationPrice = $customizationPrice - ($product_tax_calculator->addTaxes($product->price));
  }

  //if($customizationPrice > 0 || sizeof($accessoryProdQuantity) > 0) {
  if ($customizationPrice > -1 || sizeof($accessoryProdQuantity) > 0) {
    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$product->id, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

    if ($usetax)
      $newprice = $product_tax_calculator->removeTaxes($customizationPrice);
    //$newprice = $customizationPrice;
    else
      $newprice = $customizationPrice;


    //var_dump((float)$product->getPrice(false, (int)Tools::getValue('ndkcf_id_combination'), 6, null, false, false).'-');

    $context = Context::getContext();
    $cur_cart = $context->cart;
    $id_currency = (int)Configuration::get('PS_CURRENCY_DEFAULT');

    $id_country = (int)$context->country->id;
    $id_state = 0;
    $zipcode = 0;
    $id_address = 0;
    $id_customer = 0;
    $id_group = null;

    if (Configuration::get('NDK_ADD_PRODUCT_PRICE') == 1 && !$disabe_product_price) {
      $myProductPrice = Product::getPriceStatic((int)Tools::getValue('id_product'), false, (int)Tools::getValue('ndkcf_id_combination'), 6, null, false, false, 1, false, (int)$context->customer->id, (int)$context->cart->id);
      $myProductPrice -= (float)$product->ecotax;
      $newprice += Tools::convertPriceFull($myProductPrice, $user_currency, $default_currency, 6);
    }


    if (sizeof($percent_price) > 0) {
      $reductionsA =  SpecificPrice::getByProductId((int)Tools::getValue('id_product'), false, false);
      $reductionstotal = 0;
      foreach ($reductionsA as $key => $value) {
        if ($value['reduction_type'] == 'amount')
          $reductionstotal = $value['reduction'];
      }
      foreach ($percent_price as $key => $value) {
        if ($value > 0) {
          $valueHT = $product_tax_calculator->removeTaxes($value);

          $newprice -= $valueHT;
          $multiplicatorHT = $valueHT / 100;
          $customizationPrice -= $value;
          $customizationPrice += $product_tax_calculator->addTaxes(($myProductPrice - ($product_tax_calculator->removeTaxes($reductionstotal))) * $multiplicatorHT);
          $newprice += ($myProductPrice - ($product_tax_calculator->removeTaxes($reductionstotal))) * $multiplicatorHT;
        }
      }
    }


    if (sizeof($packitemlist) > 0) {
      $packProdItems = array();
      foreach ($packitemlist as $item) {
        $packProdItems[$item['id_product'] . '-' . $item['id_product_attribute']]['quantity'] += $item['quantity'];
        $packProdItems[$item['id_product'] . '-' . $item['id_product_attribute']]['id_product'] = $item['id_product'];
        $packProdItems[$item['id_product'] . '-' . $item['id_product_attribute']]['id_product_attribute'] = $item['id_product_attribute'];
        //$packitemlist[] = array('id_product' => (int)$id_product, 'quantity' => (int)$maxP, 'id_product_attribute' =>(int)$id_product_attribute);
        //Pack::addItem((int)$newCustomProd, (int)$id_product, (int)$maxP, (int)$id_product_attribute);
      }
      foreach ($packProdItems as $item) {
        Pack::addItem((int)$newCustomProd, (int)$item['id_product'], (int)$item['quantity'], (int)$item['id_product_attribute']);
      }
    }

    //Inseri link constumizam
    // if ($devischeck) {
    // } else {
      if(Tools::getValue('id_product_edit')) {
        $titlrporduct = Db::getInstance()->executeS("SELECT `title` FROM `" . _DB_PREFIX_ . "link_customization_product`
        where `id_product_customization` = " . (int)Tools::getValue('id_product_edit'));

        $sqllinkcustomizationproduct = "INSERT INTO `" . _DB_PREFIX_ . "link_customization_product` (`id_product_original`, `id_product_customization`, `link`,`title`)
        VALUES ('" . (int)Tools::getValue('id_product') . "', '" . $newCustomProd . "', '" . $customizationLink . "', '". $titlrporduct[0]['title']."');";
      }else{
        $sqllinkcustomizationproduct = "INSERT INTO `" . _DB_PREFIX_ . "link_customization_product` (`id_product_original`, `id_product_customization`, `link`)
        VALUES ('" . (int)Tools::getValue('id_product') . "', '" . $newCustomProd . "', '" . $customizationLink . "');";

      }

      $required = Db::getInstance()->executeS($sqllinkcustomizationproduct);
    // }


    $newCustomProdObj = new Product($newCustomProd);
    // if ($devischeck) {
    //   $description_shortFree = $newCustomProdDevis->description_short[$id_lang];

    //   $taxAlu = Tax::getProductTaxRate($newCustomProdDevis->id);
    //   $taxAlu = ($taxAlu + 100) / 100;
    // } else {
      $description_shortFree = $newCustomProdObj->description_short[$id_lang];
      $taxAlu = Tax::getProductTaxRate($newCustomProdObj->id);
      $taxAlu = ($taxAlu + 100) / 100;
    // }





    $posFREE = strpos($description_shortFree, "[%FREE%]");
    if ($posFREE === false) {
    } else {
      $description_shortFree = str_replace("[%FREE%]", "", $description_shortFree);

      $productscheck[0]['description_short'] =  $description_shortFree;
      $productscheck[0]['cart_quantity'] = 1;

      $priceports = AluclassCarrier::getCarrierPrice($productscheck);
      $priceports = CEIL(($priceports *  $taxAlu) / 0.60);
      $priceports = ($priceports /  $taxAlu);
      $newprice = $newprice + $priceports;
    }

    $posHALFFREE = strpos($description_shortFree, "[%HALFFREE%]");
    if ($posHALFFREE === false) {
    } else {

      $productscheck[0]['description_short'] =  $description_shortFree;
      $productscheck[0]['cart_quantity'] = 1;

      $priceports = AluclassCarrier::getCarrierPrice($productscheck, true);

      $priceports = CEIL(($priceports *  $taxAlu) / 0.60);
      $priceports = ($priceports /  $taxAlu);
      $newprice = $newprice + $priceports;
    }

    // if ($devischeck) {
    //   $newCustomProdDevis->price = number_format($newprice, 6, '.', '');
    //   $newCustomProdDevis->wholesale_price = number_format($wholesale_price, 6, '.', '');

    //   if ($newWeight > 0)
    //     $newCustomProdDevis->weight = (float)$product->weight + (float)$newWeight;
    //   $newCustomProdDevis->pack_stock_type = 1;
    //   foreach ($languages as $language) {
    //     $newCustomProdDevis->description[$language['id_lang']] = $new_desc[$language['id_lang']];
    //   }
    // } else {
      $newCustomProdObj->price = number_format($newprice, 6, '.', '');
      $newCustomProdObj->wholesale_price = number_format($wholesale_price, 6, '.', '');

      if ($newWeight > 0)
        $newCustomProdObj->weight = (float)$product->weight + (float)$newWeight;
      $newCustomProdObj->pack_stock_type = 1;
      foreach ($languages as $language) {
        $newCustomProdObj->description[$language['id_lang']] = $new_desc[$language['id_lang']];
      }
    // }

    $qttytoset = (int)StockAvailable::getQuantityAvailableByProduct((int)Tools::getValue('id_product'), (int)Tools::getValue('ndkcf_id_combination'));

    $qty_to_check = Tools::getValue('qty', 1);
    $cart_products = $context->cart->getProducts();

    if (is_array($cart_products)) {

      foreach ($cart_products as $cart_product) {

        if (Pack::isPack((int)$cart_product['id_product'])) {
          $packItems = Db::getInstance()->executeS('SELECT id_product_item, id_product_attribute_item, quantity FROM `' . _DB_PREFIX_ . 'pack` where id_product_pack = ' . (int)$cart_product['id_product']);
          foreach ($packItems as $item) {
            if ((!Tools::getValue('ndkcf_id_combination') || $item['id_product_attribute_item'] == Tools::getValue('ndkcf_id_combination')) &&
              (Tools::getValue('id_product') && $item['id_product_item'] == Tools::getValue('id_product'))
            ) {

              $qty_to_check += $item['quantity'] * $cart_product['cart_quantity'];
              //$qty_to_check += Tools::getValue('qty');

            }
          }
        }

        if ((!Tools::getValue('ndkcf_id_combination') || $cart_product['id_product_attribute'] == Tools::getValue('ndkcf_id_combination')) &&
          (Tools::getValue('id_product') && $cart_product['id_product'] == Tools::getValue('id_product'))
        ) {

          $qty_to_check += $cart_product['cart_quantity'];
          //$qty_to_check += Tools::getValue('qty');

        }
      }
    }

    // Check product quantity availability
    if (Tools::getValue('ndkcf_id_combination') > 0) {
      if (!Product::isAvailableWhenOutOfStock($product->out_of_stock) && !Attribute::checkAttributeQty((int)Tools::getValue('ndkcf_id_combination'), $qty_to_check)) {
        $qttytoset = 0;
      }
    } elseif ($product->hasAttributes()) {
      $minimumQuantity = ($product->out_of_stock == 2) ? !Configuration::get('PS_ORDER_OUT_OF_STOCK') : !$product->out_of_stock;

      if (!Product::isAvailableWhenOutOfStock($product->out_of_stock) && !Attribute::checkAttributeQty((int)Tools::getValue('ndkcf_id_combination'), $qty_to_check)) {
        $qttytoset = 0;
      }
    } elseif (!$product->checkQty($qty_to_check)) {
      $qttytoset = 0;
    }


    $newCustomProdObj->quantity = $qttytoset;
    $newCustomProdObj->out_of_stock = $product->out_of_stock;

        //*****     teste   IVA */
        $arrayNDKs = Tools::getValue('ndkcsfield');
        $checkposeservice = false;
        $checkposetva = false;
        $arrayidstva = array(5475,5476,5477,5478,5479,5480,5481,5482,5483,5516,5517,5520,5525);
        $arrayidsservice = array(5426,5417,5424,5425,5439,5440,5441,5442,5443,5444,5445,5446,5447,5448,5449,5450,5452,5453,5454,5455,5456,5457,5458,5459,5460,5462,5463,5465,5466,5467,5472,5473,5518,5522,5523,5524,5546);

        foreach($arrayNDKs as $keysndk => $valuendk){
          if (in_array($keysndk, $arrayidstva)){
            if(strpos($valuendk,"10") !== false){
              $checkposetva = true;
            }
          }
        }

        foreach($arrayNDKs as $keysndk => $valuendk){
          if (in_array($keysndk, $arrayidsservice)){
              $checkposeservice = true;
          }
        }

        if($checkposeservice &&  $checkposetva ){
          $newCustomProdObj->id_tax_rules_group = 2;
        }
       //*****   Fim  teste   IVA */

    $newCustomProdObj->update();
    $refProduct = $newCustomProdObj->id;
    Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'stock_available` SET `quantity` =  ' . $qttytoset . ' WHERE id_product = ' . (int)$newCustomProdObj->id);


    //forpack

    if (Pack::isPack((int)$product->id)) {
      $items = Db::getInstance()->executeS('SELECT id_product_item, id_product_attribute_item, quantity FROM `' . _DB_PREFIX_ . 'pack` where id_product_pack = ' . (int)$product->id);

      foreach ($items as $item) {
        Pack::addItem((int)$newCustomProdObj->id, (int)$item['id_product_item'], (int)$item['quantity'], (int)$item['id_product_attribute_item']);
      }
    } else {
      if (Configuration::get('NDK_ADD_PRODUCT_PRICE') == 1 && !$disabe_product_price)
        Pack::addItem((int)$newCustomProdObj->id, (int)$product->id, (int)1, (int)Tools::getValue('ndkcf_id_combination'));
    }

    NdkCf::duplicateGroupReductionCache((int)Tools::getValue('id_product'), $newCustomProdObj->id);
  } else {
    $refProduct = (int)Tools::getValue('id_product');
    //$newCustomProdObj = new Product($newCustomProd);
    //$newCustomProdObj->delete();

  }



  $details_field = createLabel($languages, 1, $refProduct, $labels_detail);
  $preview_field = createLabel($languages, 1, $refProduct, $labels_preview);
  $preview_field_img = createLabel($languages, 1, $refProduct, $labels_preview_img);
  if (Tools::getValue('is_visual') != 0) {
    if (Configuration::get('NDK_SHOW_HD_PREVIEW') == 1)
      addTextFieldToProduct($refProduct, $preview_field, 1, NdkCf::l('No preview required'));
    if (Configuration::get('NDK_SHOW_IMG_PREVIEW') == 1)
      addTextFieldToProduct($refProduct, $preview_field_img, 1, NdkCf::l('No preview required'));
  }

  $customization_price_field = createLabel($languages, 1, $refProduct, $labels_price);
  $link_index = createLabel($languages, 1, $refProduct, $labels_index);
  //if($customizationPrice > 0 || sizeof($accessoryProdQuantity) > 0) {
  if ($customizationPrice > -1 || sizeof($accessoryProdQuantity) > 0) {
    //print((int)$newCustomProdObj->id);

    //addTextFieldToProduct((int)Tools::getValue('id_product'), $link_index, 1, $newCustomProdObj->reference.' id:'.$newCustomProdObj->id);
    if (Configuration::get('NDK_SHOW_TOTAL_COST') == 1)
      addTextFieldToProduct($refProduct, $customization_price_field, 1, Tools::displayPrice(Tools::convertPriceFull($customizationPrice, $default_currency, $user_currency, 6)));
    //$myIdCustomization = addTextFieldToProduct($refProduct, $details_field, 1, $prices_text);

    if ((int)Tools::getValue('ndkcf_id_combination') > 0 && Configuration::get('NDK_SHOW_COMBINATION') == 1) {
      $combName = '';
      $combNames = $product->getAttributesResume($id_lang);
      foreach ($combNames as $row) {
        if ($row['id_product_attribute'] == (int)Tools::getValue('ndkcf_id_combination'))
          $combName = $row['attribute_designation'];
        $link_index_comb = createLabel($languages, 1, $refProduct, $labels_comb);
        addTextFieldToProduct((int)$refProduct, $link_index_comb, 1, $combName);
      }
    }
    //compatibilité packs
    if (class_exists('NdkSpack')) {
      $steps = NdkSpack::getStepsForProduct(Tools::getValue('id_product'));
      if ($steps) {
        foreach ($steps as $id_step) {
          $step = new NdkSpackStep((int)$id_step);
          $curr_prods = $step->products;
          $step->products = ($curr_prods != '' ? $curr_prods . ',' . $refProduct : $refProduct);
          //$step->products = $curr_prod.','.$refProduct;
          $step->save();
        }
      }
    }
  }


  //var_dump($ndkcustomvalue);

  $newNdkcustomvalue = array();
  $indexed = array();
  $indexedKey = array();

  $z = 0;
  foreach ($ndkcustomvalue as $value) {
    if (in_array($value['index'], $indexed)) {
      //$newNdkcustomvalue[ $indexed[$value['index']] ]['index']  = $value['index'];
      $newNdkcustomvalue[$value['index']]['value']  = $newNdkcustomvalue[$value['index']]['value'] . '; ' . $value['value'];
    } else {
      $newNdkcustomvalue[$value['index']] = $value;
      $z++;
    }

    $indexed[] = $value['index'];
    //$indexedKey[$value['index']] = $z;
    //$z++;
  }



  //var_dump($newNdkcustomvalue);

  Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'customization_field` SET required = 0 WHERE id_product = ' . (int)$refProduct);
  $newDesc = '';
  foreach ($newNdkcustomvalue as $val) {
    $myIdCustomization = addTextFieldToProduct($refProduct, $val['index'], 1, $val['value']);
    $fieldLabel =
      Db::getInstance()->getRow('
         SELECT name FROM `' . _DB_PREFIX_ . 'customization_field_lang` WHERE `id_customization_field` = ' . (int)$val['index'] . ' AND `id_lang`= ' . (int)Context::getContext()->language->id);

    //var_dump($fieldLabel);
    $newDesc .= '<p><b>' . $fieldLabel['name'] . ' : </b>' . $val['value'] . '</p>';
  }

  // if ($devischeck) {
  //   $arrayDevis = array();
  //   $productscheck = array();

  //   $arrayDevis['description'] = $newDesc;
  //   $arrayDevis['price'] = $newCustomProdObj->price;

  //   $productscheck[0]['description_short'] =  $newCustomProdObj->description_short[$id_lang];
  //   $productscheck[0]['cart_quantity'] = 1;

  //   $arrayDevis['portes'] = AluclassCarrier::getCarrierPrice($productscheck);

  //   print(Tools::jsonEncode($arrayDevis));
  // }


  //on retourne les valeurs
  if ((int)$context->customer->id > 0)
    $return['id_customer'] = (int)$context->customer->id;
  else
    $return['id_customer'] = 0;

  $return['id_product'] = (int)$refProduct;
  $return['id_cart'] = (int)$context->cart->id;
  $return['id_customization'] = (int)$myIdCustomization;
  $return['preview_field'] = $preview_field;
  $return['preview_field_img'] = $preview_field_img;

  if(Tools::getValue('devisproduct')) {

    $customizationoldedit = Db::getInstance()->getRow('SELECT `id_customization` FROM `' . _DB_PREFIX_ . 'customization` where `id_product` =  ' . (int)$newCustomProdObj->id);
     //$context->cart->updateQty((int)1, (int)$newCustomProdObj->id,0, (int) $customizationoldedit, 'up');

     $context->cart->updateQty((int)1, (int)$newCustomProdObj->id, (int)0, (int) $customizationoldedit['id_customization'], 'up');
  }

  //if (!$devischeck) {
    print(Tools::jsonEncode($return));
  //}


  //on insere le recipient
  if (isset($recipientInfos)) {
    if ($recipientInfos['firstname'] != '' && $recipientInfos['lastname'] != '') {
      $recipient = new NdkCfRecipients();
      $recipient->id_product = (int)$refProduct;
      $recipient->id_combination = (int)Tools::getValue('ndkcf_id_combination');
      $recipient->id_cart = (int)$context->cart->id;
      $recipient->id_customization = (int)$myIdCustomization;
      $recipient->id_ndk_customization_field = $recipientInfos['id_ndk_customization_field'];
      $recipient->firstname = $recipientInfos['firstname'];
      $recipient->lastname = $recipientInfos['lastname'];
      $recipient->email = $recipientInfos['email'];
      $recipient->message = $recipientInfos['message'];
      $recipient->availability = $recipientInfos['availability'];
      $recipient->title = $recipientInfos['title'];
      $recipient->send_mail = $recipientInfos['send_mail'];
      $recipient->details = $recipientDetails;
      $recipient->code = 'WEB' . Tools::strtoupper(Tools::passwdGen(9, 'NO_NUMERIC'));
      $recipient->date = date('Y-m-d H:i:s');
      $recipient->save();
    }
  }

  if ($customizationPrice > -1 || sizeof($accessoryProdQuantity) > 0) {
    if (Configuration::get('NDK_KEEP_ORIGINAL_REFERENCE') == 1) {
      if ((int)Tools::getValue('ndkcf_id_combination') > 0) {
        $combination = new Combination((int)Tools::getValue('ndkcf_id_combination'));
        $custom_reference = str_replace('-', '', $custom_reference);
        $custom_reference = str_replace('+', '', $custom_reference);
        $newCustomProdObj->reference = $combination->reference . $custom_reference . $nfi_IDU;
      } else {
        $custom_reference = str_replace('-', '', $custom_reference);
        $custom_reference = str_replace('+', '', $custom_reference);
        $newCustomProdObj->reference = $product->reference . $custom_reference . $nfi_IDU;
      }
    } else {
      //original $newCustomProdObj->reference = Tools::str2url('custom-'.$product->id.'-'.(int)Tools::getValue('ndkcf_id_combination').'-'.Context::getContext()->cart->id.'-'.$myIdCustomization);
      // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - define code from price in reference - start
      $custom_reference = str_replace('-', '', $custom_reference);
      $custom_reference = str_replace('+', '', $custom_reference);
      $newCustomProdObj->reference = $product->reference . $custom_reference . $nfi_IDU;
      // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - define code from price in reference - end
    }

    $newCustomProdObj->description = $newDesc;

    $newCustomProdObj->active = 1;
    $newCustomProdObj->save();

    // if($devischeck) {
    //   $customizationoldedit = Db::getInstance()->getRow('SELECT `id_customization` FROM `' . _DB_PREFIX_ . 'customization` where `id_product` =  ' . (int)$newCustomProdObj->id);
    //    //$context->cart->updateQty((int)1, (int)$newCustomProdObj->id,0, (int) $customizationoldedit, 'up');

    //    $context->cart->updateQty((int)1, (int)$newCustomProdObj->id, (int)0, (int) $customizationoldedit['id_customization'], 'up');
    // }

    Product::duplicateSpecificPrices((int)$product->id, $newCustomProdObj->id);
    GroupReduction::duplicateReduction((int)$product->id, $newCustomProdObj->id);


    //get current price for group/customer
    $myNewPrice = Product::getPriceStatic((int)$newCustomProdObj->id, $usetax, (int)0, 6, null, false, true, (int)Tools::getValue('qty'), false, (int)$context->customer->id, (int)$context->cart->id);
    if (sizeof($percent_price) > 0) {
      foreach ($percent_price as $key => $value) {
        if ($value > 0) {
          $multiplicatorHT = $value / 100;
          $myNewPrice += $myNewPrice * $multiplicatorHT;
        }
      }
    } else
      $myNewPrice += $customizationPrice;




    foreach (SpecificPrice::getIdsByProductId((int)$newCustomProdObj->id) as $data) {
      $specific_price = new SpecificPrice((int)$data['id_specific_price']);
      //$specific_price->price = -1;
      if ($specific_price->price > 0) {
        $specific_price->price = number_format($myNewPrice, 6, '.', '');
      }

      if ((int)Configuration::get('NDK_REDUC_ONLY_PRODUCT') == 1) {
        if ($specific_price->reduction_type == 'percentage') {
          //on transforme en montant
          $price = Product::getPriceStatic((int)$product->id, true, (int)0, 6, null, false, false, (int)Tools::getValue('qty'), false, (int)$context->customer->id, (int)$context->cart->id);
          //var_dump($price);
          $specific_price->reduction_type = 'amount';
          $reduc_percent = $specific_price->reduction;
          $new_amount = $price * $reduc_percent;
          $specific_price->reduction = $new_amount;
        }
      }


      $specific_price->update();
    }
  }

  $tax_name = new TaxRulesGroup(Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  //on ajoute le produit de base en tant que champs + le prix
  if (Product::getPriceStatic($product->id, $usetax, (int)Tools::getValue('ndkcf_id_combination'), 6) > 0) {
    //$myProductPrice = Product::getPriceStatic((int)Tools::getValue('id_product'), $usetax,(int)Tools::getValue('ndkcf_id_combination'), 6, null, false, true, (int)Tools::getValue('qty'), false, (int)$context->customer->id, (int)$context->cart->id);
    $myProductPrice = Product::getPriceStatic((int)Tools::getValue('id_product'), $usetax, (int)Tools::getValue('ndkcf_id_combination'), 6, null, false, false, 1, false, (int)$context->customer->id, (int)$context->cart->id);

    if ((int)Tools::getValue('ndkcf_id_combination') > 0) {
      $combNames = $product->getAttributesResume($id_lang);
      foreach ($combNames as $row) {
        if ($row['id_product_attribute'] == (int)Tools::getValue('ndkcf_id_combination'))
          $combName = $row['attribute_designation'];
      }
    } else {
      $combName = false;
    }


    $base_text = $product->name[$id_lang] . (isset($combName) ? '(' . $combName . ')' : '') . '  = ' . Tools::displayPrice($myProductPrice) . ($usetax ? ' (' . $tax_name->name . ')' : '') . "\n";

    $link_index_reference = createLabel($languages, 1, $refProduct, $labels_custom_reference);
    if ($custom_reference != '')
      addTextFieldToProduct((int)$refProduct, $link_index_reference, 1, $custom_reference);


    if (Configuration::get('NDK_ADD_PRODUCT_PRICE') == 1 && Configuration::get('NDK_SHOW_BASE_PRODUCT') == 1 && !$disabe_product_price) {
      $link_index_base = createLabel($languages, 1, $refProduct, $labels_base);
      addTextFieldToProduct((int)$refProduct, $link_index_base, 1, $base_text);
    }
  }

  if (!$empty_form) {

    //enregistrement image
    $errors = array();

    $product_picture_width = (int)Configuration::get('PS_PRODUCT_PICTURE_WIDTH');
    $product_picture_height = (int)Configuration::get('PS_PRODUCT_PICTURE_HEIGHT');
    $suff = 1;

    foreach ($cartImgs as $key => $value) {
      foreach ($languages as $language) {
        $labels_image[$language['id_lang']][0]['name'] = 'Image ' . $suff;
      }
      $image_field = createLabel($languages, 0, (int)Tools::getValue('id_product'), $labels_image);
      $file_name = md5(uniqid(rand(), true));
      $tmp_name = $value;
      /* Original file */
      if (!ImageManager::resize($tmp_name, _PS_UPLOAD_DIR_ . $file_name))
        $errors[] = ''; //Tools::displayError('An error occurred during the image upload process.');
      /* A smaller one */
      elseif (!ImageManager::resize($tmp_name, _PS_UPLOAD_DIR_ . $file_name . '_small', $product_picture_width, $product_picture_height))
        $errors[] = ''; //Tools::displayError('An error occurred during the image upload process.');
      elseif (!chmod(_PS_UPLOAD_DIR_ . $file_name, 0777) || !chmod(_PS_UPLOAD_DIR_ . $file_name . '_small', 0777))
        $errors[] = ''; //Tools::displayError('An error occurred during the image upload process.');
      /*else
            $context->cart->addPictureToProduct((int)$refProduct, $image_field, 0,$file_name);*/


      /*if($customizationPrice > 0) {

               //add image to product
               $image = new Image();
               $image->id_product = $newCustomProd;
               $image->position = Image::getHighestPosition($newCustomProd) + 1;
               $image->cover = ($suff == 1 ? true : false); // or false;
               if (($image->validateFields(false, true)) === true &&
               ($image->validateFieldsLang(false, true)) === true && $image->add())
               {
                   $shops = Shop::getContextListShopID();
                   $image->associateTo($shops);

                   if (!NdkCf::copyImg($newCustomProd, $image->id, $tmp_name, 'products', true))
                   {
                       $image->delete();
                   }
               }
               //eof
            }*/
      $suff++;
    }

    /*if($customizationPrice > 0) {

            //add image to product
            $product_images = Image::getImages((int)$id_lang, (int)Tools::getValue('id_product'), (int)Tools::getValue('ndkcf_id_combination'));
            if(sizeof($product_images) > 0)
            {
	            $image = new Image( (int)$product_images[0]['id_image'] );
	            $image->id_product = $newCustomProd;
	            $image->position = Image::getHighestPosition($newCustomProd) + 1;
	            $image->cover = true; // or false;
	            if (($image->validateFields(false, true)) === true &&
	            ($image->validateFieldsLang(false, true)) === true && $image->add())
	            {
	                $shops = Shop::getContextListShopID();
	                $image->associateTo($shops);

	                if (!NdkCf::copyImg($newCustomProd, $image->id, $tmp_name, 'products', true))
	                {
	                    $image->delete();
	                }
	            }
	            //eof
	         }
         }*/

    $customization_product = Db::getInstance()->executeS('SELECT * FROM `' . _DB_PREFIX_ . 'customization`
         WHERE `id_cart` = ' . (int)$context->cart->id . ' AND `id_product` = ' . (int)Tools::getValue('id_product'));


    //print($customization_product[0]['id_customization']);
  }
}

function ndkCustomizationFieldCUS($value, $field)
{
  $ndk_customization_field_CUS = Db::getInstance()->executeS(
    "SELECT  cfvl.id_ndk_customization_field_value
   FROM `" . _DB_PREFIX_ . "ndk_customization_field_value_lang`cfvl
   INNER JOIN `" . _DB_PREFIX_ . "ndk_customization_field_value`  cfv on cfv.id_ndk_customization_field_value = cfvl.id_ndk_customization_field_value
   WHERE cfvl.`value` like '" . pSQL($value) . "' AND cfv.id_ndk_customization_field = " . (int)$field . " AND cfvl.`id_lang` = " . (int)Context::getContext()->language->id
  );

  return  $ndk_customization_field_CUS;
}

function createLabel($languages, $type, $id_product, $labels, $required = 0)
{
  $count = 0;
  $id_customization_field = 0;
  if ($labels[(int) Context::getContext()->language->id][0]['name'] != '') {
    //on recherche un champs existant
    $result = Db::getInstance()->executeS('
               SELECT cf.`id_product`, cfl.id_customization_field
               FROM `' . _DB_PREFIX_ . 'customization_field` cf
               NATURAL JOIN `' . _DB_PREFIX_ . 'customization_field_lang` cfl
               WHERE cf.`id_product` = ' . (int)$id_product . ' AND cfl.`id_lang` = ' . (int) Context::getContext()->language->id . ' AND cfl.name = \'' . pSQL($labels[(int) Context::getContext()->language->id][0]['name']) . '\'
               ORDER BY cf.`id_customization_field`');
    $count += sizeof($result);
  }


  if ($count == 0) {
    // Label insertion
    if (
      !Db::getInstance()->execute('
            INSERT INTO `' . _DB_PREFIX_ . 'customization_field` (`id_product`, `type`, `required`)
            VALUES (' . (int)$id_product . ', ' . (int)$type . ', ' . (int)$required . ')') ||
      !$id_customization_field = (int)Db::getInstance()->Insert_ID()
    )
      return false;

    // Multilingual label name creation
    $values = '';

    foreach (Shop::getContextListShopID() as $id_shop)
      foreach ($languages as $language)
        $values .= '(' . (int)$id_customization_field . ', ' . (int) $language['id_lang'] . ', ' . (int)$id_shop . ', \'' . pSQL($labels[(int) Context::getContext()->language->id][0]['name']) . '\'), ';

    $values = rtrim($values, ', ');
    if (!Db::getInstance()->execute('
                    INSERT INTO `' . _DB_PREFIX_ . 'customization_field_lang` (`id_customization_field` ,`id_lang`, `id_shop`, `name`)
                    VALUES ' . $values))
      return false;

    // Set cache of feature detachable to true
    Configuration::updateGlobalValue('PS_CUSTOMIZATION_FEATURE_ACTIVE', '1');
  } else {
    if ($result)
      $id_customization_field = $result[0]['id_customization_field'];
    Db::getInstance()->execute('
            UPDATE `' . _DB_PREFIX_ . 'customization_field` SET `required` = ' . (int)$required . ' WHERE id_customization_field = ' . (int)$id_customization_field);
  }

  return (int)$id_customization_field;
}

function addTextFieldToProduct($id_product, $index, $type, $text_value)
{
  return _addCustomization($id_product, 0, $index, $type, $text_value, 0);
}

/**
 * Add customer's pictures
 *
 * @return bool Always true
 */
function addPictureToProduct($id_product, $index, $type, $file)
{
  return _addCustomization($id_product, 0, $index, $type, $file, 0);
}



function _addCustomization($id_product, $id_product_attribute, $index, $type, $field, $quantity)
{



  $context = Context::getContext();

  $exising_customization = Db::getInstance()->executeS(
    '
            SELECT cu.`id_customization`, cd.`index`, cd.`value`, cd.`type` FROM `' . _DB_PREFIX_ . 'customization` cu
            LEFT JOIN `' . _DB_PREFIX_ . 'customized_data` cd
            ON cu.`id_customization` = cd.`id_customization`
            WHERE cu.id_cart = ' . (int)$context->cart->id . '
            AND cu.id_product = ' . (int)$id_product . '
            AND in_cart = 0'
  );

  if ($exising_customization) {
    // If the customization field is alreay filled, delete it
    foreach ($exising_customization as $customization) {
      if ($customization['type'] == $type && $customization['index'] == $index) {
        Db::getInstance()->execute('
                     DELETE FROM `' . _DB_PREFIX_ . 'customized_data`
                     WHERE id_customization = ' . (int)$customization['id_customization'] . '
                     AND type = ' . (int)$customization['type'] . '
                     AND `index` = ' . (int)$customization['index']);
        if ($type == Product::CUSTOMIZE_FILE) {
          @unlink(_PS_UPLOAD_DIR_ . $customization['value']);
          @unlink(_PS_UPLOAD_DIR_ . $customization['value'] . '_small');
        }
        break;
      }
    }
    $id_customization = $exising_customization[0]['id_customization'];
  } else {
    Db::getInstance()->execute(
      'INSERT INTO `' . _DB_PREFIX_ . 'customization` (`id_cart`, `id_product`, `id_product_attribute`, `quantity`)
               VALUES (' . (int)$context->cart->id . ', ' . (int)$id_product . ', ' . (int)$id_product_attribute . ', ' . (int)$quantity . ')'
    );
    $id_customization = Db::getInstance()->Insert_ID();
  }

  /*$query = 'INSERT INTO `'._DB_PREFIX_.'customized_data` (`id_customization`, `type`, `index`, `value`)
            VALUES ('.(int)$id_customization.', '.(int)$type.', '.(int)$index.', \''.pSQL($field).'\')';*/

  $query = 'INSERT INTO `' . _DB_PREFIX_ . 'customized_data` (`id_customization`, `type`, `index`, `value`)
            VALUES (' . (int)$id_customization . ', ' . (int)$type . ', ' . (int)$index . ', \'' . addslashes(nl2br($field)) . '\')';

  if (!Db::getInstance()->execute($query))
    return false;
  return $id_customization;
}
