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
         @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
        </style>
    <?php

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
                    <label for="" class="sub-text" style="font-weight: 180;">Don't have an account&#63; </label>
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