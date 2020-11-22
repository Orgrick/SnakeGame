<?php
$login = trim(filter_var($_POST['login'],FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'],FILTER_SANITIZE_STRING));

$error = '';
if(strlen($login) <= 3) $error = 'Неверный логин';
else if(strlen($pass) <= 3) $error = 'Неверный пароль';

if($error != ''){
    echo $error;
    exit();
}

require_once '../dbConnect.php';

$sql = 'SELECT user_id FROM users WHERE login= :login && password = :pass';
$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'pass' => $pass]);

$user = $query->fetch(PDO::FETCH_OBJ);

if($user->user_id == 0) {
    echo "Неверный логин или пароль";
}
else {
    setcookie('login',$login,time()+ 3600 * 24 * 30,"/");
    echo "Готово";
}
?>