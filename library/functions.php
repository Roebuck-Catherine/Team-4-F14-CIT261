<?php

/* 
 * Functions Library
 */

function databaseConnection(){
        $server = 'localhost';
        $username = 'franzeni_iClient';
        $passwd = '11773218d21e7bf4c5e40f7ba1';
        $database = 'franzeni_tally';
        $dsn = "mysql:host=$server; dbname=$database";

        try{
            $conn = new PDO($dsn, $username, $passwd); //creates a PDO Object
        } catch (PDOException $exc) {
                echo "<p>An error occurred while connecting to the database</p>";
        }
        
        if(is_object($conn)){
            return $conn;
        }
        else{
            return FALSE;
        }
}


function hashPassword($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

function verifyPassword($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

function verifyString($string){
    $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    return $string;
}

function verifyEmail($email){
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $email;
}

function verifyInt($int){
    $int = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    return $int;
}



//global variables

//error style for forms (Border Color)
$errorStyle = 'border: 2px solid #e50000';