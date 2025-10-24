<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'db_connect.php';

// Get 6 random materials for homepage display
$query = "SELECT * FROM materials WHERE quantity > 0 ORDER BY RAND() LIMIT 6";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MatLogix - Construction Materials</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-container">
        <!-- Hero Section -->
        <section class="hero">
            <h1>Welcome to MatLogix</h1>
            <p>Your trusted partner for quality construction materials</p>
            <a href="materials.php" class="cta-button">Shop Now</a>
        </section>

        <!-- Features Section -->
        <section class="features">
            <h2>Why Choose MatLogix?</h2>
            <div class="features-grid">
                <div class="feature">
                    <h3>Quality Materials</h3>
                    <p>Premium construction materials for all your needs</p>
                </div>
                <div class="feature">
                    <h3>Fast Delivery</h3>
                    <p>Quick and reliable delivery services</p>
                </div>
                <div class="feature">
                    <h3>Expert Support</h3>
                    <p>Professional guidance for your projects</p>
                </div>
            </div>
        </section>

        <!-- Materials Section -->
        <section class="materials">
            <h2>Popular Materials</h2>
            <div class="materials-grid">
                <?php
                if(mysqli_num_rows($result) > 0) {
                    while($material = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="material-card">
                            <div class="material-image">
                                <img src="'.$material['image_url'].'" alt="'.htmlspecialchars($material['name']).'" onerror="this.src=\'images/materials/default.jpg\'">
                            </div>
                            <h3>'.htmlspecialchars($material['name']).'</h3>
                            <p><strong>'.htmlspecialchars($material['category']).'</strong></p>
                            <p class="material-price">Rs. '.number_format($material['price'], 2).' '.htmlspecialchars($material['unit_type']).'</p>
                            <p>Stock: '.$material['quantity'].'</p>
                            <a href="materials.php" class="view-btn">View Details</a>
                        </div>';
                    }
                } else {
                    echo '<p>No materials available.</p>';
                }
                ?>
            </div>
            <div class="view-all">
                <a href="materials.php" class="view-all-btn">View All Materials</a>
            </div>
        </section>
    </div>

    <?php include 'footer.php'; ?>
    
    <script>
    // Simple active links
    document.addEventListener('DOMContentLoaded', function() {
        var currentPage = window.location.pathname.split('/').pop();
        var navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(function(link) {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });
        
        // Homepage
        if (!currentPage || currentPage === 'index.php') {
            var homeLink = document.querySelector('a[href="index.php"]');
            if (homeLink) homeLink.classList.add('active');
        }
    });
    </script>
</body>
</html>
<?php 
mysqli_close($conn);
?>