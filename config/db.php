<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "db_court";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>