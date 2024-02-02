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
    $userType = sanitizeInput($_POST["user-type"]);
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validate user credentials against the database
    $sql = "SELECT * FROM users WHERE role = '$userType' AND username = '$username'";
    $result = $conn->query($sql);

    // echo($result);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPasswordFromDB = $row['password'];

        // Verify the entered password against the hashed password from the database
        if (password_verify($password, $hashedPasswordFromDB)) {
            session_start();
            $_SESSION['authenticated'] = true;
            switch ($userType) {
                case 'vendor':
                    header("Location: vendor.php");
                    break;
                case 'admin':
                    header("Location: admin.php");
                    break;
                case 'user':
                    header("Location: user.php");
                    break;
                // Add more cases as needed
                default:
                    // Redirect to a default page if the role is not recognized
                    header("Location: default.html");
            }
            exit();
            // Password is correct, login successful
            
        } else {
            // Incorrect password, login failed
            echo "Invalid username or password";
        }
    } else {
        // User not found, login failed
        echo "Invalid username or password";
    }
}

// Close the database connection
$conn->close();

?>
