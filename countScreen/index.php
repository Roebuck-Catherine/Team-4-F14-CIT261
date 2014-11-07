<?php

if (!$_SESSION) {
    session_start();
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