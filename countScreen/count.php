<?php 
if(!$_SESSION){
   session_start();
}
if (!$_SESSION['is_logged_in'] == 1 ){
    header("Location: /");
    exit;
 }

?>
<!DOCTYPE html>
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>Tally, The new way to count</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/styles.php'; ?>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body ng-app="">
        <div>
        <div id='header'>
               Counting For: <?php echo $_SESSION['eventName']?>
        </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <div class="count">
                <div id="errors"><?php echo $errors?></div>
                <h2 class="count">Your Count</h2>
                <div id="personalCount">{{personalCount}}</div>
                <h2 class="count">Total</h2>
                <div id="totalCount"></div>
            </div>
            <button id="minus" ng-click="personalCount=personalCount-1">-</button>
            <button id="plus" ng-click="personalCount=personalCount+1">+</button>
        </div> 
        <script type="text/javascript" src="/library/angular.min.js"></script>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
    </body>
</html>
