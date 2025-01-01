<?php
include 'property_db.php';
$name = $_POST['name'];
$location = $_POST['location'];
$price = $_POST['price'];
$visit_time = $_POST['visit_time'];
$stmt = $conn->prepare("INSERT INTO properties (name, location, price, visit_time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $location, $price, $visit_time);
if ($stmt->execute()) {
    echo "Property added successfully! <a href='index.php'>Go back to home</a>";
} else {
    echo "Error adding property: " . $conn->error;
}
?>