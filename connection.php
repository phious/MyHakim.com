<?php

    $database= new mysqli("localhost","root","","myhakim.com.vol2");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>