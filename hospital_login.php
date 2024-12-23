<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the credentials are correct
    $sql = "SELECT hospital_name, password FROM hospital_login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hospital_name, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        // Login successful, store hospital_name in session
        $_SESSION['hospital_name'] = $hospital_name;
        header("Location: update_services.php"); // Redirect to update page
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
