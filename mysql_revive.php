<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>11prizeFor.php</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>

<?php 
$dsn = "mysql:host=localhost;port=3306;dbname=fa;charset=utf8";
$user = "root";
$psw = "root";

try {
	$pdo = new PDO( $dsn, $user,$psw );
	$sql = "select * from member where mem_id = 1";
	// $sql = "insert into actor(first_name, last_name, last_update) values( 'Davis', 'Alin', '2018-01-05 14:38:44');";
	$temp = $pdo->query($sql);

	while($actorRow = $temp->fetch(PDO::FETCH_ASSOC)){
?>
		<tr>
		<td><?php echo $actorRow["mem_id"] ?></td>	
		<td><?php echo $actorRow["mem_nick"] ?></td>
		</tr>
<?php		
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>

</body>
</html>