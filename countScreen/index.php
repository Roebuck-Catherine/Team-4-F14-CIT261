<?php

if (!$_SESSION) {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'].'/countScreen/model.php';

if (isset($_SESSION['eventId']) && isset($_SESSION['eventName'])){
//    $totalCount = getTotalCount($_SESSION['eventId']);
    include 'count.php';
    exit;
}
else {
    $_SESSION['errors'] = 'You must join an event BEFORE you can start counting...';
    header('Location: /eventChoice');
    exit;
}