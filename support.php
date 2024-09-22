<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $issue = htmlspecialchars($_POST['issue']);
    $description = htmlspecialchars($_POST['description']);
    
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'user_management');

    // Check connection
    if (!$conn) {
        echo "<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>";
        exit();
    }

    // Insert query
    $sql = "INSERT INTO support (name, email, issue, description) VALUES ('$name', '$email', '$issue', '$description')";

     // Execute the query and check if it succeeds
     if (mysqli_query($conn, $sql)) {
        echo "Your support request has been submitted!";
    } else {
        echo "Error: " . mysqli_error($conn);

    // Close connection
    mysqli_close($conn);
    }
}
?>