<?php
session_start();
session_destroy();
echo 'Ви успішно вилогінились <br>';
echo '<a href="index.php">Повернутися на головну сторінку</a>';

?>