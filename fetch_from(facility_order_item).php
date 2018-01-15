<?php
try{
  require_once("connectBooks.php");
  $sql = "select * from facility_order_item where order_no = ?;";
  $facility_order = $pdo->prepare($sql);
  $facility_order->bindValue(1,1); 
  // 這個 1 到時候要從QR code帶入的資料拿，現在先寫死 (order_no)
  $facility_order->execute();
  if( $facility_order->rowCount() == 0 ){ //找不到
    //傳回沒有的訊息
    echo "查無此票券";
  }else{ //找得到
     //取回該訂單的全部資料
    $order_item = $facility_order->fetchObject();

    //取回該筆訂單中全票數量欄位的資料
    $full_fare_num = $order_item->full_fare_num;
    
    //取回該筆訂單中半票數量欄位的資料
    $half_fare_num = $order_item->half_fare_num;

    // echo $full_fare_num;
  

    $order_item = array( //先把從資料庫中撈的資料放進陣列中
      "full_fare_num" => $full_fare_num,
      "half_fare_num" => $half_fare_num
    );

    echo  json_encode( $order_item ); //再來將php的array轉成json並echo出去
  } 
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>




