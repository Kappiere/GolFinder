<html>
 <head>
  <title>GolFinder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 </head>
 <body>
<div class="container-fluid">
  <ul class="nav nav-pills" data-spy="affix" style="background-color: #ffffff">
    <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
    <li><a data-toggle="pill" href="#squadra">Inserisci Squadra</a></li>
    <li><a data-toggle="pill" href="#notizie">Inserisci Notizia</a></li>
    <li><a data-toggle="pill" href="#scontro">Inserisci Scontro</a></li>
    <li><a data-toggle="pill" href="#registrazione">Inserisci Registrazione</a></li>
  </ul>
  
  <div class="tab-content" style="margin-top: 50px;">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Benvenuto nel lato amministratore</p>
    </div>
    <div id="squadra" class="tab-pane fade">
      <h3>Inserisci Squadra</h3>
      <form action='Insert_Team.php' method='POST' align=center> 
          <h4 align=center>Nome:</p> 
          <input  type='text' name='nome' /> 
          <h4 align=center>Posizione:</p> 
          <input  type='text' name='posizione' />
          <h4 align=center>Punti:</p> 
          <input  type='text' name='punti' />
          <h4 align=center>Campionato:</p> 
          <input  type='text' name='campionato' />
          <h4 align=center>Nazione:</p> 
          <input  type='text' name='nazione' />
          <h4 align=center>Ultima Partita:</p> <br>
          <input  type='radio' name='ult_partita' value=TRUE/>Vinta 
          <input  type='radio' name='ult_partita' value=FALSE/>Persa<br><br>
          <h4 align=center>Quotazione:</p> 
          <input  type='text' name='quotazione' /> <br> <br>
		  <input type='submit' value="Inserisci" align=center>
      </form>
    </div>
    <div id="notizie" class="tab-pane fade">
      <h3>Inserisci Notizia</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="scontro" class="tab-pane fade">
      <h3>Inserisci Scontro</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <div id="registrazione" class="tab-pane fade">
      <h3>Registra Amministratore</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

</body>
</html>