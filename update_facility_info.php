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

	switch($_FILES["facility_mphoto"]["error"]){
	case UPLOAD_ERR_OK:	
		$dir = "img/facilityInfo/";
		if( file_exists($dir)===false){ //make directory
			mkdir( $dir );
		}
		$from = $_FILES["facility_mphoto"]["tmp_name"];
		$to = $dir . $_FILES["facility_mphoto"]["name"];//
		if(copy( $from, $to) ){

//--------
			if(isset($_REQUEST["facility_no"])===false){
				echo"新增";

			}else if($_REQUEST["info_already"]==3){
					$sql="update facility set facility_name=:facility_name, 
	                          facility_mphoto=:facility_mphoto,
	                          facility_phrase=:facility_phrase,
	                          facility_heart=:facility_heart,
	                          facility_suit=:facility_suit,
	                          facility_limit=:facility_limit,
	                          facility_description=:facility_description, 
	                          facility_status=:facility_status,
	                          facility_crowd=:facility_crowd where facility_no=:facility_no";

						$products = $pdo->prepare( $sql );
						$products->bindValue(":facility_no" , $_REQUEST["facility_no"]);
						$products->bindValue(":facility_name" , $_REQUEST["facility_name"]);
						$products->bindValue(":facility_mphoto" , $_FILES["facility_mphoto"]["name"]);
						$products->bindValue(":facility_phrase" , $_REQUEST["facility_phrase"]);
						$products->bindValue(":facility_heart" , $_REQUEST["facility_heart"]);
						$products->bindValue(":facility_suit" , $_REQUEST["facility_suit"]);
						$products->bindValue(":facility_limit" , $_REQUEST["facility_limit"]);
						$products->bindValue(":facility_description" , $_REQUEST["facility_description"]);
						$products->bindValue(":facility_status" , $_REQUEST["facility_status"]);
						$products->bindValue(":facility_crowd" , $_REQUEST["facility_crowd"]);
						$products->execute();
		

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
			if($_REQUEST["info_already"]==3){
					$sql="update facility set facility_name=:facility_name, 
	                          facility_phrase=:facility_phrase,
	                          facility_heart=:facility_heart,
	                          facility_suit=:facility_suit,
	                          facility_limit=:facility_limit,
	                          facility_description=:facility_description, 
	                          facility_status=:facility_status,
	                          facility_crowd=:facility_crowd where facility_no=:facility_no";

						$products = $pdo->prepare( $sql );
						$products->bindValue(":facility_no" , $_REQUEST["facility_no"]);
						$products->bindValue(":facility_name" , $_REQUEST["facility_name"]);
						$products->bindValue(":facility_phrase" , $_REQUEST["facility_phrase"]);
						$products->bindValue(":facility_heart" , $_REQUEST["facility_heart"]);
						$products->bindValue(":facility_suit" , $_REQUEST["facility_suit"]);
						$products->bindValue(":facility_limit" , $_REQUEST["facility_limit"]);
						$products->bindValue(":facility_description" , $_REQUEST["facility_description"]);
						$products->bindValue(":facility_status" , $_REQUEST["facility_status"]);
						$products->bindValue(":facility_crowd" , $_REQUEST["facility_crowd"]);
						$products->execute();
		

						echo "異動成功<br>";
						header("location:back_facilityM.php");
			}else if($_REQUEST["info_already"]==0||$_REQUEST["info_already"]==1){
				echo "4-2";
				$sql="update facility set info_already=:info_already where facility_no=:facility_no";
				$products = $pdo->prepare( $sql );
				$products->bindValue(":facility_no" , $_REQUEST["facility_no"]);
				$products->bindValue(":info_already" , $_REQUEST["info_already"]);
				$products->execute();
				header("location:back_facilityM.php");
			}
		// echo "尚未挑選檔案";
		break;
	default:
	    echo "error code : " , $_FILES["facility_mphoto"]["error"] , "<br>";
	}
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}

?>



</body>
</html>
