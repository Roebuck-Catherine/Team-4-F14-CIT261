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
$user_id = verifyInt($_SESSION['user_id']);
$eventId = verifyInt($_SESSION['eventId']);
$countValue = verifyInt($_POST['personalCount']);
$countDate = date("Y-m-d");

$result = updateCount($user_id, $eventId, $countValue, $countDate);

echo $result;

