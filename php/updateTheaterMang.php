<?php

		try {
				require_once("connectBooks.php");
				$program_no=$_POST['program_no'];
				
				$program_name=$_POST["program_name"];
				
				$program_intro=$_POST['program_intro'];
				
			//	$program_photo=$_POST['program_photo'];
				$program_fare=$_POST['program_fare'];
				
				$program_status=$_POST['program_status'];
				
				$sql="update theater_program set program_name='$program_name', 
							                          program_intro='$program_intro', 
							                       
							                          program_fare=$program_fare,
							                          program_status=$program_status
							      where program_no=$program_no";
				$theater_program = $pdo->prepare( $sql );
				$theater_program->bindValue(":program_no" , $program_no);
				$theater_program->bindValue(":program_name" , '$program_name');
				$theater_program->bindValue(":program_intro" , '$program_intro');
			//	$theater_program->bindValue(":program_photo" , '$program_photo');
				$theater_program->bindValue(":program_fare" , $program_fare);
				$theater_program->bindValue(":program_status" , $program_status);
				$theater_program->execute();
				echo "異動成功";
		} catch (Exception $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
		}
?>
