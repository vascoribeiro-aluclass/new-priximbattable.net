<?php
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
require_once _PS_CLASS_DIR_.'AluclassCarrier.php';

$context = Context::getContext();
$infoarray = array();
$infoarray['status'] = "false";

if(Tools::getValue('action'))
{
  switch(Tools::getValue('action')){
    case "getpriceportes":
      $idProduct = Tools::getValue('product_id');
      $key = Tools::getValue('ndkgroupid');

      if(AluclassCarrier::checkExitCarrierRules($idProduct)){

        $arrayfield[0][$key] = Tools::getValue('widthValue');

        $result = AluclassCarrier::getCarrierRules($idProduct,$arrayfield);

        if(!$result)
          break;

        $products[0]['description_short'] =  $result;
        $products[0]['cart_quantity'] = 1;

        $status = AluclassCarrier::getCarrierPrice($products);
        $tax = Tax::getProductTaxRate($idProduct);
        $tax = ($tax +100)/100;
        $status = $status * $tax;

        if(AluclassCarrier::checkFreeShip($idProduct)){
          $infoarray['text_price'] = " Kostenlose Lieferung <s>".number_format(round($status,2), 2, ',', ' ')."</s> €";
          $infoarray['price'] =  CEIL($status/0.60);
          $infoarray['free_shipping'] = "true";
          $infoarray['half_free_shipping'] = "false";
        }elseif(AluclassCarrier::checkHalfFreeShip($idProduct)){
          $priceHalfFreeShip = AluclassCarrier::getPriceHalfFreeShip($idProduct);
          $priceHalfFreeShip = $priceHalfFreeShip * $tax;
          $infoarray['text_price'] = " Kostenlose Lieferung <s>".number_format(round($priceHalfFreeShip,2), 2, ',', ' ')."</s> €";
          //$infoarray['text_price'] = number_format(round($priceHalfFreeShip,2), 2, ',', ' ')." €";
          $infoarray['price'] =  CEIL(($status-$priceHalfFreeShip)/0.60);
          $infoarray['free_shipping'] = "false";
          $infoarray['half_free_shipping'] = "true";
        }else{
          $infoarray['text_price'] = number_format(round($status,2), 2, ',', ' ')." €";
          $infoarray['free_shipping'] = "false";
          $infoarray['half_free_shipping'] = "false";
          $infoarray['price'] =  0;
        }


        $infoarray['status'] = "true";
      }
    break;
  }
}

echo json_encode($infoarray);

?>
