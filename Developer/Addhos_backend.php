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

        if(isset($_POST['updatebtn'])) {
            $id = $_POST['edit_id'];
            $hospitalName = $_POST['edit_hospitalName'];
            $address = $_POST['edit_address'];
            $email = $_POST['edit_email'];
            $tele = $_POST['edit_tele'];
        
            $query = "UPDATE `hospital` SET hosname='$hospitalName', hosaddress='$address', hosemail='$email' WHERE hid='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                
                $_SESSION['success'] = "Your data is updated";
                header('Location: addHospitals.php');
            }
            else{
                $_SESSION['status'] = "Your data is Not updated";
                header('Location: addHospitals.php');
            }
        }
        
        
        if(isset($_POST['delete_btn'])){
            $id = $_POST['delete_id'];
        
            $query = "DELETE FROM `hospital` WHERE hid='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                $_SESSION['success'] = "Your Data is Deleted";
                header('Location: addHospitals.php');
            }
        }
        
        






