<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbName="project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize and validate input (you should implement proper validation and sanitation)
    // For demonstration purposes, we are just using mysqli_real_escape_string here
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM signin WHERE Username = '$username' AND Passkey = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, do something like redirect to a dashboard
        // For now, let's just echo a success message
        echo "Login successful! for $username";
    } else {
        // User does not exist or credentials are incorrect
        // You can redirect back to the login page with an error message
        echo "Invalid username or password!";
    }
}

// Close connection
$conn->close();
?>
