<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style>
center{font-size:36px; color:blue}
</style>
</head>

<body>
<?php
if( $_REQUEST["memId"] == "Sara"){
  echo "<center>董董，您好~</center>";
}elseif( $_REQUEST["memId"] == "Amy"){
  echo "<center>婷婷，您好~</center>";	
}else{
  echo "<center>歡迎光臨~</center>";
}
?>
</body>
</html>