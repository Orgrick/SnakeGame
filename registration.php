<!doctype html>
<html lang="en">
<head>
    <?php   $title = 'Регистрация';
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
            <h4>Форма регистрации</h4>
            <form id="regForm">
                <label for="username">Ваше имя</label>
                <input type="text" name="name" id="name" class="form-control w-50" required>

                <label for="login">Логин</label>
                <input type="text" name="login" id="login" class="form-control w-50" required>

                <label for="pass">Придумайте пароль</label>
                <input type="password" name="password" id="password" class="form-control w-50" required>
                <div class="alert alert-danger mt-2 w-50" id="error_block"></div>
                <button id="reg_user" class="btn btn-success mt-5" style="display:block;margin: 0 90px">Зарегестрироваться</button>
            </form>
        </div>
    </div>
    <?php require_once 'blocks/footer.php'; ?>
</div>
<script src="fetch.js"></script>
<script src="js/registration.js"></script>
</body>
</html>