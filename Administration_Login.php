<html>
 <head>
  <title>GolFinder</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body bgcolor="#ccff00">
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
$email=$_POST['email'];
$password=$_POST['password'];
$Query_Instruction="
                    SELECT COUNT(*) AS'conto'
                    FROM gol.amministratore
                    WHERE email='" . $email . "' AND
                          password='" . $password ."';";
$x=$conn->query($Query_Instruction);
while($y=mysqli_fetch_array($x)){
         	$Verifica_Account=$y['conto'];
}
if ($Verifica_Account){
	Header("location:Home_Page_Admin.php");
}
else{
	echo("<h3 align=center>The Email or the Password are wrong</h3>");
	Header("refresh:4; Amministration.php");
}
$conn->close();
?>

 </body>
</html>