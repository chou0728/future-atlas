<?php
	try{
		require_once("connectBooks.php");
		$sql = "select * from theater_order_list where mem_id=:mem_id";
		$theater_order_list = $pdo->prepare($sql);
		$theater_order_list->bindValue(":mem_id",$_REQUEST["mem_id"]);
		$theater_order_list->execute();

	  if( $theater_order_list->rowCount() == 0 ){ //找不到
	    //傳回空的字串
	    echo "查無此節目";
	  }else{ //找得到
	    //取回一筆資料
      $str = "";
	  $str .="<table>";
	  $str .="<tr>
                    <th>訂單編號</th>
                    <th>場次編號</th>
                    <th>會員ID</th>
                    <th>購買張數</th>
                    <th>已使用張數</th>
                    <th>訂購日期</th>
                    <th>原始總額</th>
                    <th>積分折扣</th>
                    <th>信用卡卡號</th>
              </tr>";	    
	    while( $orderlistRow = $theater_order_list->fetchObject()){
	      //傳回html結構
	      // $str .= '<form method="get" action="php/update_theater_session_List.php">';
	      // $str .= '<input type="hidden" name="session_no" value="'.$sessionlistRow->session_no.'">';
		  $str .= "<tr><td>" . $orderlistRow->theaterticket_no . "</td>";
		  $str .= "<td>" . $orderlistRow->session_no . "</td>";
		  $str .= "<td>" . $orderlistRow->mem_id . "</td>";
		  $str .= "<td>" . $orderlistRow->number_purchase . "</td>";
		  $str .= "<td>" . $orderlistRow->used_ticket . "</td>";
		  $str .= "<td>" . $orderlistRow->order_date . "</td>";
		  $str .= "<td>" . $orderlistRow->original_amount . "</td>";
		  $str .= "<td>" . $orderlistRow->points_discount . "</td>";
		  $str .= "<td>" . $orderlistRow->credit_card . "</td>";
		  // $str .= "<td>" . '<input type="number" style="width:50px;" value="'. $orderlistRow->total_ticket . '" name="total_ticket">' . "</td>";
		  // $str .= "<td>" . '<input type="number" style="width:50px;" value="' . $orderlistRow->last_ticket .  '" name="last_ticket"> ' . "</td>";
		  // $str .= "<td>" . '<input type="submit" style="font-family:微軟正黑體;" value="修改" onclick="alert(1);">'. "</td></tr>";
		  // $str .= "</form>";
	    }
		  $str .=  "</table>";
		  echo $str;	    
	  } 

	}catch(PDOException $e){
	  echo $e->getMessage();
	}
?>