<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	
<?php 
$mem_name = $_REQUEST["memName"];
$mem_psw = $_REQUEST["memPsw"];

try {
	require_once("php/connectBooks.php");
	$sql = "select * from member where mem_name = :mem_name";
	$member = $pdo -> prepare($sql);
	$member -> bindParam(":mem_name",$mem_name);
	$member -> execute();

	if( $member->rowCount() !=0 ){
		$memRow = $member->fetchObject();
		echo $memRow->mem_nick, "您好<br>";
		$_SESSION["mem_id"] = $memRow->mem_id;
        $_SESSION["mem_nick"] = $memRow->mem_nick;
        // echo '$_SESSION["mem_id"]：'.$memRow->mem_id;
        // echo '$_SESSION["mem_nick"]：'.$memRow->mem_nick;
	}else{
		echo "查無此密密，請重新登入";
		echo $member->rowCount();
	}
} catch (Exception $e) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
<script type="text/javascript">
	var storage = localStorage;
	storage.setItem("mem_nick","<?php echo $memRow->mem_nick ?>");
</script>
</body>
</html>