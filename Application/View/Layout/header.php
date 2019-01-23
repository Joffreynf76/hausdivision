<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= PUB_PATH?>/public/css<?= DIRSEP;?>appView.css" media="screen,projection"/>


</head>
<body>
<header>
    <nav class="navigation">
        <div class="navigation__logo">
            Logo
        </div>
        <div class="navigation__Register">
            <?php
            if(isset($_SESSION['idUser'])){
                ?>
                <a href="<?=PUB_PATH?>/User/profil">Profil</a><span>&nbsp;|&nbsp;</span>
                <a href="<?=PUB_PATH?>/User/logout">Logout</a>
            <?php
            }else {
                ?>
                <a id="registerBtn" href="#">Sign Up</a>
                <span>&nbsp;|&nbsp;</span>
                <a id="signinBtn" href="#">Sign In</a>
            <?php
            }
            ?>

        </div>
    </nav>

    <div id="modalRegister">
        <div class="modalRegister__content">
            <div class="contentBox_modifier">
                <form method="POST" action="<?=PUB_PATH?>/User/register">
                    <input class="formInput" type="text" name="nameUser" id="name" placeholder="Name">
                    <input class="formInput" type="text" name="firstnameUser" id="firstname" placeholder="Firstname">
                    <input class="formInput" type="text" name="emailUser" id="email" placeholder="Email">
                    <input class="formInput" type="text" name="passwordUser" id="password" placeholder="Password">
                    <input type="submit" name="register" class="submitBtn">
                    <input type="button" id="cancelRegBtn" value="cancel">
                </form>
            </div>
        </div>
    </div>

    <div id="modalSignin">
        <div class="modalSignin__content">
            <div class="contentBox_modifier">
                <form method="POST" action="<?=PUB_PATH?>/User/login">
                    <input class="formInput" type="text" name="emailUser" id="email" placeholder="Email">
                    <input class="formInput" type="password" name="passwordUser" id="password" placeholder="Password">
                    <input type="submit" name="login" class="submitBtn">
                    <input type="hidden" name="verifLogin">
                    <input type="button" id="cancelSigninBtn" value="cancel">
                </form>
            </div>
        </div>
    </div>
</header>
