<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// створення масиву формату [ 0 => email прізвище ім'я по-батькові]
$inputData = explode("\n", $_POST["input"]);

print_r($inputData);
echo "<br><br>";

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

print_r($shuffleData);
echo "<br><br>";

// перетворення масиву у формат [ 0 => [email, прізвище, ім'я, по-батькові]]
foreach ($shuffleData as $key => $value) {
	$shuffleData[$key]=explode(" ", trim($shuffleData[$key]));
}

var_dump($shuffleData);
echo "<br><br>";

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

if ($_POST["email"] == "1") {
	require "mailSender.php";
} else {
	echo 2;
}

// function DeleteInput($shuffleData){
// foreach ($shuffleData as $key => $value) {
// $file = $shuffleData[$key][1]."_".$shuffleData[$key][2]."_".$shuffleData[$key][3].".txt";
// unlink($file);
// }
// }
?>