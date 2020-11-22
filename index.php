<!doctype html>
<html lang="en">
<head>
<?php   $title = 'Главная';
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
                <button class="btn btn-primary" id="PlayBtn">Играть!</button>
                <canvas id="game" width="608" height="608" class="hide img-thumbnail"></canvas>
            </div>
    </div>
    <?php require_once 'blocks/footer.php'; ?>
</div>


<?php require_once 'blocks/modal.php'; ?>

<script src="fetch.js"></script>
<script src="js/snake.js"></script>
</body>
</html>