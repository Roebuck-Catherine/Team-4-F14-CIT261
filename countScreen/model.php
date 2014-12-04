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

function submitFinalCount() {
    $conn= databaseConnection();
    try{
        $sql = "INSERT INTO counts (countValue) VALUES ('personalCount')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        $stmt->closeCursor();
          
    } catch (Exception $ex) {
        $message = 'Sorry, There was an error';
    }
    if(is_array($data)){
        return $data[0];
    }
    else{
        $_SESSION['message']='Sorry, and error occured with the database.';
    }
}

//Still In Progress
function updateCount($eventId, $countValue, $personCount, $countDate) {
    $conn= databaseConnection();
    try{
        $sql = 'UPDATE counts SET countValue= :countValue, countDate= :countDate WHERE personCount= :personCount and eventId= :eventId';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindValue(':countValue', $countValue, PDO::PARAM_INT);
        $stmt->bindValue(':personCount', $personCount, PDO::PARAM_STR);
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
