<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
include("../database.php");

function Convertwebp($typeImg,$pasta,$nameImg,$compression_quality = 80)
{
	$linkImg = $pasta.$nameImg.".".$typeImg;
	$file_type = exif_imagetype($linkImg);

	switch ($file_type) {
		case '1': //IMAGETYPE_GIF
			$image = imagecreatefromgif($linkImg);
			break;
		case '2': //IMAGETYPE_JPEG
			$image = imagecreatefromjpeg($linkImg);
			break;
		case '3': //IMAGETYPE_PNG
			$image = imagecreatefrompng($linkImg);
			imagepalettetotruecolor($image);
			imagealphablending($image, true);
			imagesavealpha($image, true);
			break;
		default:
		return $pasta.$nameImg.'.webp Tipo de imagem não encontrada<br>';
	}

	$result = imagewebp($image, $pasta.$nameImg.'.webp', $compression_quality);
	imagedestroy($image);

	if (false === $result) {
		return $pasta.$nameImg.'.webp Conversão falhada<br>';
	}
	return $pasta.$nameImg.'.webp Sucesso<br>';
}


function ConvertImagemWebp($id_ndk_customization_field_value){
	$info = "";
	$arrayTypeImgNdk = array("","-texture");
	$arrayTypeImgThumbs = array("-cart_default","-home_default","-large_default","-medium_default","-small_default","-texture");

	foreach($arrayTypeImgNdk as $value){
		$typeImg = false;
		if (file_exists('../../img/scenes/ndkcf/'.$id_ndk_customization_field_value.$value.'.jpg')) {
			$typeImg = 'jpg';
		}elseif(file_exists('../../img/scenes/ndkcf/'.$id_ndk_customization_field_value.$value.'.png')){
			$typeImg = 'png';
		}elseif(file_exists('../../img/scenes/ndkcf/'.$id_ndk_customization_field_value.$value.'.gif')){
			$typeImg = 'gif';
		}

        if($typeImg){
			$info .= Convertwebp($typeImg,'../../img/scenes/ndkcf/',$id_ndk_customization_field_value.$value);
		}else{
			$info .= '../../img/scenes/ndkcf/'.$id_ndk_customization_field_value.$value." Não encontrado <br>";
		}
			
	}

	foreach($arrayTypeImgThumbs as $value){
		$typeImg = false;
		if (file_exists('../../img/scenes/ndkcf/thumbs/'.$id_ndk_customization_field_value.$value.'.jpg')) {
			$typeImg = 'jpg';
		}elseif(file_exists('../../img/scenes/ndkcf/thumbs/'.$id_ndk_customization_field_value.$value.'.png')){
			$typeImg = 'png';
		}elseif(file_exists('../../img/scenes/ndkcf/thumbs/'.$id_ndk_customization_field_value.$value.'.gif')){
			$typeImg = 'gif';
		}

		if($typeImg){
			$info .= Convertwebp($typeImg,'../../img/scenes/ndkcf/thumbs/',$id_ndk_customization_field_value.$value);
		}else{
			$info .= '../../img/scenes/ndkcf/thumbs/'.$id_ndk_customization_field_value.$value." Não encontrado <br>";
		}
	}

   return $info;
}
  
	if (!empty($_POST["idalterado"]) ){

		$GET_id_product = $_POST["idalterado"];

		echo "<hr><br>";
		$select_sql = "SELECT * FROM `sp_ndk_customization_field` WHERE `products` like '%".$GET_id_product."%' ";
		$select_exec = $database->query($select_sql);

		while ($row = $select_exec->fetch_array(MYSQLI_ASSOC)) {
			$array_product = explode(",",$row['products']);
			if(in_array ( $GET_id_product ,$array_product)){
				$row_sp_ndk_customization_fields[] = $row;
			}
	
		}



		foreach($row_sp_ndk_customization_fields as $row_sp_ndk_customization_field) {

			    $id_ndk_customization_field = $row_sp_ndk_customization_field["id_ndk_customization_field"];

				unset ($row_sp_ndk_customization_field_values );
				$select_sql = "SELECT * FROM `sp_ndk_customization_field_value` WHERE `id_ndk_customization_field` =  $id_ndk_customization_field ; ";
				$select_exec_sp_ndk_customization_field_value = $database->query($select_sql);
				while ($row_sp_ndk_customization_field_value = $select_exec_sp_ndk_customization_field_value->fetch_array(MYSQLI_ASSOC)) {
					$row_sp_ndk_customization_field_values[] = $row_sp_ndk_customization_field_value;
				}

				foreach($row_sp_ndk_customization_field_values as $row_sp_ndk_customization_field_value) {
					  $id_ndk_customization_field_value = $row_sp_ndk_customization_field_value["id_ndk_customization_field_value"];
				
					  echo ConvertImagemWebp($id_ndk_customization_field_value)."<br>";
				}
				echo "<hr><br>";
		}

	 	echo "<br><br>";

		$database->close();

	}
	else{
		echo "opppss!!!";
	}

?>