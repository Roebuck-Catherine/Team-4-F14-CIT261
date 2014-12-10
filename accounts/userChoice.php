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
        <link rel="stylesheet" type="text/css" href="/formStyle.css">
    </head>
    <body>
        <div>
            <div id='header'>
               Select User
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php' ?>

            <main>
                <div id="errors"><?php echo $errors?></div>
                
                <form method="post" action="/accounts/" id="selectUser" name="selectUser">
                    <h1>Select User</h1>
                        <select name="user" id='user'>
                            <?php echo $currentUsers?>
                        </select>
                    <label for='userPswd'>User Password<span class="required">*</span></label>
                    <input class="field" type='password' style='<?php echo $userPswdError ?>' name='userPswd' id='userPswd' value='<?php echo $userPswd?>'> 
                    <br>
                    <label for="action"></label>   
                    <input type="submit" name="action" id="action" value="Proceed"/>
                    <br>
                </form>
               
                <form method="post" action="/accounts/" id="newUser" name="newUser">
                    <h1 id="createUserLabel">Create New User</h1>
                    <label for="firstName">First Name<span class="required">*</span></label>
                    <input class="field" type="text" style="<?php echo $firstNameError ?>" name="firstName" id="firstName" value="<?php echo $firstName ?>">
                    
                    <label for="lastName">Last Name<span class="required">*</span></label>
                    <input class="field" type="text" style="<?php echo $lastNameError ?>" name="lastName" id="lastName" value="<?php echo $lastName ?>">
                    
                    <label for="email">Personal Email Address<span class="required">*</span></label>
                    <input class="field" type="email" placeholder="example@gmail.com" style="<?php echo $emailError ?>" name="email" id="email" value="<?php echo $email ?>">
                    
                    <label for='pswd'>Create Password<span class="required">*</span></label>
                    <input class="field" type='password' style='<?php echo $pswdError ?>' name='pswd' id='pswd' value='<?php echo $pswd?>'>

                    <label for='pswd2'>Confirm Password<span class="required">*</span></label>
                    <input class="field" type='password' style='<?php echo $pswd2Error ?>' name='pswd2' id='pswd2' value='<?php echo $pswd2?>'>
                    
                    <label for="action">&nbsp;</label>
                    <input type="submit" name="action" id="action" value="Create User"/>
                </form>
            </main>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/script.php'; ?>
    </body>
    <?php unset($_SESSION['message']);?>
</html>
