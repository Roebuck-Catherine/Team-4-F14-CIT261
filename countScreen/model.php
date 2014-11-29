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
        $_SESSION['message']='Sorry, and error occured with the database.';
    }
}
/*
//I"m not sure if TotalCount is the correct name in the database table.
function submitFinalCount() {
    $conn= databaseConnection();
    try{
        $sql = "UPDATE TotalCount SET TotalCount='currentCount'";
        
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
 */