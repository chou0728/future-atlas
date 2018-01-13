<?php
ob_start();
session_start();
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
	$sql = "select * from member where mem_name = :mem_name";
	$mem_name = $_REQUEST["memName"];
	$mem_psw = $_REQUEST["memPsw"];
	$member = $pdo -> prepare($sql);
	$member -> bindParam(":mem_name",$mem_name);
	$member -> execute();

	if( $member->rowCount() !=0 ){
		$memRow = $member->fetchObject();
		echo $memRow->mem_nick, "您好，登入成功<br>！頁面將自動跳轉";
		$_SESSION["mem_id"] = $memRow->mem_id;
        $_SESSION["mem_nick"] = $memRow->mem_nick;
        echo $_SESSION["mem_id"];
        header("location:index.php");
	}else{
		echo "查無此密密，請重新登入";
		header("refresh:5; url=index.php");
	}
} catch (Exception $e) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
<script type="text/javascript">
window.onload = function(){
	
}
</script>
</body>
</html>