<?php
session_start();

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ayushmaan";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email_add'];
$password = $_POST['password'];

// Query to insert new user data into the database
$sql = "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')";
$result = $conn->query($sql);

if ($result) {
    // User details inserted successfully, redirect to login.html
    echo "New details entry inserted successfully.";
    header('Location: login.html');
    exit;
} else {
    // Error inserting user details
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
