<?php 
if(!$_SESSION){
    session_start();
 }
 if (!$_SESSION['is_logged_in'] == 1){
         // not logged in move to login page
         header('Location: /index.php');
         exit;
     }
     
date_default_timezone_set("America/Los_Angeles");


require $_SERVER['DOCUMENT_ROOT'].'/admin/model.php';


$id = $_SESSION['eventId'];
$result = getTotalCount($eventId);
return $result;