<?php 
ob_start();
session_start();
try{
	$date     = $_REQUEST["date"];
	// $name 	  = $_REQUEST["name"];
	// $short 	  = $_REQUEST["short"];
	// $location = $_REQUEST["location"];
	// $start    = $_REQUEST["start"];
	// $end      = $_REQUEST["end"];
	// $intro 	  = $_REQUEST["intro"];
	$no 	  = $_REQUEST["no"];
	echo $date."<br>";
	// echo $name."<br>";
	// echo $short."<br>";
	// echo $location."<br>";
	// echo $start."<br>";
	// echo $end."<br>";
	// echo $intro."<br>";
	echo $no."<br>";
	require_once("php/connectBooks.php");
	$sql = "update activity set activity_date = :activity_date
				where activity_no = :no;";
	$activity = $pdo->prepare($sql);
	$activity -> bindParam(":activity_date",$date);
	// $activity -> bindParam(":activity_name",$name);
	// $activity -> bindParam(":activity_short_name",$short);
	// $activity -> bindParam(":activity_location",$location);
	// $activity -> bindParam(":activity_start_time",$start);
	// $activity -> bindParam(":activity_end_time",$end);
	// $activity -> bindParam(":activity_intro",$intro);
	$activity -> bindParam(":activity_no",$no);
	$activity -> execute();
	echo "修改成功!<br>返回<a href='back_activity.php'>管理介面</a>";
	header("Refresh:3;url=back_activity.php");
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>	