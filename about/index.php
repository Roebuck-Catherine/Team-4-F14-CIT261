<!DOCTYPE html>
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>About Tally</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/styles.php'; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/library/functions.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Learn About Tally
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <main>
                <h1>Everything you need to know about Tally.</h1><br>
                <h2>What is Tally?</h2>
                <p>Tally is the new innovative way to count large bodies of people.</p>
                <p class="fineprint">More information coming soon...</p>
            </main>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
    </body>
    <?php unset($_SESSION['message']);?>
</html>
