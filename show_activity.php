<?php 
try{
	$activity_date = $_REQUEST["activity_date"];
	require_once("php/connectBooks.php");
	$sql = "select * from activity where activity_date = :activity_date;";
	$activity = $pdo->prepare($sql);
	$activity -> bindValue(":activity_date",$activity_date);
	$activity -> execute();
	

	if( $activity->rowCount() == 0 ){
    echo "本日無活動";
  	}else{
    	$activityRow = $activity->fetchAll(PDO::FETCH_ASSOC);
		$str="";
	foreach( $activityRow as $i => $data ){
	 	$str .= "<div class='showRowDiv'><span class='showRowText acTitle'>" . $data["activity_name"] . "</span>
	 			 <span class='showRowText acLoc'>" . $data["activity_location"] . "</span>
				 <span class='showRowText acTime'>" . $data["activity_start_time"] . "-" . $data["activity_end_time"] . "</span>
				 <span class='showRowText acIntro'>" . $data["activity_intro"] . "</span></div>";
	}
	echo $str;
  }	

	// while($activityRow = $activity->fetchObject()){
	// 	$info = "<div class='acTitle showRowText'>".$activityRow->activity_short_name."</div><div class='acLoc showRowText'>".$activityRow->activity_location."</div><div class='acTime showRowText'>".$activityRow->activity_start_time."-".$activityRow->activity_end_time."</div><div class='acIntro showRowText'>".$activityRow->activity_intro."</div>";
	// 	echo $activityRow->activity_short_name;
	// return "到底花生甚麼事情？";
	// }
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>	