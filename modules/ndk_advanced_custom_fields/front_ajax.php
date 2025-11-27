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
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCf.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCfValues.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCfSpecificPrice.php';
require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/models/ndkCfConfig.php';

$context = Context::getContext();
$link = new Link();
if ((float)_PS_VERSION_ > 1.6) {



  if (Tools::getValue('action') && Tools::getValue('action') == 'formatPrice') {
    //$price = formatNdk(convertAmountNdk(Tools::getValue('price')));
    $moeda_atual = (int)Context::getContext()->currency->id;
    if ($moeda_atual == 2) {
      $price = formatNdk(Tools::getValue('price'));
    } else {
      $price = formatNdk(convertAmountNdk(Tools::getValue('price')));
    }
    echo $price;
  }

  if (Tools::getValue('action') && Tools::getValue('action') == 'getCombination') {

    $context = Context::getContext();

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
    $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

    $data = array();
    $data['id_product_attribute'] = (int)Product::getIdProductAttributesByIdAttributes((int)Tools::getValue('id_product'), Tools::getValue('group'));

    if ((int)$data['id_product_attribute'] == 0)
      $id_product_attribute = null;
    else
      $id_product_attribute = $data['id_product_attribute'];


    $data['price'] = Product::getPriceStatic((int)Tools::getValue('id_product'), $usetax, $id_product_attribute, 6, null, false, true, (int)Tools::getValue('quantity'), false, (int)$context->customer->id, (int)$context->cart->id);
    $product = new Product((int)Tools::getValue('id_product'));
    $images = Ndkcf::getAttributeImagesAssociations($id_product_attribute, (int)Tools::getValue('id_product'));
    $data['images'] = array();
    if ($images) {
      foreach ($images as $image) {
        $data['images'][] = (Configuration::get('PS_SSL_ENABLED') == 1 && Configuration::get('PS_SSL_ENABLED_EVERYWHERE') == 1 ? 'https://' : 'http://') . $link->getImageLink($product->link_rewrite[Context::getContext()->language->id], $image, Configuration::get('NDK_IMAGE_SIZE'));
      }
    }
    $data['stock'] = (int)StockAvailable::getQuantityAvailableByProduct((int)Tools::getValue('id_product'), (int)$id_product_attribute);

    //echo (int)Product::getIdProductAttributesByIdAttributes((int)Tools::getValue('id_product'), Tools::getValue('group'));
    echo json_encode($data);
  }
}
if (Tools::getValue('action') && Tools::getValue('action') == 'removePriceTaxes') {

  $context = Context::getContext();

  $id_address = (int)Context::getContext()->cart->id_address_invoice;
  $address = Address::initialize($id_address, true);
  $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  $product_tax_calculator = $tax_manager->getTaxCalculator();
  $price_without_taxes = $product_tax_calculator->removeTaxes(Tools::getValue('price'));
  echo $price_without_taxes;
}



if (Tools::getValue('action') && Tools::getValue('action') == 'getAttributePrice') {

  $context = Context::getContext();

  $id_address = (int)Context::getContext()->cart->id_address_invoice;
  $address = Address::initialize($id_address, true);
  $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  $product_tax_calculator = $tax_manager->getTaxCalculator();
  $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
  $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;


  /*if(Product::$_taxCalculationMethod == 0){
	   $usetax = true;
	}
	else
	{
	   $usetax = false;
	}*/
  //$prod_available = StockAvailable::getQuantityAvailableByProduct($id_product, $id_product_attribute);

  if ((int)Tools::getValue('id_product_attribute') == 0)
    $id_product_attribute = null;
  else
    $id_product_attribute = (int)Tools::getValue('id_product_attribute');

  //echo Product::getPriceStatic((int)Tools::getValue('id_product'), true,(int)Tools::getValue('id_product_attribute'), 2);
  $result['price'] =  Product::getPriceStatic((int)Tools::getValue('id_product'), $usetax, $id_product_attribute, 6, null, false, true, (int)Tools::getValue('quantity'), false, (int)$context->customer->id, (int)$context->cart->id);
  // se for franco suico
  #$result['moeda_atual'] = Context::getContext();
  #$result['taxa'] = $usetax;
  $moeda_atual = (int)Context::getContext()->currency->id;
  if ($moeda_atual == 2) {
    $result['price'] = $result['price'] / 1.2;
  }

  $result['weight'] = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue(
    '
		SELECT product_attribute_shop.`weight`
		FROM `' . _DB_PREFIX_ . 'product_attribute` pa
		' . Shop::addSqlAssociation('product_attribute', 'pa') . '
		WHERE pa.`id_product_attribute` = ' . (int)$id_product_attribute
  );



  echo json_encode($result);
}

