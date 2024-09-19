<?php
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "1234";  // Your MySQL password
$dbname = "user_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];

    // Check if passwords match
    if ($pass === $repass) {
        // Hash the password before storing it
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $hashed_password, $email);

        if ($stmt->execute()) {
            echo "Registration successful! <a href='login.html'>Login here</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match!";
    }
}

$conn->close();
?>
