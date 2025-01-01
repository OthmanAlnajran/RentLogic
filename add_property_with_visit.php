<?php
include 'property_db.php'; // Include database connection

// Add Property Page Design
echo '<header style="background-color: #0073e6; color: white; padding: 15px; text-align: center;">';
echo '<h1 style="margin: 0; font-size: 1.8rem;">Add New Property</h1>';
echo '</header>';

echo '<div style="padding: 20px; max-width: 600px; margin: 30px auto; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';

echo '<form method="post" action="process_add_property.php" style="display: flex; flex-direction: column; gap: 15px;">';

echo '<label for="name" style="font-size: 1.2rem; color: #0073e6;">Property Name:</label>';
echo '<input type="text" id="name" name="name" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';

echo '<label for="location" style="font-size: 1.2rem; color: #0073e6;">Location:</label>';
echo '<input type="text" id="location" name="location" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';

echo '<label for="price" style="font-size: 1.2rem; color: #0073e6;">Price:</label>';
echo '<input type="number" id="price" name="price" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';

echo '<label for="visit_time" style="font-size: 1.2rem; color: #0073e6;">Available Time for Visit:</label>';
echo '<input type="datetime-local" id="visit_time" name="visit_time" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';

echo '<button type="submit" style="padding: 10px; font-size: 1rem; background-color: #0073e6; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Property</button>';

echo '</form>';
echo '</div>';
?>