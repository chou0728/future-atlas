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
    
    if($ticket_amount >1){

    //再跑迴圈
    $sql = "SELECT * FROM `theater_order_list` WHERE mem_id = ?;";
    $theater_order_PDO = $pdo->prepare($sql);
    $theater_order_PDO->bindValue(1,$_REQUEST["mem_id"]); 
    $theater_order_PDO->execute();

    
    
        
    // }



    $string = "";

    for ($i=0; $i < $ticket_amount ; $i++) { 
    
        $theater_order_item = $theater_order_PDO->fetchObject();
        $session_no =  $theater_order_item->session_no;



        if($i<$ticket_amount-1){
            $string = $string . $session_no .",";
        }else{
            $string = $string . $session_no;
        }
        
    }
    $array = explode(",",$string);

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

    $new_array = array(
        "ticket_amount" => $ticket_amount,
        "session_no_$first" => $array[0],
        "session_no_$second" => $array[1]
    );
    
    echo  json_encode($new_array); 

    // $mix_data = array( //先把從資料庫中撈的資料放進陣列中
    //   "full_fare_num" => $full_fare_num,
      
    // );
    // echo  json_encode( $mix_data ); //再來將php的array轉成json並echo出去

    }catch(PDOException $e){
    echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
  }// ========== catch ============

}
  
}



  
  

  




  



?>