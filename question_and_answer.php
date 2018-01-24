
<?php 

        try {
            $question = $_REQUEST["user_text"];
            require_once("connectBooks.php");
            $sql = "select * from question_and_answer";  //$sql = "select * from QA wherer ans != null";  
            $qa = $pdo->query($sql);

            $found = false;
            while($qaRow = $qa->fetchObject()){
                if( mb_strpos($question,$qaRow->key_word,0,"utf-8")!==false){
                    $found = true;
                    break;
                }
            }
            if( $found ){
                $answer = $qaRow->answer;
                echo $answer;
            }else{
                echo "我不太了解你的問題，您可以問我營業時間、票券資訊等問題";
                 //如果找不到可以設計說把使用者輸入的東西建成一個欄位，然後答案為null，之後設定
                 $sql = "INSERT INTO question_and_answer (unsolved_question) VALUES ('$question')";  //$sql = "select * from QA wherer ans != null";  
                 $pdo->exec($sql);


            }	

        } catch (PDOException $e) {
            echo "錯誤原因 : " , $e->getMessage() , "<br>";
            echo "錯誤行號 : " , $e->getLine() , "<br>";
            // echo "getCode : " , $e->getCode() , "<br>";
            // echo "異動失敗,請聯絡系統維護人員";
        }
?>    