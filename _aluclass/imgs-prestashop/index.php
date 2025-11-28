<?php

$get_id = @$_POST["id_campo"];
$conf = @$_POST["conf"];

$get_get_id = @$_GET["id_campo"];
$get_conf = @$_GET["conf"];

if (!empty($get_id) || !empty($conf) || !empty(@$get_get_id) || !empty(@$get_conf)) {
  $ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
  $site     = "FR"; // FR, ES, PT
  include("../database.php");

  header('Content-Type: text/html; charset=utf-8');
}

if(!empty($get_id) && empty($conf)) {
  $fieldInfo = $database->query("SELECT * FROM `sp_category_lang` WHERE id_category='$get_id'")->fetch_array();
}

if(!empty($get_get_id) && !empty($get_conf)) {
  echo "<p><strong>Capturando imagens dos produtos da categoria ".$get_get_id."</strong></p>";

  $img_directory = "/img/p/";

  $validate_ids = $database->query("SELECT * FROM `sp_product` WHERE id_category_default='$get_get_id'");
  // $validate_ids = $database->query("SELECT * FROM `sp_product` WHERE id_category_default<>'102' AND id_product='2251'");
  // $validate_ids = $database->query("SELECT * FROM `sp_product` WHERE id_category_default<>'102'");
  echo "<p>Total de produtos: ".$validate_ids->num_rows."</p>";
  $totalImagens = 0;
  while ($id = $validate_ids->fetch_array()) {
    $catch_product_ip = $id["id_product"];
    $images_per_id = $database->query("SELECT * FROM `sp_image` WHERE id_product='$catch_product_ip'");
    $totalImagens = $totalImagens + $images_per_id->num_rows;
    while ($id_image = $images_per_id->fetch_array()) {
      $id_img_explode = str_split($id_image["id_image"]);
      $path_folders = "";
      for ($iExplodeImg = 0; $iExplodeImg < count($id_img_explode); $iExplodeImg++) { 

        if (empty($path_folders)) {
          $mkdir = $id_img_explode[$iExplodeImg];
          if (!is_dir($mkdir)) {
            mkdir($mkdir, 0777, true);
          } else {
            chmod($mkdir, 0777);
          }
          $path_folders .= $id_img_explode[$iExplodeImg];
        } else {
          $mkdir = $path_folders."/".$id_img_explode[$iExplodeImg];
          if (!is_dir($mkdir)) {
            mkdir($mkdir, 0777, true);
          } else {
            chmod($mkdir, 0777);
          }
          $path_folders .= "/".$id_img_explode[$iExplodeImg];
        }
      }

      $arrayFilenames = array(
        ".jpg",
        "-cart_default.jpg",
        "-home_default.jpg",
        "-large_default.jpg",
        "-medium_default.jpg",
        "-small_default.jpg"
      );

      for ($iArrayFilenames = 0; $iArrayFilenames < count($arrayFilenames); $iArrayFilenames++) { 
        $filename = $id_image["id_image"].$arrayFilenames[$iArrayFilenames];
        $download = "https://".$_SERVER['HTTP_HOST'].$img_directory.$path_folders."/".$filename;
        $content = file_get_contents($download, FILE_BINARY);
        file_put_contents($path_folders."/".$filename, $content, FILE_BINARY);
        chmod($path_folders."/".$filename, 0755);
      }
    }
  }

  echo "<p>Total de imagens: ".$totalImagens."</p>";
  $return = "<p>😁 <strong>Finalizado captura de imagens.</strong></p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captura imagens prestashop dos produtos</title>
</head>
<body>

  <?php
  
  if (@$return) {
    echo $return."<br /><a href='../imgs-prestashop'>Reiniciar...</a>";
  } else {
    ?>
    <form method="post">
      <label for="id_campo">ID da Categoria</label>
      <input type="text" name="id_campo" />
      <button type="submit">Processar</button>
    </form>
    <?php
    if (@$fieldInfo) {
      echo "<br /> Confirma campo <strong>".$get_id." - ".$fieldInfo["name"]."</strong>?<br />";
      echo "<br /><strong><a href='?id_campo=".$get_id."&conf=y'>SIM</a></strong> ✅";
      echo "<br /><br /><strong><a href='../imgs-prestashop'>NÃO</a></strong> ⚠️";
    }
  }
  ?>

</body>
</html>