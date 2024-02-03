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


function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $userType = sanitizeInput($_POST["user-type"]);
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
    $sql = "SELECT * FROM users WHERE role = '$userType' AND username = '$username'";
    $result = $conn->query($sql);



    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPasswordFromDB = $row['password'];

        
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
              
                default:
             
                    header("Location: default.html");
            }
            exit();
            
            
        } else {
            
            echo "Invalid username or password";
        }
    } else {
        
        echo "Invalid username or password";
    }
}


$conn->close();

?>
