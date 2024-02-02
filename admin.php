<?php
session_start();

// Check if the user is authenticated, if not, redirect to login.php
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin</h1>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    <body>

<header>
    <div class="top-left">
        <a href="home.html">Home</a>
    </div>
    <div class="top-right">
        <a href="logout.php">Logout</a>
    </div>
</header>

<section class="main-section">
    <h2>Welcome, Admin!</h2>
    <div class="admin-options">
        <p>Maintain Users</p>
        <!-- Add functionality and links for maintaining users -->
        <p>Maintain Vendors</p>
        <!-- Add functionality and links for maintaining vendors -->
    </div>
</section>

<footer>
    <p>&copy; 2024 Event Management Website. All rights reserved.</p>
</footer>

</body>
</body>
</html>