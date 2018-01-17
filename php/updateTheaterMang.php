<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>updateTheaterMang</title>

</head>
<body>
	<?php
		switch($_FILES["program_photo"]["error"]){
			case UPLOAD_ERR_OK:	
				$dir = "../img/theater_page/back/";
				if( file_exists($dir)===false){ //make directory
					mkdir( $dir );
				}
				$from = $_FILES["program_photo"]["tmp_name"];
				$to = $dir.$_FILES["program_photo"]["name"];//
				if(copy( $from, $to) ){
					echo "上傳成功<br>";
					try {

							require_once("connectBooks.php");
							$sql="update theater_program set program_name=:program_name, 
							                          program_intro=:program_intro, 
							                          program_photo=:program_photo, 
							                          program_fare=:program_fare,
							                          program_status=:program_status
							      where program_no=:program_no";
							$theater_program = $pdo->prepare( $sql );
							$theater_program->bindValue(":program_no" , $_REQUEST["program_no"]);
							$theater_program->bindValue(":program_name" , $_REQUEST["program_name"]);
							$theater_program->bindValue(":program_intro" , $_REQUEST["program_intro"]);
							$theater_program->bindValue(":program_photo" , $_FILES["program_photo"]['name']);
							$theater_program->bindValue(":program_fare" , $_REQUEST["program_fare"]);
							$theater_program->bindValue(":program_status" , $_REQUEST["program_status"]);
							$theater_program->execute();
							echo "異動成功<br>";
						} catch (Exception $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";	
						}
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
			    echo "error code : " , $_FILES["program_photo"]["error"] , "<br>";
		}
	
	?>
</body>
</html>