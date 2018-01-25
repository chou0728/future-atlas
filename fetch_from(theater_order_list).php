<?php


try{


    require_once("connectBooks.php");
    $sql = "SELECT a.number_purchase, a.used_ticket, b.program_name, b.program_photo, c.time_date, c.session_time
    FROM theater_order_list a
    JOIN theater_program b ON a.program_no = b.program_no
    JOIN theater_session_list c ON a.session_no = c.session_no
    WHERE a.theater_ticket_no = ?
    AND a.session_no = ?
    AND a.program_no = ? ";
    $theater_item_PDO = $pdo->prepare($sql);
    $theater_item_PDO->bindValue(1,$_REQUEST["theater_ticket_no"]); 
    $theater_item_PDO->bindValue(2,$_REQUEST["session_no"]); 
    $theater_item_PDO->bindValue(3,$_REQUEST["program_no"]); 
    $theater_item_PDO->execute();
    $theater_order = $theater_item_PDO->fetchObject();

    //取回欄位資料
    $program_name = $theater_order->program_name;
    $program_photo = $theater_order->program_photo;
    $time_date = $theater_order->time_date;
    $session_time = $theater_order->session_time;
    $number_purchase = $theater_order->number_purchase;
    $used_ticket = $theater_order->used_ticket;


    $mix_data = array(

        "program_name" => $program_name,
        "program_photo" => $program_photo,
        "time_date" => $time_date,
        "session_time" => $session_time,
        "number_purchase" => $number_purchase,
        "used_ticket" => $used_ticket

    );

    echo  json_encode( $mix_data );


}catch(PDOException $e){

    echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";

}








?>