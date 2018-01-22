<?php
ob_start();
session_start();
unset($_SESSION["no_login"]);
unset($_SESSION["is_comment"]);
unset($_SESSION["is_comment_two"]);
unset($_SESSION["no_getticket"]);
?>
<?php
try {
	require_once("connectBooks.php");
	$facility_no = $_REQUEST["facility_no"];
	$mem_id = $_REQUEST["mem_id"];
	$sql = "select ticket_already from facility where facility_no=:facility_no";
	$is_ticket = $pdo->prepare( $sql );
	$is_ticket->bindValue(":facility_no",$facility_no);
	$is_ticket->execute();
	$is_ticketRow = $is_ticket->fetchObject();
	if($is_ticketRow->ticket_already==1){//判斷是否上架之設施(有賣票的)
		if($_REQUEST["mem_id"]!=0){//判斷是否為會員
			$sql = "select comment_status from facility_order_item where mem_id=:mem_id and facility_no=:facility_no";//抓是否評價過
			$check = $pdo->prepare( $sql );
			$check->bindValue(":mem_id" , $mem_id);
			$check->bindValue(":facility_no" , $facility_no);
			$check->execute();
			if($checkRow=$check->fetchObject()!=null){
					while($checkRow=$check->fetchObject()){
					if(isset($checkRow->comment_status)==true&&$checkRow->comment_status==0){
						header("location:see_tickets.php");
					}else{
						$_SESSION["is_comment"]="1";
						header("location:facilityInfo.php");
					}
				}
			}else{
				$_SESSION["no_getticket"]="1";
				header("location:facilityInfo.php");
			}
			
				
		}else{
			$_SESSION["no_login"]="1";
			header("location:facilityInfo.php");
		}
	}else{//不是賣票的設施
		$all_mem_id = "";
		if($_REQUEST["mem_id"]!=0){//判斷是否為會員
			$sql = "select mem_id from facility_comment where facility_no=:facility_no";//抓是否評價過
			$check_two = $pdo->prepare( $sql );
			$check_two->bindValue(":facility_no" , $facility_no);
			$check_two->execute();
			while($check_twoRow=$check_two->fetchObject()){
				$all_mem_id = $all_mem_id.$check_twoRow->mem_id;
			}
			
			if(strpos("$all_mem_id","$mem_id")===false){
				header("location:rate_facility.php?facility_no=$facility_no&order_no=0");
			}else{
				$_SESSION["is_comment_two"]="1";
				header("location:facilityInfo.php");
			}
				
		}else{
			$_SESSION["no_login"]="1";
			header("location:facilityInfo.php");
		}
	}

}catch(PDOException $e){
	 echo "錯誤原因 : " , $e->getMessage() , "<br>";
     echo "錯誤行號 : " , $e->getLine() , "<br>";
}






?>