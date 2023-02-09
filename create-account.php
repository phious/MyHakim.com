<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    
        @media (min-width: 320px) and (max-width: 480px) {
           .container{
            margin: 0;
            padding: 0;
            width: 100%;
            h
           }
        }
        @media (min-width: 481px) and (max-width: 768px) {
            .container{
            margin: 0;
            padding: 0;
            width: 100%;
            
           }
        }
        @media (min-width: 769px) and (max-width: 1024px) {
            .container{
            margin: 0;
            padding: 0;
            width: 70%;
            
           }

        }
    </style>
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables
require_once 'controllers/authController.php';


$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Aden');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


//import database
include("connection.php");





if(isset($_POST['singnup-btn'])){

    $result= $database->query("select * from webuser");

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $name=$fname." ".$lname;
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $sqlmain= "select * from webuser where email=?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            //TODO
            $token = bin2hex(random_bytes(50));
            $hash = password_hash($newpassword, PASSWORD_DEFAULT);
            $database->query("INSERT INTO `webuser` (name,email,token,tel,password,usertype) VALUES ('$name','$email','$token','$tele','$hash','p')");

            
            //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$address','$nic','$dob','$tele');");
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }if (count($errors) === 0 ){
        $verified = false;
        $sql = "INSERT INTO webuser (verified) VALUES (?)";
        $stmt = $database->prepare($sql);
        $stmt->bind_param('s',$verified);

        if ($stmt->execute()){
            //login user
            $user_id = $database->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;


            sendVerificationEmail($email, $token);

            // set flash message

            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('Location: verification.php');

            
            
        }
        
        else {
            $errors['db_error'] = "Database error: failed to register";
        }
    }
    else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }



    
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}
if ( isset($_GLOBAL['is_included']) ) { return; }
?>
    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">Add account informations</p>
                </td>
            </tr>
            <tr>
                <form action="create-account.php" method="POST" >
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Name: </label>
                        </td>
            </tr>
                    <tr>
                        <td class="label-td">
                            <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                        </td>
                        <td class="label-td">
                            <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                                <label for="newemail" class="form-label">Email: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                        </td>
                        
                    </tr>
                    <tr>
                    <tr>
                        <td class="label-td" colspan="2">
                                <label for="tele" class="form-label">Telephone Number: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="telephonenumber" name="tele" class="input-text" placeholder="Tel No" required>
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="newpassword" class="form-label">Create New Password: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="password" name="newpassword" class="input-text" placeholder="New Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="cpassword" class="form-label">Confirm Password: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" required>
                        </td>
                    </tr>
            
                    <tr>
                        <td colspan="2">
                            <?php echo $error ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                        </td>
                        <td>
                            <input type="submit" name='singnup-btn' value="Sign Up" class="login-btn btn-primary btn">
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                            <a href="login.php" class="hover-link1 non-style-link">Login</a>
                            <br><br><br>
                        </td>
                    </tr>


                </form>
            </tr>
        </table>

    </div>
</center>

</body>
</html>