if (Tools::getValue('action') && Tools::getValue('action') == 'getAttributeImg') {

  if ((int)Tools::getValue('id_product_attribute') == 0)
    $id_product_attribute = null;
  else
    $id_product_attribute = (int)Tools::getValue('id_product_attribute');

  $id_image = Ndkcf::getAttributeImageAssociations($id_product_attribute, (int)Tools::getValue('id_product'));
  echo (Configuration::get('PS_SSL_ENABLED') == 1 && Configuration::get('PS_SSL_ENABLED_EVERYWHERE') == 1 ? 'https://' : 'http://') . $link->getImageLink(Tools::getValue('link_rewrite'), $id_image, Configuration::get('NDK_IMAGE_SIZE'));
  //var_dump($id_image);

}

if (Tools::getValue('action') && Tools::getValue('action') == 'getSpecificPrice') {

  $context = Context::getContext();
  $customer_group = $context->customer->getGroups();
  $customer_group[] = 0;
  $id_address = (int)Context::getContext()->cart->id_address_invoice;
  $address = Address::initialize($id_address, true);
  $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  $product_tax_calculator = $tax_manager->getTaxCalculator();
  $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
  $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

  if ((int)Tools::getValue('id_product_attribute') == 0)
    $id_product_attribute = false;
  else
    $id_product_attribute = (int)Tools::getValue('id_product_attribute');

  $reductions = false;

  if (sizeof(SpecificPrice::getByProductId((int)Tools::getValue('id_product'), false, false)) > 0) {
    $reductions = SpecificPrice::getByProductId((int)Tools::getValue('id_product'), false, false);
  }

  //$old_price = Product::getPriceStatic((int)Tools::getValue('id_product'), $usetax,$id_product_attribute, 6, null, false, false, (int)1, false, (int)$context->customer->id, (int)$context->cart->id);
  $old_price = Product::getPriceStatic((int)Tools::getValue('id_product'), $usetax, $id_product_attribute, 6, null, false, false, (int)1, false);
  $last_qtty = -1;
  $now = date('Y-m-d H:i:00');
  $last_reduc = 0;
  if ($reductions) {
    foreach ($reductions as $key => $value) {
      $from = $value['from'];
      if ($value['to'] == '0000-00-00 00:00:00')
        $to = '2100-00-00 00:00:00';
      else
        $to = $value['to'];

      //var_dump(in_array((int)$value['id_group'], $customer_group));


      if (((int)$value['from_quantity'] <= (int)Tools::getValue('quantity')) && ((int)$value['from_quantity'] > $last_qtty) && ($now >= $from && $now <= $to) &&
        (in_array((int)$value['id_group'], $customer_group)) && ($value['reduction'] > $last_reduc || ($value['price'] > 0 && $value['price'] <  ($old_price - $last_reduc))) && ($value['id_product_attribute'] == $id_product_attribute || $value['id_product_attribute'] == 0) && ($value['id_shop'] == $context->shop->id || $value['id_shop'] == 0)
      ) {
        //var_dump($value['price']);
        $last_qtty = $value['from_quantity'];
        if ((int)$value['from_quantity'] <= (int)Tools::getValue('quantity'))
          $reduction = $value;
        if ($value['price'] > 0) {
          if ($usetax)
            $value['price'] = $product_tax_calculator->addTaxes($value['price']);

          $reduc = $old_price - $value['price'];


          $reduction['reduction'] = $reduc;
          $last_reduc = $reduc;
        } else {
          $last_reduc = $value['reduction'];
        }
      }
    }
  }
  if (isset($reduction)) {
    if ($reduction['reduction_type'] == 'amount' && $reduction['reduction_tax'] == 0 && $usetax)
      $reduction['reduction'] = $product_tax_calculator->addTaxes($reduction['reduction']);
  }
  $reduction['old_price'] = $old_price;
  // se for franco suico
  $moeda_atual = (int)Context::getContext()->currency->id;
  if ($moeda_atual == 2) {
    $reduction['old_price'] = $reduction['old_price'] / 1.2;
  }

  $hoje = date("Y-m-d H:i:s");

  $id_category_default = Db::getInstance()->getRow('SELECT id_category_default FROM `' . _DB_PREFIX_ . 'product` WHERE id_product = ' . (int)Tools::getValue('id_product'));

  if ($id_category_default) {
    $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule_customize_product where id_product = ' . (int)Tools::getValue('id_product'). '  AND NOW() BETWEEN `from` AND `to` ORDER BY id_specific_price_rule ASC');
    if (empty($reducao_catalogo)) {
      $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule_customize where id_category = ' . (int)$id_category_default['id_category_default'] . '  AND NOW() BETWEEN `from` AND `to` ORDER BY id_specific_price_rule ASC');
      if (empty($reducao_catalogo)) {
        $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule ORDER BY id_specific_price_rule ASC');
      }
    }
  } else {
    $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule ORDER BY id_specific_price_rule ASC');
  }

  $cont_rules = 0;
  foreach ($reducao_catalogo as $valueReducao) {
    $cont_rules++;
    if ($hoje >= $valueReducao['from']) {
      if ($hoje <= $valueReducao['to']) {
        if ($valueReducao['reduction_type'] == "amount") {
          if ($value['reduction']) {
            $valorInicial = $reduction['old_price'] - $value['reduction'];
          } else {
            $valorInicial = $reduction['old_price'];
          }
          $valorParaDescontar = $valorInicial - $valueReducao['reduction'];
        } else {
          if ($value['reduction']) {
            $valorInicial = $reduction['old_price'] - $value['reduction'];
          } else {
            $valorInicial = $reduction['old_price'];
          }
          $valorParaDescontar = $valorInicial * ($valueReducao['reduction'] / 100);
        }
      }
    }
  }
  $reduction['old_price'] = $reduction['old_price'] - $valorParaDescontar;

  echo json_encode($reduction);
}


