<?php
ob_start();
session_start();

try {
	require_once("php/connectBooks.php");
	$manager_name = $_REQUEST["manager_name"];
	$password 	  = $_REQUEST["password"];
	$sql = "select * from backend_manager where manager_name = :manager_name and password = :password;";
	$manager = $pdo ->prepare($sql);
	$manager->bindValue(":manager_name",$manager_name);
	$manager->bindValue(":password",$password);
	$manager->execute();

	if( $manager->rowCount() != 0){
		$managerRow = $manager->fetchObject();
		$_SESSION["status"] = $managerRow->manager_status;
		if( $_SESSION["status"] == 1){
			// 成功登入
			$_SESSION["manager_id"] = $managerRow->manager_id;
			$_SESSION["manager_name"] = $managerRow->manager_name;
			$_SESSION["password"] 	  = $managerRow->password;
			$_SESSION["top_manager"]  = $managerRow->top_manager;
			$_SESSION["login_success"] = true;

			$order_no = $_COOKIE["order_no"];
			$facility_no = $_COOKIE["facility_no"];
			$mem_id = $_COOKIE["mem_id"];


			if(!isset($order_no) || !isset($facility_no) || !isset($mem_id) ){ //其中有一個值不存在的話 (不是從QR code那邊掃來的)

				header("location:back_facilityM.php");

			}else{//從QR code那邊掃來的
				header("location:http://140.115.236.72/demo-projects/BD103/BD103G3/back_check_facility_tickets.php?$order_no.$facility_no.$mem_id");
			}

			
		}else{
			// 停權帳號
			$_SESSION["banned"] = true;
			header("location:manager_login.php");
		}
	}else{
		// 帳密錯誤
		$_SESSION["login_error"] = true;
		Header("location:manager_login.php");
	}

} catch (Exception $ex) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}


?>