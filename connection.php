<?php

    $database= new mysqli("localhost","root","","myhakim.com");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>