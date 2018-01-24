<?php
ob_start();
session_start();
try {
	$manager_id 	= $_REQUEST["i_id_hidden"];
	$manager_name 	= $_REQUEST["i_name_hidden"];
	$password 		= $_REQUEST["i_psw_hidden"];
	$top_manager    = $_REQUEST["i_top_hidden"];
	$manager_status = $_REQUEST["i_status_hidden"];
	echo $manager_name."<br>";
	echo $password."<br>";
	echo $top_manager."<br>";
	echo $manager_status;
	require_once("php/connectBooks.php");
	$sql = "update backend_manager set manager_name = :manager_name, password = :password, top_manager = :top_manager, manager_status = :manager_status where manager_id = :manager_id;";

	$manager = $pdo -> prepare($sql);
	$manager -> bindParam(":manager_id",$manager_id);
	$manager -> bindParam(":manager_name",$manager_name);
	$manager -> bindParam(":password",$password);
	$manager -> bindParam(":top_manager",$top_manager);
	$manager -> bindParam(":manager_status",$manager_status);
	$manager -> execute();
	
	$_SESSION["update_successfully"] = true;
	header("location:back_management_authority.php");
} catch (Exception $ex) {
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
</script>
</body>
</html>