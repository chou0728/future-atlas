<?php

    
    ob_start();
    session_start();

        
        


        if(isset($_REQUEST["comment_grade"]) &&  empty($_REQUEST["comment_content"]) != true ){//有取到資料才寫入

                
            try {
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
                // $order_item = $order_item_PDO->fetchObject(); 只需寫入不用抓取
                
    
        
            } catch (PDOException $e) {
                    echo "錯誤原因 : " , $e->getMessage() , "<br>";
                    echo "錯誤行號 : " , $e->getLine() , "<br>";
            }

            header('location:see_tickets.php'); //寫入db後返回到查看票券頁面

        }else{//沒取到資料則返回評價頁面
            $comment_content = $_REQUEST["comment_content"];
            $order_no = $_REQUEST["order_no"];
            $facility_no = $_REQUEST["facility_no"];
            $url = "rate_facility.php?order_no=$order_no&facility_no=$facility_no&comment_content=$comment_content";
            $url = preg_replace('/\s+/', '', $url);
            header('location:'.$url);
            
        };
        


    

        




?>