<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"));

$nome		= $data->nome;
$email		= $data->email;
$mensagem	= $data->msg;

$response = new stdClass();

$msg 		= "Nome: $nome\n\n
               E-mail: $email\n\n
               Mensagem: $mensagem\n";

require_once("mail/class.phpmailer.php");

define('GUSER', 'starvai.website@gmail.com');
define('GPWD', '@Tentativamkt2009');

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    if(!$mail->Send()) {
        $error = 'Erro: '.$mail->ErrorInfo;
        return false;
    } else {

        return true;

    }
}

if (isset($nome) && isset($email) && isset($msg)) {

    if (smtpmailer('leolenori@gmail.com', 'starvai.website@gmail.com', 'Starvai Website', 'Starvai Website | Nova mensagem de '. $nome .'', $msg)) {

        $response->success = true;
        $response->error = false;
        $response->message = 'Mensagem enviada com sucesso!';

    }

    if (!empty($error)) {

        $response->success = true;
        $response->error = false;
        $response->message = $error;

    }
    
}

echo json_encode($response);

?>
