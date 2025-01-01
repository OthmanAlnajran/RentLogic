<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: signin.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "property_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($propertyId, $visitTime) = explode('|', $_POST["propertyId"]);
    $username = $_SESSION["username"];

    $sql = "INSERT INTO visits (property_id, username, visit_time) VALUES ('$propertyId', '$username', '$visitTime')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
