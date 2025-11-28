<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
$logging = "ON"; // ON , OFF
$limite = 20;
$today = date("Y_m_d");
$datelastyear = date('Y-m-d', strtotime('-1 years'));

include("../database.php");

function GetSql($row,$table ){
	$text_sql = "";
	foreach ($row as $key => $value){
		$row[$key] = str_replace("'", "''", $row[$key]);
	}

	unset($row['low_stock_threshold']);
	unset($row['available_date']);
	$string_fields_products = "'".implode("','",$row)."'";
	$array_fields_products_key = array_keys($row);

	$string_fields_products_key = "`".implode("`,`",$array_fields_products_key)."`";
	$text_sql = "INSERT INTO `".$table."` (	$string_fields_products_key) VALUES ($string_fields_products); ";

	return $text_sql;
}

$select_sql = "SELECT p.* FROM `sp_product` p
where  p.`active` = 1 and p.`id_category_default` = 102 and p.id_product not in  (SELECT od.product_id FROM `sp_order_detail` od)
and p.`date_add` < '".$datelastyear."' order by  p.`id_product` ASC limit ".$limite;

$select_exec = $database->query($select_sql);
     //if($logging == "ON" && count($select_exec) > 0 ){
  if($logging == "ON" && $select_exec->num_rows> 0 ){
		$logFile = fopen(__DIR__."/".$today .".txt", "a") or die("Unable to open file!");
		fwrite($logFile, "----------------------------------------------Hora : ".date("H:i")."---------------------------------------------------------------------------".PHP_EOL.PHP_EOL);
	}


