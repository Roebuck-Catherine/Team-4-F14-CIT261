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
           Organization Account Login
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
        <main>
            <form method="post" action="/accounts/" id="login" name="loginForm">
                <h1>Account Login</h1>

                <label for="name">Username</label>
                <input class="field" type="text" autofocus style="<?php echo $usernameError ?>" name="username" id="username" value="<?php echo $username ?>">

                <label for="discountAmount">Organization Name</label>
                <input class="field" type="text" style="<?php echo $organizationError ?>" name="organizationName" id="organizationName" value="<?php echo $organizationName ?>">

                <label for='orgPswd'>Organization Password</label>
                <input class="field" type='password' style='<?php echo $passwordError ?>' name='orgPswd' id='orgPswd' value='<?php echo $orgPswd?>'>

                <label for="action">&nbsp;</label>
                <input type="submit" name="action" id="action" value="Login"/>
            </form>

            <p class="fineprint">Don't have an account?  Create one <a href="/accounts/createAccount.php">HERE</a></p>
        </main>
    </body>
</html>
