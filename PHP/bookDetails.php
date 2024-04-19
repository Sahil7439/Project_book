<?php
// Database connection parameters
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
    $bookName = $_POST['bookName'];
    $authorID = $_POST['authorID'];
    $publisherID = $_POST['publisherID'];
    $edition = $_POST['edition'];
    $genre = $_POST['genre'];
    $language = $_POST['language'];
    $status = $_POST['status'];

    // Insert data into book_details table
    $sql = "INSERT INTO book_details (Book_Name, Author_ID, Publisher_ID, Edition, Genre, Language, Status) 
            VALUES ('$bookName', '$authorID', '$publisherID', '$edition', '$genre', '$language', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>