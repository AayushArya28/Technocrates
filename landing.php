<?php include('nav.html'); ?>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Technocrates</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="nav_n_footer.css">
    <link rel="stylesheet" href="landing.css">

</head>
<body>
    <!-- Navigation Bar -->
    <div id="nav-placeholder"></div>
    <!-- <h1>Hi</h1> -->
    <main>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>This is your landing page after login. Feel free to explore the site.</p>
    </main>

    <!-- Footer Section -->
    <div id="footer-placeholder"></div>

    <script>
        // Load the navbar
        fetch('nav.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('nav-placeholder').innerHTML = data;
        });

        // Load the footer
        fetch('footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footer-placeholder').innerHTML = data;
            });
    </script>
</body>
</html>
