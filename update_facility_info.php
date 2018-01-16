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
		$dir = "images/";
		if( file_exists($dir)===false){ //make directory
			mkdir( $dir );
		}
		$from = $_FILES["facility_mphoto"]["tmp_name"];
		$to = $dir . $_FILES["facility_mphoto"]["name"];//
		if(copy( $from, $to) ){
			$sql="update facility set facility_name=:facility_name, 
	                          facility_mphoto=:facility_mphoto,
	                          facility_description=:facility_description, 
	                          facility_status=:facility_status,
	                          facility_crowd=:facility_crowd where facility_no=:facility_no";

						$products = $pdo->prepare( $sql );
						$products->bindValue(":facility_no" , $_REQUEST["facility_no"]);
						$products->bindValue(":facility_name" , $_REQUEST["facility_name"]);
						$products->bindValue(":facility_mphoto" , $_FILES["facility_mphoto"]["name"]);
						$products->bindValue(":facility_description" , $_REQUEST["facility_description"]);
						$products->bindValue(":facility_status" , $_REQUEST["facility_status"]);
						$products->bindValue(":facility_crowd" , $_REQUEST["facility_crowd"]);
						$products->execute();
		

		echo "異動成功<br>";
		header("location:back_facilityM.php");
		
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
		echo "尚未挑選檔案";
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
