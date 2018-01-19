<?php
ob_start();
session_start();
$pre_url=$_SERVER['HTTP_REFERER'];
?>
<!DOCTYPE html>
<!-- <html lang="en"> -->
<head>
<title>跳轉首頁</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>
<body>
<?php
try {
	require_once("php/connectBooks.php");
	$sql = "select * from member where mem_name = :mem_name and password = :password";
	$mem_name = $_REQUEST["memName"];
	$mem_psw = $_REQUEST["memPsw"];
	$member = $pdo -> prepare($sql);
	$member -> bindParam(":mem_name",$mem_name);
	$member -> bindParam(":password",$mem_psw);
	$member -> execute();

	if( $member->rowCount() !=0 ){
		$memRow = $member->fetchObject();
		$_SESSION["mem_id"] = $memRow->mem_id;
        $_SESSION["mem_nick"] = $memRow->mem_nick;
        $_SESSION["mem_mail"] = $memRow->mem_mail;
        $_SESSION["mem_phone"] = $memRow->mem_phone;
        $_SESSION["mem_points"] = $memRow->mem_points;
        unset($_SESSION["login_error"]);
        header("location:$pre_url");
	}else{
		$_SESSION["login_error"] = 0;
		header("location:$pre_url");
	}
} catch (Exception $ex) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
</script>
</body>
</html>