<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php



try {
	require_once("connectBooks.php");

	switch($_FILES["facility_tphoto"]["error"]){
	case UPLOAD_ERR_OK:	
		$dir = "img/facilityInfo/";
		if( file_exists($dir)===false){ //make directory
			mkdir( $dir );
		}
		$from = $_FILES["facility_tphoto"]["tmp_name"];
		$to = $dir . $_FILES["facility_tphoto"]["name"];//
		if(copy( $from, $to) ){

//--------
			if(isset($_REQUEST["facility_no"])===false){
				echo"新增";

			}else if($_REQUEST["ticket_already"]==3){
					$sql="update facility set facility_tphoto=:facility_tphoto,
	                          facility_intro=:facility_intro, 
	                          full_fare=:full_fare,
	                          half_fare=:half_fare where facility_no=:facility_no";

						$products = $pdo->prepare( $sql );
						$products->bindValue(":facility_no" , $_REQUEST["facility_no"]);
						$products->bindValue(":facility_tphoto" , $_FILES["facility_tphoto"]["name"]);
						$products->bindValue(":facility_intro" , $_REQUEST["facility_intro"]);
						$products->bindValue(":full_fare" , $_REQUEST["full_fare"]);
						$products->bindValue(":half_fare" , $_REQUEST["half_fare"]);
						$products->execute();
		
						$_SESSION["session"] = "ticket";
						echo "異動成功<br>";
						header("location:back_facilityM.php");
			}
			
//--------		
		}else{
			echo "上傳失敗<br>";
		}	
		break;
	case 1:
		echo "上傳檔案太大, 不可超過" , ini_get("upload_max_filesize") , "<br>"; //ini_get
		break;
	case 2:
		echo "上傳檔案太大, 不可超過" , $_POST["MAX_FILE_SIZE"] , "<br>"; //ini_get
		break;	
	case 3:
		echo "上傳檔案不完整<br>";
		break;	
	case 4:
			if($_REQUEST["ticket_already"]==3){
					$sql="update facility set facility_intro=:facility_intro, 
	                          full_fare=:full_fare,
	                          half_fare=:half_fare where facility_no=:facility_no";

						$products = $pdo->prepare( $sql );
						$products->bindValue(":facility_no" , $_REQUEST["facility_no"]);
						$products->bindValue(":facility_intro" , $_REQUEST["facility_intro"]);
						$products->bindValue(":full_fare" , $_REQUEST["full_fare"]);
						$products->bindValue(":half_fare" , $_REQUEST["half_fare"]);
						$products->execute();
		

						echo "異動成功<br>";
						$_SESSION["session"] = "ticket";
						header("location:back_facilityM.php");
			}else if($_REQUEST["ticket_already"]==0||$_REQUEST["ticket_already"]==1){
				echo "4-2";
				$sql="update facility set ticket_already=:ticket_already where facility_no=:facility_no";
				$products = $pdo->prepare( $sql );
				$products->bindValue(":facility_no" , $_REQUEST["facility_no"]);
				$products->bindValue(":ticket_already" , $_REQUEST["ticket_already"]);
				$products->execute();
				header("location:back_facilityM.php");
			}
		// echo "尚未挑選檔案";
		break;
	default:
	    echo "error code : " , $_FILES["facility_tphoto"]["error"] , "<br>";
	}
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}

?>
</body>
</html>