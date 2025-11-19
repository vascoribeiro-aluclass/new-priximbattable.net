<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

$query = "SELECT * FROM `". _DB_PREFIX_ . "customer` where `lastname` like '%sites.google.com/view/%' limit 10";
$resultCustomers = Db::getInstance()->executeS($query);

foreach($resultCustomers as $customer){
  $deleteCustomer = new Customer($customer['id_customer']);

  $query = "SELECT * FROM `". _DB_PREFIX_ . "cart` where`id_customer` = '".$customer['id_customer']."'";
  $resultcarts = Db::getInstance()->executeS($query);

  foreach($resultcarts as $cart){
    $deleteCart =  new Cart($cart['id_cart']);
    $deleteCart->delete();
  }

  $deleteCustomer->delete();

}

?>
