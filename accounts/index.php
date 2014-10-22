<?php
//accounts controller

if(!$_SESSION){
   session_start();
}
    
require $_SERVER['DOCUMENT_ROOT'].'/accounts/model.php';

$errorStyle = 'border: 2px solid #e50000';

if($_POST['action']=='Login'){
    $username = verifyString($_POST['username']);
    $orgName = verifyString($_POST['orgName']);
    $orgPswd = addslashes($_POST['orgPswd']);
    
    //Form Pre-Submit Validation
    if (empty($username)){
        $usernameError = $errorStyle;
        $errors .= "Please enter your username<br>";
    }
    
    if (empty($orgName)){
        $orgError = $errorStyle;
        $errors .= "Please enter your organization name<br>";
    }
    
    if (empty($orgPswd)){
        $orgPswdError = $errorStyle;
        $errors .= "Please enter your password<br>";
    }
    
    if (isset($errors)){
        include '../index.php';
        exit;
    }
    
    $serverPass = getServerPass($orgName);
    
    $validPswd = verifyPassword($orgPswd, $serverPass[0]);
    
    if($validPswd){
        $_SESSION['is_logged_in'] = 1;
        header('Location: /countScreen');
        exit;
    }
    
    else {
        $errors = "Either organization name or password were not correct";
        include '../index.php';
        exit;
    }
}

if ($_POST['action']=='Create Account'){
    // ADD CHECK TO MAKE SURE ACCOUNT DOES NOT ALREADY EXIST!
    
    $organizationName = verifyString($_POST['organizationName']);
    $orgPswd = addslashes($_POST['orgPswd']);
    $orgPswd2 = addslashes($_POST['orgPswd2']);
    
    //Form Pre-Submit Validation
    if (empty($organizationName)){
        $orgError = $errorStyle;
        $errors .= "Please enter an organization name<br>";
    }
    
    if (empty($orgPswd)){
        $pswdError = $errorStyle;
        $errors .= "Please enter a password<br>";
    }
    
    if (empty($orgPswd2)){
        $pswd2Error = $errorStyle;
        $errors .= "Please verify your password<br>";
    }
    
    if ($orgPswd != $orgPswd2){
        $pswd2Error = $errorStyle;
        $errors .= "Passwords must match<br>";
    }
    
    if (isset($errors)){
        include 'createAccount.php';
        exit;
    }
    
    $orgPass = hashPassword($orgPswd);
    
    $result = addUser($organizationName, $orgPass);
    
    if ($result){
        $_SESSION['message'] = 'User Added Successfully';
        header('Location: /');
        exit;
    }
    else {
        $errors = 'Error Adding user, Please Try Again.';
        include '/createAccount';
        exit;
    }
}

if ($_GET['action'] == 'logout'){
    session_destroy();
    header('Location: /');
    exit;
}

else {
    header('Location: /');
    exit;
}

