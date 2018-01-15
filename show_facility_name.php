<?php 
ob_start();
session_start();
try{
	$facility_no = $_REQUEST["facility_no"];
	require_once("php/connectBooks.php");
	$sql = "select * from facility where facility_no = :facility_no";
	$facility = $pdo->prepare($sql);
	$facility -> bindValue(":facility_no",$facility_no);
	$facility -> execute();

	if( $facility->rowCount() !=0 ){
	    $facility_row = $facility->fetchObject();
		//找到設施
        // $_SESSION["mem_id"] = $facility_row->facility_name;
	    echo $facility_row->facility_name;
	}
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>