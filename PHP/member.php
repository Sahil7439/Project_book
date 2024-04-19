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
    $status = $_POST['status'];
    $subscription_from = $_POST['from'];
    $subscription_till = $_POST['till'];

    // Insert data into members table
    $sql = "INSERT INTO members (User_ID, Subscripion_Start_Date, Subscription_End_Date, Status) 
            VALUES (NULL, '$subscription_from', '$subscription_till', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
