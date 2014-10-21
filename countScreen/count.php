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
        <title>Tally, The new way to count</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div id='header'>
           Counter
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
        <main>
            <div id="errors"><?php echo $errors?></div>
            <h1>Counter will be here...</h1>
        </main>
    </body
    <?php unset($_SESSION['message']);?>
</html>
