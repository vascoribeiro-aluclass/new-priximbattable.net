<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");

$id_origem  = $_POST["prodOrigem"];
$id_destino = $_POST["prodDestino"];

$select_sql = "SELECT * FROM sp_product_comment WHERE id_product='$id_origem'";
$select_exec = $database->query($select_sql);
echo "<p><strong>".$select_exec->num_rows." rows</strong></p>";
while ($reg = $select_exec->fetch_array()) {
	$id_product_comment = $reg["id_product_comment"];
	$id_product         = $reg["id_product"];
	$id_customer        = $reg["id_customer"];
	$id_guest           = $reg["id_guest"];
	$title              = $reg["title"];
	$content            = addslashes($reg["content"]);
	$customer_name      = $reg["customer_name"];
	$grade              = $reg["grade"];
	$validate           = $reg["validate"];
	$deleted            = $reg["deleted"];
	$date_add           = $reg["date_add"];

	$insert_sql  = "INSERT INTO sp_product_comment (id_product,id_customer,id_guest,title,content,customer_name,grade,validate,deleted,date_add) VALUES ('$id_destino','$id_customer','$id_guest','$title','$content','$customer_name','$grade','$validate','$deleted','$date_add')";
	$insert_exec = $database->query($insert_sql);

	$last_id = $database->insert_id;

	$insert_sql  = "INSERT INTO sp_product_comment_grade (id_product_comment,id_product_comment_criterion,grade) VALUES ('$last_id','1','$grade')";
	$insert_exec = $database->query($insert_sql);
}

$database->close();

echo "<p><strong>Pronto. Limpe o cache Prestashop!</strong></p>";

echo "<br /><br /><a href='index.php'>Processar mais comentários</a>";

?>