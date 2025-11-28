<?php
$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../_aluclass/database.php");

date_default_timezone_set("Europe/Paris");
header('Content-Type: text/html; charset=utf-8');

include_once("mpdf60-2/mpdf.php");
$mpdf = new mPDF();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <?php
    $getCGV = $database->query("SELECT content FROM ps_cms_lang WHERE id_cms=8")->fetch_array();

    $hash = "Printed from priximbattable.net|".date("Y-m-d H:i:s");
    $html = 'Date : '.date("Y-m-d").'<br />';
    $html .= '<small>ID : '.base64_encode($hash).'</small><br /><br />';

    // $html .= utf8_encode(html_entity_decode($getCGV[0])); // for test in dev only
    $html .= html_entity_decode($getCGV[0]); // for production

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);
    ob_clean();
    $mpdf->Output('CGV Priximbattable.pdf', 'I');
  ?>

</body>
</html>
