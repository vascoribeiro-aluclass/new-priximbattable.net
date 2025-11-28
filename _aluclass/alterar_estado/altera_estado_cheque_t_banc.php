<?php
$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
include("../database.php");
$query = arrayQuery("SELECT * FROM sp_orders WHERE current_state <> 2 and date_upd > '2024-10-07'");

if (!empty($query)) {
  foreach ($query as $q) {
    $arquivos = "https://gestao.eu/uploads/xml_cheque_trans_banc/_" . $q['reference'] . "_.xml";
    $file_headers = @get_headers($arquivos);
    if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
      $exists = false;
    } else {
      $xml = simplexml_load_file($arquivos);// objecto com array de elementos $var_array->key
      $database->query("UPDATE sp_orders SET current_state = 2 WHERE reference = " . $q['reference'] . "");
      $database->query("INSERT INTO `sp_order_history`(`id_employee`, `id_order`, `id_order_state`, `date_add`) VALUES (0, " . $q['id_order'] . ", " . $xml->state_order . ",'" . $xml->date . "')");
    }
  }
}

function arrayQuery($query)
{
  global $database;
  $arr = [];
  if ($r = $database->query($query)) {
    while ($l = mysqli_fetch_assoc($r)) {
      $arr[] = $l;
    }
    return $arr;
  } else {
    return false;
  }
}
