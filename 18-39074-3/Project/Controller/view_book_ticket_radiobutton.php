<?php
    /*This file  For drop down */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $connect = new mysqli($servername, $username, $password, $dbname);
    $query = "SELECT * FROM `ticket_info`WHERE User_Name='Tuhin'";
    $result1 = mysqli_query($connect, $query);
?> 