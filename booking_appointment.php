<?php
// Include the database connection
include('db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // Prepare SQL query to insert the data into the booking table
    $sql = "INSERT INTO booking (name, email, phone, service, message) 
            VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("ssiss", $name, $email, $phone, $service, $message);
        
        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Your appointment has been booked successfully.'); window.location.href = 'synergy.php';</script>";
        } else {
            echo "<script>alert('There was an error with your booking. Please try again.'); window.location.href = 'synergy.php';</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
