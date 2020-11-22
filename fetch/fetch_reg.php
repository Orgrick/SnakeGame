<?php
$name = trim(filter_var($_POST['name'],FILTER_SANITIZE_STRING));
$login = trim(filter_var($_POST['login'],FILTER_SANITIZE_STRING));
$password = trim(filter_var($_POST['password'],FILTER_SANITIZE_STRING));

$error = '';
if(strlen($name) <= 3) $error = 'Длина имени должна быть более 3-х символов';
else if(strlen($login) <= 3) $error = 'Длина логина должна быть более 3-х символов';
else if(strlen($password) <= 3) $error = 'Длина пароля должна быть более 3-х символов';

if($error != ''){
    echo $error;
    exit();
}

require_once '../dbConnect.php';

$sql = "SELECT COUNT(login) as count FROM `users` WHERE login = :login";
$query = $pdo->prepare($sql);
$query->execute(['login' => $login]);
$res = $query->fetch(PDO::FETCH_OBJ);
if($res->count == 1){
    echo "Пользователь с таким логином уже существует";
}else{
    $sql = 'INSERT INTO users(name,login,password) VALUES(?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute([$name,$login,$password]);
    echo "Готово";
}
?>