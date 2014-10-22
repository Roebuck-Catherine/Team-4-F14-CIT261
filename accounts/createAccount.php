<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tally, The new way to count</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Create Account
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>

            <main>
                <div id="errors"><?php echo $errors?></div>
                <form method="post" action="/accounts/" id="login" name="createAccount">
                    <h1>Create Account</h1>

                    <label for="discountAmount">Organization Name</label>
                    <input class="field" type="text" style="<?php echo $orgError ?>" name="organizationName" id="organizationName" value="<?php echo $organizationName ?>">

                    <label for='orgPswd'>Organization Password</label>
                    <input class="field" type='password' style='<?php echo $pswdError ?>' name='orgPswd' id='orgPswd' value='<?php echo $orgPswd?>'>

                    <label for='orgPswd2'>Confirm Password</label>
                    <input class="field" type='password' style='<?php echo $pswd2Error ?>' name='orgPswd2' id='orgPswd2' value='<?php echo $orgPswd2?>'>

                    <label for="action">&nbsp;</label>
                    <input type="submit" name="action" id="action" value="Create Account"/>
                </form>

                <p class="fineprint">Already have an account?  Sign in <a href="/index.php">HERE</a></p>
            </main>
        </div>
    </body>
    <?php unset($_SESSION['message']);?>
</html>
