<?php
$host = 'localhost';
$user = 'root'; // default username
$pass = '';     // default password
$db = 'hospital_db';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
