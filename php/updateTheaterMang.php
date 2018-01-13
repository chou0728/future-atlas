<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>updateTheaterMang</title>

</head>
<body>
	<?php
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
		$theater_program->bindValue(":program_photo" , $_REQUEST["program_photo"]);
		$theater_program->bindValue(":program_fare" , $_REQUEST["program_fare"]);
		$theater_program->bindValue(":program_status" , $_REQUEST["program_status"]);
		$theater_program->execute();
		echo "異動成功<br>";
	} catch (Exception $e) {
		echo "錯誤原因 : " , $e->getMessage() , "<br>";
		echo "錯誤行號 : " , $e->getLine() , "<br>";	
	}
	?>
</body>
</html>