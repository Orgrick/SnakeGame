<!doctype html>
<html lang="en">
<head>
    <?php   $title = 'Таблица лидеров';
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
            <table class="table table-hover" style="text-align: center">
                <thead>
                <tr>
                    <th scope="col" colspan="4" ><h2>Лучшие игроки <img src="img/leader.png" alt=""></h2></th>
                </tr>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Счет</th>
                    <th scope="col">Время</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once 'dbConnect.php';
                $sql = "SELECT name, date , MAX(score) as score, time, login FROM users JOIN ratings USING(user_id) GROUP BY user_id ORDER BY score DESC, time, date LIMIT 10";
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    if ($row->login == $_COOKIE['login']){
                        echo "
                        <tr class='bg-success' style='color: white'>
                            <td>$row->name(Вы)</td>
                            <td>$row->date</td>
                            <td>$row->score</td>
                            <td>$row->time c</td>
                        </tr>
                        ";
                    }else{
                        echo "
                        <tr>
                            <td>$row->name</td>
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
        </div>
    </div>
    <?php require_once 'blocks/footer.php'; ?>
</div>
</body>
</html>