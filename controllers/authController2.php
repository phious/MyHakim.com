<?php

session_start();
require '../connection.php';
require_once 'emailController2.php';  

$errors = array();
$username = "";
$email = "";


function approval($token)
{
    global $database;
    $sql = "SELECT * FROM pending_patient WHERE token='$token'  LIMIT 1 ";
    $result = mysqli_query($database, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('Location: pending_appointments.php');
    exit(0);
}

function deny($token)
{
    global $database;
    $sql = "SELECT * FROM pending_patient WHERE token='$token'  LIMIT 1 ";
    $result = mysqli_query($database, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('Location: pending_appointments.php');
    exit(0);
}
