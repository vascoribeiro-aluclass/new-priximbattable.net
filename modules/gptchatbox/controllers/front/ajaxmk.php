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

class gptchatboxajaxmkModuleFrontController extends ModuleFrontController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function initContent()
    {
        $this->ajax = true;

        $name_chatbox = Tools::getValue('name_chatbox');
        $email_chatbox = Tools::getValue('email_chatbox');
        $phone_chatbox = Tools::getValue('phone_chatbox');

        $chatbox_contacted = Tools::getValue('chatbox_contacted');

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

        setcookie("FORMCHATGPT",$email_chatbox,time()+3600*24*90, '/');
        setcookie("FORMCHATGPTNAME",$name_chatbox,time()+3600*24*90, '/');
        setcookie("FORMCHATGPTTEL",$phone_chatbox,time()+3600*24*90, '/');

        $email_comercial_rappel = null;
        $coderappel = "chatgpt";

        if($chatbox_contacted == 'true'){

          $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`,`sc_rappel_email_comercial`)
          VALUES ('".$name_chatbox."','".$phone_chatbox."','".$email_chatbox."','".$coderappel."','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."','".$email_comercial_rappel."'); ";
          $insertchatgpt = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
          if($insertchatgpt){
           $lastId =  (int)Db::getInstance()->Insert_ID();
           setcookie("IDSESSIONCHATGPTTEL",$lastId,time()+3600*24*90, '/');
          }

        }

        $arrayresponde['status'] = 'success' ;

        $this->sendJsonResponse($arrayresponde);
        parent::initContent();
    }


    private function sendJsonResponse($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }


}
