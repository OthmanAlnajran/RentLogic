<?php
$servername = "localhost"; // Typically localhost
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password (leave empty for no password)
$dbname = "property_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
