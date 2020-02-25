<?php
    $conn = new mysqli('localhost','root','','eventos_app');
    $conn->query("SET NAMES 'utf8' ");
    if($conn->connect_error){
        echo $error->$conn->connect_error;
    }

?>