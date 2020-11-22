<?php
require_once 'dbConnect.php';
$login = $_COOKIE['login'];
//?>
<table class="table table-hover" style="text-align: center">
    <thead>
    <tr>
        <th scope="col" colspan="3" >История игр</th>
    </tr>
    <tr>
        <th scope="col">Дата</th>
        <th scope="col">Счет</th>
        <th scope="col">Время</th>
    </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT EXISTS(SELECT score FROM users JOIN ratings USING(user_id) WHERE login = :login) as res";
        $query = $pdo->prepare($sql);
        $query->execute(['login' => $login]);
        $res = $query->fetch(PDO::FETCH_OBJ);
        if($res->res == 0){
            echo "
            <tr>
                <td colspan='3'>Нет сохранненых игр, перейдите на<a class=\"p-2 text-dark\" href=\"index.php\" style='color: blue!important'>главную страницу,</a> что бы начать игру</td>
            </tr>
            ";
        }else {
            $sql = "SELECT score, date, time FROM users JOIN ratings USING(user_id) WHERE login = :login ORDER BY score DESC, time";
            $query = $pdo->prepare($sql);
            $query->execute(['login' => $login]);
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo "
            <tr>
                <td>$row->date</td>
                <td>$row->score</td>
                <td>$row->time c</td>
            </tr>
            ";
            }
        }
        ?>
    </tbody>
</table>