<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
include("../database.php");

$order = $_GET['OrderNumberString'];

$queryMultibanco = $database->query("SELECT ps_orders.reference,ps_orders.total_paid,ps_orders.date_upd,ps_orders.current_state,ps_orders.payment FROM ps_orders where ps_orders.current_state = 2 AND ps_orders.reference IN ($order)");

$arrMultibanco = array();

while ($rowMultibanco = mysqli_fetch_assoc($queryMultibanco)) {
  $arrMultibanco[] = array("currentStateM" => $rowMultibanco['current_state'], "orderNumberM" => $rowMultibanco['reference'], "valor_totalM" => $rowMultibanco['total_paid'], "dateM" => $rowMultibanco['date_upd'], "system_idM" => 999, "paymentM" => $rowMultibanco['payment']);
}

// echo '<pre>';
// var_dump($arrCredito);
// var_dump($arrMultibanco);
// echo'</pre>';
// exit;
echo json_encode($arrMultibanco);
// echo json_encode($arrMultibanco);
?>
