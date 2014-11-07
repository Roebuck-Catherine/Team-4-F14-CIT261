<?php 
if(!$_SESSION){
   session_start();
}
?>
<!DOCTYPE html>
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>Tally, The new way to count</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Organization Account Login
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>
            <main>
                <div id="errors"><?php echo $errors?></div>
                <form method="post" action="/accounts/" id="login" name="loginForm">
                    <h1>Account Login</h1>

                    <label for="name">Username<span class="required">*</span></label>
                    <input class="field" type="text" placeholder="Your Name" autofocus style="<?php echo $usernameError ?>" name="username" id="username" value="<?php echo $username ?>">

                    <label for="discountAmount">Organization Name<span class="required">*</span></label>
                    <input class="field" type="text" placeholder="i.e. BYU-Idaho" style="<?php echo $orgError ?>" name="orgName" id="orgName" value="<?php echo $orgName ?>">

                    <label for='orgPswd'>Organization Password<span class="required">*</span></label>
                    <input class="field" type='password' placeholder="Get From Admin" style='<?php echo $orgPswdError ?>' name='orgPswd' id='orgPswd' value='<?php echo $orgPswd?>'>

                    <label for="action">&nbsp;</label>
                    <input type="submit" name="action" id="action" value="Login"/>
                </form>

                <p class="fineprint">Don't have an account?  Create one <a href="/accounts/createAccount.php">HERE</a></p>
            </main>
        </div>
    </body>
    <?php unset($_SESSION['message']);?>
</html>
