<?php

if ($_POST['action']== 'Create Event') {
    $eventName = verifyString($_POST['eventName']);
        if (empty($eventName)) {
            $eventNameError = $errorStyle;
            $errors .= 'Please enter an event name';   
        }
    $eventDate = verifyString($_POST['eventDate']);
    $eventLocation = verifyString($_POST['eventLocation']);

    if (isset($errors)) {
        include '/createEvent.php';
        exit;
    }

}

else {
    include 'choiceScreen.php'; 
}
   