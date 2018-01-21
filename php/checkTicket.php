<?php 
	$programName=$_POST['programName'];
	//日期
	$programDate=$_POST['programDate'];
	//場次
	$programTime=$_POST['programTime'];
	//數量
	
	try {
		require_once("connectBooks.php");
		//$programName'是字串需要引號
		//用節目名稱program_name，去 theater_program查節目編號program_no
		$sql ="select * from theater_program where program_name='$programName'";
		$theater_program = $pdo->query( $sql );
		if( $theater_program->rowCount()==0){
			echo "<center>查無此節目資料</center>";
		}else{
			$prodRow = $theater_program->fetchObject();
			$program_no = $prodRow->program_no;
		}
		//用日期programDate、節目編號program_no、場次時間programTime，去theater_session_list查場次編號session_no
		$sql ="select * from theater_session_list where program_no=$program_no AND time_date='$programDate' AND session_time='$programTime'";
		$theater_session_list = $pdo->query( $sql );
		$theater_session_list -> bindValue(":program_no",$prodRow->program_no);
		$theater_session_list -> bindValue(":time_date",'$programDate');
		$theater_session_list -> bindValue(":session_time",'$programTime');
		$theater_session_list-> execute();
		if( $theater_session_list->rowCount()==0){
			echo "<center>查無此場次資料</center>";
		}else{
			$prodRow = $theater_session_list->fetchObject();
			$session_no = $prodRow->session_no;
			$last_ticket = $prodRow->last_ticket;			
		}	 	
		echo json_encode($last_ticket);
	} catch (PDOException $e) {
		echo "錯誤行號 : ", $e->getLine(), "<br>";
	    echo "錯誤訊息 : ", $e->getMessage(), "<br>";	
	}
?>
