<?php 
include('include/header.php');
include('include/navbar.php');


session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='dev'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }

}else{
    header("location: ../login.php");
}

//import database
include("../connection.php");


?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                          

                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                    </ul>
                 <style>
                    h1{
                        width: 700px;
                    }
                 </style>

                 <div>
                 <h1>Statistics</h1>
                </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>       <button class="btn btn-dark" onclick="window.location.href = '../logout.php'; ">
                                                                                                                Logout
                                                                                                                </button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            require '../connection.php';
                                            $query = "SELECT pid FROM `patient` ORDER BY pid";
                                            $query_run = mysqli_query($database, $query);

                                            $row = mysqli_num_rows($query_run);
                                            echo '<h4>All patients: '.$row.'</h4>';
                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            require '../connection.php';
                                            $query = "SELECT pid FROM `account` ORDER BY pid";
                                            $query_run = mysqli_query($database, $query);

                                            $row = mysqli_num_rows($query_run);
                                            echo '<h4>Registered accounts: '.$row.'</h4>';
                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            require '../connection.php';
                                            $query = "SELECT id FROM `admin` ORDER BY id";
                                            $query_run = mysqli_query($database, $query);

                                            $row = mysqli_num_rows($query_run);
                                            echo '<h4>Admins: '.$row.'</h4>';
                                            ?> 
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>


                        <!-- Area Chart -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the area chart can be found in the
                                    <code>/js/demo/chart-area-demo.js</code> file.
                                </div>
                            </div>
                        


                        

                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        

    


<?php
include('include/scripts.php');
include('include/footer.php');
?>
   
    