if (Tools::getValue('action') && Tools::getValue('action') == 'getDescontosCatalogo') {
  $hoje = date("Y-m-d H:i:s");
  $id_category_default = Db::getInstance()->getRow('SELECT id_category_default FROM `' . _DB_PREFIX_ . 'product` WHERE id_product = ' . (int)Tools::getValue('id_product'));

  if ($id_category_default) {
    $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule_customize_product where id_product = ' . (int)Tools::getValue('id_product'). '  AND NOW() BETWEEN `from` AND `to` ORDER BY id_specific_price_rule ASC');
    if (empty($reducao_catalogo)) {
      $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule_customize where id_category = ' . (int)$id_category_default['id_category_default'] . '  AND NOW() BETWEEN `from` AND `to` ORDER BY id_specific_price_rule ASC');
      if (empty($reducao_catalogo)) {
        $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule ORDER BY id_specific_price_rule ASC');
      }
    }
  } else {
    $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule ORDER BY id_specific_price_rule ASC');
  }

  $cont_rules = 0;
  foreach ($reducao_catalogo as $valueReducao) {
    if ($hoje >= $valueReducao['from']) {
      if ($hoje <= $valueReducao['to']) {
        $cont_rules++;
        if ($valueReducao['reduction_type'] == "amount") {
          $descontosCatalogo['tipoReducao'] = $valueReducao['reduction_type'];
          $descontosCatalogo['valorReducao'] = $valueReducao['reduction'];
        } else {
          $descontosCatalogo['tipoReducao'] = $valueReducao['reduction_type'];
          $descontosCatalogo['valorReducao'] = $valueReducao['reduction'] / 100;
        }
      }
    }
  }
  $descontosCatalogo['totalDescontos'] = $cont_rules;
  //$retDescontos = array($cont_rules, $descontosCatalogo['tipoReducao'], $descontosCatalogo['valorReducao']);
  echo json_encode($descontosCatalogo);
}


