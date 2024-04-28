<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "db_inventory";
    $connect = new mysqli($server,$user,$password,$dbname);
    if($connect->connect_error){
        echo "Connect Error". $connect->connect_error;
    }
?>