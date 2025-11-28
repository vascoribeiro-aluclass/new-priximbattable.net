<?php
require_once("functions.php");

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT
include("../database.php");
require_once dirname(__FILE__) ."/phpexcel/phpexcel/Classes/PHPExcel.php";

$select_sql = "SELECT CS.session_name, CS.session_mail, CS.session_tel, CM.date_add, CM.is_ai, CM.message
FROM sp_gptchatbox_message AS CM
LEFT JOIN sp_gptchatbox_session AS CS ON CS.id_chat_session=CM.id_chat_session
WHERE (
  -- Segunda-feira: retorna toda a info de sext,sábado e domingo
  DAYOFWEEK(CURDATE()) = 2
  AND CS.date_add BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND DATE_SUB(CURDATE(), INTERVAL 1 SECOND)
)
OR (
  -- Terça a sexta: retorna toda a info do dia anterior
  DAYOFWEEK(CURDATE()) BETWEEN 3 AND 6
  AND CS.date_add BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY)
  AND DATE_SUB(CURDATE(), INTERVAL 1 SECOND)
)";

$select_exec = $database->query($select_sql);

$arr = array();
while ($row = mysqli_fetch_assoc($select_exec)) {
  $arr[] = array("is_ai" => $row['is_ai'], "message" => $row['message'],"user_client" => $row['session_name'], "data_chat" => $row['date_add']);
}

$id=3;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getActiveSheet()->setTitle("GPT-ChatBox");
$objPHPExcel->getActiveSheet()->getStyle("A2:H2")->getFont()->setBold( true );
$objPHPExcel->getActiveSheet()->SetCellValue('A2','Date');
$objPHPExcel->getActiveSheet()->SetCellValue('B2','Client');
$objPHPExcel->getActiveSheet()->SetCellValue('C2','Utilisateur');
$objPHPExcel->getActiveSheet()->SetCellValue('D2','Message');
for ($i = 'A'; $i !== 'E'; $i++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
}
$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->applyFromArray(
    array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
            'color' => array('rgb' => '000000')
        )
    )
    )
);

foreach($arr as $array){
  if($array['is_ai'] == 0){
    $user = "client";
  }else{
    $user = "chat";
  }
  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$id,$array['data_chat']);
  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$id,$array['user_client']);
  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$id,$user);
  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$id,html_entity_decode($array['message'], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
  $id++;
}


ob_end_clean();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->setPreCalculateFormulas(true);
$objWriter->save('relatorios/FR_rapport_gpt_chat_box_'.date("d_m_y").'.xlsx');
$caminho_arquivo = 'relatorios/FR_rapport_gpt_chat_box_'.date("d_m_y").'.xlsx';

if(empty($arr)){
  email("Rapport GPT-ChatBox", "Il n'y a pas de données pour remplir le rapport.", "wm.priximbattable@gmail.com", null, null);
}else{
  email("Rapport GPT-ChatBox", "Le rapport du GPT-ChatBox est joint en annexe.", "wm.priximbattable@gmail.com", null, $caminho_arquivo);
}

