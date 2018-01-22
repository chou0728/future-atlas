<?php


if($_REQUEST["determine"] == "getOrder"){

  try{

    //抓TABLE中全部的SQL指令
    require_once("connectBooks.php");
    $sql = "SELECT * FROM facility_order_item WHERE order_no = ? AND facility_no = ? AND mem_id = ? ;";
    $facility_order_PDO = $pdo->prepare($sql);
    $facility_order_PDO->bindValue(1,$_REQUEST["order_no"]); 
    $facility_order_PDO->bindValue(2,$_REQUEST["facility_no"]); 
    $facility_order_PDO->bindValue(3,$_REQUEST["mem_id"]); 
    $facility_order_PDO->execute();

    $order_item = $facility_order_PDO->fetchObject();   //fetch成物件
    $full_fare_num = $order_item->full_fare_num; //取回欄位的資料
    $half_fare_num = $order_item->half_fare_num; 
    $full_fare_num_used = $order_item->full_fare_num_used; 
    $half_fare_num_used = $order_item->half_fare_num_used;
    $facility_name = $order_item->facility_name;


    $mix_data = array( //先把從資料庫中撈的資料放進陣列中
      "full_fare_num" => $full_fare_num,
      "half_fare_num" => $half_fare_num,
      "full_fare_num_used" => $full_fare_num_used,
      "half_fare_num_used" => $half_fare_num_used,
      "facility_name" => $facility_name
    );
    echo  json_encode( $mix_data ); //再來將php的array轉成json並echo出去

    }catch(PDOException $e){
    echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
  }
  
}elseif($_REQUEST["determine"] == "getFacilityNo"){

  try{
    
    // 抓facility_no
    require_once("connectBooks.php");
    $sql = "SELECT * FROM `facility_order_item` WHERE order_no = ?;";
    $facility_order_PDO = $pdo->prepare($sql);
    $facility_order_PDO->bindValue(1,$_REQUEST["order_no"]); 
    $facility_order_PDO->execute();

    $order_item = $facility_order_PDO->fetchObject(); 
    $facility_no = $order_item->facility_no;
    echo  $facility_no ;

    }catch(PDOException $e){
    echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
  }


}elseif($_REQUEST["determine"] == "getHowManyFacility"){

  try{

    //抓訂單筆數的SQL指令
    require_once("connectBooks.php");
    $sql = "SELECT COUNT(order_no) order_amount FROM facility_order_item WHERE order_no = ?;";
    $facility_order_PDO = $pdo->prepare($sql);
    $facility_order_PDO->bindValue(1,$_REQUEST["order_no"]); 
    $facility_order_PDO->execute();

    $order_item = $facility_order_PDO->fetchObject(); 
    $QR_amount = $order_item->order_amount;
    echo $QR_amount;




    }catch(PDOException $e){
    echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
  }


}



  
  

  




  



?>