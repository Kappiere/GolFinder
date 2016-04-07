<html>
 <head>
  <title>GolFinder</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 	<form action='HOME.php'class="form-horizontal" role"form">
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
		 
         $sql1="
                	SELECT DISTINCT(squadra.campionato)
                    FROM gol.squadra;";
         $x=$conn->query($sql1);

         while($y=mysqli_fetch_array($x)){
         echo("<div align='center'>
         	   <form action='serie.php' method='POST'>
                   <button style = 'width: 280' type='submit' name='nazione' value='" . $y['campionato'] . "'>" . $y['campionato'] . "</button>
                   </form></div>");
         }
         

										
 	     ?>


 </body>
