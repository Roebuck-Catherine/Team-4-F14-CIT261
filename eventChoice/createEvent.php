<?php 
if (!$_SESSION) {
    session_start();
}
if (!$_SESSION['is_logged_in'] == 1 ) {
     header('Location: ../index.php');
     exit;
}

?>
<!DOCTYPE html>
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>Create Event</title>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/modules/styles.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Create Event
            </div>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <main>
                <div id="errors"><?php echo $errors?></div>
                <form method="post" action="." id="createEvent" name="createEvent">
                    <h1>Create Event</h1>

                    <label for="eventName">Event Name<span class="required">*</span></span></span></label>
                    <input class="field" type="text" style="<?php echo $eventNameError ?>" name="eventName" id="eventName" value="<?php echo $eventName ?>">

                    <label for='eventDate'>Event Date (YYYY-MM-DD)<span class="required">*</span></label>
                    <input class="field" type='date' style='<?php echo $eventDateError ?>' name='eventDate' id='eventDate' value='<?php echo $eventDate?>'>

                    <label for='eventLocation'>Event Location<span class="required">*</span></label>
                    <input class="field" type='text' style='<?php echo $eventLocationError ?>' name='eventLocation' id='eventLocation' value='<?php echo $eventLocation?>'>

                    <label for="action">&nbsp;</label>
                    <input type="submit" name="action" id="action" value="Create Event"/>
                </form>
            </main>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
    </body>
    <?php unset($_SESSION['message']);?>
</html>
