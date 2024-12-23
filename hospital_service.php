<?php
// hospital_service.php
// Connect to database
include('db.php');

// Fetch the available bed data
$query = "SELECT icu_count, emergency_beds, beds_count FROM hospital_services WHERE hospital_name='Synergy Hospital'";  // Modify this query to suit your setup
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $icuBeds = $row['icu_count'];
    $emergencyBeds = $row['emergency_beds'];
    $generalBeds = $row['beds_count'];
} else {
    // Handle query failure
    $icuBeds = $emergencyBeds = $generalBeds = 0;
}

mysqli_close($conn);
?>
