<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $hospitalName = $_POST['ahosname'];
    $email = $_POST['aemail'];
    $password = $_POST['apassword'];
    $usertype = $_POST['usertype'];
   

    

            
            $query = "INSERT INTO `admin` (ahosname, aemail, apassword) VALUES ('$hospitalName','$email', '$password')";
            $query_run = mysqli_query($database, $query);
            
            if($query_run)
            {   // echo "Saved";
                $query2 = "INSERT INTO `webuser` (email, usertype) VALUES ('$email', '$usertype')";
                $result = mysqli_query($database, $query2);
                $_SESSION['status'] = "Admin Profile Added";
                header('Location: addAdmin.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: addAdmin.php');  
            }
        }

        
        
        if(isset($_POST['delete_btn'])){
            $id = $_POST['delete_id'];
        
            $query = "DELETE FROM `admin` WHERE id='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                $_SESSION['success'] = "Your Data is Deleted";
                header('Location: addAdmin.php');
            }
        }
        
        






