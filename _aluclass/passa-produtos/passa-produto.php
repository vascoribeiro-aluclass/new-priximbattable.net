<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
include("../database.php");


function GetSql($rowforeign,$row,$table,$where,$id_lang  = false ){
		$text_sql = "";
		if($id_lang ){
			$row['id_lang'] = $id_lang ;
		}

        if($table == "ps_product_lang"){
			//$row["description"] = "";
		}

		$array_fields_key = array_keys($row);
		foreach($array_fields_key as $row_fields_key){
			$row[$row_fields_key] = str_replace("'", "''", utf8_encode($row[$row_fields_key]));
		}

		/*
		if(!empty($row['description'])){
			$row['description'] = str_replace("'", "''", utf8_encode($row['description']));
		}
		if(!empty($row['name'])){
			$row['name'] = str_replace("'", "''", utf8_encode($row['name']));
		}
		if(!empty($row['admin_name'])){
			$row['admin_name'] = str_replace("'", "''", utf8_encode($row['admin_name']));
		}
		if(!empty($row['notice'])){
			$row['notice'] = str_replace("'", "''", utf8_encode($row['notice']));
		}
		if(!empty($row['tooltip'])){
			$row['tooltip'] = str_replace("'", "''", utf8_encode($row['tooltip']));
		}*/

		if(!empty($row['active'])){
			$row['active'] = 0;
		}
		if($rowforeign > 0){
			$array_fields_products_key = array_keys($row);
			$text_sql = "UPDATE  `".$table."`  SET ";
			foreach($array_fields_products_key as $row_fields_products_key){
				if($text_sql == "UPDATE  `".$table."`  SET "){
						$text_sql  .=  "`".$row_fields_products_key."`  = '".$row[$row_fields_products_key]."'";
				}else{
						$text_sql  .=  " , `".$row_fields_products_key."` = '".$row[$row_fields_products_key]."'";
				}
			}
			$text_sql .= $where ;
		}else{

				$string_fields_products = "'".implode("','",$row)."'";
				$array_fields_products_key = array_keys($row);
				$string_fields_products_key = "`".implode("`,`",$array_fields_products_key)."`";
				$text_sql = "INSERT INTO `".$table."` (	$string_fields_products_key) VALUES ($string_fields_products); ";
		}
    return $text_sql;
}
function CopyCSV($id_ndk_customization_field,$GET_id_product){
	if (!copy("../../img/scenes/ndkcf/".$id_ndk_customization_field.".csv", $GET_id_product."/ndkcf/".$id_ndk_customization_field.".csv")) {
		//echo "failed to copy ...\n";
	}
}

