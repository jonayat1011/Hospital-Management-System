<?php 

function conn() {
    $serverName = "localhost";
    $userName = "root";
    $pass = "";
    $dbName = "HMS";

    // Establishing connection to the database
    $conn = new mysqli($serverName, $userName, $pass, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

?>
