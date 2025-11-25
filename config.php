<?php
function dbConnection() {
    $server = "Localhost";
    $username = "root";
    $password = "";
    $database = "PhoneAndEmail";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>
