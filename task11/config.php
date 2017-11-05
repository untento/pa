<?php

if (isset($_SESSION['id'])) {
	$menu_list = ["index.php" => "Головна",			  
			  "signOut.php" => "Вийти"
			 ];
} else {
	$menu_list = ["index.php" => "Головна",			  
			  "signIn.php" => "Авторизація"
			 ];
}

?>