<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer();
$mail->CharSet = "utf-8";
$mail->setFrom('from@example.com', 'прівєт');
$mail->addAddress('ant.i.softgroup@gmail.com', '');
$mail->Subject = 'PHPMailer file sender';
$mail->msgHTML("My message body");
    // Attach uploaded files
$mail->addAttachment('file.txt');
// $mail->addAttachment($filename2);
$r = $mail->send();


// // mail ("ant.i.softgroup@gmail.com","test message", "test message","From:no-reply@gmail.com");

// $headers = "MIME-Version: 1.0\r\n";
//   $headers .= "Content-type: text/html; charset=utf-8\r\n";
//   $headers .= "From: ololo <lol@lalka.com>\r\n";
//   $title = 'Дарова братіш';

// $email = 'shakh.softgroup@gmail.com';
// $text =  'Короче заробила нарешті ця відправка';

//   if ( mail( $email, $title, $text, $headers ) ){
//     echo "good";
//   }else{
// exit('bad');
// }
?>