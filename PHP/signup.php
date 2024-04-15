<?php
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

// Retrieve form data
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];

// Insert user data into database
$sql = "INSERT INTO signup (First_Name, Last_Name, E_mail, Passkey, Contact) VALUES ('$fName', '$lName', '$email', '$pass', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "New record for $fName created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

?>
