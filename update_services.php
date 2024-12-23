<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the specific hospital name
$hospital_name = "Synergy Hospital";

// Check if the hospital is "Synergy Hospital"
if ($hospital_name != "Synergy Hospital") {
    die("You are not authorized to update this data.");
}

// Retrieve form data
$icu_count = $_POST['icu_count'];
$ventilators = $_POST['ventilators'];
$oxygen = $_POST['oxygen'];
$beds_count = $_POST['beds_count'];
$blood_bank = $_POST['blood_bank'];
$emergency_beds = $_POST['emergency_beds'];

// Prepare the SQL query
$sql = "UPDATE hospital_services SET 
        icu_count = ?, 
        ventilators = ?, 
        oxygen = ?, 
        beds_count = ?, 
        blood_bank = ?, 
        emergency_beds = ? 
        WHERE hospital_name = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Check if prepare() was successful
if ($stmt === false) {
    die('MySQL prepare error: ' . $conn->error);
}

// Bind the parameters
$stmt->bind_param("iisisis", $icu_count, $ventilators, $oxygen, $beds_count, $blood_bank, $emergency_beds, $hospital_name);

// Execute the query and check for success
if ($stmt->execute()) {
    echo "Data updated successfully for " . $hospital_name . ".";
} else {
    echo "Error updating data: " . $stmt->error;  // Show MySQL error
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
