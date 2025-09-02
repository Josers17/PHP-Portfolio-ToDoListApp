<?php
$host = "127.0.0.1";
$port = "3307";   
$user = "root";
$pass = "";      
$db   = "todolist";

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}
?>
