<?php 
try{
	require_once("connectBooks.php");
	$sql = "select * from facility_order_item where order_no = ?;";
	$facility_order = $pdo->prepare($sql);
	$facility_order->bindValue(1,1);
	$facility_order->execute();

  if( $facility_order->rowCount() == 0 ){ //找不到
    //傳回空的字串
    echo "查無此人";
  }else{ //找得到

  	
     //取回該訂單的全部資料
    $order_item = $facility_order->fetchObject();

    //取回該筆訂單中全票數量欄位的資料
    $full_fare_num = $order_item->full_fare_num;
    
    //取回該筆訂單中半票數量欄位的資料
    $half_fare_num = $order_item->half_fare_num;

   echo $full_fare_num;

  } 
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>