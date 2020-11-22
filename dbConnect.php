<?php 
  $dbUser = 'root';
  $dbPassword = 'root';
  $db  = 'snake';
  $host = '127.0.0.1';
  $dsn = 'mysql:dbname='.$db.';host='.$host;
  $pdo = new PDO($dsn,$dbUser,$dbPassword);
?>