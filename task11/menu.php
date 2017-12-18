<?php

require ("config.php");
CreateMenu($menu_list);

function CreateMenu($list) {
    foreach ($list as $key => $value) {
        echo '<li><a href='.$key.'>'.$value.'</a></li>';
    }
}

?>