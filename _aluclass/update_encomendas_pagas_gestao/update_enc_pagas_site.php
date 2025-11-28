<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
include("../database.php");

$order = simplexml_load_file("https://gestao.eu/php/update_encomendas_automaticas/data_pagamentos.xml");

$objJsonDocument = json_encode($order);
$arrOutput = json_decode($objJsonDocument, TRUE);
$orders_final = array();

foreach ($arrOutput['OrderNumber'] as $arr){
  $orders_final[] = $arr['order_id'];
}
$ids = implode(', ', $orders_final);
// var_dump($orders_final);
// var_dump($arrOutput);
$queryCredito = $database->query("SELECT ps_orders.reference,ps_orders.total_paid,ps_orders.date_upd,ps_orders.current_state,ps_orders.payment FROM ps_orders where ps_orders.current_state = 38 AND ps_orders.reference IN ($ids)");

$queryMultibanco = $database->query("SELECT ps_orders.reference,ps_orders.total_paid,ps_orders.date_upd,ps_orders.current_state,ps_orders.payment FROM ps_orders INNER JOIN ps_order_history on ps_order_history.id_order = ps_orders.id_order where ps_orders.current_state = 2 AND ps_order_history.id_order_state = 2 AND ps_orders.reference IN ($ids)");

$arrCredito = array();
if($queryCredito){
  while ($rowCredito = mysqli_fetch_assoc($queryCredito)) {
    $arrCredito[] = array("currentStateC" => $rowCredito['current_state'], "orderNumberC" => $rowCredito['reference'], "valor_totalC" => $rowCredito['total_paid'], "dateC" => $rowCredito['date_upd'], "system_idC" => 999, "paymentC" => $rowCredito['payment']);
  }
}else{
  echo "sans date";
}
$arrMultibanco = array();

if($queryMultibanco){
  while ($rowMultibanco = mysqli_fetch_assoc($queryMultibanco)) {
    $arrMultibanco[] = array("currentStateM" => $rowMultibanco['current_state'], "orderNumberM" => $rowMultibanco['reference'], "valor_totalM" => $rowMultibanco['total_paid'], "dateM" => $rowMultibanco['date_upd'], "system_idM" => 999, "paymentM" => $rowMultibanco['payment']);
  }
}else{
  echo "sans date";
}
$array_final = array_merge($arrCredito,$arrMultibanco);

  $xml_orders = new SimpleXMLElement("<?xml version=\"1.0\"?><orders_pagamento></orders_pagamento>");

  function array_to_xml($array_final, $xml_orders) {
      foreach($array_final as $key => $value) {
          if(is_array($value)) {
              if(!is_numeric($key)){
                  $subnode = $xml_orders->addChild("$key");

                  array_to_xml($value, $subnode);
              }
              else{
                  $subnode = $xml_orders->addChild("data");
                  array_to_xml($value, $subnode);
              }
          }
          else {
              $xml_orders->addChild("$key","$value");
          }
      }
  }

  array_to_xml($array_final, $xml_orders);

  echo $xml_orders->asXML("data_pagamentos_site.xml");

?>
