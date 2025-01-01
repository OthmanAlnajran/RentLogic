<?php
include 'property_db.php'; // Include database connection

// Header with navigation
echo '<header style="background-color: #0073e6; color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center;">';
echo '<div style="font-size: 1.5rem; font-weight: bold;">My Real Estate</div>';
echo '<nav style="display: flex; gap: 15px;">';
echo '<a href="index.php" style="color: white; text-decoration: none;">Home</a>';
echo '<a href="add_property.php" style="color: white; text-decoration: none;">Add Property</a>';
echo '<a href="contact.php" style="color: white; text-decoration: none;">Contact Us</a>';
echo '</nav>';
echo '</header>';

// Search bar for filtering properties
echo '<div style="padding: 20px; background-color: #f0f0f0; display: flex; justify-content: center;">';
echo '<input type="text" placeholder="Search properties..." style="width: 80%; max-width: 500px; padding: 10px; border: 1px solid #ddd; border-radius: 5px 0 0 5px;">';
echo '<button style="padding: 10px 20px; background-color: #0073e6; color: white; border: none; border-radius: 0 5px 5px 0; cursor: pointer;">Search</button>';
echo '</div>';

// Property cards layout
echo '<ul style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; padding: 20px; list-style: none;">';
$result = $conn->query("SELECT * FROM properties");
while ($row = $result->fetch_assoc()) {
    echo '<li style="background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; transition: transform 0.3s; cursor: pointer;"';
    echo ' onmouseover="this.style.transform=\'translateY(-5px)\';" onmouseout="this.style.transform=\'none\';">';
    echo '<img src="property_image_placeholder.jpg" alt="Property Image" style="width: 100%; height: 200px; object-fit: cover;">';
    echo '<div style="padding: 15px;">';
    echo '<h3 style="margin: 0; font-size: 1.5rem; color: #0073e6;">' . $row['name'] . '</h3>';
    echo '<p style="margin: 5px 0; color: #555;">Price: $' . $row['price'] . '</p>';
    echo '<p style="margin: 5px 0; color: #555;">Location: ' . $row['location'] . '</p>';
    echo '<button onclick="window.location.href=\'property_details.php?id=' . $row['id'] . '\'" style="width: 100%; padding: 10px; background-color: #0073e6; color: white; border: none; border-radius: 5px; cursor: pointer;">View Details</button>';
    echo '</div>';
    echo '</li>';
}
echo '</ul>';
?>