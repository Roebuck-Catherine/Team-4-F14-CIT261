<?php

if (!$_SESSION) {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'].'/countScreen/model.php';

if ($_GET['action'] == 'finalSubmit'){
     unset($_SESSION['eventId']);
     unset($_SESSION['eventName']);
     
     header('Location: /eventChoice');
     exit;
}

if (isset($_SESSION['eventId']) && isset($_SESSION['eventName'])){
    include 'count.php';
    exit;
}
    
else {
    $_SESSION['errors'] = 'You must join an event BEFORE you can start counting...';
    header('Location: /eventChoice');
    exit;
}