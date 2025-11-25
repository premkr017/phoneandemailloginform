<?php
session_start();

// print_r($row);
// exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-container">
    <header class="dashboard-header">
        <h1>Welcome to My Dashboard</h1>
        <nav class="dashboard-nav">
            <a href="Logout.php" class="logout-btn">Logout</a>
        </nav>
    </header>
    <main class="dashboard-main">
        <section class="welcome-section">
            <h2>This is Your Home Page</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque vel veritatis fugit odio. Molestiae doloremque, sint natus repellendus dolores iusto odit commodi quos soluta temporibus laudantium nesciunt unde sapiente alias?</p>
        </section>
        <section class="dashboard-cards">
            <div class="card">
                <h3>Feature 1</h3>
                <p>Explore the first feature of your dashboard.</p>
            </div>
            <div class="card">
                <h3>Feature 2</h3>
                <p>Discover more about the second feature.</p>
            </div>
            <div class="card">
                <h3>Feature 3</h3>
                <p>Learn about the third feature here.</p>
            </div>
        </section>
    </main>
</body>
</html>
