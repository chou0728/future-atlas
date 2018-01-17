<?php 
ob_start();
session_start();
try{
	$activity_name 		 = $_REQUEST["activity_name"];
	$activity_short_name = $_REQUEST["activity_short_name"];
	$activity_location 	 = $_REQUEST["activity_location"];
	$activity_date       = $_REQUEST["activity_date"];
	$activity_start_time = $_REQUEST["activity_start_time"];
	$activity_end_time   = $_REQUEST["activity_end_time"];
	$activity_intro 	 = $_REQUEST["activity_intro"];
	$activity_no 		 = $_REQUEST["activity_no"];
	require_once("php/connectBooks.php");
	$sql = "update activity set
				activity_name = :activity_name,
				activity_short_name = :activity_short_name,
				activity_location = :activity_location,
				activity_date = :activity_date,
				activity_start_time = :activity_start_time,
				activity_end_time = :activity_end_time,
				activity_intro = :activity_intro
				where activity_no = :activity_no;";
	$activity = $pdo->prepare($sql);
	$activity -> bindValue(":activity_name",$activity_name);
	$activity -> bindValue(":activity_short_name",$activity_short_name);
	$activity -> bindValue(":activity_location",$activity_location);
	$activity -> bindValue(":activity_date",$activity_date);
	$activity -> bindValue(":activity_start_time",$activity_start_time);
	$activity -> bindValue(":activity_end_time",$activity_end_time);
	$activity -> bindValue(":activity_intro",$activity_intro);
	$activity -> bindValue(":activity_no",$activity_no);
	$activity -> execute();
	echo "修改成功!<br>返回<a href='back_activity.php'>管理介面</a>";
	header("Refresh:3;url=back_activity.php");
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>	