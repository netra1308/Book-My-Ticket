<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $conn = mysqli_connect($server , $username , $password , $database );
    if($conn)
    {
        echo "connected";
    }
    else
    {
        echo "not connected";
        die("ERROR".mysqli_connect_error());
    }
?>
