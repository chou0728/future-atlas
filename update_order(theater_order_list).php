<?php
try{
  require_once("connectBooks.php");
  $sql = "UPDATE `theater_order_list` 
  SET`used_ticket`= ?
  WHERE `theater_ticket_no` = ? AND `session_no` = ? AND `program_no` = ?;";
  $updatePDO = $pdo->prepare($sql);
  $updatePDO->bindValue(1,$_REQUEST["now_used"]); 
  $updatePDO->bindValue(2,$_REQUEST["theater_ticket_no"]); 
  $updatePDO->bindValue(3,$_REQUEST["session_no"]); 
  $updatePDO->bindValue(4,$_REQUEST["program_no"]); 
  $updatePDO->execute();




  echo "註記成功";	

}catch(PDOException $e){
  
  echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>