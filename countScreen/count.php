<?php 
if(!$_SESSION){
   session_start();
}
if (!$_SESSION['is_logged_in'] == 1 ){
     exit;
 }

?>
<!DOCTYPE html>
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>Tally, The new way to count</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <!--Odometer Stuff-->
        <link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-car.css" />
        <script src="http://github.hubspot.com/odometer/odometer.js"></script>

        <style>
        .odometer {
            font-size: 100px;
        }
        </style>
    </head>
    <body>
        <div>
        <div id='header'>
               <?php echo $_SESSION['eventName']?> Count
        </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <div class="count">
                <div id="errors"><?php echo $errors?></div>
                <h2 class="count">Your Count</h2>
                <div id="personalCount"></div>
                <h2 class="count">Total</h2>
                <div id="totalCount"></div>
            </div>
            <button id="minus" onclick="countAlter('subtract')">-</button>
            <button id="plus" onclick="countAlter('add')">+</button>
        </div> 
    </body>
</html>
