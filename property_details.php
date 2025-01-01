<?php
include 'property_db.php'; // Include database connection

// Fetch property details
if (isset($_GET['id'])) {
    $property_id = intval($_GET['id']);
    $query = "SELECT * FROM properties WHERE id = $property_id";
    $result = $conn->query($query);

    if ($result) {
        $property = $result->fetch_assoc();
    } else {
        echo "Error fetching property details: " . $conn->error;
        exit();
    }

    // Fetch average rating for the property
    $rating_query = "SELECT AVG(rating) as avg_rating FROM property_ratings WHERE property_id = $property_id";
    $rating_result = $conn->query($rating_query);
    $rating = $rating_result ? $rating_result->fetch_assoc() : ['avg_rating' => null];
} else {
    echo "Property not found.";
    exit();
}

// Header
echo '<header style="background-color: #0073e6; color: white; padding: 15px; text-align: center;">';
echo '<h1 style="margin: 0; font-size: 1.8rem;">Property Details</h1>';
echo '</header>';

// Property details layout
echo '<div style="padding: 20px; max-width: 800px; margin: 30px auto; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';

if ($property) {
    echo '<h2 style="font-size: 1.5rem; color: #0073e6; margin-bottom: 10px;">' . htmlspecialchars($property['name']) . '</h2>';
    echo '<p style="margin: 5px 0; font-size: 1rem; color: #555;"><strong>Price:</strong> $' . htmlspecialchars($property['price']) . '</p>';
    echo '<p style="margin: 5px 0; font-size: 1rem; color: #555;"><strong>Location:</strong> ' . htmlspecialchars($property['location']) . '</p>';
    echo '<p style="margin: 5px 0; font-size: 1rem; color: #555;"><strong>Description:</strong> ' . 
        (!empty($property['description']) ? htmlspecialchars($property['description']) : 'No description available.') . '</p>';

    // Display Average Rating
    echo '<p style="margin: 5px 0; font-size: 1rem; color: #555;"><strong>Average Rating:</strong> ' . 
        (!empty($rating['avg_rating']) ? round($rating['avg_rating'], 2) . ' / 5' : 'No ratings yet.') . '</p>';

    // Choose Time for Visit Section
    echo '<div style="margin-top: 20px;">';
    echo '<h3 style="font-size: 1.2rem; color: #0073e6;">Choose a Time for Visit</h3>';
    echo '<form method="post" action="schedule_visit.php" style="display: flex; flex-direction: column; gap: 15px;">';
    echo '<input type="hidden" name="property_id" value="' . htmlspecialchars($property['id']) . '">';
    echo '<label for="visit_time" style="font-size: 1rem; color: #555;">Select Time:</label>';
    echo '<input type="datetime-local" id="visit_time" name="visit_time" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';
    echo '<button type="submit" style="padding: 10px; font-size: 1rem; background-color: #0073e6; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>';
    echo '</form>';
    echo '</div>';

    // Rating Section
    echo '<div style="margin-top: 20px;">';
    echo '<h3 style="font-size: 1.2rem; color: #0073e6;">Rate this Property</h3>';
    echo '<form method="post" action="rate_property.php" style="display: flex; flex-direction: column; gap: 15px;">';
    echo '<input type="hidden" name="property_id" value="' . htmlspecialchars($property['id']) . '">';
    echo '<label for="rating" style="font-size: 1rem; color: #555;">Rating (1-5):</label>';
    echo '<input type="number" id="rating" name="rating" min="1" max="5" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';
    echo '<button type="submit" style="padding: 10px; font-size: 1rem; background-color: #0073e6; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit Rating</button>';
    echo '</form>';
    echo '</div>';
} else {
    echo '<p style="color: red; text-align: center;">Property details not found.</p>';
}

echo '</div>';
?>