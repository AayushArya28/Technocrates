<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'user_management');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, now verify the password
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Password is correct
            echo "Login successful!";
            // Start a session and redirect to a welcome page or dashboard
            session_start();
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>