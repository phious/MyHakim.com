<?php require 'controllers/authController.php'; ?>
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
  
      <title>Login</title>
  
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
  
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  </head>
  
  <body class="bg-gradient">
  
      <div class="container">
  
          <!-- Outer Row -->
          <div class="row justify-content-center">
  
              <div class="col-xl-7 col-lg-7 col-md-7">
  
                  <div class="card o-hidden border-0 my-5">
                      <div class="card-body p-0">
                          <!-- Nested Row within Card Body -->
                          <div class="row">
                              <div class="col-lg-10">
                                  <div class="p-5">
                                      <div class="text-center">
                                          <h1 class="h4 text-gray-900 mb-4">Reset your password!</h1>
                                      </div>
                                      <form class="user" action="login.php" method="post">
                                            <?php if(count($errors) > 0 ):?>
                                                <div class="alert alert-danger">
                                                    <?php foreach($errors as $error): ?>
                                                        <li><?php echo $error; ?></li>
                                                    <?php endforeach; ?>
                                                </div> 
                                            <?php endif; ?>
                                          <div class="form-group">
                                              <input type="password"  name="password"  class="form-control form-control-user"
                                                  id="exampleInputEmail" aria-describedby="emailHelp"
                                                  placeholder="Password">
                                          </div>
                                          <div class="form-group">
                                              <input type="password" name="passwordConf" class="form-control form-control-user"
                                                  id="exampleInputPassword" placeholder="Re-enter password">
                                          </div>
                                          <button class="btn btn-primary btn-user btn-block" type="submit" name="reset-password-btn" >Reset Password</button>
                                           
                                              
                                          </a>
                                          <hr>
                                          
                                      </form>
                                            
                                      <hr>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
  
              </div>
  
          </div>
  
      </div>
  
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
  
  </body>
  
  </html>  
</body>
</html>

 
</section>
