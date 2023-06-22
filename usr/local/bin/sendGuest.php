<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require '/var/www/signup.academy-network.pp.ua/vendor/autoload.php';

date_default_timezone_set('Europe/Kyiv');
$currentDate = date('d.m.Y H:i:s');
$new_password = $argv[1];
$data = "Був сгенерований новий щоденний пароль користувача Guest!\r\n\r\nЛогін: Guest\r\nПароль: $new_password \r\n";


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Encoding = 'base64';
$mail->CharSet = "UTF-8";
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = 'academy.ssu.pp.ua@gmail.com';
$mail->Password = 'fuiptnaqyilnpjvz';
$mail->setFrom('academy.ssu.pp.ua@gmail.com', 'Адміністратор мережі Академіїї');
$mail->addReplyTo('academy.ssu.pp.ua@gmail.com', 'Адміністратор мережі Академії');
$mail->AddAddress('samuel.edmund.morgan@gmail.com', 'Адміністратор пошти');
$mail->AddAddress('education@ssu.gov.ua', 'Адміністратор пошти');
$mail->Subject = "$currentDate був сгенерований новий щоденний пароль користувача Guest!";
$mail->Body    = "$data";
$mail->SMTPDebug = 0;
$mail->send();

?>
