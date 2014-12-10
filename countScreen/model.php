<?php

require $_SERVER[DOCUMENT_ROOT].'/library/functions.php';

function getTotalCount($eventId){
       $conn= databaseConnection();
    try{
        $sql = 'SELECT SUM(countValue) FROM counts WHERE eventId= :eventId';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':eventId', $eventId, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch();
        $stmt->closeCursor();
        
    } catch (PDOException $ex) {
        $message = 'Sorry, There was an error';
    }
    if(is_array($data)){
        return $data[0];
    }
    else{
        $_SESSION['message']='Sorry, an error occured with the database.';
    }
}

function updateCount($user_id, $eventId, $countValue, $countDate) {
    $conn= databaseConnection();
       try{
        $sql2 = 'SELECT COUNT(*) FROM counts WHERE eventId= :eventId AND userId= :user_id';
        
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindValue(':eventId', $eventId, PDO::PARAM_INT);
        $stmt2->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt2->execute();
        $data2 = $stmt2->fetch();
        $stmt2->closeCursor();
        
    } catch (PDOException $ex) {
        $message = 'Sorry, There was an error';
    }
        if($data2[0] == 1){
            try{
            $sql3 = 'UPDATE counts SET countValue= :countValue, countDate= :countDate WHERE eventId= :eventId AND userId= :user_id LIMIT 1';

            $stmt3 = $conn->prepare($sql3);
            $stmt3->bindValue(':countValue', $countValue, PDO::PARAM_INT);
            $stmt3->bindValue(':countDate', $countDate, PDO::PARAM_STR);
            $stmt3->bindValue(':eventId', $eventId, PDO::PARAM_INT);
            $stmt3->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt3->execute();
            $rowcount3 = $stmt3->rowCount(); //How many rows were affected
            $stmt3->closeCursor();
            } catch (PDOException $ex) {
                $_SESSION['message'] ='error with database on line 2';
            }
            if ($rowcount3) {
              return TRUE; // A successful Update
            } 
            else {
              return FALSE; // A failed Update
            }
        }
        else{
            try{
            $sql = 'INSERT INTO counts (eventId, userId, countValue, countDate) VALUES (:eventId, :user_id, :countValue, :countDate)';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':eventId', $eventId, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':countValue', $countValue, PDO::PARAM_INT);
            $stmt->bindValue(':countDate', $countDate, PDO::PARAM_STR);
            $stmt->execute();
            $rowcount = $stmt->rowCount(); //How many rows were affected
            $stmt->closeCursor();   
            } catch (PDOException $ex) {

            }
            if($rowcount){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
}


// OTHER OPTION...
//function updateCount($user_id, $eventId, $countValue, $countDate) {
//    $conn= databaseConnection();
//        try{
//            $sql = "SELECT COUNT(*) FROM counts WHERE eventId= :eventId AND userId= :user_id AS check;
//                    IF check >= 1 THEN
//                       UPDATE counts SET countValue= :countValue, countDate= :countDate WHERE eventId= :eventId AND userId= :user_id LIMIT 1
//                    ELSE
//                       INSERT INTO counts (eventId, userId, countValue, countDate) VALUES (:eventId, :user_id, :countValue, :countDate)
//                    END IF";
//            $stmt = $conn->prepare($sql);
//            $stmt->bindValue(':eventId', $eventId, PDO::PARAM_INT);
//            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
//            $stmt->bindValue(':countValue', $countValue, PDO::PARAM_INT);
//            $stmt->bindValue(':countDate', $countDate, PDO::PARAM_STR);
//            $stmt->execute();
//            $rowcount = $stmt->rowCount(); //How many rows were affected
//            $stmt->closeCursor();   
//        } catch (PDOException $ex) {
//
//        }
//        if($rowcount){
//            return TRUE;
//        }
//        else{
//            return FALSE;
//        }
//}
