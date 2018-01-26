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

			// header("location:back_check_facility_tickets.php");

				//========= 判斷從哪裡進來的 =========

				// $path = $_SERVER["HTTP_REFERER"];
				
				// $path_arr = pathinfo($path);
				// $filename = $path_arr["basename"];
					if(isset($_REQUEST["filename"])){
						if($_REQUEST["filename"] == "back_check_faci"){//直接點back_check_facility_tickets.php

							header("location:back_check_facility_tickets.php?qr=0");


						}else if($_REQUEST["filename"] == "back_check_theater"){//直接點back_check_theater_tickets.php
							header("location:back_check_theater_tickets.php?qr=0");


						}else{//都不是的話預設去設施管理頁面
							header("location:back_facilityM.php");
						}

					}else{
						header("location:back_facilityM.php");
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