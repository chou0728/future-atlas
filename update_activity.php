<?php 
ob_start();
session_start();
try{
	$date     = substr($_REQUEST["date"],4,2);
	$name 	  = $_REQUEST["name"];
	$short 	  = $_REQUEST["short"];
	$location = $_REQUEST["location"];
	$start    = $_REQUEST["start"];
	$end      = $_REQUEST["end"];
	$intro 	  = $_REQUEST["intro"];
	$no 	  = $_REQUEST["no"];
	echo $date."<br>";
	echo $name."<br>";
	echo $short."<br>";
	echo $location."<br>";
	echo $start."<br>";
	echo $end."<br>";
	echo $intro."<br>";
	echo $no."<br>";
	require_once("php/connectBooks.php");
	$sql = "update activity set activity_date = :activity_date, activity_name = :activity_name, activity_short_name = :activity_short_name, activity_location = :activity_location, activity_start_time = :activity_start_time, activity_end_time = :activity_end_time, activity_intro = :activity_intro where activity_no = :no;";
	$activity = $pdo->prepare($sql);
	$activity -> bindParam(":activity_date",$date);
	$activity -> bindParam(":activity_name",$name);
	$activity -> bindParam(":activity_short_name",$short);
	$activity -> bindParam(":activity_location",$location);
	$activity -> bindParam(":activity_start_time",$start);
	$activity -> bindParam(":activity_end_time",$end);
	$activity -> bindParam(":activity_intro",$intro);
	$activity -> bindParam(":no",$no);
	$activity -> execute();
	
	$_SESSION["update_successfully"] = true;
	header("location:back_activity.php");
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>	