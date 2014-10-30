<?php 
//if(!$_SESSION){
 //  session_start();
//}
//if (!$_SESSION['is_logged_in'] == 1 ){
//     exit;
 //}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tally, The new way to count</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id='header'>
               Counter
        </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <div class="count">
                <div id="errors"><?php echo $errors?></div>
                <h2 class="count">Your Count</h2>
                <div id="personalCount">3285</div>
                <h2 class="count">Total</h2>
                <div id="totalCount">7432</div>
                <div id="minus">-</div>
                <div id="plus">+</div>
        	</div>
    </body
</html>
