<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "login";
$port = 3307; 

$conn = new mysqli($servername, $username, $password, $db_name, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>