while ($row = $select_exec->fetch_array(MYSQLI_ASSOC )) {

	$id_product =  $row['id_product'];
	if($logging == "ON")
		fwrite($logFile, "----------------------------------------------Produto : ".$id_product ."-----------------------------------------------------------------------".PHP_EOL.PHP_EOL);

  // Product
  $select_sql_product   = "SELECT * FROM `sp_product` where  `id_product` = ".$id_product.";";
  $select_exec_product = $database->query($select_sql_product);
  while ($row_product = $select_exec_product->fetch_array(MYSQLI_ASSOC )) {
    $text_sql = GetSql($row_product,"sp_ndk_product");
    if($logging == "ON")
      fwrite($logFile, $text_sql."".PHP_EOL);

    $select_execPROD = $database->query($text_sql);
    if($select_execPROD){
      $text_sql = "DELETE from sp_product where `id_product` = ".$id_product.";" ;
      if($logging == "ON")
        fwrite($logFile, $text_sql."".PHP_EOL);

      $select_execPROD = $database->query($text_sql);
    }else{
      if($logging == "ON")
        fwrite($logFile, "Erro no sp_product : ".$id_product." ".PHP_EOL);
    }
  }


  // Product lang
	$select_sql_lang   = "SELECT * FROM `sp_product_lang` where  `id_product` = ".$id_product.";";
	$select_exec_lang = $database->query($select_sql_lang);
  while ($row_lang = $select_exec_lang->fetch_array(MYSQLI_ASSOC )) {
    $text_sql = GetSql($row_lang,"sp_ndk_product_lang");
    if($logging == "ON")
      fwrite($logFile, $text_sql."".PHP_EOL);
    $select_execPROD = $database->query($text_sql);
    if($select_execPROD){
      $text_sql = "DELETE from sp_product_lang where `id_product` = ".$id_product.";" ;
      if($logging == "ON")
        fwrite($logFile, $text_sql."".PHP_EOL);
      $select_execPROD = $database->query($text_sql);
    }else{
      if($logging == "ON")
        fwrite($logFile, "Erro no sp_product_lang : ".$id_product." ".PHP_EOL);
    }
  }




  // category product
  $select_sql_category  = "SELECT * FROM `sp_category_product` where  `id_product` = ".$id_product.";";
	$select_exec_category = $database->query($select_sql_category);
  while ($row_category = $select_exec_category->fetch_array(MYSQLI_ASSOC )) {
    $text_sql = GetSql($row_category,"sp_ndk_category_product");
    if($logging == "ON")
      fwrite($logFile, $text_sql."".PHP_EOL);

    $select_execPROD = $database->query($text_sql);
    if($select_execPROD){
      $text_sql = "DELETE from sp_category_product where `id_product` = ".$id_product.";" ;
      if($logging == "ON")
        fwrite($logFile, $text_sql."".PHP_EOL);

      $select_execPROD = $database->query($text_sql);
    }else{
      if($logging == "ON")
        fwrite($logFile, "Erro no sp_product : ".$id_product." ".PHP_EOL);
    }
  }

  // product shop
  $select_sql_shop  = "SELECT * FROM `sp_product_shop` where  `id_product` = ".$id_product.";";
	$select_exec_shop = $database->query($select_sql_shop);
  while ($row_shop = $select_exec_shop->fetch_array(MYSQLI_ASSOC )) {
    $text_sql = GetSql($row_shop,"sp_ndk_product_shop");
    if($logging == "ON")
      fwrite($logFile, $text_sql."".PHP_EOL);

    $select_execPROD = $database->query($text_sql);
    if($select_execPROD){
      $text_sql = "DELETE from sp_product_shop where `id_product` = ".$id_product.";" ;
      if($logging == "ON")
        fwrite($logFile, $text_sql."".PHP_EOL);

      $select_execPROD = $database->query($text_sql);
    }else{
      if($logging == "ON")
        fwrite($logFile, "Erro no sp_product : ".$id_product." ".PHP_EOL);
    }
  }


  // customization
  $select_sql_customization  = "SELECT * FROM `sp_customization` where  `id_product` = ".$id_product.";";
	$select_exec_customization = $database->query($select_sql_customization);
  while ($row_customization = $select_exec_customization->fetch_array(MYSQLI_ASSOC )) {
    $text_sql = GetSql($row_customization,"sp_ndk_customization_prestshop");
    if($logging == "ON")
      fwrite($logFile, $text_sql."".PHP_EOL);

    $select_execPROD = $database->query($text_sql);
    if($select_execPROD){
      $text_sql = "DELETE from sp_customization where `id_customization` = ".$row_customization['id_customization'].";" ;
      if($logging == "ON")
        fwrite($logFile, $text_sql."".PHP_EOL);

        // customization data
        $select_sql_customization_data  = "SELECT * FROM `sp_customized_data` where  `id_customization` = ".$row_customization['id_customization'].";";
        $select_exec_customization_data = $database->query($select_sql_customization_data);
        while ($row_customization_data = $select_exec_customization_data->fetch_array(MYSQLI_ASSOC )) {
          $text_sql = GetSql($row_customization_data,"sp_ndk_customized_data_prestshop");
          if($logging == "ON")
            fwrite($logFile, $text_sql."".PHP_EOL);

          $select_execPROD = $database->query($text_sql);
          if($select_execPROD){
            $text_sql = "DELETE from sp_customized_data where `index` = ".$row_customization_data['index'].";" ;
            if($logging == "ON")
              fwrite($logFile, $text_sql."".PHP_EOL);

            $select_execPROD = $database->query($text_sql);
          }else{
            if($logging == "ON")
              fwrite($logFile, "Erro no sp_product : ".$id_product." ".PHP_EOL);
          }
        }

      $select_execPROD = $database->query($text_sql);
    }else{
      if($logging == "ON")
        fwrite($logFile, "Erro no sp_product : ".$id_product." ".PHP_EOL);
    }
  }

  // customization field
  $select_sql_customization_field  = "SELECT * FROM `sp_customization_field` where  `id_product` = ".$id_product.";";
	$select_exec_customization_field = $database->query($select_sql_customization_field);
  while ($row_customization_field = $select_exec_customization_field->fetch_array(MYSQLI_ASSOC )) {
    $text_sql = GetSql($row_customization_field,"sp_ndk_customization_field_prestshop");
    if($logging == "ON")
      fwrite($logFile, $text_sql."".PHP_EOL);

    $select_execPROD = $database->query($text_sql);
    if($select_execPROD){
      $text_sql = "DELETE from sp_customization_field where `id_customization_field` = ".$row_customization_field['id_customization_field'].";" ;
      if($logging == "ON")
        fwrite($logFile, $text_sql."".PHP_EOL);

        // customization field lang
        $select_sql_customization_field_lang = "SELECT * FROM `sp_customization_field_lang` where  `id_customization_field` = ".$row_customization_field['id_customization_field'].";";
        $select_exec_customization_field_lang = $database->query($select_sql_customization_field_lang);
        while ($row_customization_field_lang = $select_exec_customization_field_lang->fetch_array(MYSQLI_ASSOC )) {
          $text_sql = GetSql($row_customization_field_lang,"sp_ndk_customization_field_lang_prestshop");
          if($logging == "ON")
            fwrite($logFile, $text_sql."".PHP_EOL);

          $select_execPROD = $database->query($text_sql);
          if($select_execPROD){
            $text_sql = "DELETE from sp_customization_field_lang where `id_customization_field` = ".$row_customization_field_lang['id_customization_field'].";" ;
            if($logging == "ON")
              fwrite($logFile, $text_sql."".PHP_EOL);

            $select_execPROD = $database->query($text_sql);
          }else{
            if($logging == "ON")
              fwrite($logFile, "Erro no sp_product : ".$id_product." ".PHP_EOL);
          }
        }

      $select_execPROD = $database->query($text_sql);
    }else{
      if($logging == "ON")
        fwrite($logFile, "Erro no sp_product : ".$id_product." ".PHP_EOL);
    }
  }

}

$database->close();
//fclose($logFile);
?>
