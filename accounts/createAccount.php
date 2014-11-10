<!DOCTYPE html>
<html manifest="/library/manifest.appcache">
    <head>
        <meta charset="UTF-8">
        <title>Tally, The new way to count</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/styles.php'; ?>
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

                    <label for="adminName">Admin Name<span class="required">*</span></label>
                    <input class="field" type="text" style="<?php echo $adminNameError ?>" name="adminName" id="adminName" value="<?php echo $adminName ?>">
                    
                    <label for="adminEmail">Admin Email<span class="required">*</span></label>
                    <input class="field" type="email" placeholder="example@gmail.com" style="<?php echo $emailError ?>" name="adminEmail" id="adminEmail" value="<?php echo $adminEmail ?>">
                    
                    <label for='adminPswd'>Admin Password<span class="required">*</span></label>
                    <input class="field" type='password' style='<?php echo $adminPswdError ?>' name='adminPswd' id='adminPswd' value='<?php echo $adminPswd?>'>

                    <label for='adminPswd2'>Confirm Admin Password<span class="required">*</span></label>
                    <input class="field" type='password' style='<?php echo $adminPswd2Error ?>' name='adminPswd2' id='adminPswd2' value='<?php echo $adminPswd2?>'>
                    
                    <label for="organizationName">Organization Name<span class="required">*</span></label>
                    <input class="field" type="text" placeholder="i.e. BYU-Idaho" style="<?php echo $orgError ?>" name="organizationName" id="organizationName" value="<?php echo $organizationName ?>">
                    
                    <label for='orgPswd'>Organization Password<span class="required">*</span></label>
                    <input class="field" type='password' style='<?php echo $pswdError ?>' name='orgPswd' id='orgPswd' value='<?php echo $orgPswd?>'>

                    <label for='orgPswd2'>Confirm Org. Password<span class="required">*</span></label>
                    <input class="field" type='password' style='<?php echo $pswd2Error ?>' name='orgPswd2' id='orgPswd2' value='<?php echo $orgPswd2?>'>

                    <label for="action">&nbsp;</label>
                    <input type="submit" name="action" id="action" value="Create Account"/>
                </form>

                <p class="fineprint">Already have an account?  Sign in <a href="/index.php">HERE</a></p>
            </main>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
    </body>
    <?php unset($_SESSION['message']);?>
</html>
