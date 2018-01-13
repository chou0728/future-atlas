<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=futureatlas;charset=utf8";
	$user = "david";
	$psw = "root";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user,$psw, $options );
?>