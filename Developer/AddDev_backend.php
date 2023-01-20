<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $devname = $_POST['devname'];
    $devemail = $_POST['devemail'];
    $devpassword = $_POST['devpassword'];
    $usertype = $_POST['usertype'];

    

            
            $query = "INSERT INTO `developers` (devname, devemail) VALUES ('$devname', '$devemail')";
            $query_run = mysqli_query($database, $query);
            
            if($query_run)
            {   // echo "Saved";
               
                $query = "INSERT INTO `webuser` (email,  password, usertype) VALUES ('$devemail', '$devpassword', '$usertype')";
                $query_run = mysqli_query($database, $query);
                $_SESSION['status'] = "Admin Profile Added";
                header('Location: AddDeveloper.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: AddDeveloper.php');  
            }
        }

        
        
        if(isset($_POST['delete_btn'])){
            $id = $_POST['delete_id'];
        
            $query = "DELETE FROM `developers` WHERE devid='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                $_SESSION['success'] = "Your Data is Deleted";
                header('Location: AddDeveloper.php');
            }
        }
        
        






