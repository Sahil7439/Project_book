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

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $status = $_POST['status'];

    // Prepare SQL statement
    $sql = "INSERT INTO publisher (Name, E_Mail, Contact, Status) VALUES ('$name', '$email', '$contact', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
