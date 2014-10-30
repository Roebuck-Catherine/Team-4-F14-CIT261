<?php 
if(!$_SESSION){
   session_start();
}
if (!$_SESSION['is_logged_in'] == 1 ){
     header('Location: ../index.php');
     exit;
 }

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
                <button onclick="document.location='/'" class="choiceButton">Join Existing Event</button>
            </main>
        </div>
    </body
    <?php unset($_SESSION['message']);?>
</html>