<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>
<?php 
try {
	$question="我想知道時間";
	require_once("connectBooks.php");
	$sql = "select * from QA";  //$sql = "select * from QA wherer ans != null";  
	$qa = $pdo->query($sql);

	$found = false;
	while($qaRow = $qa->fetchObject()){
		if( mb_strpos($question,$qaRow->title,0,"utf-8")!==false){
			$found = true;
			break;
		}
	}
	if( $found ){
		echo nl2br($qaRow->ans);
	}else{
		echo "Not found~"; //如果找不到可以設計說把使用者輸入的東西建成一個欄位，然後答案為null，之後設定
	}	

} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
	// echo "getCode : " , $e->getCode() , "<br>";
	// echo "異動失敗,請聯絡系統維護人員";
}
?>     
</body>
</html>