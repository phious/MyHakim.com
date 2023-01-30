<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $hospitalName = $_POST['hosname'];
    $hos_ID = $_POST['hos_ID'];
    $usertype = $_POST['usertype'];

    

            
            $query = "INSERT INTO `admin` (hosname,hos_ID, usertype) VALUES ('$hospitalName', '$hos_ID', '$usertype')";
            $query_run = mysqli_query($database, $query);
            
            if($query_run)
            {   // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                header('Location: Clientsinfo.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: Clientsinfo.php');  
            }
        }
        
        if(isset($_POST['updatebtn'])) {
            $id = $_POST['edit_id'];
            $hospitalName = $_POST['edit_hospitalName'];
            $hos_ID = $_POST['edit_hos_ID'];
            $usertype = $_POST['edit_usertype'];
        
            $query = "UPDATE `admin` SET hosname='$hospitalName', hos_ID='$hos_ID', usertype='$usertype' WHERE id='$id' ";
            $query_run = mysqli_query($database, $query);

            if($query_run){
                
                $_SESSION['success'] = "Your data is updated";
                header('Location: Clientsinfo.php');
            }
            else{
                $_SESSION['status'] = "Your data is Not updated";
                header('Location: Clientsinfo.php');
            }
        }
        
        
        






