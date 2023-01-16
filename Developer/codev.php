<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $Name = $_POST['devname'];
    $email = $_POST['devemail'];
    $password = $_POST['devpassword'];
    $usertype = $_POST['usertype'];
   

    

            
            $query = "INSERT INTO `developers` (devname, devemail, devpassword) VALUES ('$Name','$email', '$password')";
            $query_run = mysqli_query($database, $query);
            
            if($query_run)
            {   // echo "Saved";
                $query2 = "INSERT INTO `webuser` (email, usertype) VALUES ('$email', '$usertype')";
                $result = mysqli_query($database, $query2);
                $_SESSION['status'] = "devProfile Added";
                header('Location: addAdmin.php');
            }
            else 
            {
                $_SESSION['status'] = "dev Profile Not Added";
                header('Location: addAdmin.php');  
            }
        }

        
        
        if(isset($_POST['delete_btn'])){
            $id = $_POST['delete_id'];
        
            $query = "DELETE FROM `dev` WHERE id='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                $_SESSION['success'] = "Your Data is Deleted";
                header('Location: addAdmin.php');
            }
        }
        
        






