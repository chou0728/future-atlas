<?php
ob_start();
session_start();
try {
	$activity_name       = $_REQUEST["activity_name"];
	$activity_short_name = $_REQUEST["activity_short_name"];
	$activity_location   = $_REQUEST["activity_location"];
	$activity_date       = $_REQUEST["activity_date"];
	$activity_start_time = $_REQUEST["activity_start_time"];
	$activity_end_time   = $_REQUEST["activity_end_time"];
	$activity_intro      = $_REQUEST["activity_intro"];
	require_once("php/connectBooks.php");
	$sql = "insert into activity (activity_name,activity_short_name,activity_location,activity_date,activity_start_time,activity_end_time,activity_intro) values(:activity_name,:activity_short_name,:activity_location,:activity_date,:activity_start_time,:activity_end_time,:activity_intro);";

	$activity = $pdo -> prepare($sql);
	$activity -> bindParam(":activity_name",$activity_name);
	$activity -> bindParam(":activity_short_name",$activity_short_name);
	$activity -> bindParam(":activity_location",$activity_location);
	$activity -> bindParam(":activity_date",$activity_date);
	$activity -> bindParam(":activity_start_time",$activity_start_time);
	$activity -> bindParam(":activity_end_time",$activity_end_time);
	$activity -> bindParam(":activity_intro",$activity_intro);
	$activity -> execute();
	echo "新增成功!<br>返回<a href='back_activity.php'>管理介面</a>";
	header("Refresh:3;url=back_activity.php");
} catch (Exception $ex) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
</script>
</body>
</html>