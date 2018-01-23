<?php

ob_start();
session_start();



 //判斷是寫入不用買票的設施(沒order_no)還是要買票的設施(有order_no)


if($_REQUEST["order_no"] == 0){//不用買票的設施(前端送0過來)


        if(isset($_REQUEST["comment_grade"]) &&  empty($_REQUEST["comment_content"]) != true ){//有取到資料才寫入


                try{
                    //只需寫入facility_comment中
                    require_once("connectBooks.php");
                    $sql = "INSERT INTO `facility_comment`
                    (`facility_no`, `mem_id`, `comment_content`, `comment_grade`, `comment_timestamp`, `comment_status`) 
                    VALUES (:facility_no,:mem_id,:comment_content,:comment_grade,:comment_timestamp,:comment_status)";
                    $order_item_PDO = $pdo->prepare($sql);
                    $order_item_PDO->bindValue(':facility_no',$_REQUEST["facility_no"]);  
                    $order_item_PDO->bindValue(':mem_id',$_SESSION["mem_id"]); 
                    $order_item_PDO->bindValue(':comment_content',$_REQUEST["comment_content"]); 
                    $order_item_PDO->bindValue(':comment_grade',$_REQUEST["comment_grade"]);  
                    $order_item_PDO->bindValue(':comment_timestamp',$_REQUEST["comment_timestamp"]); 
                    $order_item_PDO->bindValue(':comment_status',1); //直接寫 1 進去
                    $order_item_PDO->execute();

                    //會員積分增加
                        $sql = "UPDATE `member` 
                        SET `mem_points` = `mem_points +10
                        WHERE mem_id =? ;";
                        $points_PDO = $pdo->prepare($sql);
                        $points_PDO->bindValue(1,$_SESSION["mem_id"]);
                        $points_PDO->execute();
                        

                    header('location:facilityInfo.php'); //寫入db後返回到查看票券頁面

                }catch(PDOException $e){
                    echo "錯誤原因 : " , $e->getMessage() , "<br>";
                    echo "錯誤行號 : " , $e->getLine() , "<br>";
                }



        }else{//沒取到資料則返回評價頁面
                $comment_content = $_REQUEST["comment_content"];
                $order_no = $_REQUEST["order_no"];
                $facility_no = $_REQUEST["facility_no"];
                $url = "rate_facility.php?order_no=$order_no&facility_no=$facility_no&comment_content=$comment_content";
                $url = preg_replace('/\s+/', '', $url);
                header('location:'.$url);
                
        };






}else{//要買票的設施(有order_no)



        if(isset($_REQUEST["comment_grade"]) &&  empty($_REQUEST["comment_content"]) != true ){//有取到資料才寫入


                try{
                
                //寫入facility_order_item中
                require_once("connectBooks.php");
                $sql = "UPDATE `facility_order_item` 
                SET `comment_grade`=?,`comment_timestamp`=?,`comment_status`=1 ,`comment_content` = ?
                WHERE mem_id =? AND order_no =? AND facility_no = ? ;";
                $order_item_PDO = $pdo->prepare($sql);
                $order_item_PDO->bindValue(1,$_REQUEST["comment_grade"]);  
                $order_item_PDO->bindValue(2,$_REQUEST["comment_timestamp"]); 
                $order_item_PDO->bindValue(3,$_REQUEST["comment_content"]); 
                $order_item_PDO->bindValue(4,$_SESSION["mem_id"]);  
                $order_item_PDO->bindValue(5,$_REQUEST["order_no"]); 
                $order_item_PDO->bindValue(6,$_REQUEST["facility_no"]); 
                $order_item_PDO->execute();

                //寫入facility_comment中
                $sql = "INSERT INTO `facility_comment`
                (`facility_no`, `mem_id`, `comment_content`, `comment_grade`, `comment_timestamp`, `comment_status`) 
                VALUES (:facility_no,:mem_id,:comment_content,:comment_grade,:comment_timestamp,:comment_status)";
                $order_item_PDO = $pdo->prepare($sql);
                $order_item_PDO->bindValue(':facility_no',$_REQUEST["facility_no"]);  
                $order_item_PDO->bindValue(':mem_id',$_SESSION["mem_id"]); 
                $order_item_PDO->bindValue(':comment_content',$_REQUEST["comment_content"]); 
                $order_item_PDO->bindValue(':comment_grade',$_REQUEST["comment_grade"]);  
                $order_item_PDO->bindValue(':comment_timestamp',$_REQUEST["comment_timestamp"]); 
                $order_item_PDO->bindValue(':comment_status',1); //直接寫 1 進去
                $order_item_PDO->execute();

                //會員積分增加
                $sql = "UPDATE `member` 
                SET `mem_points` = `mem_points +10
                WHERE mem_id =? ;";
                $points_PDO = $pdo->prepare($sql);
                $points_PDO->bindValue(1,$_SESSION["mem_id"]);
                $points_PDO->execute();


                header('location:see_tickets.php'); //寫入db後返回到查看票券頁面

                }catch(PDOException $e){
                    echo "錯誤原因 : " , $e->getMessage() , "<br>";
                    echo "錯誤行號 : " , $e->getLine() , "<br>";
                }




        }else{//沒取到資料則返回評價頁面
                $comment_content = $_REQUEST["comment_content"];
                $order_no = $_REQUEST["order_no"];
                $facility_no = $_REQUEST["facility_no"];
                $url = "rate_facility.php?order_no=$order_no&facility_no=$facility_no&comment_content=$comment_content";
                $url = preg_replace('/\s+/', '', $url);
                header('location:'.$url);
                
        };








};
































?>