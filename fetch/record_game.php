<?php
$_POST = json_decode( file_get_contents("php://input"), true );
$score = $_POST['score'];
$time = $_POST['time'];
require_once '../dbConnect.php';
if(!$_COOKIE['login']){
    echo "notAuth";
    exit();
}else{
    $sql = "SELECT user_id from users WHERE login = :login";
    $query = $pdo->prepare($sql);
    $query->execute(['login' => $_COOKIE['login']]);

    $user_id = $query->fetch(PDO::FETCH_OBJ);
    $user_id = $user_id->user_id;

    $sql = "INSERT INTO `ratings` (`user_id`, `score`, `date`, `time`) VALUES (?,?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([$user_id,$score,date('d-m-Y'),$time]);
    echo "OK";
}

?>