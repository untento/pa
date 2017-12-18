<!--обробка форми додавання поста-->
<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// print_r($_POST);
$data = $_POST;

require 'dbConnect.php';

if (!$dbLink) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "INSERT INTO posts (user_id, post_name, post_description, post_text, date) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($dbLink, $sql);
mysqli_stmt_bind_param($stmt, "issss", $_SESSION['user_id'], $data['heading'], $data['description'], $data['text'], $curTime);
$curTime = date("Y-m-d");
mysqli_stmt_execute($stmt);
printf("Ошибка: %d.\n", mysqli_stmt_errno($stmt));
mysqli_stmt_close($stmt);
mysqli_close($dbLink);
//редірект на головну сторінку
header("Location: index.php");
?>