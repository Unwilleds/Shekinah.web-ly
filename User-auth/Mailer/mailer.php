<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer(true);
 
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->Username = 'mkvf2005@gmail.com';
$mail->Password = 'xxx-xxx-xxx'; // Gmail Passkey
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->isHTML(true); 
return $mail;
?>
