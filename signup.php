<?php
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and escape input
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';

    // Debug input values
    error_log("Received: Email=$email, Username=$username, Password=$password");

    // Validate input
    if (empty($email) || empty($username) || empty($password)) {
        echo 'Error: All fields are required.';
        exit;
    }

    // Prepare and execute query
    $stmt = $conn->prepare("INSERT INTO signup (hospital_email, hospital_name, password) VALUES (?, ?, ?)");

    if ($stmt === false) {
        echo 'Error preparing query: ' . $conn->error;
        exit;
    }

    $stmt->bind_param("sss", $email, $username, $password);

    if ($stmt->execute()) {
        echo 'Success';
    } else {
        echo 'Error inserting data: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid Request Method';
}
?>
