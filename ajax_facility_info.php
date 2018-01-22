<?php
try{
  require_once("connectBooks.php");
  $no = $_REQUEST["facility_no"];
  $sql = "select * from facility where facility_no=:facility_no;";
  $facility_PDO = $pdo->prepare($sql);
  $facility_PDO->bindValue(":facility_no",$no); 
  $facility_PDO->execute();

  $sql = "select mem_id,comment_grade,comment_content from facility_order_item where facility_no =:facility_no;";
  $rating_PDO = $pdo->prepare($sql);
  $rating_PDO->bindValue(":facility_no",$no); 
  $rating_PDO->execute();

  if( $facility_PDO->rowCount() == 0){ //找不到的話
  
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
//---------------------------------------------------------------
    $b = 0;//數量
    $r = 0;//分數
    $av = 0;//平均分數
    $width = 0;//腥腥用
    $comment="";
    while ($rating= $rating_PDO->fetchObject()) {
      if(isset($rating->comment_grade)){
        $b++;
        $r = $r + $rating->comment_grade;
      //------
      $mem_id = $rating->mem_id;
      $sql = "select mem_name from member where mem_id = $mem_id";
      $name_PDO = $pdo->query($sql);
      $name_PDO->execute();
      $name= $name_PDO->fetchObject();
      
      // swith($rating->comment_grade){
      //   case '1':
      //   $star = "★";
                

      // }
      $stwidth = $rating->comment_grade*20;
      // $star = $rating->comment_grade;
      // $content = $rating->comment_content;
//------
      if(isset($name->mem_name)){
        $comment = $comment.'<div class="memcommentBox">
            <span class="memName">'.$name->mem_name.'</span>
            <span class="memScore">
              <div class="points_cover">
                  <span class="points_bar_bo">
                  <span class="points_bar" style="width:'.$stwidth.'%;"></span>
                  <img src="img/facilityInfo/ratingCover.png" alt="cover">
                </div></span>
            <span class="memComment">'.$rating->comment_content.'</span>
          </div>';
      }
      
      }
    }

    if($r != 0){
      $av = $r/$b;
      $width = $av*20;
    }else{
      $av =0;
      $width = 0;
    }
    // $comment_content = $rating->comment_content;
    // $mem_id = $rating->mem_id;

    $facility_arry = array( //把從資料庫中撈的資料放進陣列中
      "facility_no" => $facility_no,
      "facility_name" => $facility_name,
      "facility_subname" => $facility_subname,
      "facility_mphoto" => $facility_mphoto,
      "facility_phrase" => $facility_phrase,
      "facility_heart" => $facility_heart,
      "facility_suit" => $facility_suit,
      "facility_limit" => $facility_limit,
      "facility_description" => $facility_description,
      "av" => $av,
      "width" => $width,
      "counts" => $b,//評分幾次
      "comment" => $comment




    );

    echo  json_encode( $facility_arry ); //最後再將php的array轉成json並echo出去
  } 
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>




