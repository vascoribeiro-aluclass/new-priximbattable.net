<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// include_once "./functions.php";
// include_once "../cfg/db.php";

    $csv = array();

    $dadosRAUD = array(
        "host" => "mousset.files.com",//mousset.files.com
        "usuario" => "PRIXIMBATTABLE",//PRIXIMBATTABLE
        "senha" => "NQ$3@hdb&tqSLs?g!"//NQ$3@hdb&tqSLs?g!
    );
    $fconnRAUD = ftp_ssl_connect($dadosRAUD["host"],21);
    $conn = ftp_login($fconnRAUD, $dadosRAUD["usuario"], $dadosRAUD["senha"]);
    // ftp_get_option($fconnRAUD, FTP_USEPASVADDRESS, false);
    ftp_pasv($fconnRAUD, true);
    ftp_get($fconnRAUD, "../get_raud_file/uploads/tmp/statuts.csv", "/eai/prod/raud/clients/import/PRIX38/statuts/statuts.csv", FTP_BINARY);//eai/prod/raud/clients/import/PRIX38/statuts/statuts.csv
    // var_dump(ftp_get($fconnRAUD, __DIR__."/../uploads/tmp/statuts.csv", "/eai/prod/raud/clients/import/PRIX38/statuts/statuts.csv", FTP_BINARY));
    ftp_close($fconnRAUD);

    email("Upload do Ficheiro RAUD","O ficheiro statuts.csv foi adicionado com sucesso",['miguel.costa@aluclass.pt']);



    /**
 * email
 * envia email
 *
 * @param assunto string
 * @param texto string
 * @param destinatarios array
 * @param cc string
 * @returns bool true se enviado
 *
 * @throws phpmailerException
 */
function email($assunto, $texto, $destinatarios, $cc = null, $anexos = null, $sav=null)
{
    require_once("../get_raud_file/phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer;

    /*$mail->SMTPDebug = 3;*/                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "ex4.mail.ovh.net";  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;
    $mail->Username = "reponseautomatique@priximbattable.net";              // SMTP username
    $mail->Password = "Md2022Ged!";                          // SMTP password
    $mail->SMTPSecure = "tls";                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to
    $mail->CharSet = 'UTF-8';

    $mail->setFrom("reponseautomatique@priximbattable.net", "PrixImbattable");

    foreach ($destinatarios as $email) {
        $mail->addAddress($email);
    }
    $mail->addCC($cc);
    $mail->addBCC("logs@aluclass.pt");
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $assunto;
    $mail->Body = $texto;
    $mail->AltBody = $texto;

    try {
        if (!$mail->send()) {
            //echo $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    } catch (phpmailerException $e) {
        echo $e->getMessage();
    }

    return true;
}
