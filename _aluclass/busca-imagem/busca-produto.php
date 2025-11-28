<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");

$id_imagem = $_POST['id_imagem'];

$sql  = $database->query("SELECT * FROM sp_image WHERE id_image = '$id_imagem'");
$info = $sql->fetch_array();

$id_retornado = $info["id_product"];
$sql_link  = $database->query("SELECT * FROM sp_product_lang WHERE id_product = '3659'");
$info_link = $sql_link->fetch_array();

if ($ambiente == "SANDBOX") {
    $pre = "https://dev.priximbattable.net/";
} else {
    $pre = "https://priximbattable.net/";
}

$arr = array(
    "id_product" => $info["id_product"],
    "link" => $pre.$id_retornado."-".$info_link["link_rewrite"].".html"
);

echo json_encode($arr);

$database->close();

?>