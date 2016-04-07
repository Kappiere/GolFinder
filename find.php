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
         $nome_prima_squadra=$_POST['squadra1'];
         $nome_seconda_squadra=$_POST['squadra2'];
         include 'function.php';
         $punteggi=calcolo();
         $punteggio_squadra1=$punteggi[0];
         $punteggio_squadra2=$punteggi[1];
         echo("<div class='row'>
                <div class='col-lg-5' style='background-color:gray;' align='center'>
                  " . $nome_prima_squadra . "<br>" . $punteggio_squadra1 . "
                </div>
          		<div class='col-lg-2'>
           	     <h1 align='center'>VS</h1>
         	    </div>
         	    <div class='col-lg-5' style='background-color:gray;' align='center'>
          		  " . $nome_seconda_squadra . "<br>" . $punteggio_squadra2 ."
          		</div>
         	  </div>");


        ?>

 	    </body>