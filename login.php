@ -1,116 +1,98 @@
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
        
    <title>Login</title>

    
    
</head>
<body>
    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();
@ -23,6 +23,8 @@

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";

    
    
    // Set the new timezone
    date_default_timezone_set('Asia/Aden');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
@ -35,20 +37,28 @@
    include("connection.php");

    

 


    if($_POST){

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        $password=$_POST ['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';

        
                
      
        $result= $database->query("select * from webuser where email='$email'");
        
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                //TODO
                $checker = $database->query("SELECT * FROM `account` where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){
           


                    //   Patient dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    
                    header('location: patient/index.php');

            
            if (password_verify($password, $userpassword)){
                //TODO
                $checker = $database->query("SELECT * FROM `account` where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){
@ -63,6 +73,8 @@
                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }
                
                

            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


@ -73,6 +85,8 @@
                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                   
                   
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }elseif($utype=='d'){
                //TODO
                $checker = $database->query("SELECT * FROM `doctor` WHERE docemail='$email' AND docpassword='$password'");
                if ($checker->num_rows==1){


                    //   doctor dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }
            
@ -101,23 +115,41 @@
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }
    





    }else{
    $error='<label for="promter" class="form-label">&nbsp;</label>';
}

    ?>

