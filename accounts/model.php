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

function getOrgId($orgName){
    $conn= databaseConnection();
    try{
        $sql = 'SELECT org_id FROM organizations WHERE orgName = :orgName';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':orgName', $orgName, PDO::PARAM_STR);
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

function getUsers($org_id){
    $conn = databaseConnection();
    try{
        $sql = 'SELECT user_id, user_name FROM users WHERE org_id = :orgid ORDER BY user_name ASC';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':orgid', $org_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
            
    } catch (PDOException $ex) {
        echo 'database error';
    }
    if(is_array($data)){
        return $data;
    }
    else{
        return FALSE;
    }
}

function getUserName($user_id){
    $conn = databaseConnection();
    try{
        $sql = 'SELECT user_name FROM users WHERE user_id = :userid';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':userid', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        $stmt->closeCursor();
            
    } catch (PDOException $ex) {
        echo 'database error';
    }
    if(is_array($data)){
        return $data;
    }
    else{
        return FALSE;
    }
}

function getUserPswd($user_id){
    $conn = databaseConnection();
    try{
        $sql = 'SELECT user_pswd FROM users WHERE user_id = :userid';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':userid', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        $stmt->closeCursor();
            
    } catch (PDOException $ex) {
        echo 'database error';
    }
    if(is_array($data)){
        return $data;
    }
    else{
        return FALSE;
    }
}

function addOrgUser($org_id, $newUserName, $userHashPswd, $joinDate){
    $conn = databaseConnection();
    try{
        $sql ='INSERT INTO users (org_id, user_name, user_pswd, join_date) VALUES (:org_id, :newUserName, :userHashPswd, :joinDate)';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':org_id', $org_id, PDO::PARAM_INT);
        $stmt->bindValue(':newUserName', $newUserName, PDO::PARAM_STR);
        $stmt->bindValue(':userHashPswd', $userHashPswd, PDO::PARAM_STR);
        $stmt->bindValue(':joinDate', $joinDate, PDO::PARAM_STR);
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

function getUserId($newUserName){
    $conn = databaseConnection();
    try{
        $sql = 'SELECT user_id FROM users WHERE user_name = :newUserName';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':newUserName', $newUserName, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch();
        $stmt->closeCursor();
            
    } catch (PDOException $ex) {
        echo 'database error';
    }
    if(is_array($data)){
        return $data;
    }
    else{
        return FALSE;
    }
}
