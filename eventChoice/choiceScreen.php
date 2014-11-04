<?php 
if(!$_SESSION){
   session_start();
}
if (!$_SESSION['is_logged_in'] == 1 ){
     header('Location: ../index.php');
     echo "were not logged in";
     exit;
 }
// include $_SERVER['DOCUMENT_ROOT'].'/eventChoice/model.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Choose Event Type</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Event Type
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <main>
                <div id="errors"><?php echo $errors?></div>
                <button onclick="document.location='createEvent.php'" class="choiceButton">Create New Event</button>
                <button onclick="document.location='#openJoin'" class="choiceButton">Join Existing Event</button>
                
                    <div id="openJoin" class="modalDialog">
                            <div>
                                    <a href="#close" title="Close" class="close"></a>
                                    <h2>Join Event</h2>
                                    <p>List of the Organizations Events</p> 
                                        <ul>
                                            <li>Event 1</li>
                                            <li>Event 2</li>
                                            <li>Event 3</li>
                                        </ul>
                                    
                                    <?php 
                                        /*List of the Events for Organization from database
                                        
                                        $userMatchingEvents = getEvents($_SESSION['orgId']);
                                        
                                        foreach ($userMatchingEvents as $userMatchingEvent){
                                            echo $userMatchingEvent;
                                        }*/
                                    ?>
                            </div>
                    </div>
            </main>
        </div>
    </body>
    <?php unset($_SESSION['message']);?>
</html>
