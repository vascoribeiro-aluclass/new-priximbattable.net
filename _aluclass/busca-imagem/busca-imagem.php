<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");

$id_produto = $_POST['id_produto'];

$sql  = $database->query("SELECT * FROM sp_image WHERE id_product = '$id_produto'");
$info = $sql->fetch_array();

$arr = array(
    "id_image" => $info["id_image"]
);

echo json_encode($arr);

$database->close();

?>