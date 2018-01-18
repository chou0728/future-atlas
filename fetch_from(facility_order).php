<?php
try{
  require_once("connectBooks.php");

  //用mem_id去facility_order資料表中抓order_no
  $sql = "SELECT * FROM `facility_order` WHERE mem_id = ?;";
  $order_item_PDO = $pdo->prepare($sql);
  $order_item_PDO->bindValue(1,$_REQUEST["mem_id"]);
  $order_item_PDO->execute();


  if( $order_item_PDO->rowCount() == 0 ){ //找不到

    echo "查無此訂單";

  }else{ //找得到
   
    $order_item = $order_item_PDO->fetchObject();   //fetch成物件

    $order_no = $order_item->order_no; //取回欄位的資料
    $mem_id = $order_item->mem_id; 
    $order_date = $order_item->order_date; 
    $original_total = $order_item->original_total;
    $discount = $order_item->discount;
    $creditcard_num = $order_item->creditcard_num;

    


    $mix_data = array( //先把從資料庫中撈的資料放進陣列中
      "order_no" => $order_no,
      "mem_id" => $mem_id,
      "order_date" => $order_date,
      "original_total" => $original_total,
      "discount" => $discount,
      "creditcard_num" => $creditcard_num
    );
    echo  json_encode( $mix_data ); //再來將php的array轉成json並echo出去
  } 
  
}catch(PDOException $e){
  echo "錯誤原因 : " , $e->getMessage() , "<br>";
  echo "錯誤行號 : " , $e->getLine() , "<br>";
}




?>