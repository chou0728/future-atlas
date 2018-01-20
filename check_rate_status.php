<?php


ob_start();
session_start();

  



        try {
            require_once("connectBooks.php");
            $sql = "SELECT comment_status FROM facility_order_item WHERE mem_id=? AND order_no =? AND facility_no =?;";
            $order_item_PDO = $pdo->prepare($sql);
            $order_item_PDO->bindValue(1,$_SESSION["mem_id"]);  
            $order_item_PDO->bindValue(2,$_REQUEST["order_no"]); 
            $order_item_PDO->bindValue(3,$_REQUEST["facility_no"]); 
            $order_item_PDO->execute();
            $order_item = $order_item_PDO->fetchObject();
            
            $comment_status = $order_item->comment_status;
    
            if($comment_status == 0){//還沒評價

                echo 0;

            }else{//已評價過
                

                
                echo 1;
                

            }
           
    
    
    
    

    
    
    
    
        } catch (PDOException $e) {
                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                echo "錯誤行號 : " , $e->getLine() , "<br>";
        }





?>