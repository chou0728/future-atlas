<?php 
ob_start();
session_start();
try{
	require_once("php/connectBooks.php");
	$sql = "select * from activity";
	$activity = $pdo->query($sql);
	$activityRow = $activity->fetchObject();
	
    echo $activityRow->activity_no."<br>";
    echo $activityRow->activity_name."<br>";
    echo $activityRow->activity_short_name."<br>";
    echo $activityRow->activity_location."<br>";
    echo $activityRow->activity_date."<br>";
    echo $activityRow->activity_start_time."<br>";
    echo $activityRow->activity_end_time."<br>";
    echo $activityRow->activity_intro."<br>";
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>