<?php
// видалення символів переносу рядка з тексту переданого через POST
$arr = str_replace("\n", " ", $_POST["input"]);
// створення массиву із розділенням по пробілу
$arrFormat = explode(" ", $arr);

print_r($arrFormat);
echo "<br><br>";

$arrGood=[];
// cтворення массиву формату [email=>[lastName, name, patronymic]
foreach ($arrFormat as $key => $value) {
	if ((int)$key%4==0) {
		$index = $value;
		$arrGood[$index]=[];
	} else {
		array_push($arrGood[$index], $value);
	}
}

// перетворення массиву формату [email=>[lastName, name, patronymic] до формату [email=>fullName]
foreach ($arrGood as $key => $value) {
	$arrGood[$key]=implode(" ", $arrGood[$key]);
}

print_r($arrGood);
echo "<br><br>";

$arrAssoc = shuffle_assoc( $arrGood ); 
// функція перемішування массиву
function shuffle_assoc($array) 
{ 
   $keys = array_keys($array); 
   shuffle($keys); 
   return array_merge(array_flip($keys) , $array); 
}
print_r($arrAssoc);
echo "<br><br>";
?>