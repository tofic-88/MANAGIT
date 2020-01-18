<?php
    $host = "localhost";
    $username = "root";
    $password = "";

        // On se connect
        $conn = new PDO("mysql:host=$host;dbname=managit", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

?>