<?php

if (isset($_SESSION['id'])) {
	$menu_list = ["signOut.php" => "Вийти"
];
if ($_SESSION['id'] == 1) {
	$menu_list = [			  
		"addPost.php" => "Додати пост",
		"signOut.php" => "Вийти"
	];
}	
}


?>