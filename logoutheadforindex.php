<?php
ob_start();
session_start();
// unset($_SESSION["mem_id"]);
session_destroy();
$pre_url=$_SERVER['HTTP_REFERER'];
header("location:$pre_url");
?>