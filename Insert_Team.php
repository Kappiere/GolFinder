<?php


$servername = "localhost";
$username = "root";
$password = "kappiere97";
$conn = new mysqli($servername, $username, $password);
if ($conn->connection_error){
	die("Connection failed: " . $conn->connection_error);
}
$Query_Instruction="
                    SELECT COUNT(*) AS'conto'
                    FROM gol.squadra
                    WHERE squadra.id IN(
                                        SELECT id
                                        FROM gol.squadra
                                        WHERE nome='" . $_POST['nome'] . "' OR
                                              (posizione='" . $_POST['posizione'] . "' AND
                                               serie='" . $_POST['campionato'] . "'));";
$x=$conn->query($Query_Instruction);
$y=mysqli_fetch_array($x);

	if($y['conto']>0){
		echo("<h3>La squadra esiste o i dati sono stati inseriti in precedenza</h3>");
		Header("refresh:4;Home_Page_Admin.php");
	}
    if($y['conto']==0){
	
		$nome=$_POST['nome'];
		$posizione=$_POST['posizione'];
		$punti=$_POST['punti'];
		$campionato=$_POST['campionato'];
		$nazione=$_POST['nazione'];
		$ult_partita=$_POST['ult_partita'];
		$quotazione=$_POST['quotazione'];

		$Query_Instruction="
		                    INSERT INTO gol.squadra VALUES(
		                    '',
		                    '$nome',
		                    '$posizione',
		                    '$punti',
		                    '$campionato',
		                    '$nazione',
		                    '$ult_partita',
		                    '$quotazione');";
		if($conn->query($Query_Instruction)===TRUE){
		Header("location:Home_Page_Admin.php");
		}
		else{echo("fail");
	    }
     
	
	
    }
?>