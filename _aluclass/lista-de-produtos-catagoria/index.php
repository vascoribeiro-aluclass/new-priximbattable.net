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

$select_sql = "SELECT cl.* FROM sp_category_lang cl
inner join sp_category c on c.id_category = cl.id_category
where c.active = 1 and c.id_category != 2 and cl.id_lang = 1";
$select_exec = $database->query($select_sql);


while ($catagorias = $select_exec->fetch_array()) {
	echo "<p><strong>".$catagorias["name"]."</strong><p><br>";
	$select_sql2 = "SELECT pl.name from sp_category_product cp inner join sp_product p on p.id_product = cp.id_product and p.id_category_default != 102 inner join sp_product_lang pl on pl.id_product = p.id_product and pl.id_lang = 1 where cp.id_category = ".$catagorias["id_category"]." AND p.active = 1 ORDER BY cp.position";
   $select_exec2 = $database->query($select_sql2);
   while ($produtos = $select_exec2->fetch_array()) {
	 echo $produtos["name"]."<br>";
   }

}