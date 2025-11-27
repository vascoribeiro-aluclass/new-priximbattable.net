<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require _PS_MODULE_DIR_.'alucarrier/PHPMailer/Exception.php';
require _PS_MODULE_DIR_.'alucarrier/PHPMailer/PHPMailer.php';
require _PS_MODULE_DIR_.'alucarrier/PHPMailer/SMTP.php';


class AluclassCarrier{

  public static $valueExtra = 46.8;

  public static function getCarrierPrice($products,$halfPay = false)
  {

    $price = 0;
    $arrayCodeCarrier = array();
    $arrayCodeCarrierHalfFree = array();
    $qtdTotal = 0;
    $extra = 0;

    if(is_array($products)){
      foreach ($products as $product) {
        $checkFreeShip = false;
        if(AluclassCarrier::checkFreeShip($product['id_product'])){
          $checkFreeShip = true;
        }

        $posFREE = strpos($product['description_short'], "[%FREE%]");

        if ($posFREE === false && !$checkFreeShip) {

        }else{
          continue;
        }


        $posHALFFREE = strpos($product['description_short'], "[%HALFFREE%]");
        $checkNotHalfFree = true;

        if ($posHALFFREE === false) {

        }else{
          if(!$halfPay){
            continue;
          }
          $checkNotHalfFree = false;
        }


        $arrayDescriptionShort = explode("||",$product['description_short']);

        if(!array_key_exists(1,$arrayDescriptionShort)){
          $descriptionShortTemp = AluclassCarrier::getCarrierCode($product['id_product']);
          if($descriptionShortTemp){
            $arrayDescriptionShort = explode("||",$descriptionShortTemp);
          }else{
            continue;
          }
        }


        $arraycarrierCode = explode("|",$arrayDescriptionShort[1]);

        $carrierCode = $arraycarrierCode[0];
        $carrierCode = strip_tags($carrierCode);
        $carrierCode = trim($carrierCode);

        $qtdextra = $arraycarrierCode[1];
        $qtdextra = strip_tags($qtdextra);
        $qtdextra = trim($qtdextra);
        if($checkNotHalfFree){
          if(array_key_exists($carrierCode,$arrayCodeCarrier)){
            $arrayCodeCarrier[$carrierCode] = (int)$arrayCodeCarrier[$carrierCode]+(int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
          }else{
            $arrayCodeCarrier[$carrierCode] = (int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
          }
          if(AluclassCarrier::isAccumulate($carrierCode)) {
            $qtdTotal = (int)$qtdTotal + (int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
          }
        }else{
          if(array_key_exists($carrierCode,$arrayCodeCarrierHalfFree)){
            $arrayCodeCarrierHalfFree[$carrierCode] = (int)$arrayCodeCarrierHalfFree[$carrierCode]+(int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
          }else{
            $arrayCodeCarrierHalfFree[$carrierCode] = (int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
          }
        }
      }
    }

    foreach ($arrayCodeCarrierHalfFree as $keyCode=> $codeNum) {

      $sql = "SELECT cdp.show_price,cdp.price
      FROM `". _DB_PREFIX_ . "customize_delivery` cd
      inner join `". _DB_PREFIX_ . "customize_delivery_price` cdp on cd.id = cdp.id_customize_delivery
      where cd.code = '".$keyCode."' and cdp.num = 1";

      $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

      if($halfPay){
        $price = ($result[0]['price'] + AluclassCarrier::$valueExtra)-$result[0]['show_price'];
      }else{
        $price = $price + ($result[0]['show_price'] * (int)$codeNum);
      }
    }


    foreach ($arrayCodeCarrier as $keyCode=> $codeNum) {
      $codeNumMax = AluclassCarrier::getMaxCodeNum($keyCode);
      $isAccumulate = AluclassCarrier::isAccumulate($keyCode);

      $sql = "SELECT cdp.price, cd.extra,cd.qty
      FROM `". _DB_PREFIX_ . "customize_delivery` cd
      inner join `". _DB_PREFIX_ . "customize_delivery_price` cdp on cd.id = cdp.id_customize_delivery
      where cd.code = '".$keyCode."' and cdp.num = ".(($isAccumulate ? $qtdTotal : $codeNum) >= $codeNumMax  ? $codeNumMax  : ($isAccumulate ? $qtdTotal : $codeNum));

      $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

      if($result[0]['extra']){
        $extra = $result[0]['extra'];
      }

      $price = $price + ($result[0]['price'] * (ceil((int)$codeNum/$result[0]['qty'])));
    }

    if(count($arrayCodeCarrier) > 0){
      $price = $price + ( $extra ? AluclassCarrier::$valueExtra : 0);
    }

    return $price;
  }

  public static function isAccumulate($keyCode){
    $sql = "SELECT `accumulate` FROM `". _DB_PREFIX_ . "customize_delivery` where `code` =  '".$keyCode."'";

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
  }

  public static function getMaxCodeNum($keyCode)
  {
    $sql = "SELECT MAX(cdp.num) AS codeNum FROM `". _DB_PREFIX_ . "customize_delivery`cd
    inner join `". _DB_PREFIX_ . "customize_delivery_price` cdp on cd.id = cdp.id_customize_delivery
     where cd.code = '".$keyCode."'";

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
  }

  public static function getCarrierCode($idProduct)
  {

    $sql = "SELECT cd.code FROM `". _DB_PREFIX_ . "customize_delivery_product` cdp
            inner join `". _DB_PREFIX_ . "customize_delivery` cd on cd.id = cdp.id_customize_delivery
            where cdp.id_product = ".(int) $idProduct;

    $carrierCode = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);

    return ($carrierCode ? "||".$carrierCode."|0" : "");
  }


  public static function getCarrierBeginPrice($idProduct)
  {
    $arrayporte = array();
    $sql = "SELECT cdp.price, cd.extra, cdprod.free_shipping , cdprod.half_free_shipping,  cdp.show_price
            FROM `". _DB_PREFIX_ . "customize_delivery_product` cdprod
            inner join `". _DB_PREFIX_ . "customize_delivery` cd on cd.id = cdprod.id_customize_delivery
            inner join `". _DB_PREFIX_ . "customize_delivery_price` cdp on cdprod.id_customize_delivery = cdp.id_customize_delivery
            where cdprod.id_product = ".(int) $idProduct." and cdp.num = 1";

    $resultporte = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    $arrayporte['free_shipping'] = 0;
    $arrayporte['show_price'] = 0;
    $arrayporte['half_free_shipping'] = 0;
    if (!$resultporte) {

      $sql = "SELECT p.weight FROM`". _DB_PREFIX_ . "product` p
      where p.id_product = ".(int) $idProduct." ";

      $weight = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);

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
      $arrayporte['porteprice'] =  $Carrier->getDeliveryPriceByWeight($weight, (int) $idzone);
    }else{
      $arrayporte['free_shipping'] = $resultporte[0]['free_shipping'];
      $arrayporte['half_free_shipping'] = $resultporte[0]['half_free_shipping'];
      $arrayporte['show_price'] = $resultporte[0]['show_price'];
      $arrayporte['porteprice'] = $resultporte[0]['price'] + ($resultporte[0]['extra'] ? AluclassCarrier::$valueExtra : 0);
    }

    return $arrayporte;
  }

  public static function checkExitCarrierRules($idProduct){
    $sql = "SELECT cds.id_product FROM `". _DB_PREFIX_ . "customize_delivery_specific` cds
             where  cds.id_product = ".(int) $idProduct;

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
  }

  public static function checkFreeShip($idProduct){
    $sql = "SELECT cds.free_shipping FROM `". _DB_PREFIX_ . "customize_delivery_product` cds
             where cds.free_shipping = 1 and cds.id_product = ".(int) $idProduct;

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
  }
  public static function checkHalfFreeShip($idProduct){
    $sql = "SELECT cds.half_free_shipping FROM `". _DB_PREFIX_ . "customize_delivery_product` cds
             where cds.half_free_shipping = 1 and cds.id_product = ".(int) $idProduct;

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
  }

  public static function getPriceHalfFreeShip($idProduct){
    $sql = "SELECT cdp.show_price
            FROM `". _DB_PREFIX_ . "customize_delivery_product` cdprod
            inner join `". _DB_PREFIX_ . "customize_delivery` cd on cd.id = cdprod.id_customize_delivery
            inner join `". _DB_PREFIX_ . "customize_delivery_price` cdp on cdprod.id_customize_delivery = cdp.id_customize_delivery
            where cdprod.id_product = ".(int) $idProduct." and cdp.num = 1";

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
  }

  public static function checkRules($valueCheck,$value,$rule){

    $result = false;
    switch ($rule){
      case "<=":
        $result = ((int)$valueCheck <= (int)$value ? true : false);
      break;
      case ">=":
        $result = ((int)$valueCheck >= (int)$value ? true : false);
      break;
      case "=":
        $result = ((int)$valueCheck = (int)$value ? true : false);
      break;
      case "<":
        $result = ((int)$valueCheck < (int)$value ? true : false);
      break;
      case ">":
        $result = ((int)$valueCheck > (int)$value ? true : false);
      break;
    }

    return $result;

  }
  public static function GetRulesColis($rule,$valueCheck,$value){

    $result = 0;
    switch ($rule){
      case "colisC":
      case "colisGC":
      case "colisCC":
      case "colisCB":
      case "colisCP":
        $result = ceil((int)$valueCheck / (int)$value);
      break;
      default:
        $result = 0;
      break;
    }
    return $result-1;
  }


  public static function checkRulesPalette($rule){
    $result = false;

    switch ($rule){
      case "VALUEFIELDPAL1":
      case "VALUEFIELDPAL1V5":
      case "VALUEFIELDPAL2":
      case "VALUEFIELDPAL2V5":
      case "VALUEFIELDPAL3":
      case "VALUEFIELDPAL3V5":
      case "VALUEFIELDPAL4":
      case "VALUEFIELDPAL4V5":
        $result = true;
      break;
      default:
        $result = false;
      break;
    }
    return $result;
  }

  public static function checkRulesColis($rule){
    $result = false;

    switch ($rule){
      case "colisC":
      case "colisGC":
      case "colisCC":
      case "colisCB":
      case "colisCP":
        $result = true;
      break;
      default:
        $result = false;
      break;
    }
    return $result;
  }

  public static function getValueFieldNDK($valuefieldString,$valuefield){
    $sql = "SELECT gvl.`id_ndk_customization_field_value`
            FROM `". _DB_PREFIX_ . "ndk_customization_field_value_lang` gvl
            inner join `". _DB_PREFIX_ . "ndk_customization_field_value` fv on gvl.id_ndk_customization_field_value = fv.id_ndk_customization_field_value
            where `value` = '".$valuefieldString."' and fv.id_ndk_customization_field = ".(int)$valuefield;

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
  }

  public static function getCarrierRules($idProduct,$arrayfield){
    $carrierCode = false;
    $valueCheck = false;
    $numProd = 0;

    $sql = "SELECT cdr.rules, cdr.value, cdr.priority, cd.code, cds.field FROM `". _DB_PREFIX_ . "customize_delivery_specific` cds
            inner join `". _DB_PREFIX_ . "customize_delivery_rules` cdr on cds.id_customize_delivery_rules = cdr.id
            inner join `". _DB_PREFIX_ . "customize_delivery` cd on cd.id = cds.id_customize_delivery
            where  cds.id_product =  ".(int)$idProduct."
            order by  cdr.priority ";

    $arraySpecificRules = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

    $fieldCheck = $arraySpecificRules[0]['field'];
    $rules = $arraySpecificRules[0]['rules'];


    if(AluclassCarrier::checkRulesColis($rules)){
      $carrierCode = false;
      if($rules == "colisC" || $rules == "colisCC" || $rules == "colisCB" || $rules == "colisCP"){
        foreach($arrayfield as $value){
          if(array_key_exists('width',$value)){
            if(!empty($value['width'])){
              $value['width'] = str_replace("avec","=",$value['width']);
              $arraywidth = explode("=",$value['width']);
              if(array_key_exists('1',$arraywidth)){
                $width = $arraywidth[1];
              }else{
                $width = $arraywidth[0];
              }
              $valueCheck = trim($width);
              $valueCheck = preg_replace("/[^0-9]/", "",$valueCheck);
              break;
            }
          }
        }
      }elseif($rules == "colisGC"){
        foreach($arrayfield as $value){
          if(array_key_exists('width',$value)){
            if(!empty($value['width'])){
              $valueCheck = trim($value['width']);
              $valueCheck = preg_replace("/[^0-9]/", "",$valueCheck);
              $valueCheck = (int)$valueCheck /1000;
              break;
            }
          }
        }
      }

      if($valueCheck){
        $numProd = AluclassCarrier::GetRulesColis($rules,$valueCheck,$arraySpecificRules[0]['value']);
        $carrierCode = $arraySpecificRules[0]['code'];
      }
    }elseif(AluclassCarrier::checkRulesPalette($rules)){
        $valueFieldString = '';
        $fieldCheck = '';
        $carrierCode = false;
        foreach($arraySpecificRules as $valueSpecificRules){
          if(array_key_exists($valueSpecificRules['field'],$arrayfield)){
            $fieldCheck = $valueSpecificRules['field'];
            $valueFieldString = $arrayfield[$fieldCheck];
            break;
          }else{
            if(array_key_exists($valueSpecificRules['field'],$arrayfield[0])){
              $fieldCheck = $valueSpecificRules['field'];
              $valueFieldString = $arrayfield[0][$fieldCheck];
              break;
            }
          }
        }


        $valueField = AluclassCarrier::getValueFieldNDK($valueFieldString,$fieldCheck);

        if($valueField){
          foreach($arraySpecificRules as $value){
            if(strpos($value['value'],$valueField.",") !== false){
              $carrierCode = $value['code'];
              break;
            }
          }
        }
    }else{
      if($fieldCheck == 'width'){
        $carrierCode = false;
        foreach($arrayfield as $value){
          if(array_key_exists('width',$value)){
            if(!empty($value['width'])){

              $valueCheckTemp = $value['width'];
              $valueCheckTemp = preg_replace("/[^0-9]/", "",$valueCheckTemp);

              if((int)$valueCheckTemp > (int)$valueCheck)
                $valueCheck = $valueCheckTemp;

              if(array_key_exists('height',$value)){
                  $valueCheckTemp = $value['height'];
                  $valueCheckTemp = preg_replace("/[^0-9]/", "",$valueCheckTemp);
                  if((int)$valueCheckTemp > (int)$valueCheck)
                      $valueCheck = $valueCheckTemp;
              }
            }
          }
        }
      }else{
        $carrierCode = false;
        if(array_key_exists($fieldCheck,$arrayfield)){
          $valueCheck = $arrayfield[$fieldCheck];
        }else{
          $valueCheck = $arrayfield[0][$fieldCheck];
        }
        $valueCheck = strtolower($valueCheck);
        $arrayValueCheck = explode("x",$valueCheck);
        $valueCheck = trim($arrayValueCheck[0]);
        $valueCheck = preg_replace("/[^0-9]/", "",$valueCheck);
        if(array_key_exists(1,$arrayValueCheck)){
          $valueChecktemp = trim($arrayValueCheck[1]);
          $valueChecktemp = preg_replace("/[^0-9]/", "",$valueChecktemp);
          if((int)$valueChecktemp > (int)$valueCheck)
            $valueCheck = $valueChecktemp;
        }
      }

      if($valueCheck){
        foreach($arraySpecificRules as $specificRule){
          if(AluclassCarrier::checkRules($valueCheck,$specificRule['value'],$specificRule['rules'])){
            $carrierCode = $specificRule['code'];
            break;
          }
        }
      }
    }


    return ($carrierCode ? "||".$carrierCode."|".$numProd  : false);
  }


  public static function SendMailUser($subject,$html,$mailuser,$FromName,$From,$Sender,$Username,$Password,$addReplyTo = false){
    $mail = new PHPMailer;

    $mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->Host = "ssl0.ovh.net"; // Seu endereço de host SMTP
    $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
    $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
    $mail->Username = $Username; // Conta de email existente e ativa em seu domínio
    $mail->Password = $Password; // Senha da sua conta de email
    // DADOS DO REMETENTE
    $mail->Sender = $Sender; // Conta de email existente e ativa em seu domínio
    $mail->From = $From; // Sua conta de email que será remetente da mensagem
    $mail->FromName = $FromName; // Nome da conta de email
    // DADOS DO DESTINATÁRIO
    $mail->AddAddress($mailuser, ''); // Define qual conta de email receberá a mensagem
    if($addReplyTo){
      $mail->addBCC($From);
    }

    // Definição de HTML/codificação
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
    // DEFINIÇÃO DA MENSAGEM
    $mail->Subject  = $subject; // Assunto da mensagem
    $mail->Body = $html; // Texto da mensagem
    // ENVIO DO EMAIL
    $enviado = $mail->Send();
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    // Exibe uma mensagem de resultado do envio (sucesso/erro)
    return $enviado;

  }

  public static function sendmailOrder($reference,$products,$priceporteweight){

    $price = 0;
    $arrayCodeCarrier = array();
    $qtdTotal = 0;
    $priceString = false;
    $nameString = "";
    $iva = 1.2;

    foreach ($products as $product) {

      $nameString .= $product['name']." x ".$product['cart_quantity']."<br>";
      $arrayDescriptionShort = explode("||",$product['description_short']);

      if(!array_key_exists(1,$arrayDescriptionShort)){
        $descriptionShortTemp = AluclassCarrier::getCarrierCode($product['id_product']);
        if($descriptionShortTemp){
          $arrayDescriptionShort = explode("||",$descriptionShortTemp);
        }else{
          continue;
        }
      }

      $arraycarrierCode = explode("|",$arrayDescriptionShort[1]);

      $carrierCode = $arraycarrierCode[0];
      $carrierCode = strip_tags($carrierCode);
      $carrierCode = trim($carrierCode);

      $qtdextra = $arraycarrierCode[1];
      $qtdextra = strip_tags($qtdextra);
      $qtdextra = trim($qtdextra);

      if(array_key_exists($carrierCode,$arrayCodeCarrier)){
        $arrayCodeCarrier[$carrierCode] = (int)$arrayCodeCarrier[$carrierCode]+(int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
      }else{
        $arrayCodeCarrier[$carrierCode] = (int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
      }
      if(AluclassCarrier::isAccumulate($carrierCode)) {
        $qtdTotal = (int)$qtdTotal + (int)$product['cart_quantity']+((int)$product['cart_quantity']*(int)$qtdextra);
      }
    }

    foreach ($arrayCodeCarrier as $keyCode=> $codeNum) {

      $codeNumMax = AluclassCarrier::getMaxCodeNum($keyCode);
      $isAccumulate = AluclassCarrier::isAccumulate($keyCode);

      $sql = "SELECT cdp.price, cdl.name,cdp.num, cd.extra,cd.qty  FROM `". _DB_PREFIX_ . "customize_delivery` cd
      inner join `". _DB_PREFIX_ . "customize_delivery_lang` cdl on cd.id = cdl.id_customize_delivery and cdl.id_lang = 1
      inner join `". _DB_PREFIX_ . "customize_delivery_price` cdp on cd.id = cdp.id_customize_delivery
      where cd.code = '".$keyCode."' and cdp.num = ".(($isAccumulate ? $qtdTotal : $codeNum) >= $codeNumMax  ? $codeNumMax  : ($isAccumulate ? $qtdTotal : $codeNum));

      $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

      if($result[0]['extra']){
        $extra = $result[0]['extra'];
      }

      $price = $price + ($result[0]['price'] * (ceil((int)$codeNum/$result[0]['qty'])));

      $pricePorteTotal = round(((($result[0]['price'] *(ceil((int)$codeNum/$result[0]['qty']))) )*$iva),2);
      $pricePorte = round(($result[0]['price']*$iva),2);
      $priceString .= "<b>Nom de la livraison</b>: ".$result[0]['name']." | <b>Prix livraison</b>: ".$pricePorte." € | <b>Articles Quantité</b>: ".$codeNum." | <b>Zone</b>: ".$result[0]['num']." | <b>Total</b>: ".number_format($pricePorteTotal, 2, ',', ' ')." € <br>";

    }

    if(count($arrayCodeCarrier) > 0){
      $price = round(($price + ( $extra ? AluclassCarrier::$valueExtra : 0))*$iva,2);

      $priceporteweight = ($priceporteweight - $price > 0 ? $priceporteweight - $price : 0);
      $priceString .= "TOTAL Livraison: ".number_format($price, 2, ',', ' '). " €";
    }
    $sql = 'INSERT INTO `ps_customize_delivery_order` (`ref`, `product`, `portes`) VALUES ("'.$reference.'", "'.$nameString.'", "'.$priceString.'");';

    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

    $html ='
    <html>
      <body>
        <h1>Commande - '.$reference.'</h1>
        <h2>Article</h2>
        <p>'.$nameString.'</p>
        <h2>Livraison</h2>
        <p>'.$priceString.'</p>
        <p>TOTAL Livraison avec Poids: '.$priceporteweight.' €</p>
      </body>
    </html>
        ';

        AluclassCarrier::SendMailUser("Commande - ".$reference,$html,"facturelivraison@priximbattable.net","Facture Livraison","facturelivraison@priximbattable.net","facturelivraison@priximbattable.net",'facturelivraison@priximbattable.net','Gedc-2022',false);

  }
}



