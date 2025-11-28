<?php

$v = $_GET["v"]; // get view

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

if (empty($v)) { // limpa os registros duplicados

    $select_exec = $database->query("SELECT * FROM sp_specific_price WHERE id_product<>'0' AND reduction_type='percentage'");

    if ($select_exec->num_rows > 0) {
        $fp = fopen(date("Y-m-d").".txt", "a");
        while ($item = $select_exec->fetch_array()) {
            $log = date("H:i:s")." | deleted ".($item["reduction"]*100)."% duplicate discount on Product ID ".$item["id_product"]."\r\n";
            $escreve = fwrite($fp, $log);
        }
        fclose($fp);
        $database->query("DELETE FROM sp_specific_price WHERE id_product<>'0' AND reduction_type='percentage'");
    }

    echo "Script successfully executed.";

} elseif (isset($v) && $v == "check") { // checa registros duplicados

    $select_exec = $database->query("SELECT * FROM sp_specific_price WHERE id_product<>'0' AND reduction_type='percentage'");
    if ($select_exec->num_rows > 0) {
        if ($select_exec->num_rows == 1) {
            echo "There are ".$select_exec->num_rows." record.<br>";
        } else{
            echo "There are ".$select_exec->num_rows." records.<br>";
        }
        while ($item = $select_exec->fetch_array()) {
            echo ($item["reduction"]*100)."% duplicate discount on Product ID ".$item["id_product"]."<br>";
        }
    } else {
        echo "There are no records.";
    }

} elseif (isset($v) && $v == "log") { // exibe o log

    $path = "./";
    $diretorio = dir($path);
    
    while($arquivo = $diretorio -> read()){
        if ($arquivo != "." && $arquivo != ".." && $arquivo != "index.php") {
            echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
        }
    }

    $diretorio->close();

} else {

    echo "Sorry!";

}

$database->close();