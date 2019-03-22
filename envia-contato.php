<?php
session_start();
require_once("PHPMailerAutoload.php");
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'email@gmail.com';
$mail->Password = '123456';
$mail->setFrom("felipe.viveiros@gmail.com","Teste de envio com PHP");
$mail->addAddress("felipe.viveiros@gmail.com");
$mail->Subject = "Teste de email via PHP";
$mail->msgHTML("<html>de: {$nome}<br/>emial: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()){
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar a mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}

die();