<html>
 <head>
  <title>GolFinder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/page.css" type="text/css" />
 </head>
 <body>
 
 	<?php
         $servername = "localhost";
         $username = "root";
         $password = "kappiere97";


		 $conn = new mysqli($servername, $username, $password);
		 
		 if ($conn->connection_error){
				die("Connection failed: " . $conn->connection_error);
		 }
		 
         $Query="
                	SELECT DISTINCT(squadra.campionato)
                    FROM gol.squadra;";
         $x=$conn->query($Query);
         
         echo "<div class='panel-group' id='accordion'>";

         while($y=mysqli_fetch_array($x)){
         $i++;
         echo "  
                 <div class='panel panel-default'>
                   <div class='panel-heading'>
                     <h4 class='panel-title'>
                      <a data-toggle='collapse' data-parent='#accordion' href='#collapse" . $i. "'>" . $y['campionato'] . "</a>
                     </h4>
                   </div>
                   <div id='collapse" . $i . "' class='panel-collapse collapse'>
                     <div class='panel-body'>
                       <div class='panel-group' id='accordion_serie'>";
                       $Query_serie="
                           SELECT DISTINCT(squadra.serie)
                           FROM gol.squadra
                           WHERE squadra.campionato='" . $y['campionato'] . "';";

                        $x_serie=$conn->query($Query_serie);
                        while($y_serie=mysqli_fetch_array($x_serie)){
                        $i_serie++;
                       echo "  
                       <div class='panel panel-default'>
                         <div class='panel-heading'>
                           <h4 class='panel-title'>
                                <a data-toggle='collapse' data-parent='#accordion_serie' href='#collapse_serie" . $i_serie. "'>" . $y_serie['serie'] . "
                                </a>
                           </h4>
                         </div>
                         <div id='collapse_serie" . $i_serie . "' class='panel-collapse collapse'>
                           <div class='panel-body'>
                             ";//incontri

                               $Query_partite="
                                     SELECT s1.nome AS nome1,s2.nome AS nome2,Data_Scontro AS Data
                                     FROM gol.squadra s1,gol.squadra s2,gol.scontro s  
                                     WHERE s1.id=s.id1 AND 
                                           s2.id=s.id2 AND
                                           s1.serie='" . $y_serie['serie'] . "'
                                     ORDER BY Data_Scontro;";
                               $x_partite=$conn->query($Query_partite);

                               while($y_partite=mysqli_fetch_array($x_partite)){
                               echo("<div align='center'>
                                     <form action='find.php' method='POST'>
                                     <input type='hidden' value='" . $y_partite['nome1'] . "' name='squadra1'>
                                     <button class='button-partite' type='submit' name='squadra2' value='" . $y_partite['nome2'] . "''>
                                     <p class='p-partite-sinistra'>
                                     ". $y_partite['nome1'] ."-". $y_partite['nome2'] . "
                                     </p>
                                     <p class='p-partite-destra'> 
                                     " . $y_partite['Data'] . "
                                     </p></button></form></div>");
                               }
                          echo"
                           </div>
                         </div>
                       </div>
                      ";         
                    }
               echo "</div>
                     </div>
                   </div>
                 </div>
              ";
         
         }
         echo "</div>";

										
 	     ?>


 </body>
</html>
