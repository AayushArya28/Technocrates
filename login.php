<?php
session_start();  // Start session to store user information

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = mysqli_connect('sql304.infinityfree.com', 'if0_37361852', 'vntHjq25ac9Ry', 'if0_37361852_user_management');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Check if the username exists and compare passwords directly
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if the password matches
        if ($password == $row['password']) {
            // Store username in session after successful login
            $_SESSION['username'] = $username;  
            header("Location: landing.php");  // Redirect to landing page
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that username.";
    }

    // Close connection
    mysqli_close($conn);
}
?>