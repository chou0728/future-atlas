<?php 
try{
	$activity_date = $_REQUEST["activity_date"];
	require_once("php/connectBooks.php");
	$sql = "select * from activity where activity_date = :activity_date order by activity_start_time;";
	$activity = $pdo->prepare($sql);
	$activity -> bindValue(":activity_date",$activity_date);
	$activity -> execute();

	if( $activity->rowCount() == 0 ){
    	echo "本日無活動";
  	}else{
    	$activityRow = $activity->fetchAll(PDO::FETCH_ASSOC);
		$str="";
		foreach( $activityRow as $i => $data ){
		 	$str .= "<div class='showRowDiv'>
		 	<span class='showRowText acTime'>" . $data["activity_start_time"] . "-" . $data["activity_end_time"] . "</span>
		 	<span class='showRowText acLoc'>" . $data["activity_location"] . "</span>
		 	<span class='showRowText acTitle'>" . $data["activity_name"] . "</span>
			<span class='showRowText acIntro'>" . $data["activity_intro"] . "</span></div>
			|
			<tr>
				<th>" . $data["activity_start_time"] . "-" . $data["activity_end_time"] . "</th></tr>
			<tr>
				<td colspan='2'>" . $data["activity_short_name"] . "</td>
			</tr>
			|
			<span class='name'>" . $data["activity_name"] . "</span>
			<span class='time'>" . $data["activity_start_time"] . "-" . $data["activity_start_time"] . "</span>
			<span class='location'>" . $data["activity_location"] . "</span>
			<span class='intro'>" . $data["activity_intro"] . "</span>
			|";
		}
		echo $str;
	}	
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>	