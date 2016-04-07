<?php

 function calcolo(){
         $servername = "localhost";
         $username = "root";
         $password = "kappiere97";


         $conn = new mysqli($servername, $username, $password);
		 if ($conn->connection_error){
				die("Connection failed: " . $conn->connection_error);
		 }
         $nome_prima_squadra=$_POST['squadra1'];
         $nome_seconda_squadra=$_POST['squadra2'];
         $query_instruction_1="
         					   SELECT quotazione
         					   FROM gol.squadra
         					   WHERE nome='" . $nome_prima_squadra . "';";

         $x=$conn->query($query_instruction_1);
         while($y=mysqli_fetch_array($x)){
         	$punteggio_squadra1=(int)(100/$y['quotazione']);
         }
         $query_instruction_1="
         					   SELECT quotazione
         					   FROM gol.squadra
         					   WHERE nome='" . $nome_seconda_squadra . "';";

         $x=$conn->query($query_instruction_1);

         while($y=mysqli_fetch_array($x)){
         	$punteggio_squadra2=(int)(100/$y['quotazione']);
         }
         $punteggio_squadra1=(int)($punteggio_squadra1+((100-($punteggio_squadra1+$punteggio_squadra2))/2));
         $punteggio_squadra2=(int)($punteggio_squadra2+((100-($punteggio_squadra1+$punteggio_squadra2))/2));
         if(($punteggio_squadra1+$punteggio_squadra2)!=100){
         	if($punteggio_squadra1>$punteggio_squadra2){
         		$punteggio_squadra1=$punteggio_squadra1+(100-($punteggio_squadra1+$punteggio_squadra2));
         	}
         	else{
         		$punteggio_squadra2=$punteggio_squadra2+(100-($punteggio_squadra1+$punteggio_squadra2));
         	}
         }

         $query_instruction_1="
         					   SELECT ult_partita
         					   FROM gol.squadra
         					   WHERE nome='" . $nome_prima_squadra . "';";

         $x=$conn->query($query_instruction_1);

         while($y=mysqli_fetch_array($x)){
         	$ult_partita_prima_squadra=$y['ult_partita'];
         }
         $query_instruction_1="
         					   SELECT ult_partita
         					   FROM gol.squadra
         					   WHERE nome='" . $nome_seconda_squadra . "';";

         $x=$conn->query($query_instruction_1);

         while($y=mysqli_fetch_array($x)){
         	$ult_partita_seconda_squadra=$y['ult_partita'];
         }
         if($ult_partita_prima_squadra){
         	$punteggio_squadra1++;
         	$punteggio_squadra2--;
         }
         if($ult_partita_seconda_squadra){
         	$punteggio_squadra1--;
         	$punteggio_squadra2++;
         }

         $query_instruction_1="
         					   SELECT posizione
         					   FROM gol.squadra
         					   WHERE nome='" . $nome_prima_squadra . "';";

         $x=$conn->query($query_instruction_1);

         while($y=mysqli_fetch_array($x)){
         	$posizione_prima_squadra=$y['posizione'];
         }
         $query_instruction_1="
         					   SELECT posizione
         					   FROM gol.squadra
         					   WHERE nome='" . $nome_seconda_squadra . "';";

         $x=$conn->query($query_instruction_1);

         while($y=mysqli_fetch_array($x)){
         	$posizione_seconda_squadra=$y['posizione'];
         }
         if($posizione_prima_squadra<$posizione_seconda_squadra){
         	$punteggio_squadra1++;
         	$punteggio_squadra2--;
         }
         if($posizione_seconda_squadra<$posizione_prima_squadra){
         	$punteggio_squadra1--;
         	$punteggio_squadra2++;

         }
         $query_instruction_1="
         					   SELECT n.punteggio
         					   FROM gol.squadra s, gol.notizie n
         					   WHERE s.id=n.idsquadra AND
         					         s.nome='" . $nome_prima_squadra . "';";

         $x=$conn->query($query_instruction_1);

         while($y=mysqli_fetch_array($x)){
         	$punteggio_notizia_squadra1=$y['punteggio'];
         }
         $query_instruction_1="
         					   SELECT n.punteggio
         					   FROM gol.squadra s, gol.notizie n
         					   WHERE s.id=n.idsquadra AND
         					         s.nome='" . $nome_seconda_squadra . "';";

         $x=$conn->query($query_instruction_1);

         while($y=mysqli_fetch_array($x)){
         	$punteggio_notizia_squadra2=$y['punteggio'];
         }
         $punteggio_squadra1=$punteggio_squadra1+$punteggio_notizia_squadra1;
         $punteggio_squadra2=$punteggio_squadra2-$punteggio_notizia_squadra1;
         $punteggio_squadra1=$punteggio_squadra1-$punteggio_notizia_squadra2;
         $punteggio_squadra2=$punteggio_squadra2+$punteggio_notizia_squadra2;
         return array($punteggio_squadra1,$punteggio_squadra2);
 }
?>