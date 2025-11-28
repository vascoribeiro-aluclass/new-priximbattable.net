<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");

if ($mostra_erros == TRUE) {
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	error_reporting(E_ALL);
}

header('Content-Type: text/html; charset=utf-8');

if ($site == "PT") {
	$nome_site = "precoimbativel";
}elseif ($site == "ES") {
	$nome_site = "precioimbatible";
}elseif ($site == "FR") {
	$nome_site = "priximbattable";
}

// Nome do Arquivo do Excel que será gerado
$dataHoje = date("Y-m-d");
$emitido_em = date("Ymd_Hi");
$arquivo = $nome_site.$sigla_base.".Tables_".$emitido_em.".xls";

$tabela = "<table border='1'>";
$tabela .= "<tr>";
$tabela .= utf8_decode("<td colspan='2'><strong><span style='color: red;'>Prix Imbattable</span> - Rapports sur les lignes de la base de données par tables</strong></td>");
$tabela .= "</tr>";

$tabela .= "<tr>";
$tabela .= "<td><strong>Table</strong></td>";
$tabela .= "<td><strong>".$dataHoje."</strong></td>";
$tabela .= "</tr>";

$sql = "SELECT table_name AS 'table', table_rows AS 'rows' FROM information_schema.tables WHERE table_schema = '".$infoconn['database_name']."'";
$run = $database->query($sql);
while ($item = $run->fetch_array()) {
	$tabela .= "<tr>";
	$tabela .= "<td>".$item[0]."</td>";
	$tabela .= "<td>".$item[1]."</td>";
	$tabela .= "</tr>";
}

$tabela .= "</table>";



$view = @$_GET["view"];
if (isset($view) && $view == "table") {
	echo "<h1>Relatório de tabelas gerado com sucesso!</h1>";
	echo $tabela;
} elseif (!isset($view)) {
	file_put_contents($arquivo, $tabela);
	echo "<h1>Relatório de tabelas gerado com sucesso!</h1>";
}

$database->close();
