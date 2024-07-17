<?php

function connection() {

    //connect to the database, login
    $host = "localhost";
    $username = "root";
    $password = "!EUVL9bG]/IHVUKZ";
    $database = "student_system";

    $con = new mysqli($host, $username, $password, $database);

    if ($con->connect_error){
        
        echo $con->connect_error;
    } else {

        return $con;
    }


}