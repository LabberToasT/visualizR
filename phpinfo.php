<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "visualizr";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
