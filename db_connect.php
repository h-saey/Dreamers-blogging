<?php
$host = "localhost"; // Default for XAMPP
$username = "root"; // Default username for XAMPP
$password = ""; // No password in XAMPP by default
$database = "blogging_dreamers"; // Use your database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>