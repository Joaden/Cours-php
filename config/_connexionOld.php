<?php
$servername = 'localhost';
$username = 'root';
$database = 'cours_denis';
$password = '';

// connection
$conn = new mysqli($servername, $username, $password, $database);

// Verif de la connection
if($conn->connect_error) {
    die('Problème de connection'.$conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE ".$database;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

// $conn->close();