if (Tools::getValue('id_value') && Tools::getValue('id_value') > 0 && Tools::getValue('action') && Tools::getValue('action') == 'getRestrictions') {
  $val = new ndkCfValues((int)Tools::getValue('id_value'), Context::getContext()->language->id);

  $result = array();
  if ($val->influences_restrictions != '') {
    $values = explode(',', $val->influences_restrictions);

    $result['restrictions'] = array();
    foreach ($values as $value) {
      if ($value[0] . $value[1] . $value[2] == 'all') {
        $result['restrictions'][] = explode('-', $value)[1] . '|all|all';
      } else {
        $v = new ndkCfValues((int)$value, Context::getContext()->language->id);
        $result['restrictions'][] = $v->id_ndk_customization_field . '|' . $value . '|' . $v->value;
      }
    }
  }

  if ($val->influences_obligations != '') {
    $values = explode(',', $val->influences_obligations);
    $result['obligations'] = array();
    foreach ($values as $value) {
      if ($value[0] . $value[1] . $value[2] == 'all') {
        $result['obligations'][] = explode('-', $value)[1] . '|all|all';
      } else {
        $v = new ndkCfValues((int)$value, Context::getContext()->language->id);
        $result['obligations'][] = $v->id_ndk_customization_field . '|' . $value . '|' . $v->value;
      }
    }
  }

  echo Tools::jsonEncode($result);
}

if (Tools::getValue('action') && Tools::getValue('action') == 'getRangePricefield') {
  $precentageuser = Tools::getValue('precentageuser');
  $jsonfield = json_decode($precentageuser);

  $item_price =  NdkCf::getDimensionPrice((int)Tools::getValue('group'), Tools::getValue('width'), Tools::getValue('height'));
  $id_address = (int)Context::getContext()->cart->id_address_invoice;
  $address = Address::initialize($id_address, true);
  $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  $product_tax_calculator = $tax_manager->getTaxCalculator();
  $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
  $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

  if (Product::$_taxCalculationMethod == 0) {
    $usetax = true;
  } else {
    $usetax = false;
  }

  if ($usetax)
    # $item_price = $product_tax_calculator->addTaxes($item_price);
    // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - start
    if ($item_price == 3 && $item_price == 999999) {
      $item_price = $item_price;
    }
  if ($item_price <> 3 && $item_price <> 999999) {
    $item_price = $product_tax_calculator->addTaxes($item_price);
  }
  // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - end

  $arrayprice = array();
  $arraypricevalue = array();
  $sql = 'SELECT `price` FROM `' . _DB_PREFIX_ . 'product` WHERE `id_product` =' . (int)Tools::getValue('id_product');
  $price = Db::getInstance()->getValue($sql);

  foreach ($jsonfield as $value) {
    $arraypricevalue['idfield'] = $value->idfield;
    $arraypricevalue['type'] = $value->type;
    $arraypricevalue['price'] = ($item_price + $product_tax_calculator->addTaxes($price)) * ($value->pregentage / 100);
    $arrayprice[] = $arraypricevalue;
  }

  echo json_encode($arrayprice);
}

if (Tools::getValue('action') && Tools::getValue('action') == 'getRangePrice') {
  $item_price =  NdkCf::getDimensionPrice((int)Tools::getValue('group'), Tools::getValue('width'), Tools::getValue('height'));
  $id_address = (int)Context::getContext()->cart->id_address_invoice;
  $address = Address::initialize($id_address, true);
  $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  $product_tax_calculator = $tax_manager->getTaxCalculator();
  $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
  $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

  if (Product::$_taxCalculationMethod == 0) {
    $usetax = true;
  } else {
    $usetax = false;
  }

  if ($usetax)
    # $item_price = $product_tax_calculator->addTaxes($item_price);
    // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - start
    if ($item_price == 3 && $item_price == 999999) {
      $item_price = $item_price;
    }
  if ($item_price <> 3 && $item_price <> 999999) {
    $item_price = $product_tax_calculator->addTaxes($item_price);
  }
  // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - end

  // $value = Tools::getValue('group');
  // if($value == '5042' || $value == '5046' || $value == '5050' || $value == '5054'  || $value == '5021' || $value == '4997' || $value == '5018' || $value == '5019' || $value == '5023' || $value == '5027' || $value == '5031' || $value == '5035'){
  //   $item_price =  $item_price - ($item_price*0.4);
  //   $item_price = $item_price/0.7;
  // }

  echo $item_price;
}


