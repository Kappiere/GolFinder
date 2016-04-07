<?php
//Actually is not working , in the future I'll try to delete only the inside of some table (like post) and not all the database
$servername = "localhost";
$username = "root";
$password = "kappiere97";

//Create connection

$conn = new mysqli($servername, $username, $password);

//check connection

if ($conn->connection_error){
	die("Connection failed: " . $conn->connection_error);
}
//Drop Database


$sql = "DROP TABLE gol.scontro";
if($conn->query($sql) === TRUE){
	echo "Table erased successfully";
} else{
	echo "Error erasing table: " . $conn->error;
}
echo("<br>");
$sql = "DROP TABLE gol.squadra";
if($conn->query($sql) === TRUE){
	echo "Table erased successfully";
} else{
	echo "Error erasing table: " . $conn->error;
}
$conn->close();
?>
