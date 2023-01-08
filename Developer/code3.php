<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $hospitalName = $_POST['hosname'];
    $hospitalCode = $_POST['h_code'];
    $usertype = $_POST['usertype']; 

            
            $query = "INSERT INTO `admin_info` (hosname, h_code, usertype) VALUES ('$hospitalName', '$hospitalCode', '$usertype')";
            $query_run = mysqli_query($database, $query);
            
            if($query_run)
            {   // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                header('Location: admininfo.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: admininfo.php');  
            }
        }

        
        if(isset($_POST['delete_btn'])){
            $id = $_POST['delete_id'];
        
            $query = "DELETE FROM `admin_info` WHERE id='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                $_SESSION['success'] = "Your Data is Deleted";
                header('Location: admininfo.php');
            }
        }
        
        






