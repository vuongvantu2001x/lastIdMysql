<?php
$servername = "localhost:3306";
$username = "root";
$password = "123456";
$dbname = "webnc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your SQL query
$sql = "INSERT INTO users (id, name, email) VALUES ('4', 'Tú 123', 'vuongvantu2211@gmail.com')";

// Perform the query
if ($conn->query($sql) === TRUE) {
    // Retrieve the last inserted ID
    $lastInsertedId = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $lastInsertedId;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
