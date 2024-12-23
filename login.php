<?php
session_start();  // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the email and password from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Query the database to check if the email exists
$sql = "SELECT * FROM signup WHERE hospital_email = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Check if the statement preparation was successful
if ($stmt === false) {
    die('MySQL prepare error: ' . $conn->error);  // Display any error that occurs during query preparation
}

$stmt->bind_param("s", $email);  // "s" for string type (email)
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    // If a row is found, fetch the data
    $row = $result->fetch_assoc();

    // Verify the password (assuming the password is hashed)
    if (password_verify($password, $row['password'])) {
        // Set session variables for the logged-in hospital
        $_SESSION['hospital_name'] = $row['hospital_name'];  // Assuming you have a 'hospital_name' field
        $_SESSION['hospital_email'] = $row['hospital_email'];
        print_r($_SESSION);

        // Redirect to service update page
        header("Location: hospital_updation.html");
        exit;
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No hospital found with that email.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
