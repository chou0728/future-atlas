<?php
ob_start();
session_start();
?>
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

			if(isset($_REQUEST['unsolved_question'])){//如果是unsolved_qa 設定關鍵字+回答後將unsolved_qa=null
				$sql = "update question_and_answer set key_word=:key_word,answer=:answer,unsolved_question=null where key_word_no=:key_word_no";
				$qa = $pdo->prepare($sql);
				$qa -> bindValue(":key_word_no",$_REQUEST['key_word_no']);
				$qa -> bindValue(":key_word",$_REQUEST['key_word']);
				$qa -> bindValue(":answer",$_REQUEST['answer']);
				$qa -> execute();
			}else{
				$sql = "update question_and_answer set key_word=:key_word,answer=:answer where key_word_no=:key_word_no";
				$qa = $pdo->prepare($sql);
				$qa -> bindValue(":key_word_no",$_REQUEST['key_word_no']);
				$qa -> bindValue(":key_word",$_REQUEST['key_word']);
				$qa -> bindValue(":answer",$_REQUEST['answer']);
				$qa -> execute();
			}
			header("location:back_robot.php");





		}catch(PDOException $ex){ //php error
			echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
			echo "行號：",$ex->getLine(),"<br>";

		}
?>
</body>
</html>