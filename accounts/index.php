<?php
//accounts controller

if(!$_SESSION){
   session_start();
}
    
require $_SERVER['DOCUMENT_ROOT'].'/accounts/model.php';

if($_POST['action']=='Login'){
    $orgName = verifyString($_POST['orgName']);
    $orgPswd = addslashes($_POST['orgPswd']);
    
    //Form Pre-Submit Validation
    if (empty($orgName)){
        $orgError = $errorStyle;
        $errors .= "Please enter your organization name<br>";
    }
    
    if (empty($orgPswd)){
        $orgPswdError = $errorStyle;
        $errors .= "Please enter your password<br>";
    }
    
    if (isset($errors)){
        $count = substr_count($errors, '<br>');
        if($count == 2){
            $errors = "The form cannot be left blank...<br>RED FIELDS ARE REQUIRED";
        }
        include '../index.php';
        exit;
    }
    
    $serverPass = getServerPass($orgName);
    
    $validPswd = verifyPassword($orgPswd, $serverPass[0]);
    
    if($validPswd){
        $_SESSION['is_logged_in'] = 1;
        $_SESSION['orgId'] = getOrgId($orgName);
        $_SESSION['orgName'] = $orgName;
        header('Location:/accounts/?action=userChoice');
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
        $count = substr_count($errors, '<br>');
        if($count == 7){
            $errors = "The form cannot be left blank...<br>RED FIELDS ARE REQUIRED";
        }
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

if($_GET['action'] == 'userChoice'){
    $users = getUsers($_SESSION['orgId']);
    $currentUsers = "";
        foreach ($users as $value){
            $currentUsers .= "<option value=$value[0]>$value[1]</option>";
        }
    include 'userChoice.php';
    exit;
}

if($_POST['action']== 'Proceed'){
    $user_id = verifyInt($_POST['user']);
    
    $userPswd = addslashes($_POST['userPswd']);
        if (empty($userPswd)){
            $userPswdError = $errorStyle;
            $errors .= "Please enter your password<br>";
        }
    if (isset($errors)){
        $users = getUsers($_SESSION['orgId']);
        $currentUsers = "";
        foreach ($users as $value){
            $currentUsers .= "<option value=$value[0]>$value[1]</option>";
        }
        include 'userChoice.php';
        exit;
    }
    
    $userPswd2 = getUserPswd($user_id);
    
    $validPswd = verifyPassword($userPswd, $userPswd2[0]);
    
    if($validPswd){
        $_SESSION['user_id'] = $user_id;
        $userName = getUserName($user_id);
        $_SESSION['user_name'] = $userName[0];
        header('Location:/eventChoice');
        exit;
    }
    
    else {
        $errors = "Either username or password were not correct";
        $users = getUsers($_SESSION['orgId']);
        $currentUsers = "";
        foreach ($users as $value){
            $currentUsers .= "<option value=$value[0]>$value[1]</option>";
        }
        include 'userChoice.php';
        exit;
    }
}

if ($_POST['action'] == 'Create User'){
    $firstName = verifyString($_POST['firstName']);
    $lastName = verifyString($_POST['lastName']);
    $email = verifyEmail($_POST['email']);
    $pswd = addslashes($_POST['pswd']);
    $pswd2 = addslashes($_POST['pswd2']);
    
      //Form Pre-Submit Validation
    if (empty($firstName)) {
        $firstNameError = $errorStyle;
        $errors .= "Please enter your first name<br>";
    }
    if (empty($lastName)) {
        $lastNameError = $errorStyle;
        $errors .= "Please enter your last name<br>";
    }
    if (empty($email)) {
        $emailError = $errorStyle;
        $errors .= "Please enter your email address<br>";
    }
    if (empty($pswd)) {
        $pswdError = $errorStyle;
        $errors .= "Please enter your password<br>";
    }
    if (empty($pswd2)) {
        $pswd2Error = $errorStyle;
        $errors .= "Please verify your password<br>";
    }
    if ($pswd != $pswd2){
        $pswd2Error = $errorStyle;
        $errors .= "Passwords do not match<br>";
    }
    if (isset($errors)){
        $count = substr_count($errors, '<br>');
        if($count == 5){
            $errors = "The form cannot be left blank...<br>RED FIELDS ARE REQUIRED";
        }
        $users = getUsers($_SESSION['orgId']);
        $currentUsers = "";
        foreach ($users as $value){
            $currentUsers .= "<option value=$value[0]>$value[1]</option>";
        }
        include 'userChoice.php';
        exit;
    }
    $userHashPswd = hashPassword($pswd);
    $newUserName = $lastName . ', ' . $firstName . ' - ' . $email;
    $org_id = $_SESSION['orgId'];
    $joinDate = date('Y-m-d');
    
    $result = addOrgUser($org_id, $newUserName, $userHashPswd, $joinDate);
    
    if ($result){
        $_SESSION['message'] = 'User Added Successfully';
        $user_id = getUserId($newUserName);
        $_SESSION['user_id'] = $user_id[0];
        $_SESSION['user_name'] = $newUserName;
        header('Location: /eventChoice');
        exit;
    }
    else {
        $errors = 'Error Adding user, Username may already be in use...';
        $users = getUsers($_SESSION['orgId']);
        $currentUsers = "";
        foreach ($users as $value){
            $currentUsers .= "<option value=$value[0]>$value[1]</option>";
        }
        include 'userChoice.php';
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

