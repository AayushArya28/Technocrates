<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subj = htmlspecialchars($_POST['subj']);
    $message = htmlspecialchars($_POST['message']);
    
    // Database connection
    $conn = mysqli_connect('sql304.infinityfree.com', 'if0_37361852', 'vntHjq25ac9Ry', 'if0_37361852_user_management');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert query
    $sql = "INSERT INTO contact_us (name, email, subj, message) VALUES ('$name', '$email', '$subj', '$message')";

     // Execute the query and check if it succeeds
     if (mysqli_query($conn, $sql)) {
        echo "We will connect with you soon!";
    } else {
        echo "Error: " . mysqli_error($conn);

    // Close connection
    mysqli_close($conn);
    }
}
?>