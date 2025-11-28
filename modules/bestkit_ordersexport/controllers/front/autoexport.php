<?php
/**
* 2018 PHPIST.
*
* NOTICE OF LICENSE
*
* All right is reserved,
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future.
*
*  @author    PHPIST <yassine.belkaid87@gmail.com>
*  @copyright 2018 PHPIST
*/

class Bestkit_OrdersexportAutoExportModuleFrontController extends ModuleFrontController
{
    const SECRET_TOKEN = 'kE1K98!89KK@9793nbd';

    public function initContent()
    {
        parent::initContent();

        ini_set('display_errors', 'on');
        error_reporting(E_ALL | E_STRICT);

        $token = Tools::getValue('token');

        if ($token && $token == self::SECRET_TOKEN) {
            $id_order = (int)Configuration::get('PP_LAST_ORDER_ID');
            $orders = $this->module->getPPOrders($id_order);
            // var_dump($orders);
            // exit;

            if (count($orders) && $orders) {
                $rootDir = _PS_MODULE_DIR_ .'../xml_commande/';
                $lastOrder = end($orders);
                $xml = $this->module->generateOrdersXMLforPOS($orders, 'commandes_' . $id_order .'_'. $lastOrder->id .'_'. date('d-m-Y-h-i-s') .'.xml', $rootDir);
                
                if ($xml) {
                    Configuration::updateValue('PP_LAST_ORDER_ID', $lastOrder->id);

                    die('Exported from '. $id_order .' to '. $lastOrder->id .' orders.');
                }
            }
        }

        die('Nothing to export, Thanks!');
    }
}