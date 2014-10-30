<?php


require $_SERVER['DOCUMENT_ROOT'].'/library/functions.php';

function addUser($organizationName, $orgPass, $adminName, $adminEmail, $adminPass){
    $conn = databaseConnection();
    try{
        $sql ='INSERT INTO organizations (orgName, orgPswd, adminName, adminEmail, adminPswd) VALUES (:orgName, :orgPswd, :adminName, :adminEmail, :adminPswd)';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':orgName', $organizationName, PDO::PARAM_STR);
        $stmt->bindValue(':orgPswd', $orgPass, PDO::PARAM_STR);
        $stmt->bindValue(':adminName', $adminName, PDO::PARAM_STR);
        $stmt->bindValue(':adminEmail', $adminEmail, PDO::PARAM_STR);
        $stmt->bindValue(':adminPswd', $adminPass, PDO::PARAM_STR);
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

function getServerPass($orgName){
    $conn= databaseConnection();
    try{
        $sql = 'SELECT orgPswd FROM organizations WHERE orgName = :orgName';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':orgName', $orgName, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch();
        $stmt->closeCursor();
        
    } catch (PDOException $ex) {
        $message = 'Sorry, There was an error';
    }
    if(is_array($data)){
        return $data;
    }
    else{
        $_SESSION['message']='Sorry, and error occured with the database.';
    }
}
