<?php
try{
  require_once("connectBooks.php");
  $sql = "select * from member where mem_id = ?;";
  $member_PDO = $pdo->prepare($sql);
  $member_PDO->bindValue(1,1); //第一個?綁1這個值進去
  $member_PDO->execute();
  if( $member_PDO->rowCount() == 0 ){ //找不到的話
    
    echo "查無資料";

  }else{ //找得到的話

     
    $member = $member_PDO->fetchObject();//取回該row全部資料，然後放進 $facility這個變數中

    $mem_id = $member->mem_id;
    $mem_nick = $member->mem_nick;//以php物件的操作方式來取出每個欄位的資料，並放進變數中
    $password = $member->password;
    $mem_name = $member->mem_name;
    $mem_points = $member->mem_points;
    $mem_permissions = $member->mem_permissions;
    $mem_mail = $member->mem_mail;
    $mem_phone = $member->mem_phone;

    $member_arry = array( //把從資料庫中撈的資料放進陣列中
      "mem_id" => $mem_id,
      "mem_nick" => $mem_nick,
      "password" => $password,
      "mem_name" => $mem_name,
      "mem_points" => $mem_points,
      "mem_permissions" => $mem_permissions,
      "mem_mail" => $mem_mail,
      "mem_phone" => $mem_phone
    );

    echo  json_encode( $member_arry ); //最後再將php的array轉成json並echo出去
  } 
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>




