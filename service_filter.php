<?php
// Database connection
include 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected service from the URL query parameter
$service = isset($_GET['service']) ? $_GET['service'] : '';

// Initialize the results variable
$hospitalData = [];

if ($service) {
    // Query to fetch hospitals with the selected service available
    $sql = "SELECT Hospital_Name
            FROM service_filter
            WHERE `$service` = 'Yes'";
    $result = $conn->query($sql);

    // Fetch all results into an array
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $hospitalData[] = $row['Hospital_Name'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Filter - <?php echo htmlspecialchars($service); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff6f00;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        h1 {
            color: #ff6f00;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ff6f00;
            color: white;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>

<header>
    <h1>Available Hospitals for <?php echo htmlspecialchars($service); ?></h1>
</header>

<div class="container">
    <?php
    if ($service && !empty($hospitalData)) {
        echo "<table>";
        echo "<tr><th>Hospital Name</th></tr>";

        // Loop through the hospital data and display it in table rows
        foreach ($hospitalData as $hospitalName) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($hospitalName) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } elseif ($service) {
        echo "<div class='no-data'>No hospitals found for the selected service: " . htmlspecialchars($service) . "</div>";
    } else {
        echo "<div class='no-data'>Please select a service to view hospitals.</div>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

</body>
</html>
