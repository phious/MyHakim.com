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
    <style type="text/css">
        @media (min-width: 320px) and (max-width: 480px) {
           .container{
            margin: 0;
            padding: 0;
            width: 100%;
            
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
    <?php
                                                //margin: 0;padding: 0;width: 60%;
    //learn from w3schools.com
    //Unset all the server side variables
    require 'controllers/authController.php';
   
   
    
    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
   
    
    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

   $_SESSION["date"]=$date;

    //import database
    include("connection.php");
   



    if(isset($_POST['login-btn'])){
        $_GLOBAL['is_included'] = true;
    
        include("create-account.php");
        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];

        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            $veridata= $database->query("select * from webuser where email='$email'");
                $verify=$veridata->fetch_assoc()['verified'];
            if ($utype=='p'){
                //TODO
                $re= $database->query("select * from webuser where email='$email'");
                $storedpass=$re->fetch_assoc()['password'];
                if ($verify == '1') {
                if (password_verify($password, $storedpass)) {


                        //   Patient dashbord
                        $_SESSION['user'] = $email;
                        $_SESSION['usertype'] = 'p';


                        header('location: patient/index.php');

                    }
                }
                if ($verify != '1') {
                    header('location: verification.php');
                }
                 else {
                   
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                   
                 }

            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from `admin` where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }elseif($utype=='dev'){
                //TODO
                $checker = $database->query("SELECT * FROM `developers` WHERE devemail='$email' AND devpassword='$password'");
                if ($checker->num_rows==1){


                    //    developers dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='dev';
                    
                    header('location: developer/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }

            elseif($utype=='d'){
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
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }



    }
    
        
    else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>





    <center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Welcome Back!</p>
                </td>
            </tr>
        <div class="form-body">
            <tr>
                <td>
                    <p class="sub-text">Login with your details to continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <label for="userpassword" class="form-label">Password: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <input type="Password" name="userpassword" class="input-text" placeholder="Password" required>
                </td>
            </tr>


            <tr>
                <td><br>
                <?php echo $error ?>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Login" name='login-btn' class="login-btn btn-primary btn">
                </td>
            </tr>
        </div>
            <tr>
                <td>
                    <label for="" class="sub-text" style="font-weight: 180px;">Reset your password&#63; </label>
                    <a href="forgot_password.php" style="font-size: 15px;" class="hover-link1 non-style-link">Forgot password</a>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="" class="sub-text" style="font-weight: 180px;">Don't have an account&#63; </label>
                    <a href="create-account.php" style="font-size: 15px;" class="hover-link1 non-style-link">Sign Up</a>
                    <br><br><br>
                </td>
            </tr>
                        
                        
    
                        
                    </form>
        </table>

    </div>
</center>
</body>
</html>