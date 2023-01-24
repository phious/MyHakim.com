<?php require 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">

    <title>Forgot Password</title>

</head>

<body>
<center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <form class="user" action="forgot_password.php" method="post">
                                        <?php if(count($errors) > 0 ):?>
                                            <div class="alert alert-danger">
                                                <?php foreach($errors as $error): ?>
                                                    <li><?php echo $error; ?></li>
                                                <?php endforeach; ?>
                                            </div> 
                                        <?php endif; ?>
                                        <tr>
                                            <td>
                                                <p class="header-text">Welcome Back!</p>
                                            </td>
                                        </tr>
                                    <div class="form-body">
                                        <tr>
                                            <td>
                                                <p class="sub-text">Forgot Your password?</p>
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
                                                <input type="email" name="email" class="input-text" placeholder="Email Address" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="submit" name="forgot-password" value="Reset password" class="login-btn btn-primary btn">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                                                <a href="login.php" class="hover-link1 non-style-link">Login</a>
                                                <br><br><br>
                                            </td>
                                        </tr>
          </form>
   
        </table>

    </div>
</center>                        
                                    

</body>

</html>