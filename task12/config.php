<!--генерація меню-->
<?php
//меню користувача
if (isset($_SESSION['id'])) {
    $menu_list = [
        "signOut.php" => "Вийти"];
    //меню адміна
    if ($_SESSION['id'] == 1) {
        $menu_list = [
            "addPost.php" => "Додати пост",
            "signOut.php" => "Вийти"];
    }	
}
?>