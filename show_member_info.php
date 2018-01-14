<?php 
ob_start();
session_start();
try{
	$mem_id = $_REQUEST["mem_id"];
	require_once("php/connectBooks.php");
	$sql = "select * from member where mem_id = :memId";
	$member = $pdo->prepare($sql);
	$member -> bindValue(":memId",$mem_id);
	$member -> execute();

	if( $member->rowCount() !=0 ){
	    $memRow = $member->fetchObject();
		//登入成功，將登入者資訊寫入session
        $_SESSION["mem_id"] = $memRow->mem_id;
        $_SESSION["mem_nick"] = $memRow->mem_nick;
        $_SESSION["mem_mail"] = $memRow->mem_mail;
        $_SESSION["mem_points"] = $memRow->mem_points;
        echo $memRow->mem_nick."/";
        echo $memRow->mem_mail."/";
        echo $memRow->mem_points;
        //檢查是否從別支程式轉來
        if( isset($_SESSION["where"]) === true){
        	$to = $_SESSION["where"];
        	unset($_SESSION["where"]);
        	header("location:$to");
        }
	}else{ //查無此帳密
		echo "error";
	}
}catch(PDOException $ex){ //php error
	echo "sqlerror";
}
?>