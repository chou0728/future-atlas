<?php 
try{
	// $activity_date = $_REQUEST["activity_date"];
	require_once("php/connectBooks.php");
	for($i=1;$i<=31;$i++){
	$sql = "select activity_short_name from activity where activity_date = :activity_date order by activity_start_time;";
	$activity = $pdo->prepare($sql);
	$activity -> bindParam(":activity_date",$i);
	$activity -> execute();
	while($activityRow = $activity->fetchColumn()){
		echo $activityRow . "<br>";
	}
	echo "|";
}
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>