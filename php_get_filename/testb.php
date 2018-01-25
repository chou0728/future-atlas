<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<?php



echo "前一頁: " , $_SERVER["HTTP_REFERER"] , "<br>";

$path = $_SERVER["HTTP_REFERER"];

$pos = strrpos($path, "/");
echo "pos : $pos<br>";

$fileName = substr($path, $pos+1);
echo "fileName : $fileName<br>";
?> 

<hr>
<?php 
$arr = pathinfo($path);
var_dump($arr);
?>
<hr>
<?php 
echo $arr["basename"];
 ?>
</body>
</html>