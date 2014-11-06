<?php

if (!$_SESSION) {
    session_start();
}

if (isset($_SESSION['eventId']) && isset($_SESSION['eventName'])){
    include 'count.php';
    exit;
}
else {
    header('Location: /eventChoice');
    exit;
}