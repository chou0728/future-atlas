<?php
try{
  require_once("connectBooks.php");
  $sql = "UPDATE facility_order_item SET full_fare_num_used=?,half_fare_num_used=? WHERE order_no = ? and facility_no = ? and mem_id = ?;";
  $updatePDO = $pdo->prepare($sql);
  $updatePDO->bindValue(1,$_REQUEST["now_used_full"]); 
  $updatePDO->bindValue(2,$_REQUEST["now_used_half"]); 
  $updatePDO->bindValue(3,$_REQUEST["order_no"]); 
  $updatePDO->bindValue(4,$_REQUEST["facility_no"]); 
  $updatePDO->bindValue(5,$_REQUEST["mem_id"]); 
  $updatePDO->execute();




  echo "註記成功";	

}catch(PDOException $e){
  
  echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>