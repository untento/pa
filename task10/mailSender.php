<?php

use PHPMailer\PHPMailer\PHPMailer;
require "vendor/autoload.php";

// $shuffleData = [0 => ['bla@bla.com', 'Бум', 'Борис', 'Борисович'],
// 1 => ['bla@bla.com', 'Бім', 'Павло', 'Павлович']];

// foreach ($shuffleData as $key => $value) {
// 	if ($key == count($shuffleData)-1) {
// 		$file = fopen("$value[1]_$value[2]_$value[3].txt", "wb");
// 		fwrite($file, $shuffleData[0][1]." ".$shuffleData[0][2]." ".$shuffleData[0][3]);
// 		fclose($file);
// 	} else {
// 		$file = fopen("$value[1]_$value[2]_$value[3].txt", "wb");
// 		fwrite($file, $shuffleData[$key+1][1]." ".$shuffleData[$key+1][2]." ".$shuffleData[$key+1][3]);
// 		fclose($file);
// 	}
// }

foreach ($shuffleData as $key => $value) {
	$adress = $shuffleData[$key][0];
	$name = $shuffleData[$key][2];
	$file = $shuffleData[$key][1]."_".$shuffleData[$key][2]."_".$shuffleData[$key][3].".txt";

	$mail = new PHPMailer();
	$mail->CharSet = "utf-8";
	$mail->setFrom("santa@sender.com", "Santa");
	$mail->addAddress($adress, "");
	$mail->Subject = "Таємний санта";
	$mail->msgHTML("Привіт $name! У вкладенні ти знайдеш імʼя людини, для якої ти маєш підготувати подарунок :)");
	$mail->addAttachment($file, $file);
	$mail->send();
	unlink($file);
}
?>