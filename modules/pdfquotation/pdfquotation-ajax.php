<?php
/**
* pdfquotation Ajax Call
*
* @author    Empty
* @copyright 2007-2016 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');

include_once(dirname(__FILE__).'/pdfquotation.php');


  if (Tools::getValue('email') == 'testing@example.com'){
    exit;
  }

  // if (sizeof(Tools::getValue('ndkcsfield')) > 0) {
  //   $devischeck = true;
  //   require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/createNdkcsfields.php';
  // }


  switch(Tools::getValue('action', 1)){
      case 'addCar':
          $context = Context::getContext();
          $pdfQuotation = new PDFQuotation();
          echo $pdfQuotation->hookAjaxCall(array('context' => $context));
          $remove_qrcode_img = dirname(__FILE__) . '/../../_aluclass/qrcode/';
          $remove_f = $remove_qrcode_img . 'logo.png';

          $files = glob($remove_qrcode_img . '*.png');

          foreach ($files as $file) {
              if ($file !== $remove_f) {
                  unlink($file);
              }
          }
      break;
      case 'addProduct':
          $context = Context::getContext();
          $pdfQuotation = new PDFQuotation();
          echo $pdfQuotation->hookAjaxCallProd(array('context' => $context));
          $remove_qrcode_img = dirname(__FILE__) . '/../../_aluclass/qrcode/';
          $remove_f = $remove_qrcode_img . 'logo.png';

          $files = glob($remove_qrcode_img . '*.png');

          foreach ($files as $file) {
              if ($file !== $remove_f) {
                  unlink($file);
              }
          }
      break;

  }


?>
