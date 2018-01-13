<?php
$dsn = "mysql:host=localhost;port=3306;dbname=bd103g3;charset=utf8";
$user = "root";
$psw = "root";
$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
$pdo = new PDO( $dsn, $user, $psw, $options);
?>