if (Tools::getValue('action') && Tools::getValue('action') == 'getMinHeight') {
  $sql = 'SELECT MIN(height + 0.0) as min FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE height !="" AND id_ndk_customization_field = ' . (int)Tools::getValue('group') . ' AND width =' . (float)Tools::getValue('width');
  $min = Db::getInstance()->getValue($sql);
  //var_dump($sql);
  echo $min;
}

if (Tools::getValue('action') && Tools::getValue('action') == 'checkRangeDimensions') {

  $sql = 'SELECT `type` FROM `' . _DB_PREFIX_ . 'ndk_customization_field` WHERE `id_ndk_customization_field` = ' . (int)Tools::getValue('group');
  $valtype = Db::getInstance()->getValue($sql);

  if ((int)$valtype == 19) {
    if (Tools::getValue('width') == '0') {
      echo 0;
      exit;
    }
    if (Tools::getValue('height') == '1') {
      echo 0;
      exit;
    }
    echo 1;
    exit;
  }

  //Vasco - Fab ( the CAST function no longer works, replaced by CONVERT )
  $sql = 'SELECT MIN(CONVERT(height, DECIMAL)) as val FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE height !="" AND price < 999999 and price !=""   AND id_ndk_customization_field = ' . (int)Tools::getValue('group');
  $valHeightMin = Db::getInstance()->getValue($sql);
  $sql = 'SELECT MAX(CONVERT(height, DECIMAL)) as val FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE height !="" AND price < 999999 and price !=""   AND id_ndk_customization_field = ' . (int)Tools::getValue('group');
  $valHeightMax = Db::getInstance()->getValue($sql);
  $sql = 'SELECT MAX(CONVERT(width, DECIMAL)) as val FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE width !="" AND price < 999999 and price !=""   AND id_ndk_customization_field = ' . (int)Tools::getValue('group');
  $valWidthMax = Db::getInstance()->getValue($sql);
  $sql = 'SELECT MIN(CONVERT(width, DECIMAL)) as  val FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE width !="" AND price < 999999 and price !=""   AND id_ndk_customization_field = ' . (int)Tools::getValue('group');
  $valWidthMin = Db::getInstance()->getValue($sql);
  /*
		echo (int)Tools::getValue('height')." >= ".$valHeightMin."  &&  ".(int)Tools::getValue('height')." <= ".$valHeightMax ." && ". (int)Tools::getValue('width')." >= ". $valWidthMin ." && ". (int)Tools::getValue('width') ." <= ". $valWidthMax;
	*/
  if ((int)Tools::getValue('height') >= $valHeightMin  &&  (int)Tools::getValue('height') <= $valHeightMax  &&  (int)Tools::getValue('width') >= $valWidthMin  && (int)Tools::getValue('width') <= $valWidthMax) {
    echo 1;
  } else {
    echo 0;
  }
}

