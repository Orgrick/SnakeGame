<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Snake!</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Главная</a>
        <a class="p-2 text-dark" href="leaderboard.php">Доска почета</a>
    </nav>
    <?php
    if(!isset($_COOKIE['login'])):
        ?>
        <a class="btn btn-outline-primary m-2" href="authentication.php">Войти</a>
        <a class="btn btn-success" href="registration.php">Регистрация</a>
    <?php
    else:
        ?>
        <a class="btn btn-success" href="authentication.php">Игровой профиль</a>
    <?php
    endif;
    ?>
</div>