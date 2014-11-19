<?php
//accounts controller

if(!$_SESSION){
   session_start();
}
    
require $_SERVER['DOCUMENT_ROOT'].'/accounts/model.php';

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
        $_SESSION['username'] = $username;
        $_SESSION['orgId'] = getOrgId($orgName);
        header('Location:/eventChoice');
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
    $adminName = verifyString($_POST['adminName']);
    $adminEmail = verifyEmail($_POST['adminEmail']);
    $adminPswd = addslashes($_POST['adminPswd']);
    $adminPswd2 = addslashes($_POST['adminPswd2']);
    
    $organizationName = verifyString($_POST['organizationName']);
    $orgPswd = addslashes($_POST['orgPswd']);
    $orgPswd2 = addslashes($_POST['orgPswd2']);
    
    //Form Pre-Submit Validation
    if (empty($adminName)) {
        $adminNameError = $errorStyle;
        $errors .= "Please enter your admin name<br>";
    }
    if (empty($adminEmail)) {
        $emailError = $errorStyle;
        $errors .= "Please enter your admin email<br>";
    }
    if (empty($adminPswd)) {
        $adminPswdError = $errorStyle;
        $errors .= "Please enter your admin password<br>";
    }
    if (empty($adminPswd2)) {
        $adminPswd2Error = $errorStyle;
        $errors .= "Please verify your admin password<br>";
    }
    if ($adminPswd != $adminPswd2){
        $adminPswd2Error = $errorStyle;
        $errors .= "Admin passwords must match<br>";
    }
    
    if (empty($organizationName)){
        $orgError = $errorStyle;
        $errors .= "Please enter an organization name<br>";
    }
    
    if (empty($orgPswd)){
        $pswdError = $errorStyle;
        $errors .= "Please enter your org. password<br>";
    }
    
    if (empty($orgPswd2)){
        $pswd2Error = $errorStyle;
        $errors .= "Please verify your org. password<br>";
    }
    
    if ($orgPswd != $orgPswd2){
        $pswd2Error = $errorStyle;
        $errors .= "Organizations passwords must match<br>";
    }
    
    if (isset($errors)){
        include 'createAccount.php';
        exit;
    }
    
    $adminPass = hashPassword($adminPswd);
    $orgPass = hashPassword($orgPswd);
    
    $result = addUser($organizationName, $orgPass, $adminName, $adminEmail, $adminPass);
    
    if ($result){
        $_SESSION['message'] = 'User Added Successfully';
        header('Location: /index.php');
        exit;
    }
    else {
        $errors = 'Error Adding user, Please Try Again.';
        include 'createAccount';
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

