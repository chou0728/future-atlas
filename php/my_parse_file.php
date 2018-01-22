<?php 
 // echo $_POST['programName'],'<br>';
 // echo $_POST['programDate'],'<br>';
 // echo $_POST['programTime'],'<br>';
 // echo $_POST['theater_quantity'],'<br>';
 // echo $_POST['theater_total'],'<br>';
 // echo $_POST['Scorenumber'],'<br>';
 // echo $_POST['CardInfo'],'<br>';
	$mem_id=$_POST['mem_id'];
	// echo $mem_id;
	$programName=$_POST['programName'];
	//日期
	$programDate=$_POST['programDate'];
	//場次
	$programTime=$_POST['programTime'];
	//數量
	$theater_quantity=$_POST['theater_quantity'];
	$theater_total=$_POST['theater_total'];
	$Scorenumber=$_POST['Scorenumber'];
	$CardInfo=$_POST['CardInfo'];

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
		$theater_session_list -> bindValue(":program_no",$program_no);
		$theater_session_list -> bindValue(":time_date",'$programDate');
		$theater_session_list -> bindValue(":session_time",'$programTime');
		$theater_session_list-> execute();
		if( $theater_session_list->rowCount()==0){
			echo "<center>查無此場次資料</center>";
		}else{
			$prodRow = $theater_session_list->fetchObject();
			$session_no = $prodRow->session_no;
		}
		//利用session_no尋找last_ticket，剩餘數量last_ticket減去數量theater_quantity
		$sql="select * from theater_session_list where session_no=".$session_no;
		$theater_session_list = $pdo->query( $sql );
		if( $theater_session_list->rowCount()==0){
			echo "<center>查無此剩餘票數資料</center>";
		}else{
			$prodRow = $theater_session_list->fetchObject();
			$prodRow->last_ticket;
			//剩餘票數減掉購買數量
			$last_ticket=$prodRow->last_ticket-$theater_quantity;
			// echo $last_ticket;
			$session_no=$prodRow->session_no ;
			$sql="update theater_session_list set last_ticket=$last_ticket
		       where session_no=$session_no";
		    $theater_session_list = $pdo->prepare( $sql );
			$theater_session_list->bindValue(":session_no" , $session_no);
			$theater_session_list->bindValue(":last_ticket" , $last_ticket);
			$theater_session_list->execute();
		}
		//預設會員ID
		$member_id=$mem_id;
		$datetime= date("Y/m/d H:i:s");
		$sql = "INSERT into theater_order_list (theater_ticket_no,session_no,mem_id,number_purchase,used_ticket,order_date,original_amount,points_discount,credit_card,program_no) values(null,?,?,?,?,?,?,?,?,?)";
			$statement = $pdo->prepare($sql);
			$statement->bindValue(1,$session_no);
			$statement->bindValue(2,$member_id);
			$statement->bindValue(3,$theater_quantity);
			$statement->bindValue(4,0);
			//strftime('%F')--->取得當日時間
			$statement->bindValue(5,$datetime);
			$statement->bindValue(6,$theater_total);
			$statement->bindValue(7,$Scorenumber);
			$statement->bindValue(8,$CardInfo);
			$statement->bindValue(9,$program_no);
			$statement->execute();
			//抓取訂單編號
			$prder_no = $pdo->lastInsertId();

		//扣掉會員積分
		$sql="select * from member where mem_id=$member_id";
		$member = $pdo->query( $sql );
		if( $member->rowCount()==0){
		 	echo "<center>查無此會員資料</center>";
		 }else{
		 	$prodRow = $member->fetchObject();
		 	$prodRow->mem_id;
		 	$mem_points = $prodRow->mem_points-$Scorenumber;
		 	$sql="update member set mem_points=$mem_points
		         where mem_id=$prodRow->mem_id";
		    $member = $pdo->prepare( $sql );
		 	$member->bindValue(":mem_id" ,$prodRow->mem_id);
		 	$member->bindValue(":mem_points" , $mem_points);
		 	$member->execute();
		 }
	 	
		?>
		<?php
			echo "購買完成! 您的訂單編號:$prder_no";
			//echo "<a href='MembersOnly.html'>會員專區</a>";
			//header("refresh:5; url=MembersOnly.html");	
		} catch (PDOException $e) {
		  echo "錯誤行號 : ", $e->getLine(), "<br>";
		  echo "錯誤訊息 : ", $e->getMessage(), "<br>";	
		}

	?>
