<?php
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
function email($assunto, $texto, $destinatario, $cc = null, $anexos = null)
{
    require_once(dirname(__FILE__) . "/phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'cp156.webserver.pt';
    $mail->SMTPAuth = true;
    $mail->Username = 'logs@aluclass.pt';
    $mail->Password = 'd)81$$AFX7*Z';                          // SMTP password
    $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                              // TCP port to connect to
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('logs@aluclass.pt', '');

    $mail->addAddress($destinatario);
    $mail->addCC($cc);
    $mail->addAttachment($anexos);


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

