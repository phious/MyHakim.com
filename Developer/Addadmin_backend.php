<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $aemail = $_POST['aemail'];
    $apassword = $_POST['apassword'];
    $usertype = $_POST['usertype'];

    

            
            $query = "INSERT INTO `admin` (aemail, apassword) VALUES ('$aemail', '$apassword')";
            $query_run = mysqli_query($database, $query);
            
            if($query_run)
            {   // echo "Saved";
                $query = "INSERT INTO `webuser` (email, usertype) VALUES ('$aemail', '$usertype')";
                $query_run = mysqli_query($database, $query);
                $_SESSION['status'] = "Admin Profile Added";
                header('Location: Addadmin.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: Addadmin.php');  
            }
        }

        
        
        if(isset($_POST['delete_btn'])){
            $id = $_POST['delete_id'];
        
            $query = "DELETE FROM `admin` WHERE id='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                $_SESSION['success'] = "Your Data is Deleted";
                header('Location: Addadmin.php');
            }
        }
        
        






