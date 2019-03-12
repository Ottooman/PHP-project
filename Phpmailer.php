<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail= new PHPMailer();

$mail->isSMTP();
$mail->Host='Smtp.mailtrap.io';
$mail->SMTPAutch=true;
$mail->Username = 'eb1b00bc95a4bc';
$mail->Password = '1d0e63084c18f2';
$mail->SMTPSecure ='tls';
$mail->Port =25;

$mail->setFrom('berkan11@live.se', 'Berkan Göker');
$mail->addReplyTo('berkan11@live.se', 'Berkan Göker');

$mail->addAddress('berkan11@live.se', 'Berkan Göker');
$mail->Subject('PHPMailer SMTP test');




