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

//$result = updateCount();
echo 5;
return true;