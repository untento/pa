<?php session_start(); ?>
<!DOCTYPE html>
<html lang="uk">

    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!--підключення бутстрап-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--підключення ckeditor-->
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <link href="styles.css" rel="stylesheet"/>
    </head>

    <body>
        <!--хедер-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Blog</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!--відображення кнопки авторизації для гостя-->
                        <?php if(!isset($_SESSION['id'])): ?>
                        <a href="signIn.php" class="btn btn-default navbar-btn">Авторизуватися</a>
                        <?php else: ?>
                        <!--генерація меню для авторизованого користувача-->
                        <p class="navbar-text"><?php echo $_SESSION["name"];?></p>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Меню<span class="caret"></span></a>
                            <ul class="dropdown-menu"><?php require ("menu.php"); ?></ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>