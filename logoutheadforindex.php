<?php
ob_start();
session_start();
// unset($_SESSION["mem_id"]);
session_destroy();
if(isset($_REQUEST['ismp'])){//判斷是否從一定要會員登入的地方登出
	header("location:====index.php");
}else{
	$pre_url=$_SERVER['HTTP_REFERER'];
	header("location:$pre_url");
}

?>