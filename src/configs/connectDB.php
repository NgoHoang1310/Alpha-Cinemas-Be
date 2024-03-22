<?php
$servername = "localhost";
$username = "root";
$password = "";
$tablename = "book-movie-tickets";

// Create connection
$conn = new mysqli($servername, $username, $password, $tablename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// print "Connected successfully!<br>";
