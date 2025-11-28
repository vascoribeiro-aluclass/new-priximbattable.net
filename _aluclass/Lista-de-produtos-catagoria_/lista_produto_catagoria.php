<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");

if ($mostra_erros == TRUE) {
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	error_reporting(E_ALL);
}

date_default_timezone_set("Europe/Paris");
header('Content-Type: text/html; charset=utf-8');

if ($site == "PT") {
	$nome_site = "precoimbativel";
	$id_cat_ndk = "103";
	$palavra_customizada_ndk = "Customized";
	$num_caract_descon = mb_strlen($palavra_customizada_ndk) + 5;
}elseif ($site == "ES") {
	$nome_site = "precioimbatible";
	$id_cat_ndk = "103";
	$palavra_customizada_ndk = "Customized";
	$num_caract_descon = mb_strlen($palavra_customizada_ndk) + 5;
}elseif ($site == "FR") {
	$nome_site = "priximbattable";
	$id_cat_ndk = "102";
	$palavra_customizada_ndk = "Personnalisé";
	$num_caract_descon = mb_strlen($palavra_customizada_ndk) + 5;
}

$select_sql = "SELECT * FROM `sp_category_lang`";
$select_exec = $database->query($select_sql);


while ($catagorias = $select_exec->fetch_array()) {

	echo $catagorias["name"]."<br>";

}