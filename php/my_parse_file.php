<?php 
// echo $_POST['programName'],'<br>';
// echo $_POST['programDate'],'<br>';
// echo $_POST['programTime'],'<br>';
// echo $_POST['theater_quantity'],'<br>';
// echo $_POST['theater_total'],'<br>';
// echo $_POST['Scorenumber'],'<br>';
// echo $_POST['CardInfo'],'<br>';
	$programName=$_POST['programName'];
	$programDate=$_POST['programDate'];
	$programTime=$_POST['programTime'];
	$theater_quantity=$_POST['theater_quantity'];
	$theater_total=$_POST['theater_total'];
	$Scorenumber=$_POST['Scorenumber'];
	$CardInfo=$_POST['CardInfo'];

	try {
			require_once("connectBooks.php");
		// 	$sql = "INSERT into member (memName,memId,memPsw,email,sex,birthday,tel) values('
		// $username','$account','$password','$email','$sex','$birthday','
		// $tel')";
		// 	$pdo->query( $sql );
		$sql = "INSERT into theater_order_list (session_no,member_id,number_purchase,used_ticket,order_date,original_amount,points_discount,credit_card) values(?,?,?,?,?,?,?,?)";
		$statement = $pdo->prepare($sql);
		// $statement->bindValue(1,$memNo);
		$statement->bindValue(1,3);
		$statement->bindValue(2,2);
		$statement->bindValue(3,$theater_quantity);
		$statement->bindValue(4,0);
		$statement->bindValue(5,"2018-01-13");
		$statement->bindValue(6,$theater_total);
		$statement->bindValue(7,$Scorenumber);
		$statement->bindValue(8,$CardInfo);
		$statement->execute();
			
		?>
		<?php
			echo "輸入完成";	
		} catch (PDOException $e) {
		  echo "錯誤行號 : ", $e->getLine(), "<br>";
		  echo "錯誤訊息 : ", $e->getMessage(), "<br>";	
		}

	?>
?>