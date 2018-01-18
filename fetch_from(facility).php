<?php
try{
  require_once("connectBooks.php");
  $sql = "select facility_mphoto from facility where facility_no = ?;";
  $facility_PDO = $pdo->prepare($sql);
  $facility_PDO->bindValue(1,$_REQUEST["facility_no"]);
  $facility_PDO->execute();
  


  if( $facility_PDO->rowCount() == 0 ){ //找不到

    echo "查無此票券";

  }else{ //找得到
   
    $faci = $facility_PDO->fetchObject();   //取回該訂單的全部資料
    $facility_mphoto = $faci->facility_mphoto; 

    echo  $facility_mphoto ; 
  } 
  
}catch(PDOException $e){
  echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>