<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

$setmail        = Tools::getValue('setmail');
$mailcustomer   = Tools::getValue('customermail');
$warning_mail_comercial_cata   = Tools::getValue('warning_mail_comercial_cata');
$nameCustomer   = Tools::getValue('nameCustomer');
$phoneCustomer  = Tools::getValue('phoneCustomer');
$cataloguename  = Tools::getValue('cataloguename');

if($setmail == 'yes'){
    if (!filter_var($mailcustomer, FILTER_VALIDATE_EMAIL)) {
      echo "errorMail";
      exit;
    }

    $cataloguename  = preg_replace('/[[:punct:]_]/', '',$cataloguename);
    $nameCustomer   = preg_replace('/[[:punct:]_]/', '',$nameCustomer);
    $phoneCustomer  = preg_replace('/[[:punct:]_]/', '',$phoneCustomer);

    $sql = "INSERT INTO `ps_pdf_mails` (`mail`,`name`,`phone`,`catalogue_name`) VALUES ('".$mailcustomer."','".utf8_decode($nameCustomer)."','".$phoneCustomer."','".$cataloguename."'); ";
    $insertmailPDF = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

    $type_conversion  = null;
    $code_conversion = null;
    $date_conversion = null;
    $name_conversion = null;

    if (isset($_COOKIE["PBCLID"])) {
      $type_conversion  = $_COOKIE["PBCLKID_TYPE"];
      $code_conversion = $_COOKIE["PBCLID"];
      $date_conversion = $_COOKIE["PBCLKID_DATE"];
      $name_conversion = 'Lead';
    }

   // $enviado = SendMailUser("Notre Catalogue",$html,$mailcustomer,"Priximbattable.net","toujoursun@priximbattable.net","toujoursun@priximbattable.net",'toujoursun@priximbattable.net','Md2019Ged!',false);
   $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`,`sc_rappel_email_comercial`)
   VALUES ('".$nameCustomer."','".$phoneCustomer."','".$mailcustomer."','catalogue','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."','".$warning_mail_comercial_cata."'); ";
    $inserscore = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

    Mail::Send(
      (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
      'catalogue', // email template file to be use
      'Notre catalogue', // email subject
      array(),
      $mailcustomer,
      Configuration::get('PS_SHOP_EMAIL'), // receiver email address
      $nameCustomer, //receiver name
      NULL, //from email address
      NULL,  //from name
      NULL, //file attachment
      NULL, //mode smtp
    );
    echo "sucess";
}

?>
