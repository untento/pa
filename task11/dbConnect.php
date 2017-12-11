<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$dbName = "blog";
$dbUser = "root";
$dbPass = "1111";

$dbLink = mysqli_connect("localhost", $dbUser, $dbPass, $dbName);
mysqli_query($dbLink,"SET NAMES 'utf8'"); 
mysqli_query($dbLink,"SET CHARACTER SET 'utf8'");
mysqli_query($dbLink,"SET SESSION collation_connection = 'utf8_general_ci'");

?>
