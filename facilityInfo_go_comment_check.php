<?php
ob_start();
session_start();
unset($_SESSION["no_login"]);
unset($_SESSION["is_comment"]);
unset($_SESSION["is_comment_two"]);
unset($_SESSION["no_getticket"]);
?>
<?php
// try {
// 	require_once("connectBooks.php");
// 	$facility_no = $_REQUEST["facility_no"];
// 	$mem_id = $_REQUEST["mem_id"];
// 	$sql = "select ticket_already from facility where facility_no=:facility_no";
// 	$is_ticket = $pdo->prepare( $sql );
// 	$is_ticket->bindValue(":facility_no",$facility_no);
// 	$is_ticket->execute();
// 	$is_ticketRow = $is_ticket->fetchObject();
// 	if($is_ticketRow->ticket_already==1){//判斷是否上架之設施(有賣票的)
// 		if($_REQUEST["mem_id"]!=0){//判斷是否為會員
// 			$sql = "select comment_status from facility_order_item where mem_id=:mem_id and facility_no=:facility_no";//抓是否評價過
// 			$check = $pdo->prepare( $sql );
// 			$check->bindValue(":mem_id" , $mem_id);
// 			$check->bindValue(":facility_no" , $facility_no);
// 			$check->execute();
// 			if($checkRow=$check->fetchObject()!=null){//
// 					while($checkRow=$check->fetchObject()){
// 					if(isset($checkRow->comment_status)==true&&$checkRow->comment_status==0){
// 						header("location:see_tickets.php");
// 					}else{
// 						$_SESSION["is_comment"]="1";
// 						header("location:facilityInfo.php");
// 					}
// 				}
// 			}else{
// 				$_SESSION["no_getticket"]="1";
// 				header("location:facilityInfo.php");
// 			}
			
				
// 		}else{
// 			$_SESSION["no_login"]="1";
// 			header("location:facilityInfo.php");
// 		}
// 	}else{//不是賣票的設施
// 		$all_mem_id = "";
// 		if($_REQUEST["mem_id"]!=0){//判斷是否為會員
// 			$sql = "select mem_id from facility_comment where facility_no=:facility_no";//抓是否評價過
// 			$check_two = $pdo->prepare( $sql );
// 			$check_two->bindValue(":facility_no" , $facility_no);
// 			$check_two->execute();
// 			while($check_twoRow=$check_two->fetchObject()){
// 				$all_mem_id = $all_mem_id.$check_twoRow->mem_id;
// 			}
			
// 			if(strpos("$all_mem_id","$mem_id")===false){
// 				header("location:rate_facility.php?facility_no=$facility_no&order_no=0");
// 			}else{
// 				$_SESSION["is_comment_two"]="1";
// 				header("location:facilityInfo.php");
// 			}
				
// 		}else{
// 			$_SESSION["no_login"]="1";
// 			header("location:facilityInfo.php");
// 		}
// 	}

// }catch(PDOException $e){
// 	 echo "錯誤原因 : " , $e->getMessage() , "<br>";
//      echo "錯誤行號 : " , $e->getLine() , "<br>";
// }


//============================================下面是志峰的測試，上面是Itzu原本的===========================================================




try{
	require_once("connectBooks.php");
	$facility_no = $_REQUEST["facility_no"];
	$mem_id = $_SESSION["mem_id"]; 
	$sql = "SELECT ticket_already FROM facility WHERE facility_no = :facility_no";
	$is_ticket = $pdo->prepare( $sql );
	$is_ticket->bindValue(":facility_no",$facility_no);
	$is_ticket->execute();
	$is_ticketRow = $is_ticket->fetchObject();

		//判斷是否上架之設施
		if($is_ticketRow->ticket_already==1){//有賣票的設施

				// 測試情況1：是會員，按了要買票的設施，有買過票

				require_once("connectBooks.php");
				$facility_no = $_REQUEST["facility_no"];
				$mem_id = $_SESSION["mem_id"]; //因為有登入過了，所以mem_id直接從session抓就好
			
				//有了facility_no 和 mem_id 後就可以去資料庫抓這個會員的order_no
				$sql = "SELECT order_no FROM facility_order_item WHERE facility_no = :facility_no AND mem_id = :mem_id ";
				$get_order_no = $pdo->prepare( $sql );
				$get_order_no->bindValue(":facility_no",$facility_no);
				$get_order_no->bindValue(":mem_id",$mem_id);
				$get_order_no->execute();
				$get_order_no_row = $get_order_no->fetchObject();
				$order_no = $get_order_no_row->order_no;
			
				//再導過去評價頁面
				header("location:rate_facility.php?facility_no=$facility_no&mem_id=$mem_id&order_no=$order_no");
					
				

		}else{//不賣票的設施

				//測試情況2：是會員，但按了不用買票的設施
				$facility_no = $_REQUEST["facility_no"];
				header("location:rate_facility.php?facility_no=$facility_no&order_no=0");
		}	


}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}




?>