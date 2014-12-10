<?php 
if(!$_SESSION){
   session_start();
}
if (!$_SESSION['is_logged_in'] == 1 ){
     header('Location: ../index.php');
 }
if (!$_SESSION['user_id']){
    header('Location:/accounts/?action=userChoice');
    exit;
}
// include $_SERVER['DOCUMENT_ROOT'].'/eventChoice/model.php';

?>
<!DOCTYPE html>
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>Choose Event Type</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/styles.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Event Type
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <main>
                <div id="errors"><?php echo $errors?><?php echo $_SESSION['errors']?></div>
                <button onclick="document.location='createEvent.php'" class="choiceButton">Create New Event</button>
                <button onclick="document.location='#openJoin'" class="choiceButton">Join Existing Event</button>
                
                    <div id="openJoin" class="modalDialog">
                        <div>
                            <a href="#close" title="Close" class="close">Cancel</a>
                            <h2>Join Event</h2>
                            <p>Please select an event</p> 
                                <?php echo $output?>
                        </div>
                    </div>
            </main>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
    </body>
    <?php 
    unset($_SESSION['message']);
    unset($_SESSION['errors']);
    ?>
</html>
