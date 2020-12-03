<!doctype html>
<html lang="en">
<head>
    <?php
    if($_COOKIE['login']){
        $title = 'Профиль игрока';
    }else{
        $title = 'Войти';
    }
    require_once 'blocks/head.php'
    ?>
</head>
<body>
<div class="page">
    <header>
        <?php require_once 'blocks/header.php'; ?>
    </header>
    <div class="container">
        <div class="content">
            <div class="col-md-12 mb-5">
                <?php
                if(!isset($_COOKIE['login'])):
                    ?>
                    <h4>Форма авторизации</h4>
                    <form id="authForm">

                        <label for="login">Логин</label>
                        <input type="text" name="login" id="login" class="form-control w-50" required>

                        <label for="pass">Пароль</label>
                        <input type="password" name="pass" id="pass" class="form-control w-50" required>
                        <div class="alert alert-danger mt-2 w-50" id="error_block"></div>
                        <button id="auth_user" class="btn btn-success mt-5" style="display:block;margin: 0 90px">Войти</button>
                    </form>
                <?php
                else:
                    ?>
                    <h2 style="text-align: center">Профиль игрока <?=$_COOKIE['login']?> <img src="img/user_icon.png" alt=""></h2>
                    <?php
                    require_once 'blocks/GameProfile.php';
                    ?>
                    <button class="btn btn-danger" id="exit_btn">Выйти</button>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
    <?php require_once 'blocks/footer.php'; ?>
</div>


<?php require_once 'blocks/modal.php'; ?>

<script src="fetch.js"></script>
<script src="js/authentication.js"></script>
</body>
</html>