<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "bankingdb";
$db_port = "3306";


// Create a connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

// Checking the connection
if($conn->connect_error) {
    die("Connection Failed");
}
?>