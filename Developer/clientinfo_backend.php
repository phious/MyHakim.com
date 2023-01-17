<?php
session_start();
require '../connection.php';
if(isset($_POST['registerbtn'])){
    $hospitalName = $_POST['hosname'];
    $avs = $_POST['avs'];
    $dvs = $_POST['dvs'];
    $usertype = $_POST['usertype'];

    

            
            $query = "INSERT INTO `admin` (hosname, avs, dvs, usertype) VALUES ('$hospitalName', '$avs', '$dvs', '$usertype')";
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
            $avs = $_POST['edit_avs'];
            $dvs = $_POST['edit_dvs'];
            $usertype = $_POST['edit_usertype'];
        
            $query = "UPDATE `admin` SET hosname='$hospitalName', avs='$avs', dvs='$dvs', usertype='$usertype' WHERE id='$id' ";
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
        
        
        






