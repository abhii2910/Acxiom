<?php
session_start();

// Check if the user is authenticated if not redirect to login
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
        <p>Welcome, Vendor!</p>
    </div>

    <div class="button-container">
        <button class="button" onclick="viewItems()">Your Items</button>
        <button class="button" onclick="addNewItem()">Add New Item</button>
        <button class="button" onclick="viewTransactions()">Transactions</button>
    </div>


    <script>
        function viewItems() {
            
            alert('View Your Items');
        }

        function addNewItem() {
        
            alert('Add New Item');
        }

        function viewTransactions() {
          
            alert('View Transactions');
        }
    </script>
</body>




</body>
</html>