<?php
session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Aden');
$date = date('Y-m-d');

$_SESSION["date"]=$date;

//import database
include("connection.php");

if($_POST){

    $result= $database->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $email=$_POST['newemail'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $sqlmain= "select * from webuser where email=?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email Address.</label>';
        }else{
            //TODO
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
<<<<<<< Updated upstream
            $token = bin2hex(random_bytes(50));
            $verified = false;
            $database->query("INSERT INTO `account`(pemail,pname,ppassword) values('$email','$name','$newpassword');");
            $database->query("INSERT INTO `webuser` values('$email','p')");
=======

            $database->query("insert into patient(pemail,pname,ppassword, pcity,pdob,ptel) values('$email','$name','$newpassword','$city','$dob','$tele');");
            $database->query("insert into webuser values('$email','p')");
>>>>>>> Stashed changes

            //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$city','$dob','$tele');");
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;
           
            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconfirm Password</label>';
    }
    
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}

