<html>
 <head>
  <title>GolFinder</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 	<form action='incontri.php'class="form-horizontal" role"form">
 	 <div align="center" class="col-sm-10">
 	  <label
 	    for="Search"></label>
 	    <div class="col-sm-10">
 	     <input style = 'width: 350' type="text" class="form-control"
 	            id="Search" placeholder="Search">
 	     <input type="submit" class="form-control"
 	      value="Search">
 	    </form>
 	    </div>
 	    </div>
        <?php
         $servername = "localhost";
         $username = "root";
         $password = "kappiere97";


		 $conn = new mysqli($servername, $username, $password);
		 if ($conn->connection_error){
				die("Connection failed: " . $conn->connection_error);
		 }
		 $a=$_POST['serie'];
         $sql1="
                SELECT s1.nome AS nome1,s2.nome AS nome2,Data_Scontro AS Data
                FROM gol.squadra s1,gol.squadra s2,gol.scontro s  
                WHERE s1.id=s.id1 AND 
                      s2.id=s.id2 AND
                      s1.serie='" . $a . "'
                ORDER BY Data_Scontro;";
         $x=$conn->query($sql1);

         while($y=mysqli_fetch_array($x)){
         echo("<div align='center'>
         	   <form action='find.php' method='POST'>
         	       <input type='hidden' value='" . $y['nome1'] . "' name='squadra1'>
                   <button style = 'width: 280' type='submit' name='squadra2' value='" . $y['nome2'] . "''>
                   <p style='display:inline-block; float:left'>
                   ". $y['nome1'] ."-". $y['nome2'] . "
                   </p>
                   <p style='display:inline-block; float:right'> 
                   " . $y['Data'] . "
                   </p></button></form></div>");
         }
         

										
 	    ?>

 </body>