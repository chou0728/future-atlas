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
			$_SESSION["manager_id"] = $managerRow->manager_id;
			$_SESSION["manager_name"] = $managerRow->manager_name;
			$_SESSION["password"] 	  = $managerRow->password;
			$_SESSION["top_manager"]  = $managerRow->top_manager;
<<<<<<< HEAD
			echo $_SESSION["manager_id"];
			echo $_SESSION["manager_name"];
			echo $_SESSION["password"];
			echo $_SESSION["top_manager"];
			header("location:back_check_facility_tickets.html");
=======
			Header("location:back_check_facility_tickets.html");
>>>>>>> 17efe2f858f31be78a15c3a31bd805492a19795c
		}else{
			$_SESSION["banned"] = 1;
			header("location:manager_login.php");

		}
	}else{
		echo "<script>alert('管理員帳密錯誤。');</script>";
		// Header("refresh:3;url=manager_login.php");
	}

} catch (Exception $ex) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}


?>