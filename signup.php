<?php

// Database connection parameters
$servername = "sql6.freemysqlhosting.net";
$username = "sql6681587";
$password = "GpgjNmMucd";
$dbname = "sql6681587";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);
    $role = sanitizeInput($_POST["role"]);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, username, password, role) VALUES ('$name', '$email', '$username', '$hashedPassword', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

?>
