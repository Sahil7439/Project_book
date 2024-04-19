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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $status = $_POST['status'];

    // Prepare SQL statement
    $sql = "INSERT INTO author (First_Name, last_Name, E_Mail, Contact, Status) 
            VALUES ('$first_name', '$last_name', '$email', '$contact', '$status')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
