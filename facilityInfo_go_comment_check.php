<?php
ob_start();
session_start();
?>
<?php
try {
	require_once("connectBooks.php");
	$facility_no = $_REQUEST["facility_no"];
	if($_REQUEST["mem_id"]!=0){
			$sql = "select facility_no from facility_comment where mem_id=:mem_id";
			$check = $pdo->prepare( $sql );
			$check->bindValue(":mem_id" , $_REQUEST["mem_id"]);
			while($checkRow = $check->fetchObject()){
				$sql = "select facility_no from facility where ticket_already = 1";
				$is_ticket = $pdo->prepare( $sql );
				$is_ticket

				if($checkRow->facility_no == $facility_no){

				}
			}
	}else{
		$_SESSION["no_login"];
	}
	

}catch{

}






?>