<?php
//$errorStyle is found in LIBRARY FOLDER in functions FILE.
if (!$_SESSION) {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'].'/eventChoice/model.php';

if ($_POST['action']== 'Create Event') {
    $eventName = verifyString($_POST['eventName']);
        if (empty($eventName)) {
            $eventNameError = $errorStyle;
            $errors .= 'Please enter an event name<br>';   
        }
    $eventDate = verifyString($_POST['eventDate']);
        if (empty($eventDate)) {
            $eventDateError = $errorStyle;
            $errors .= 'Please enter an event date<br>';   
        }
    $eventLocation = verifyString($_POST['eventLocation']);
        if (empty($eventLocation)) {
            $eventLocationError = $errorStyle;
            $errors .= 'Please enter an event location<br>';   
        }

    if (isset($errors)) {
        include '/createEvent.php';
        exit;
    }
    
    $eventCreated = createEvent($_SESSION['orgId'], $eventName, $eventDate, $eventLocation);
    
    if($eventCreated){
        $_SESSION['eventId'] = eventId($eventName);
        $_SESSION['eventName'] = $eventName;
        header('Location: /countScreen');
        exit;
    }
    
    else {
        $errors = "There was an error creating the event, or it may already exist. Please try again.";
        include 'createEvent.php';
        exit;
    }
}
else {
    //gets only events that are for the organization and events that are not of a past date.
    $events = getEvents($_SESSION['orgId']);
    
    $output = "<ul id='eventList'>";
        foreach ($events as $event){
            $currdate = date('m/d/Y', strtotime($event[2]));
            $output .= "<li><a href='$event[0]'>$event[1] $currdate</a></li>";
        }
    $output .="</ul>";

    include 'choiceScreen.php'; 
}
   