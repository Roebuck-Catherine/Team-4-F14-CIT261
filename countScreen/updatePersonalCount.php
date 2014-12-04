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


require $_SERVER['DOCUMENT_ROOT'].'/countScreen/model.php';

// Still in progress...
$eventId = $_SESSION['eventId'];
$countValue = $_POST['personalCount'];
$personCount = $_SESSION['username'];
$countDate = date("Y-m-d");

$result = updateCount($eventId, $countValue, $personCount, $countDate);

return $result;