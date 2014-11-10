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
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>Join Existing Event</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/styles.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Join Event
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <main>
                <div id="errors"><?php echo $errors?></div>
                <ul style='list-style-type: none'>
                    <li><a href="count.php">Event 1</a></li>
                    
                </ul>
               
            </main>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
    </body>
    <?php unset($_SESSION['message']);?>
</html>

