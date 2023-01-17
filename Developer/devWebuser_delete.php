<?php
session_start();
require '../connection.php';

if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];

    $query2 = "DELETE FROM `webuser` WHERE id='$id' ";
    $query_run = mysqli_query($database, $query2);

    if($query_run){
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: AddDeveloper.php');
    }
}