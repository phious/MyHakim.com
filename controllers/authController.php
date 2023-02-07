<?php

session_start();
require 'connection.php';
require_once 'emailController.php';  

$errors = array();
$username = "";
$email = "";



function verifyUser($token)
{
    global $database;
    $sql = "SELECT * FROM webuser WHERE token='$token' LIMIT 1";
    $result = mysqli_query($database, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE webuser SET verified=1 WHERE token='$token' ";

        if (mysqli_query($database, $update_query)) {
            // log user in
             $_SESSION['email'] = $user['email'];
             $_SESSION['verified'] = 1;
             // set flash message
 
             $_SESSION['message'] = "Your email address was successfully verified!";
             $_SESSION['alert-class'] = "alert-success";
             header('Location: patient/index.php');
             exit();

        }
        else{
            echo 'User not found';
        }
    }
}


// Forgot password clicks

if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid";
    }
    
    if(empty($email)){
        $errors['email'] = "email required";

    }

    if (count($errors) == 0) {
        $sql = "SELECT * FROM webuser WHERE email='$email' LIMIT 1 ";
        $result = mysqli_query($database, $sql);
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        sendPasswordResetLink($email, $token);
        header('Location: password_message.php');
        exit(0);
    }
}

// Reset button clicked

if (isset($_POST['reset-password-btn'])) {
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if(empty($password) || empty($passwordConf) ){
        $errors['password'] = "Password required";

    }

    if ($password != $passwordConf) {
        $errors['password'] = " The two password don't match";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if (count($errors) == 0) {
        $sql = "UPDATE webuser SET password='$password' WHERE email='$email' ";
        $result = mysqli_query($database, $sql);
        if ($result) {
            header('Location: login.php');
        }
    }
}

function resetPassword($token)
{
    global $database;
    $sql = "SELECT * FROM webuser WHERE token='$token'  LIMIT 1 ";
    $result = mysqli_query($database, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('Location: reset_password.php');
    exit(0);
}

// verify users using token
if(isset($_GET['password-token'])){
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}

if(isset($_GET['token'])){
    $token = $_GET['token'];
    verifyUser($token);
}