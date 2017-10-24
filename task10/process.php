<?php
// створення масиву формату [ 0 => email прізвище ім'я по-батькові]
$arrFormat = explode("\n", $_POST["input"]);

print_r($arrFormat);
echo "<br><br>";

// перемішування массиву
$arrAssoc = shuffle_assoc($arrFormat); 
function shuffle_assoc($array) {
	$keys = array_keys($array);
	shuffle($keys);
	foreach($keys as $key => $value) {
		$new[$key] = $array[$value];
    }
    $array = $new;
    return $array;
}

print_r($arrAssoc);
echo "<br><br>";

// створення масиву формату [ 0 => [email, прізвище, ім'я, по-батькові]]
foreach ($arrAssoc as $key => $value) {
	$arrAssoc[$key]=explode(" ", trim($arrAssoc[$key]));
}

var_dump($arrAssoc);
echo "<br><br>";

// створення і запис інформації у файли
foreach ($arrAssoc as $key => $value) {
	if ($key == count($arrAssoc)-1) {
		$file = fopen("$value[1]_$value[2]_$value[3].txt", "w");
		fwrite($file, $arrAssoc[0][1]." ".$arrAssoc[0][2]." ".$arrAssoc[0][3]);
		fclose($file);
	} else {
		$file = fopen("$value[1]_$value[2]_$value[3].txt", "w");
		fwrite($file, $arrAssoc[$key+1][1]." ".$arrAssoc[$key+1][2]." ".$arrAssoc[$key+1][3]);
		fclose($file);
	}
}


// function shuffle_assoc($array) 
// { 
//    $keys = array_keys($array); 
//    shuffle($keys); 
//    return array_merge(array_flip($keys) , $array); 
// }

//https://habrahabr.ru/sandbox/4875/
?>