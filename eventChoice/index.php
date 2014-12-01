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
        $count = substr_count($errors, '<br>');
        if($count == 3){
            $errors = "The form cannot be left blank...<br>RED FIELDS ARE REQUIRED";
        }
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

if ($_GET['action'] == joinEvent){
    $_SESSION['eventId'] = verifyInt($_GET['eventId']);
    $_SESSION['eventName'] = verifyString($_GET['eventName']);
    header('Location: /countScreen');
    exit;
}

else {
    //gets only events that are for the organization and events that are not of a past date.
    $events = getEvents($_SESSION['orgId']);

    $output = "<div id='eventChoice'><ul id='eventList'>";
        foreach ($events as $event){
            $currdate = date('m/d/Y', strtotime($event[2]));
            $output .= "<li><a href='/eventChoice/?action=joinEvent&eventId=$event[0]&eventName=$event[1]'>$event[1] $currdate</a></li>";
        }
    $output .="</ul></div>";

    include 'choiceScreen.php';
    
}
   