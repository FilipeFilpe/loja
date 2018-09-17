<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp-mail.outlook.com'; //'smtp.gmail.com' caso o Username seja do Gmail;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'filpess@hotmail.com';
$mail->Password = '@81392996@';

$mail->SetFrom('filpess@hotmail.com', 'Filipe Sousa - Desenvolvimento Web');
$mail->addAddress('filpess@hotmail.com');
$mail->Subject = 'Email de contato da loja';
$mail->msgHTML("<html> De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem} </html>");
$mail->AltBody = "De: {$nome}\nEmail: {$email}\nMensagem: {$mensagem}";

if ($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem" . $mail->ErrorInfo;
    header("Location: contato.php");
}

die();