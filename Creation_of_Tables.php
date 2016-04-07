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

//Create tables

$sql = "
        CREATE TABLE gol.squadra(  id int auto_increment primary key not null,
                                   nome varchar(20) not null,
                                   posizione int not null,
                                   punti int not null,
                                   serie varchar(15) not null,
                                   campionato varchar(15) not null,
                                   ult_partita boolean not null,
                                   quotazione decimal(4,2))
                                   ENGINE=InnoDB DEFAULT CHARSET=latin1";
if($conn->query($sql) === TRUE){
	echo "Table created successfully";
} else{
	echo "Error creating table: " . $conn->error;
}
echo("<br>");
$sql = "
        CREATE TABLE gol.scontro( cod_scontro int auto_increment primary key not null,
                                  id1 int,
                                  id2 int,
                                  FOREIGN KEY (id1) REFERENCES gol.squadra(id),
                                  FOREIGN KEY (id2) REFERENCES gol.squadra(id))
                                  ENGINE=InnoDB DEFAULT CHARSET=latin1";
if($conn->query($sql) === TRUE){
  echo "Table created successfully";
} else{
  echo "Error creating table: " . $conn->error;
}
echo("<br>");
$sql = "
        CREATE TABLE gol.notizie( id int auto_increment primary key not null,
                                  idsquadra int,
                                  punteggio int not null,
                                  FOREIGN KEY (idsquadra) REFERENCES gol.squadra(id))
                                  ENGINE=InnoDB DEFAULT CHARSET=latin1";
if($conn->query($sql) === TRUE){
  echo "Table created successfully";
} else{
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>