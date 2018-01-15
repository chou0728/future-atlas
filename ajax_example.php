<?php
try{
  require_once("connectBooks.php");
  $sql = "select * from facility where facility_no = ?;";
  $facility_PDO = $pdo->prepare($sql);
  $facility_PDO->bindValue(1,1); //第一個?綁1這個值進去
  $facility_PDO->execute();
  if( $facility_PDO->rowCount() == 0 ){ //找不到的話
    
    echo "查無資料";

  }else{ //找得到的話

     
    $facility = $facility_PDO->fetchObject();//取回該row全部資料，然後放進 $facility這個變數中

    $facility_name = $facility->facility_name;//以php物件的操作方式來取出每個欄位的資料，並放進變數中
    $facility_status = $facility->facility_status;
    $full_fare = $facility->full_fare;
    $half_fare = $facility->half_fare;

    $facility_arry = array( //把從資料庫中撈的資料放進陣列中
      "facility_name" => $facility_name,
      "facility_status" => $facility_status,
      "full_fare" => $full_fare,
      "half_fare" => $half_fare
    );

    echo  json_encode( $facility_arry ); //最後再將php的array轉成json並echo出去
  } 
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>




