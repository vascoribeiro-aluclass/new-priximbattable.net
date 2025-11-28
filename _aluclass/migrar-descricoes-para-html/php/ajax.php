<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$domain = $_SERVER['SERVER_NAME'];
switch ($domain) {
  case 'dev.priximbattable.net':
    $ambiente = "SANDBOX";
    $site = "FR";
    break;

  case 'dev.precoimbativel.net':
    $ambiente = "SANDBOX";
    $site = "PT";
    break;

  case 'dev.precioimbatible.net':
    $ambiente = "SANDBOX";
    $site = "ES";
    break;

  case 'dev.preisverruckt.de':
    $ambiente = "SANDBOX";
    $site = "DE";
    break;

  case 'priximbattable.net':
    $ambiente = "PRODUCAO";
    $site = "FR";
    break;

  case 'precoimbativel.net':
    $ambiente = "PRODUCAO";
    $site = "PT";
    break;

  case 'precioimbatible.net':
    $ambiente = "PRODUCAO";
    $site = "ES";
    break;

  case 'preisverrueckt.de':
    $ambiente = "PRODUCAO";
    $site = "DE";
    break;
  
  default:
    echo "Follow the white rabbit.";
    exit;
    break;
}

$action = $_GET["action"];

include("../../database.php");

switch ($action) {
  case 'getCategories':
    $query = "SELECT C.id_category AS id_category, CL.name AS name_category
    FROM `sp_category` AS C
    LEFT JOIN `sp_category_lang` AS CL ON CL.id_category=C.id_category
    WHERE C.id_parent=2 AND CL.id_lang=1 AND C.active=1
    ORDER BY CL.name ASC";
    $sql = $database->query($query);

    $rows = [];

    while ($item = $sql->fetch_array()) {
      array_push(
        $rows, array(
          "id_category" => $item["id_category"],
          "name_category" => $item["name_category"]
        )
      );
    }

    ?>
    <option value=""></option>
    <?php

    foreach ($rows as $key => $value) {
      ?>
      <option value="<?php echo $value["id_category"] ?>"><?php echo $value["name_category"] ?></option>
      <?php
    }
    break;

  case 'getSubCategories':
    $id_category = $_GET["id_category"];

    $query = "SELECT C.id_category AS id_category, CL.name AS name_category
    FROM `sp_category` AS C
    LEFT JOIN `sp_category_lang` AS CL ON CL.id_category=C.id_category
    WHERE C.id_parent='$id_category' AND CL.id_lang='$id_lang' AND C.active='1'
    ORDER BY CL.name ASC";
    $sql = $database->query($query);

    $rows = [];

    while ($item = $sql->fetch_array()) {
      array_push(
        $rows, array(
          "id_category" => $item["id_category"],
          "name_category" => $item["name_category"]
        )
      );
    }

    ?>
    <option value=""></option>
    <?php

    foreach ($rows as $key => $value) {
      ?>
      <option value="<?php echo $value["id_category"] ?>"><?php echo $value["name_category"] ?></option>
      <?php
    }
    break;

  case 'exportDescriptions':
    $subcategory_id = $_GET["subcategory_id"];

    $query = "SELECT P.id_product AS id_product, PL.name AS name, PL.description AS description
    FROM `sp_product` AS P
    LEFT JOIN `sp_product_lang` AS PL ON PL.id_product=P.id_product
    WHERE P.id_category_default='$subcategory_id' AND PL.id_lang='$id_lang' AND P.active='1'
    ORDER BY PL.name ASC";
    $sql = $database->query($query);

    $rows = [];

    while ($item = $sql->fetch_array()) {
      echo "Exportando ".$item["id_product"]." - ".$item["name"]."... ";

      $fp = fopen("../descricoes/".$item["id_product"].".html", "a");
      fwrite($fp, $item["description"]);
      fclose($fp);

      echo "✅<br />";
    }

    if ($sql->num_rows == 0) {
      echo "Não foi localizada nenhuma descrição para exportar. 😳";
    } else if($sql->num_rows == 1) {
      echo "<p class='mt-3'><strong>Já está!</strong> 🎉 <br />Foi exportado ".$sql->num_rows." descrição.</p>";
    } else {
      echo "<p class='mt-3'><strong>Já está!</strong> 🎉 <br />Foram exportadas ".$sql->num_rows." descrições.</p>";
    }
    break;

  case 'exportOneDescription':
    $product_id = $_GET["product_id"];

    $query = "SELECT PL.name AS name, PL.description AS description
    FROM `sp_product` AS P
    LEFT JOIN `sp_product_lang` AS PL ON PL.id_product=P.id_product
    WHERE P.id_product='$product_id' AND PL.id_lang='$id_lang' AND P.active='1'";
    $sql = $database->query($query);

    $rows = [];

    while ($item = $sql->fetch_array()) {
      echo "Exportando ".$product_id." - ".$item["name"]."... ";

      $fp = fopen("../descricoes/".$product_id.".html", "a");
      fwrite($fp, $item["description"]);
      fclose($fp);

      echo "✅<br />";
    }

    if ($sql->num_rows == 0) {
      echo "Não foi localizada nenhuma descrição para exportar. 😳";
    } else {
      echo "<p class='mt-3'><strong>Já está!</strong> 🎉</p>";
    }
    break;
}