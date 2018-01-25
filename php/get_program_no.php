<?php
	try{
		require_once("connectBooks.php");
		$sql = "select * from theater_session_list where program_no=:programNo";
		$theater_session_list = $pdo->prepare($sql);
		$theater_session_list->bindValue(":programNo",$_REQUEST["programNo"]);
		$theater_session_list->execute();

	  if( $theater_session_list->rowCount() == 0 ){ //找不到
	    //傳回空的字串
	    echo "查無此節目";
	  }else{ //找得到
	    //取回一筆資料
      $str = "";
	  $str .="<table>";
	  $str .="<tr class='Field_title'>
                    <th>場次編號</th>
                    <th>節目編號</th>
                    <th>場次時間</th>
                    <th>演出日期</th>
                    <th>總票數</th>
                    <th>剩餘票數</th>
              </tr>";	    
	    while( $sessionlistRow = $theater_session_list->fetchObject()){
	      //傳回html結構
	      $str .= '<form method="get" action="php/update_theater_session_List.php">';
	      $str .= '<input type="hidden" name="session_no" value="'.$sessionlistRow->session_no.'">';
		  $str .= "<tr><td>" . $sessionlistRow->session_no . "</td>";
		  $str .= "<td>" . $sessionlistRow->program_no . "</td>";
		  $str .= "<td>" . $sessionlistRow->session_time . "</td>";
		  $str .= "<td>" . $sessionlistRow->time_date . "</td>";
		  $str .= "<td>" . $sessionlistRow->total_ticket. "</td>";
		  $str .= "<td>" .  $sessionlistRow->last_ticket ."</td></tr>";
		  // $str .= "<td>" . '<input type="submit" style="font-family:微軟正黑體;" value="修改" onclick="alert(1);">'. "</td></tr>";
		  $str .= "</form>";
	    }
		  $str .=  "</table>";
		  echo $str;	    
	  } 

	}catch(PDOException $e){
	  echo $e->getMessage();
	}
?>