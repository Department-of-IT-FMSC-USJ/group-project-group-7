<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MatLogix - Building Materials</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-brand">
                    <a href="index.php" class="logo">MatLogix</a>
                </div>
                <div class="nav-menu">
                    <a href="index.php" class="nav-link">Home</a>
                    <a href="materials.php" class="nav-link">Materials</a>
                    
                    <?php if(isset($_SESSION['customer_id'])): ?>
                        <a href="cart.php" class="nav-link">Cart</a>
                        <a href="my_orders.php" class="nav-link">My Orders</a>
                        <div class="user-menu">
                            <span class="user-name">Hello, <?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
                            <a href="logout.php" class="logout-btn">Logout</a>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="nav-link">Login</a>
                        <a href="register.php" class="register-btn">Register</a>
                        <a href="admin/login.php" class="nav-link">Admin</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <main>