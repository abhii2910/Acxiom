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
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    <body>
    <div id="welcome-message">
        <p>Welcome, User!</p>
    </div>

    <div id="dropdown-container">
        <label for="vendor-dropdown">Choose a Vendor:</label>
        <select id="vendor-dropdown">
            <option value="catering">Catering</option>
            <option value="florist">Florist</option>
            <option value="decoration">Decoration</option>
            <option value="lighting">Lighting</option>
        </select>
    </div>

    <div id="status-container">
        <button class="status-button" onclick="viewCart()">Cart</button>
        <button class="status-button" onclick="viewGuestList()">Guest List</button>
        <button class="status-button" onclick="viewOrderStatus()">Order Status</button>
    </div>

    <script>
        function viewCart() {
            // Add logic for viewing the cart
            alert('View Cart');
        }

        function viewGuestList() {
            // Add logic for viewing the guest list
            alert('View Guest List');
        }

        function viewOrderStatus() {
            // Add logic for viewing order status
            alert('View Order Status');
        }
    </script>
</body>
</body>
</html>