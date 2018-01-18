<?php
try{
  require_once("connectBooks.php");
  $sql = "select * from facility where facility_no=:facility_no;";
  $facility_PDO = $pdo->prepare($sql);
  $facility_PDO->bindValue(":facility_no",$_REQUEST["f_no"]); 
  $facility_PDO->execute();
  if( $facility_PDO->rowCount() == 0 ){ //找不到的話
    
    echo "查無資料";

  }else{ //找得到的話

     
    $facility = $facility_PDO->fetchObject();//取回該row全部資料，然後放進 $facility這個變數中
    $facility_no = $facility->facility_no;
    $facility_name = $facility->facility_name;
    $facility_subname = $facility->facility_subname;//以php物件的操作方式來取出每個欄位的資料，並放進變數中
    $facility_mphoto = $facility->facility_mphoto;
    $facility_phrase = $facility->facility_phrase;
    $facility_heart = $facility->facility_heart;
    $facility_suit = $facility->facility_suit;
    $facility_limit = $facility->facility_limit;
    $facility_description = $facility->facility_description;

    $facility_arry = array( //把從資料庫中撈的資料放進陣列中
      "facility_no" => $facility_no,
      "facility_name" => $facility_name,
      "facility_subname" => $facility_subname,
      "facility_mphoto" => $facility_mphoto,
      "facility_phrase" => $facility_phrase,
      "facility_heart" => $facility_heart,
      "facility_suit" => $facility_suit,
      "facility_limit" => $facility_limit,
      "facility_description" => $facility_description
    );

    echo  json_encode( $facility_arry ); //最後再將php的array轉成json並echo出去
  } 
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>




