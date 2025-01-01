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
    $propertyId = $_POST["ratePropertyId"];
    $cleanliness = $_POST["cleanliness"];
    $proximity = $_POST["proximity"];
    $username = $_SESSION["username"];

    $sql = "INSERT INTO ratings (property_id, username, cleanliness, proximity) VALUES ('$propertyId', '$username', '$cleanliness', '$proximity')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