function CopyImagem($id_ndk_customization_field_value,$GET_id_product){

		if (!copy("../../img/scenes/ndkcf/".$id_ndk_customization_field_value.".jpg", $GET_id_product."/ndkcf/".$id_ndk_customization_field_value.".jpg")) {
				//echo "failed to copy ...\n";
		}
		if (!copy("../../img/scenes/ndkcf/".$id_ndk_customization_field_value."-texture.jpg", $GET_id_product."/ndkcf/".$id_ndk_customization_field_value."-texture.jpg")) {
			//	echo "failed to copy texture 1..\n";
		}
		if (!copy("../../img/scenes/ndkcf/thumbs/".$id_ndk_customization_field_value."-cart_default.jpg", $GET_id_product."/ndkcf/thumbs/".$id_ndk_customization_field_value."-cart_default.jpg")) {
				//echo "failed to copy cart_default...\n";
		}
		if (!copy("../../img/scenes/ndkcf/thumbs/".$id_ndk_customization_field_value."-home_default.jpg", $GET_id_product."/ndkcf/thumbs/".$id_ndk_customization_field_value."-home_default.jpg")) {
				//echo "failed to copy home_default....\n";
		}
		if (!copy("../../img/scenes/ndkcf/thumbs/".$id_ndk_customization_field_value."-large_default.jpg", $GET_id_product."/ndkcf/thumbs/".$id_ndk_customization_field_value."-large_default.jpg")) {
				//echo "failed to copy large_default...\n";
		}
		if (!copy("../../img/scenes/ndkcf/thumbs/".$id_ndk_customization_field_value."-medium_default.jpg", $GET_id_product."/ndkcf/thumbs/".$id_ndk_customization_field_value."-medium_default.jpg")) {
				//echo "failed to copy medium_default...\n";
		}
		if (!copy("../../img/scenes/ndkcf/thumbs/".$id_ndk_customization_field_value."-small_default.jpg", $GET_id_product."/ndkcf/thumbs/".$id_ndk_customization_field_value."-small_default.jpg")) {
				//echo "failed to copy small_default...\n";
		}
		if (!copy("../../img/scenes/ndkcf/thumbs/".$id_ndk_customization_field_value."-texture.jpg", $GET_id_product."/ndkcf/thumbs/".$id_ndk_customization_field_value."-texture.jpg")) {
			//echo "failed to copy texture 2...\n";
		}
}

	if (!empty($_POST["idalterado"]) ){

		$ambienteforeign  = $_POST["ambiente"]; // SANDBOX ou PRODUCAO
    	$siteforeign  =  $_POST["site"];  // FR, ES, PT
		if(empty($_POST["idndk"])){
			$idndk = 4500;
		}else{
			$idndk =  $_POST["idndk"];
		}

		echo $ambienteforeign ."<br>";
		echo $siteforeign ."<br>";
    	include("databaseforeign.php");
		$GET_id_product = $_POST["idalterado"];
		echo $GET_id_product ."<br>";
		mkdir(__DIR__."/".$GET_id_product , 0777, true);
		mkdir(__DIR__."/".$GET_id_product ."/ndkcf", 0777, true);
		mkdir(__DIR__."/".$GET_id_product ."/ndkcf/thumbs", 0777, true);
		$myfile = fopen(__DIR__."/".$GET_id_product ."/".$GET_id_product .".sql", "w") or die("Unable to open file!");
		echo "<hr><br>";
		$select_sql = "SELECT * FROM `ps_product` WHERE `id_product` =  $GET_id_product ; ";
		$select_exec = $database->query($select_sql);

	 //	$select_execforeign = $databaseforeign->query($select_sql);
	//	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
	  $rowforeign = [];
	  echo count($rowforeign);
		echo "<hr><br>";
		while ($row = $select_exec->fetch_array(MYSQLI_ASSOC)) {
			$text_sql=GetSql(0,$row,"ps_product"," WHERE `id_product` =  ".$GET_id_product .";" );
			echo $text_sql."<br>";
			fwrite($myfile,  $text_sql. PHP_EOL );
		}

		echo "<hr><br>";
		$select_sql = "SELECT * FROM `ps_product_lang` WHERE `id_product` =  $GET_id_product ; ";
		$select_exec = $database->query($select_sql);

		while ($row = $select_exec->fetch_array(MYSQLI_ASSOC)) {
				$select_sqlforeign = "SELECT * FROM `ps_product_lang` WHERE `id_product` =  $GET_id_product  and `id_lang` = ". $id_langforeign."; ";
					 //	$select_execforeign = $databaseforeign->query($select_sqlforeign);
				 //		$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
				$text_sql=GetSql(0,$row,"ps_product_lang"," WHERE `id_product` =  ".$GET_id_product ." and `id_lang` = ". 	$id_langforeign ."; " ,$id_langforeign );
				echo htmlspecialchars(utf8_encode($text_sql))."<br>";
				fwrite($myfile,  $text_sql. PHP_EOL );
		}

		echo "<hr><br>";
		$select_sql = "SELECT * FROM `ps_category_product` WHERE `id_product` =  $GET_id_product ; ";
		$select_exec = $database->query($select_sql);

		while ($row = $select_exec->fetch_array(MYSQLI_ASSOC)) {
				$select_sqlforeign = "SELECT * FROM `ps_category_product` WHERE `id_product` =  $GET_id_product  and `id_category` = ". $row["id_category"] ."; ";
					 //	$select_execforeign = $databaseforeign->query($select_sqlforeign);
					 //	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
				$text_sql=GetSql(0,$row,"ps_category_product"," WHERE `id_product` =  ".$GET_id_product ."  and `id_category` = ". $row["id_category"] .";" );
				echo $text_sql."<br>";
				fwrite($myfile,  $text_sql. PHP_EOL );
		}

		echo "<hr><br>";
		$select_sql = "SELECT * FROM `ps_product_shop` WHERE `id_product` =  $GET_id_product ; ";
		$select_exec = $database->query($select_sql);

		while ($row = $select_exec->fetch_array(MYSQLI_ASSOC)) {
				$select_sqlforeign = "SELECT * FROM `ps_product_shop` WHERE `id_product` =  $GET_id_product ; ";
				 //		$select_execforeign = $databaseforeign->query($select_sqlforeign);
				 //		$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
				$text_sql=GetSql(0,$row,"ps_product_shop"," WHERE `id_product` =  ".$GET_id_product .";" );
				echo $text_sql."<br>";
				fwrite($myfile,  $text_sql. PHP_EOL );
		}

		echo "<hr><br>";
		$select_sql = "SELECT * FROM `ps_specific_price` WHERE `id_product` =  $GET_id_product ; ";
		$select_exec = $database->query($select_sql);

		while ($row = $select_exec->fetch_array(MYSQLI_ASSOC)) {
				$select_sqlforeign = "SELECT * FROM `ps_specific_price` WHERE `id_specific_price` = ". $row["id_specific_price"] ."; ";
					 //	$select_execforeign = $databaseforeign->query($select_sqlforeign);
					 //	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
				$text_sql=GetSql(0,$row,"ps_specific_price"," WHERE `id_specific_price` = ". $row["id_specific_price"] .";" );
				echo $text_sql."<br>";
				fwrite($myfile,  $text_sql. PHP_EOL );
		}
		echo "<hr><br>";
		$select_sql = "SELECT * FROM `ps_ndk_customization_field` WHERE `products` like '%".$GET_id_product."%' ";
		$select_exec = $database->query($select_sql);
		while ($row = $select_exec->fetch_array(MYSQLI_ASSOC)) {
			$array_product = explode(",",$row['products']);
			if(in_array ( $GET_id_product ,$array_product)){
				$row_ps_ndk_customization_fields[] = $row;
			}
		}

		foreach($row_ps_ndk_customization_fields as $row_ps_ndk_customization_field) {

			  $id_ndk_customization_field = $row_ps_ndk_customization_field["id_ndk_customization_field"];
			  if($id_ndk_customization_field  > $idndk){

			  	fwrite($myfile, PHP_EOL . PHP_EOL . PHP_EOL ." -- Campo NDK: ".$id_ndk_customization_field."  ". PHP_EOL );
				$select_sqlforeign = "SELECT * FROM `ps_ndk_customization_field` WHERE `id_ndk_customization_field` = ". $id_ndk_customization_field ."; ";
				//	$select_execforeign = $databaseforeign->query($select_sqlforeign);
				//	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
				$text_sql=GetSql(0,$row_ps_ndk_customization_field,"ps_ndk_customization_field"," WHERE `id_ndk_customization_field` = ".  $id_ndk_customization_field .";" );
				echo $text_sql."<br>";
				fwrite($myfile,  $text_sql. PHP_EOL );

/*
				$select_sql = "SELECT * FROM `ps_ndk_customization_field_csv` WHERE `id_ndk_customization_field` =  $id_ndk_customization_field ; ";
				$select_exec_ps_ndk_customization_field_csv = $database->query($select_sql);
				if($select_exec_ps_ndk_customization_field_csv){
					fwrite($myfile,  "delete `ps_ndk_customization_field_csv` WHERE `id_ndk_customization_field_csv` = ". $id_ndk_customization_field .";". PHP_EOL );
				}

				while ($row_ps_ndk_customization_field_csv = $select_exec_ps_ndk_customization_field_csv->fetch_array(MYSQLI_ASSOC)) {

					$select_sqlforeign = "SELECT * FROM `ps_ndk_customization_field_csv` WHERE `id_ndk_customization_field_csv` = ". $row_ps_ndk_customization_field_c["id_ndk_customization_field_csv"] ."; ";
					//	$select_execforeign = $databaseforeign->query($select_sqlforeign);
					//	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
					$text_sql=GetSql(0,$row_ps_ndk_customization_field_csv,"ps_ndk_customization_field_csv"," WHERE `id_ndk_customization_field_csv` = ". $row_ps_ndk_customization_field_csv["id_ndk_customization_field_csv"] .";" );
					echo $text_sql."<br>";
					fwrite($myfile,  $text_sql. PHP_EOL );

				} */

				$select_sql = "SELECT * FROM `ps_ndk_customization_field_lang` WHERE `id_ndk_customization_field` =  $id_ndk_customization_field  and `id_lang` = ". $id_lang.";  ";
				$select_exec_ps_ndk_customization_field_lang  = $database->query($select_sql);

				while ($row_ps_ndk_customization_field_lang = $select_exec_ps_ndk_customization_field_lang->fetch_array(MYSQLI_ASSOC)) {

					$select_sqlforeign = "SELECT * FROM `ps_ndk_customization_field_lang` WHERE `id_ndk_customization_field` = ". $id_ndk_customization_field."  and `id_lang` = ". $id_langforeign."; ";
					 //		$select_execforeign = $databaseforeign->query($select_sqlforeign);
						 //	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
					$text_sql=GetSql(0,$row_ps_ndk_customization_field_lang,"ps_ndk_customization_field_lang"," WHERE `id_ndk_customization_field` = ". $id_ndk_customization_field ." and  `id_lang` = ".	$id_langforeign ." ;" ,$id_langforeign  );
					echo $text_sql."<br>";
					fwrite($myfile,  $text_sql. PHP_EOL );
				}
			}
			else{

				fwrite($myfile,  " -- update ". PHP_EOL );
				$text_sql=GetSql(1,$row_ps_ndk_customization_field,"ps_ndk_customization_field"," WHERE `id_ndk_customization_field` = ".  $id_ndk_customization_field .";" );
				echo $text_sql."<br>";
				fwrite($myfile,  $text_sql. PHP_EOL );


			}

				unset ($row_ps_ndk_customization_field_values );
				$select_sql = "SELECT * FROM `ps_ndk_customization_field_value` WHERE `id_ndk_customization_field` =  $id_ndk_customization_field ; ";
				$select_exec_ps_ndk_customization_field_value = $database->query($select_sql);
				while ($row_ps_ndk_customization_field_value = $select_exec_ps_ndk_customization_field_value->fetch_array(MYSQLI_ASSOC)) {
					$row_ps_ndk_customization_field_values[] = $row_ps_ndk_customization_field_value;
				}

				CopyCSV($id_ndk_customization_field,$GET_id_product);

				foreach($row_ps_ndk_customization_field_values as $row_ps_ndk_customization_field_value) {
					  $id_ndk_customization_field_value = $row_ps_ndk_customization_field_value["id_ndk_customization_field_value"];

					  if($id_ndk_customization_field_value > 0){
						CopyImagem($id_ndk_customization_field_value,$GET_id_product);


						$select_sqlforeign = "SELECT * FROM `ps_ndk_customization_field_value` WHERE `id_ndk_customization_field_value` = ". $id_ndk_customization_field_value."; ";
						 //		$select_execforeign = $databaseforeign->query($select_sqlforeign);
							 //	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
						$text_sql=GetSql(0,$row_ps_ndk_customization_field_value,"ps_ndk_customization_field_value"," WHERE `id_ndk_customization_field_value` = ". $id_ndk_customization_field_value .";" );
						echo $text_sql."<br>";
						fwrite($myfile,  $text_sql. PHP_EOL );

						$select_sql = "SELECT * FROM `ps_ndk_customization_field_value_lang` WHERE `id_ndk_customization_field_value` =  $id_ndk_customization_field_value  and `id_lang` = ". $id_lang.";  ";
						$select_exec_ps_ndk_customization_field_value_lang = $database->query($select_sql);
						while ($row_ps_ndk_customization_field_value_lang = $select_exec_ps_ndk_customization_field_value_lang->fetch_array(MYSQLI_ASSOC)) {

							$select_sqlforeign = "SELECT * FROM `ps_ndk_customization_field_value_lang` WHERE `id_ndk_customization_field_value` = ". $id_ndk_customization_field_value."  and `id_lang` = ".$id_langforeign  ."; ";
							 //		$select_execforeign = $databaseforeign->query($select_sqlforeign);
								 //	$rowforeign = $select_execforeign->fetch_array(MYSQLI_ASSOC);
							$text_sql=GetSql(0,$row_ps_ndk_customization_field_value_lang,"ps_ndk_customization_field_value_lang"," WHERE `id_ndk_customization_field_value` = ". $id_ndk_customization_field_value ." and `id_lang` = ".	$id_langforeign ." ;" ,$id_langforeign );
							echo htmlspecialchars($text_sql)."<br>";
							fwrite($myfile,  $text_sql. PHP_EOL );

						}
					}else{

						fwrite($myfile,  " -- update ". PHP_EOL );
						$text_sql=GetSql(1,$row_ps_ndk_customization_field_value,"ps_ndk_customization_field_value"," WHERE `id_ndk_customization_field_value` = ". $id_ndk_customization_field_value .";" );
						echo $text_sql."<br>";
						fwrite($myfile,  $text_sql. PHP_EOL );

					}

				}
				echo "<hr><br>";
		}

	 	echo "<br><br>";

		$database->close();
		fclose($myfile);
   		$zipname = $GET_id_product .".zip";
		$zip = new ZipArchive;
		$zip->open($zipname, ZipArchive::CREATE);
		$zip->addFile($GET_id_product."/"."sql.txt");
		$zip->close();

	    echo "<a href='".$zipname."'>Download ".$zipname."</a><br>";
		echo "<br><br>";
		echo ' <a href="https://dev.priximbattable.net/_aluclass/passa-produtos/">Voltar</a> ';
	}
	else{
		echo "opppss!!!";
	}

?>
