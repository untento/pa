<?php session_start(); ?>
<!DOCTYPE html>
<html lang="uk">

    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

        <style>
            html {
                height: 100%;
            }

            body {
                min-height: 100%;
                position: relative;
            }

            .parent {
                width: 100%;
                height: 100%;
                position: relative;
                margin-top: 0;
                left: 0;
                overflow: auto;
                padding-bottom: 60px;
            }

            .block {
                padding: 5px 5px 20px 5px;
                width: 80%;
                height: auto;
                margin: auto;
                text-align: justify;
                font-size: 12pt;
            }

            .lines {
                margin: 10px;
            }

            #footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 30px;
                background-color: #f5f5f5;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Blog</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(!isset($_SESSION['id'])): ?>
                        <a href="signIn.php" class="btn btn-default navbar-btn">Авторизуватися</a>
                        <?php else: ?>
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