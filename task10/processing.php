<?php
// створення масиву формату [ 0 => email прізвище ім'я по-батькові]
$inputData = explode("\n", $_POST["input"]);

// перемішування массиву
$shuffleData = shuffle_assoc($inputData); 
function shuffle_assoc($array) {
	$keys = array_keys($array);
	shuffle($keys);
	foreach($keys as $key => $value) {
		$new[$key] = $array[$value];
	}
	$array = $new;
	return $array;
}

// перетворення масиву у формат [ 0 => [email, прізвище, ім'я, по-батькові]]
foreach ($shuffleData as $key => $value) {
	$shuffleData[$key]=explode(" ", trim($shuffleData[$key]));
}

// створення і запис інформації у файли
foreach ($shuffleData as $key => $value) {
	if ($key == count($shuffleData)-1) {
		$file = fopen("$value[1]_$value[2]_$value[3].txt", "wb");
		fwrite($file, $shuffleData[0][1]." ".$shuffleData[0][2]." ".$shuffleData[0][3]);
		fclose($file);
	} else {
		$file = fopen("$value[1]_$value[2]_$value[3].txt", "wb");
		fwrite($file, $shuffleData[$key+1][1]." ".$shuffleData[$key+1][2]." ".$shuffleData[$key+1][3]);
		fclose($file);
	}
}

// якщо вибрано інформування по email, то здійснюється розсилка
if ($_POST["email"] == "1") {
	// розкоментувати для увімкнення функціі інформування по email
	// require "mailSender.php"; 
	echo "Листи успішно відправлено!";
} else {
	echo "Список файлів успішно створено!";
}

?>