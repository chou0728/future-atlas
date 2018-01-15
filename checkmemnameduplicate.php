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
	$mem_name = $_REQUEST["mem_name"];
	require_once("php/connectBooks.php");
	$sql = "select * from member where mem_name = :mem_name";
	$member = $pdo -> prepare($sql);
	$member -> bindParam(":mem_name",$mem_name);
	$member -> execute();
	if( $member->rowCount() !=0 ){
		echo "<script>alert('已經有人使用這個帳號囉');</script>";
	}
} catch (Exception $ex) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
</script>
</body>
</html>