<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'user_management');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert query without password hashing
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to login page after successful sign-up
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
