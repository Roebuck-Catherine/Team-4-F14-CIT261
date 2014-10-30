<?php

require ($_SERVER['DOCUMENT_ROOT'].'/library/functions.php');

function createEvent($orgId, $eventName, $eventDate, $eventLocation){
    $conn = databaseConnection();
    try{
        $sql ='INSERT INTO events (orgId, eventName, eventDate, eventLocation) VALUES (:orgId, :eventName, :eventDate, :eventLocation)';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':orgId', $orgId, PDO::PARAM_STR);
        $stmt->bindValue(':eventName', $eventName, PDO::PARAM_STR);
        $stmt->bindValue(':eventDate', $eventDate, PDO::PARAM_STR);
        $stmt->bindValue(':eventLocation', $eventLocation, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();       
    } catch (PDOException $ex) {
        
    }
    
    if($result){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

  function eventId($eventName){
       $conn= databaseConnection();
    try{
        $sql = 'SELECT event_id FROM events WHERE eventName = :eventName';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':eventName', $eventName, PDO::PARAM_STR);
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