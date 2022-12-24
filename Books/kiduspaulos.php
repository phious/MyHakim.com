<?php
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "database";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn) {
  die("connection failed: " . mysqli_connect_error());
}

if (isset($_POST["save"])) {
  $fullName = $_POST['fullName'];
  $phoneNo = $_POST["phoneNo"];
  $category = $_POST["category"];
  $address = $_POST["address"];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];

 
  
  $query = "INSERT INTO `h_crew` (`fullName`, `phoneNo`, `category`, `address`, `city`,  `gender`, `age`) VALUES ('$fullName', '$phoneNo', '$category', '$address', '$city', '$gender', '$age')";
  $data = mysqli_query($conn, $query);

  
}

?>


<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>P-client</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style3.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/script.js" defer></script>

</head>

<body class="bg-gradient">

    <div class="container">
    <div class="col-xl-11 col-lg-9 col-md-8">
        <div class="card o-hidden border-0 my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-9">
                        <div class="p-5">
                            <div class="text-center">
                            </div>
                            <section class="book" id="book">
                                <h1 class="heading">
                                    <span>b</span>
                                    <span>o</span>
                                    <span>o</span>
                                    <span>k</span>
                                    <span class="space"></span>
                                    <span>n</span>
                                    <span>o</span>
                                    <span>w</span>
                                </h1>
                            </section>
                            <form class="user" method ='POST' enctype="multipart/form-data">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Full name</label>
                                    <input name='fullName' type="text" class="form-control" id="inputEmail4" placeholder="fullname">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Phone no</label>
                                    <input name='phoneNo' type="text" class="form-control" id="inputPassword4" placeholder="phone number">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress">City</label>
                                  <input name="city" type="text" class="form-control" id="inputAddress" placeholder="Enter city">
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress">Address</label>
                                  <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                
                                <div class="form-row">
                                <div class="form-group">
                                            <label>Gender</label>
                                            <input name="gender" type="text" class="form-control" placeholder="Enter gender">
                                        </div>
                                  <div class="form-group col-md-2">
                                    <label for="inputZip">Age</label>
                                    <input name="age" type="text" class="form-control" id="inputAge">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress">Category</label>
                                  <input name="category" type="text" class="form-control" id="inputAddress" placeholder="category">
                                </div>
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                      Check me out
                                    </label>
                                  </div>
                                </div>
                                <button name="save" type="submit" class="btn btn-primary">Book</button>
                              </form>
                            <hr>
                            <div class="text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="footer bg-danger py-2">
        <div class="container grid grid-3">
            <div>
                <h1>Booking platform</h1>
                <p>Copyright &copy; 2022 NN.plc</p>
            </div>
            <nav>
                <ul>
                    <li>We make your appointment easy!</li>
                </ul>
            </nav>
            <div class="social">
                <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="#"><i class="fab fa-github fa-2x"></i></a>
                <!-- icons using fa -->
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>