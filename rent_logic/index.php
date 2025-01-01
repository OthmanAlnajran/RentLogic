<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: signin.php");
    exit;
}
require_once '../controllers/property_controller.php';
$properties = getAllProperties();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Property Management</a>
            <button class="btn btn-danger" onclick="window.location.href='../controllers/logout.php'">Sign Out</button>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Welcome, <?php echo $_SESSION["username"]; ?>!</h1>

        <!-- Add Property -->
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Add Property
            </div>
            <div class="card-body">
                <form action="../controllers/add_property.php" method="POST">
                    <div class="mb-3">
                        <label for="propertyName" class="form-label">Property Name</label>
                        <input type="text" class="form-control" id="propertyName" name="propertyName" required>
                    </div>
                    <div class="mb-3">
                        <label for="propertyLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="propertyLocation" name="propertyLocation" required>
                    </div>
                    <div class="mb-3">
                        <label for="propertyPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="propertyPrice" name="propertyPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="visitTimes" class="form-label">Visit Times (comma-separated)</label>
                        <input type="text" class="form-control" id="visitTimes" name="visitTimes" placeholder="e.g., 2024-12-20 10:00, 2024-12-21 14:00" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Property</button>
                </form>
            </div>
        </div>

        <!-- Properties List -->
        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                Properties
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($properties as $property): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $property['name']; ?></h5>
                                    <p class="card-text">Location: <?php echo $property['location']; ?></p>
                                    <p class="card-text">Price: $<?php echo $property['price']; ?></p>
                                    <p class="card-text">Rating: 
                                        Cleanliness: <?php echo $property['avg_cleanliness'] ?? 'Not Rated'; ?>, 
                                        Proximity: <?php echo $property['avg_proximity'] ?? 'Not Rated'; ?>
                                    </p>
                                    <a href="../views/schedule_visit.php?property_id=<?php echo $property['id']; ?>" class="btn btn-primary">Schedule Visit</a>
                                    <a href="../views/rate_property.php?property_id=<?php echo $property['id']; ?>" class="btn btn-secondary">Rate Property</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
