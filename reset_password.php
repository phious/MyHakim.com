<?php require 'controllers/authController.php';
if(isset($_GET['password-token'])){
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
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
  
      <title>Login</title>
  
  </head>
  
  <body>
  <center>
        <div class="container">
            <table border="0" style="margin: 0;padding: 0;width: 60%;">
                <form class="user" action="login.php" method="post">
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
                            <p class="sub-text">Confirm new password.</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <label for="userpassword" class="form-label">Password: </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td">
                            <input type="Password" name="password" class="input-text" placeholder="Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <label for="userpassword" class="form-label">Re-enter password: </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td">
                            <input type="Password" name="passwordConf" class="input-text" placeholder="Re-enter password" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Reset password"  name="reset-password-btn" class="login-btn btn-primary btn">
                        </td>
                    </tr>
                </form>
            </table>

        </div>
    </center>
  
  </body>
  
  </html>  
</body>
</html>

 
</section>
