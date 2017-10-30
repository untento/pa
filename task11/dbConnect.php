<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$dbName = "blog";
$dbUser = "root";
$dbPass = "0000";

$dbLink = mysqli_connect("localhost", $dbUser, $dbPass, $dbName);

$name = "user3";
$pas = "2222";
$group_id = 3;

$sql = "INSERT INTO users (nickname, pass, group_id) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param ($stmt, "ssi", $name, $pas, $group_id);
mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);
// $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

// var_dump($row);

mysqli_stmt_close($stmt);
mysqli_close($dbLink);
?>