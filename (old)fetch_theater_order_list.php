<?php


if($_REQUEST["determine"] == "getTheaterTicketNo"){

  try{

    //用mem_id去theater_order_list資料表抓theater_ticket_no 
    require_once("connectBooks.php");
    //先抓一下有幾筆
    $sql = "SELECT COUNT(theater_ticket_no) ticket_amount FROM `theater_order_list` WHERE mem_id = ?;";
    $theater_order_PDO = $pdo->prepare($sql);
    $theater_order_PDO->bindValue(1,$_REQUEST["mem_id"]); 
    $theater_order_PDO->execute();
    
    $theater_order_item = $theater_order_PDO->fetchObject();
    $ticket_amount =  $theater_order_item->ticket_amount;
    
    if($ticket_amount >1){ //如果該會員有超過1筆訂單

    //再跑迴圈
    $sql = "SELECT * FROM `theater_order_list` WHERE mem_id = ?;";
    $theater_order_PDO = $pdo->prepare($sql);
    $theater_order_PDO->bindValue(1,$_REQUEST["mem_id"]); 
    $theater_order_PDO->execute();




    $string_01 = "";
    $string_02 = "";
    $string_03 = "";
    $string_04 = "";
    $string_05 = "";
    $string_06 = "";
    $string_07 = "";
    $string_08 = "";

    for ($i=0; $i < $ticket_amount ; $i++) { 
        
        //fetch抓全部的資料
        $theater_order_item = $theater_order_PDO->fetchObject();
        $session_no =  $theater_order_item->session_no;
        $theater_ticket_no =  $theater_order_item->theater_ticket_no;
        $number_purchase =  $theater_order_item->number_purchase;
        $used_ticket =  $theater_order_item->used_ticket;
        $order_date =  $theater_order_item->order_date;
        $original_amount =  $theater_order_item->original_amount;
        $points_discount =  $theater_order_item->points_discount;
        $program_no =  $theater_order_item->program_no;



        if($i<$ticket_amount-1){
            $string_01 = $string_01 . $session_no .",";
            $string_02 = $string_02 . $theater_ticket_no .",";
            $string_03 = $string_03 . $number_purchase .",";
            $string_04 = $string_04 . $used_ticket .",";
            $string_05 = $string_05 . $order_date .",";
            $string_06 = $string_06 . $original_amount .",";
            $string_07 = $string_07 . $points_discount .",";
            $string_08 = $string_08 . $program_no .",";
        }else{
            $string_01 = $string_01 . $session_no;
            $string_02 = $string_02 . $theater_ticket_no;
            $string_03 = $string_03 . $number_purchase;
            $string_04 = $string_04 . $used_ticket;
            $string_05 = $string_05 . $order_date;
            $string_06 = $string_06 . $original_amount;
            $string_07 = $string_07 . $points_discount;
            $string_08 = $string_08 . $program_no;
        }
        
    }
    $array_01 = explode(",",$string_01);
    $array_02 = explode(",",$string_02);
    $array_03 = explode(",",$string_03);
    $array_04 = explode(",",$string_04);
    $array_05 = explode(",",$string_05);
    $array_06 = explode(",",$string_06);
    $array_07 = explode(",",$string_07);
    $array_08 = explode(",",$string_08);

    $number = "";
    
    for ($a=0; $a <  $ticket_amount ; $a++) { 

        if($a<$ticket_amount-1){
            $number = $number . "$a" .",";
        }else{
            $number = $number . "$a";
        }
    }
    $array_number = explode(",",$number);
    $first = $array_number[0];
    $second = $array_number[1];

    //假設同一個mem_id最多只能有兩個theater_ticket_no
    $new_array = array(
        "ticket_amount" => $ticket_amount,
        "session_no_$first" => $array_01[$first],
        "session_no_$second" => $array_01[$second],
        "theater_ticket_no$first" => $array_02[$first],
        "theater_ticket_no$second" => $array_02[$second],
        "number_purchase$first" => $array_03[$first],
        "number_purchase$second" => $array_03[$second],
        "used_ticket$first" => $array_04[$first],
        "used_ticket$second" => $array_04[$second],
        "order_date$first" => $array_05[$first],
        "order_date$second" => $array_05[$second],
        "original_amount$first" => $array_06[$first],
        "original_amount$second" => $array_06[$second],
        "points_discount$first" => $array_07[$first],
        "points_discount$second" => $array_07[$second],
        "program_no$first" => $array_08[$first],
        "program_no$second" => $array_08[$second]
    );
    
    echo  json_encode($new_array); 

    // $mix_data = array( //先把從資料庫中撈的資料放進陣列中
    //   "full_fare_num" => $full_fare_num,
      
    // );
    // echo  json_encode( $mix_data ); //再來將php的array轉成json並echo出去
}else{

    $sql = "SELECT * FROM `theater_order_list` WHERE mem_id = ?;";
    $theater_order_PDO = $pdo->prepare($sql);
    $theater_order_PDO->bindValue(1,$_REQUEST["mem_id"]); 
    $theater_order_PDO->execute();
    $theater_order_item = $theater_order_PDO->fetchObject();
        $session_no =  $theater_order_item->session_no;
        $new_array = array(
            "ticket_amount" => $ticket_amount,
            "session_no" => $session_no
        );
        
        echo  json_encode($new_array); 


}



    }catch(PDOException $e){
    echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
  }// ========== catch ============


  
}



  
  

  




  



?>