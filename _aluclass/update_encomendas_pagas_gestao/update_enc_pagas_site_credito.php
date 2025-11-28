<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
include("../database.php");

$order = $_GET['OrderNumberString'];

$queryCredito = $database->query("SELECT ps_orders.reference,ps_orders.total_paid,ps_orders.date_upd,ps_orders.current_state FROM ps_orders where ps_orders.current_state = 38 AND ps_orders.reference IN ($order)");

$arrCredito = array();

while ($rowCredito = mysqli_fetch_assoc($queryCredito)) {
  $arrCredito[] = array("currentStateC" => $rowCredito['current_state'], "orderNumberC" => $rowCredito['reference'], "valor_totalC" => $rowCredito['total_paid'], "dateC" => $rowCredito['date_upd'], "system_idC" => 999);
}

// echo '<pre>';
// var_dump($arrCredito);
// var_dump($arrMultibanco);
// echo'</pre>';
// exit;
echo json_encode($arrCredito);
// echo json_encode($arrMultibanco);
?>
