<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $hospitalName = $_POST['hosname'];
    $address = $_POST['hosaddress'];
    $email = $_POST['hosemail'];
    $tele = $_POST['hostel'];

    

            
            $query = "INSERT INTO `hospital` (hosname, hosaddress, hosemail, hostel) VALUES ('$hospitalName', '$address', '$email', '$tele')";
            $query_run = mysqli_query($database, $query);
            
            if($query_run)
            {   // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                header('Location: addHospitals.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: addHospitals.php');  
            }
        }
        






