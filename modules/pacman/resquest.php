<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

function generateRandomString($length = 10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function SendMailUser($subject,$html,$mailuser,$FromName,$From,$Sender,$Username,$Password,$addReplyTo = false){
  $mail = new PHPMailer;
  // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
  $mail->IsSMTP(); // Define que a mensagem será SMTP
  $mail->Host = "ssl0.ovh.net"; // Seu endereço de host SMTP
  $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
  $mail->Port = 25; // Porta de comunicação SMTP - Mantenha o valor "587"
  //$mail->SMTPSecure = 'ssl';
  $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
  $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
  $mail->Username = $Username; // Conta de email existente e ativa em seu domínio
  $mail->Password = $Password; // Senha da sua conta de email
  // DADOS DO REMETENTE
  $mail->Sender = $Sender; // Conta de email existente e ativa em seu domínio
  $mail->From = $From; // Sua conta de email que será remetente da mensagem
  $mail->FromName = $FromName; // Nome da conta de email
  // DADOS DO DESTINATÁRIO
  $mail->AddAddress($mailuser, 'Nome - Recebe1'); // Define qual conta de email receberá a mensagem
  if($addReplyTo){
    $mail->addBCC($From);
  }
  
  // Definição de HTML/codificação
  $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
  $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
  // DEFINIÇÃO DA MENSAGEM
  $mail->Subject  = $subject; // Assunto da mensagem
  $mail->Body = $html; // Texto da mensagem
  // ENVIO DO EMAIL
  $enviado = $mail->Send();
  // Limpa os destinatários e os anexos
  $mail->ClearAllRecipients();
  // Exibe uma mensagem de resultado do envio (sucesso/erro)
  return $enviado;

}

function EncryptCode($message,$key) {
  //$iv = mcrypt_create_iv(IV_SIZE, MCRYPT_DEV_URANDOM);
  //$crypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $payload, MCRYPT_MODE_CBC, $iv);
  //$combo = $iv . $crypt;
  //$garble = base64_encode($iv . $crypt);
  $message = base64_encode($message);
  $message = base64_encode($message);
  $message = base64_encode($message);
  $message = base64_encode($message);
  $message = base64_encode($message);
  return $message;
}

function DecryptCode($message,$key) {
  $message = base64_decode($message);
  $message = base64_decode($message);
  $message = base64_decode($message);
  $message = base64_decode($message);
  $message = base64_decode($message);
  return $message;
  /*$combo = base64_decode($garble);
  $iv = substr($combo, 0, IV_SIZE);
  $crypt = substr($combo, IV_SIZE, strlen($combo));
  $payload = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $crypt, MCRYPT_MODE_CBC, $iv);
  return $payload;*/
}

 /*

function EncryptCode($message, $key, $encode = false)
{
    $nonceSize = openssl_cipher_iv_length(self::METHOD);
    $nonce = openssl_random_pseudo_bytes($nonceSize);

    $ciphertext = openssl_encrypt(
        $message,
        self::METHOD,
        $key,
        OPENSSL_RAW_DATA,
        $nonce
    );

    // Now let's pack the IV and the ciphertext together
    // Naively, we can just concatenate
    if ($encode) {
        return base64_encode($nonce.$ciphertext);
    }
    return $nonce.$ciphertext;
}


function DecryptCode($message, $key, $encoded = false)
{
    if ($encoded) {
        $message = base64_decode($message, true);
        if ($message === false) {
            throw new Exception('Encryption failure');
        }
    }

    $nonceSize = openssl_cipher_iv_length(self::METHOD);
    $nonce = mb_substr($message, 0, $nonceSize, '8bit');
    $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

    $plaintext = openssl_decrypt(
        $ciphertext,
        self::METHOD,
        $key,
        OPENSSL_RAW_DATA,
        $nonce
    );

    return $plaintext;
}
*/

function bubbleSort($array)
{
  for($i = 0; $i < count($array); $i++)
  {
     for($j = 0; $j < count($array) - 1; $j++)
     {
       if(intval($array[$j][0]) < intval($array[$j + 1][0]))
       {
         $aux = $array[$j];
         $array[$j] = $array[$j + 1];
         $array[$j + 1] = $aux;
       }
     }
  }

  return $array;
}


$parte = explode("$", $_GET['q']);

if($parte[0] == 'reducao'){
  $reducao = explode("=", $parte[1]);
  $message =  $reducao[1];
  $key = hex2bin('3F61C9E19A896C1A4D6E697705C7D88D741');
  $encrypted = EncryptCode($message, $key);
  echo $encrypted;
}

if($parte[0] == 'update'){
    $date_add = date('Y-m-d h:i:s');
    $timeplay = explode("=", $parte[4]);
    $position = explode("=",$parte[3]);
    $name = explode("=",$parte[2]);
    $score = explode("=", $parte[1]);
    $infoMail = "Nome: ".  $name[1] ." pontos: ".$score[1];
    $info = simplexml_load_file('score.xml');
    $arryPoints = array(); 

    $arryPoints[0][0] =  $info->T1->number;
    $arryPoints[0][1] =  $info->T1->author;
    $arryPoints[1][0] =  $info->T2->number;
    $arryPoints[1][1] =  $info->T2->author;
    $arryPoints[2][0] =  $info->T3->number;
    $arryPoints[2][1] =  $info->T3->author;
    $arryPoints[3][0] =  $info->T4->number;
    $arryPoints[3][1] =  $info->T4->author;
    $arryPoints[4][0] =  $info->T5->number;
    $arryPoints[4][1] =  $info->T5->author;
    $arryPoints[5][0] =  $info->T6->number;
    $arryPoints[5][1] =  $info->T6->author;
    $arryPoints[6][0] =  $info->T7->number;
    $arryPoints[6][1] =  $info->T7->author;
    $arryPoints[7][0] =  $info->T8->number;
    $arryPoints[7][1] =  $info->T8->author;
    $arryPoints[8][0] =  $info->T9->number;
    $arryPoints[8][1] =  $info->T9->author;
    $arryPoints[9][0] =  $info->T10->number;
    $arryPoints[9][1] =  $info->T10->author;

    $arryPoints[10][0] =  $score[1];
    $arryPoints[10][1] =  $name[1];

    for($i = 0; $i < 11; $i++){
      $arryPoints[$i][0] =  (int)$arryPoints[$i][0]; 
      $arryPoints[$i][1] =  (string)$arryPoints[$i][1]; 
    }


    $arryPointsbubbleSort = bubbleSort($arryPoints);

    $info->T1->number = $arryPointsbubbleSort[0][0];
    $info->T1->author = $arryPointsbubbleSort[0][1];
    $info->T2->number = $arryPointsbubbleSort[1][0];
    $info->T2->author = $arryPointsbubbleSort[1][1];
    $info->T3->number = $arryPointsbubbleSort[2][0];
    $info->T3->author = $arryPointsbubbleSort[2][1];
    $info->T4->number = $arryPointsbubbleSort[3][0];
    $info->T4->author = $arryPointsbubbleSort[3][1];
    $info->T5->number = $arryPointsbubbleSort[4][0];
    $info->T5->author = $arryPointsbubbleSort[4][1];
    $info->T6->number = $arryPointsbubbleSort[5][0];
    $info->T6->author = $arryPointsbubbleSort[5][1];
    $info->T7->number = $arryPointsbubbleSort[6][0];
    $info->T7->author = $arryPointsbubbleSort[6][1];
    $info->T8->number = $arryPointsbubbleSort[7][0];
    $info->T8->author = $arryPointsbubbleSort[7][1];
    $info->T9->number = $arryPointsbubbleSort[8][0];
    $info->T9->author = $arryPointsbubbleSort[8][1];
    $info->T10->number = $arryPointsbubbleSort[9][0];
    $info->T10->author = $arryPointsbubbleSort[9][1];

   
    // save the updated document
   $info->asXML('score.xml');
   //"telmo.rodrigues@precoimbativel.net"
   $enviado = SendMailUser($name[1]." - ".$score[1],$infoMail,"vasco.ribeiro@precoimbativel.net","Hall of fame","pacman@priximbattable.net","pacman@priximbattable.net",'pacman@priximbattable.net','Md2018Ged',true);
    if ($enviado) {
      include '../../config/config.inc.php';
      include '../../classes/CartRule.php';

      Db::getInstance()->execute("
      INSERT INTO `sp_pacman_hall` (`name`,`score`,`date`,`time`) VALUES
      ('".$name[1]."','".$score[1]."','".$date_add."','".$timeplay[1]."');");
      echo "E-mail enviado com sucesso!";
    } else {
      echo "Não foi possível enviar o e-mail.";
      exit;
    }
}

if($parte[0] == 'play'){
    $date_add = date('Y-m-d h:i:s');
    $score = explode("=", $parte[1]);
    $reduc = explode("=", $parte[2]);
    $timeplay = explode("=", $parte[3]);
    include '../../config/config.inc.php';
    include '../../classes/CartRule.php';

    Db::getInstance()->execute("
    INSERT INTO `sp_pacman_play` (`score`,`percentage`,`date`,`time`) VALUES
    ('".$score[1]."','".$reduc[1]."','".$date_add."','".$timeplay[1]."');");
}

if($parte[0] == 'check'){
  $date_add = date('Y-m-d h:i:s');
  $ip_client = explode("=", $parte[2]);
  $mailuseras = explode("=", $parte[1]);

  include '../../config/config.inc.php';
  include '../../classes/CartRule.php';

  $existCopoun = Db::getInstance()->executeS("
  SELECT COUNT(pc.id) as registe FROM `sp_pacman_coupon` as pc
  inner join `sp_cart_rule` cr on pc.`id_cart_rule` = cr.`id_cart_rule`
  where  pc.`ip_client` = '".$ip_client[1]."' or pc.`email` = '".$mailuseras[1]."' ");

  echo $existCopoun[0]['registe'];
}
if($parte[0] == 'insert'){

    $mailuseras = explode("=",$parte[1]);
    $reduc = explode("=", $parte[2]);
    $name = explode("=", $parte[3]);
    $score = explode("=", $parte[4]);
    $timeplay = explode("=", $parte[5]);
    $ip_client = explode("=", $parte[6]);
    
    
    $date_from = date('Y-m-d');
    $date_add = date('Y-m-d h:i:s');

    $time = strtotime($date_from);
    $date_to = date("Y-m-d", strtotime("+7 day", $time));
    $date_to_Dacosta = date("d-m-Y", strtotime("+7 day", $time));
    $code = generateRandomString(8);


    $message =  $reduc[1];
    $key = hex2bin('3F61C9E19A896C1A4D6E697705C7D88D741');
    $decryptReduc= DecryptCode($message, $key);

    if($decryptReduc > 0 and $decryptReduc < 9){
      $html ='<html>
              <head>
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <style>
              body {
                font-family: Arial;
      }
      
      .coupon {
        border: 5px dotted #bbb;
        width: 80%;
        border-radius: 15px;
        margin: 0 auto;
        max-width: 600px;
      }
        .img{
          margin-top:20px;
          display: block;
          margin-left: auto;
          margin-right: auto;
        height: 160px;
        width: 500px;
        }
      
      .container {
        padding: 2px 16px;
        background-color: #fafafa;
      }
      
      .promo {
        background: #ff3333;
        color: white;
        padding: 3px;
      }
      .in
      .expire {
        color: black;
      }
      </style>
      </head>
      <body>
      
      <div class="coupon">
        <div class="container">
          <img class="img" src="https://priximbattable.net/img/cms/PACMAN/caixa.gif" >	 </img>
            <h3>Merci d&#39;avoir joué notre PACMAN.</h3>
        </div>
        <div class="container" style="background-color:white">
          <h2>Félicitations, vous avez gagné un code de <b>'.$decryptReduc.'%</b> remise à utiliser sur <a href="www.priximbattable.net">www.priximbattable.net</a>.</h2> 
        </div>
        <div class="container">
          <p><h2>Utiliser le code promotionnel: <span class="promo">'.$code.'</span></h2> </p>
          <p class="expire">Le code expire : '.$date_to_Dacosta.'.<br>
          Ce code n&#39;est valable qu&#39;une seule fois.</p>

        </div>
      </div>
      
      </body>
        </html>';

        $enviado = SendMailUser("CODE REMISE",$html,$mailuseras[1],"Pacman Priximbattable","pacman@priximbattable.net","pacman@priximbattable.net",'pacman@priximbattable.net','Md2018Ged',true);
      
      if ($enviado) {
          include '../../config/config.inc.php';
          include '../../classes/CartRule.php';

           $existCopoun = Db::getInstance()->executeS("
          SELECT COUNT(pc.id) as registe FROM `sp_pacman_coupon` as pc
          inner join `sp_cart_rule` cr on pc.`id_cart_rule` = cr.`id_cart_rule`
          where  cr.`quantity` = 1 and cr.`date_to` >= '".$date_add."' and ( pc.`ip_client` = '".$ip_client[1]."' or pc.`email` = '".$mailuseras[1]."')");

         if($existCopoun[0]['registe']<1){
            Db::getInstance()->execute("
            INSERT INTO `sp_cart_rule` ( `id_customer`, `date_from`, `date_to`, `description`, `quantity`, `quantity_per_user`, `priority`, `partial_use`, `code`, `minimum_amount`, `minimum_amount_tax`, `minimum_amount_currency`, `minimum_amount_shipping`, `country_restriction`, `carrier_restriction`, `group_restriction`, `cart_rule_restriction`, `product_restriction`, `shop_restriction`, `free_shipping`, `reduction_percent`, `reduction_amount`, `reduction_tax`, `reduction_currency`, `reduction_product`, `reduction_exclude_special`, `gift_product`, `gift_product_attribute`, `highlight`, `active`, `date_add`, `date_upd`) VALUES
            (0, '".$date_from."', '".$date_to."', 'Pacman', 1, 1, 1, 1, '".$code."', '0.00', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '".$decryptReduc."', '0.00', 0, 1, 0, 0, 0, 0, 0, 1, '".$date_add."', '".$date_add."');");
            $id_ps_cart_rule = Db::getInstance()->Insert_ID();
            Db::getInstance()->execute("
            INSERT INTO `sp_cart_rule_lang` (`id_cart_rule`, `id_lang`, `name`) VALUES
            (".$id_ps_cart_rule.", 1, '". ($name[1] != "0" ?  "Félicitations au Hall of Fame ".$name[1].". Code Pacman" : "Code Pacman" )."');");

            Db::getInstance()->execute("
            INSERT INTO `sp_pacman_coupon` (`email`,`score`,`code`,`precentage`,`date`,`id_cart_rule`,`time`,`ip_client`) VALUES
            ('".$mailuseras[1]."','".$score[1]."','".$code."','".$decryptReduc."','".$date_add."',".$id_ps_cart_rule.",".$timeplay[1].",'".$ip_client[1]."');");
          }



          echo "E-mail enviado com sucesso!";
      } else {
          echo "Não foi possível enviar o e-mail.";
          exit;
      }
  }

}




?>