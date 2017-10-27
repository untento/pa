<?php
// імпорт класів PHPMailer до глобального простору імен
use PHPMailer\PHPMailer\PHPMailer;
// підтягування автозавантажувача композера
require "vendor/autoload.php";

// прохід в циклі масиву з даними і здійснення розсилки листів з вкладеннями
foreach ($shuffleData as $key => $value) {
	$adress = $shuffleData[$key][0];
	$name = $shuffleData[$key][2];
	$file = $shuffleData[$key][1]."_".$shuffleData[$key][2]."_".$shuffleData[$key][3].".txt";

	// формування листа
	$mail = new PHPMailer();
	$mail->CharSet = "utf-8";
	// встановлення відправника
	$mail->setFrom("santa@sender.com", "Santa");
	// поточна адреса електронної скриньки отримувача
	$mail->addAddress($adress, "");
	// тема листа
	$mail->Subject = "Таємний санта";
	// текст повідомлення
	$mail->msgHTML("Привіт $name! У вкладенні ти знайдеш імʼя людини, для якої ти маєш підготувати подарунок :)");
	// додавання вкладення
	$mail->addAttachment($file, $file);
	// відправка листа
	$mail->send();
	// видалення поточного файлу
	unlink($file);
}
?>