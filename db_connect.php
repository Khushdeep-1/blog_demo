<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "blog_demo"; // Change this to your actual database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
