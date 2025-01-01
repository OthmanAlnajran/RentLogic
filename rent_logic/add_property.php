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
    $name = $_POST["propertyName"];
    $location = $_POST["propertyLocation"];
    $price = $_POST["propertyPrice"];
    $visitTimes = json_encode(explode(",", $_POST["visitTimes"]));

    $sql = "INSERT INTO properties (name, location, price, visit_times) VALUES ('$name', '$location', '$price', '$visitTimes')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
