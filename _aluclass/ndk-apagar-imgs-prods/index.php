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
	$id_cat_ndk = "103";
} elseif ($site == "ES") {
	$id_cat_ndk = "103";
} elseif ($site == "FR") {
	$id_cat_ndk = "102";
}

// parametros
$log = "y"; // [y = yes] [n = no]
$alu_ndk_img = $database->query("SELECT value FROM sp_configuration WHERE name='ALU_NDK_IMG'")->fetch_array();
$last_id_img = "";
$date_img = date('Y-m-d', strtotime('-30days', strtotime(date("Y-m-d"))))." 00:00:00";
echo "checking images of the products before ".$date_img." - starting image #".$alu_ndk_img[0]."<br />";

// log ano
if ($log == "y") {
  $logs_all = fopen(date("Y").".txt", "a");
  $txt_log_all = date("Y-m-d H:i:s")." ---------- checking images of the products before ".$date_img." - starting image #".$alu_ndk_img[0]."\r\n";
  fwrite($logs_all, $txt_log_all);
  fclose($logs_all);
}

// log dia
if ($log == "y") {
  $logs_all = fopen(date("Y-m-d").".txt", "a");
  $txt_log_all = date("Y-m-d H:i:s")." ---------- checking images of the products before ".$date_img." - starting image #".$alu_ndk_img[0]."\r\n";
  fwrite($logs_all, $txt_log_all);
  fclose($logs_all);
}

// verifica imagens de produtos que são NDK
$productsImgList = $database->query("SELECT * FROM sp_image WHERE id_image>='$alu_ndk_img[0]'");
while ($imgs = $productsImgList->fetch_array()) {
  $id_prod = $imgs["id_product"];

  $id_prod_categ = $database->query("SELECT id_category_default FROM sp_product WHERE id_product='$id_prod' AND date_add<='$date_img'")->fetch_array();

  if (empty($id_prod_categ[0])){
    $id_prod_categ = $database->query("SELECT id_category_default FROM sp_ndk_product WHERE id_product='$id_prod' AND date_add<='$date_img'")->fetch_array();
  }



  if ($id_prod_categ[0] == $id_cat_ndk) {

    if ($log == "y") {
      $logs_all = fopen(date("Y").".txt", "a");
      echo date("Y-m-d H:i:s")." | analyzed Product ID ".$id_prod."<br />";
      $txt_log_all = date("Y-m-d H:i:s")." | analyzed Product ID ".$id_prod."\r\n";
      fwrite($logs_all, $txt_log_all);
      fclose($logs_all);
    }

    $id_img = $imgs["id_image"];
    $last_id_img = $id_img;

    $result = str_split($id_img);
    $caminho = "";
    for ($i=0; $i < count($result); $i++) { 
      $caminho = $caminho."/".$result[$i];
    }

    if ($log == "y") {
      $log_img = fopen(date("Y-m-d").".txt", "a");
    }

    $prefix = "../../";
    $path = "img/p".$caminho."/";
    if (is_dir($prefix.$path)) {
      $diretorio = dir($prefix.$path);
      while ($arquivo = $diretorio -> read()) {
        if ($arquivo != '..' && $arquivo != '.') {
          if (pathinfo($arquivo, PATHINFO_EXTENSION) && pathinfo($arquivo, PATHINFO_EXTENSION) != "DS_Store" && pathinfo($arquivo, PATHINFO_EXTENSION) != "php") {

            if ($log == "y") {
              echo date("Y-m-d H:i:s")." | deleted image ".$path.$arquivo." from Product ID ".$id_prod."<br />";
              $txt_log_img = date("Y-m-d H:i:s")." | deleted image ".$path.$arquivo." from Product ID ".$id_prod."\r\n";
              fwrite($log_img, $txt_log_img);
            }

            @unlink("./".$prefix.$path.$arquivo);
            $database->query("DELETE FROM sp_image_shop WHERE id_image='$id_img'");
            $database->query("DELETE FROM sp_image_lang WHERE id_image='$id_img'");
            $database->query("DELETE FROM sp_image WHERE id_image='$id_img'");
          }
        }
      }
    } else {
      // apaga o registro na base de dados
      if ($log == "y") {
        echo date("Y-m-d H:i:s")." | image folder ".$path." not exists, remove register from database<br />";
        $txt_log_img = date("Y-m-d H:i:s")." | image folder ".$path." not exists, remove register from database \r\n";
        fwrite($log_img, $txt_log_img);
      }
      $database->query("DELETE FROM sp_image_lang WHERE id_image='$id_img'");
      $database->query("DELETE FROM sp_image WHERE id_image='$id_img'");
      $database->query("DELETE FROM sp_image_shop WHERE id_image='$id_img'");
    }

    if ($log == "y") {
      fclose($log_img);
    }
  }
}


if ($last_id_img != "") {
  $hoje = date("Y-m-d H:i:s");
  $database->query("UPDATE sp_configuration SET value='$last_id_img',date_upd='$hoje' WHERE name='ALU_NDK_IMG'");
}
$database->close();

?>