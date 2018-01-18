<?php
ob_start();
session_start();
// $pre_url=$_SERVER['HTTP_REFERER'];
?>
<!DOCTYPE html>
<head>
<title>跳轉首頁</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>
<body>
<?php
try {
	$mem_nick = $_REQUEST["mem_nick"];
	$password = $_REQUEST["password"];
	$mem_name = $_REQUEST["mem_name"];
	$mem_mail = $_REQUEST["mem_mail"];
	$mem_phone = $_REQUEST["mem_phone"];
	require_once("php/connectBooks.php");
	$sql = "insert into member (mem_nick, password, mem_name, mem_mail, mem_phone)
values( :mem_nick,:password,:mem_name,:mem_mail,:mem_phone);";

	$member = $pdo -> prepare($sql);
	$member -> bindParam(":mem_nick",$mem_nick);
	$member -> bindParam(":password",$password);
	$member -> bindParam(":mem_name",$mem_name);
	$member -> bindParam(":mem_mail",$mem_mail);
	$member -> bindParam(":mem_phone",$mem_phone);
	$member -> execute();
	$_SESSION["log_register"] = 1;
	$_SESSION["mem_id"] = $pdo->lastInsertId();
	header("location:====index.php");
} catch (Exception $ex) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
</script>
</body>
</html>