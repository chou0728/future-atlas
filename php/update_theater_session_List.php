<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>update_theater_session_List</title>

</head>
<body>
	<?php
	try {
		require_once("connectBooks.php");
		$sql="update theater_session_list set total_ticket=:total_ticket, 
		                          	last_ticket=:last_ticket 
		      where session_no=:session_no";
		$theater_session_list = $pdo->prepare( $sql );
		$theater_session_list->bindValue(":session_no" , $_REQUEST["session_no"]);
		$theater_session_list->bindValue(":total_ticket" , $_REQUEST["total_ticket"]);
		$theater_session_list->bindValue(":last_ticket", $_REQUEST["last_ticket"]);
		$theater_session_list->execute();
		echo "異動成功<br>";
	} catch (Exception $e) {
		echo "錯誤原因 : " , $e->getMessage() , "<br>";
		echo "錯誤行號 : " , $e->getLine() , "<br>";	
	}
	?>
</body>
</html>