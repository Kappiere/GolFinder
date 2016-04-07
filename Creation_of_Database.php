<?php
$servername = "localhost";
$username = "root";
$password = "kappiere97";

//Create connection

$conn = new mysqli($servername, $username, $password);

//check connection

if ($conn->connection_error){
	die("Connection failed: " . $conn->connection_error);
}

//Create database

$sql = "CREATE DATABASE gol";
if($conn->query($sql) === TRUE){
	echo "Database created successfully";
} else{
	echo "Error creating database: " . $conn->error;
}
$conn->close();
?>