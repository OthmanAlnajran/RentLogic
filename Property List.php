<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="navbar">
            <h1>Property Rentals</h1>
            <a href="logout.php" class="button">Logout</a>
            <a href="add_property.php" class="button" id="addProperty" style="display: none;">Add Property</a>
        </div>
    </header>

    <div class="container">
        <h2>Available Properties</h2>
        <div class="property-grid">
            <!-- Example property card -->
            <div class="property-card">
                <img src="property_image.jpg" alt="Property" class="property-image">
                <div class="property-details">
                    <h3>Property Title</h3>
                    <p>Location: City, Country</p>
                    <p>Price: $500/month</p>
                    <a href="property_details.php?id=1" class="button">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example of conditional rendering for "Add Property" button
        document.addEventListener("DOMContentLoaded", () => {
            const userRole = "admin"; // This value should be dynamically set based on session data
            if (userRole === "admin") {
                document.getElementById("addProperty").style.display = "inline-block";
            }
        });
    </script>
</body>
</html>