if (Tools::getValue('action') && Tools::getValue('action') == 'getPricesDiscount') {

  $context = Context::getContext();

  $id_address = (int)Context::getContext()->cart->id_address_invoice;
  $address = Address::initialize($id_address, true);
  $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  $product_tax_calculator = $tax_manager->getTaxCalculator();
  $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
  $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

  $prices = NdkCf::getCustomizationPrice(Tools::getValue('group'), Tools::getValue('value'), Tools::getValue('id_product'));
  $cprice = 0;
  $priced = false;
  $value = Tools::getValue('value');

  for ($j = 0; $j < sizeof($prices); $j++) {

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
          $specificPrices = NdkCfSpecificPrice::getSpecificPrices((int)Tools::getValue('group'), $prices[$j]['id_ndk_customization_field_value'], (int)Tools::getValue('quantity'));
          //var_dump($specificPrices);
          if (sizeof($specificPrices) > 0) {
            if ($specificPrices[0]['reduction_type'] == 'amount')
              $cprice = $cprice - $specificPrices[0]['reduction'];
            else
              $cprice = $cprice - ($cprice * ($specificPrices[0]['reduction'] / 100));
          }
        } elseif ($prices[$j]['price'] > 0) {
          $cprice = $prices[$j]['price'];
          //on recupère les discount pour le champs
          $specificPrices = NdkCfSpecificPrice::getSpecificPrices((int)Tools::getValue('group'), 0, 0);
          if (sizeof($specificPrices) > 0) {
            if ($specificPrices[0]['reduction_type'] == 'amount')
              $cprice = $cprice - $specificPrices[0]['reduction'];
            else
              $cprice = $cprice - ($cprice * ($specificPrices[0]['reduction'] / 100));
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
        $value = str_replace('¶', '', $value);
        $valable_string = explode('[', str_replace(' ', '', $value));
      }

      if (!$prices[$j]['valuePrice']) {
        if (isset($valable_string)) {
          if (!$priced && $valable_string[0] != '') {
            $price = $prices[$j];
            if ($prices[$j]['price_per_caracter'] > 0) {
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

    if ($prices[$j]['price_type'] == 'percent')
      $product_tax_calculator->removeTaxes($cprice);
    //$percent_price[$prices[$j]['id_ndk_customization_field']] = $cprice;



  }

  echo json_encode($cprice);
}




if (Tools::getValue('action') && Tools::getValue('action') == 'getAllPricesDiscount') {

  $context = Context::getContext();

  $id_address = (int)Context::getContext()->cart->id_address_invoice;
  $address = Address::initialize($id_address, true);
  $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)Tools::getValue('id_product'), Context::getContext()));
  $product_tax_calculator = $tax_manager->getTaxCalculator();
  $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
  $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;
  $return = array();
  $i = 0;
  foreach (Tools::getValue('group') as $key => $value) {
    $group = $key;
    if ((int)$group > 0 && $value != '') {
      $prices = NdkCf::getCustomizationPrice($group, $value, Tools::getValue('id_product'));
      $cprice = 0;
      $priced = false;
      //$value = Tools::getValue('value');

      for ($j = 0; $j < sizeof($prices); $j++) {

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
              $specificPrices = NdkCfSpecificPrice::getSpecificPrices((int)$group, $prices[$j]['id_ndk_customization_field_value'], (int)Tools::getValue('quantity'));
              //var_dump($specificPrices);
              if (sizeof($specificPrices) > 0) {
                if ($specificPrices[0]['reduction_type'] == 'amount')
                  $cprice = $cprice - $specificPrices[0]['reduction'];
                else
                  $cprice = $cprice - ($cprice * ($specificPrices[0]['reduction'] / 100));
              }
            } elseif ($prices[$j]['price'] > 0) {
              $cprice = $prices[$j]['price'];
              //on recupère les discount pour le champs
              $specificPrices = NdkCfSpecificPrice::getSpecificPrices((int)$group, 0, 0);
              if (sizeof($specificPrices) > 0) {
                if ($specificPrices[0]['reduction_type'] == 'amount')
                  $cprice = $cprice - $specificPrices[0]['reduction'];
                else
                  $cprice = $cprice - ($cprice * ($specificPrices[0]['reduction'] / 100));
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
            $value = str_replace('¶', '', $value);
            $valable_string = explode('[', str_replace(' ', '', $value));
          }

          if (!$prices[$j]['valuePrice']) {
            if (isset($valable_string)) {
              if (!$priced && $valable_string[0] != '') {
                $price = $prices[$j];
                if ($prices[$j]['price_per_caracter'] > 0) {
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
          $product_tax_calculator->removeTaxes($cprice);
        }

        $return[$group] = $cprice;
      }
    }
    $i++;
  }

  echo json_encode($return);
}


if (Tools::getValue('action') == 'getConfImage') {
  $conf = new NdkCfConfig((int)Tools::getValue('id_conf'));
  print($conf->cover);
}





function convertAmountNdk($price)
{
  return (float)Tools::convertPrice($price);
}

function formatNdk($price)
{
  return Tools::displayPrice($price);
}
