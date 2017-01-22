<?php
/*
  selezione di dati da una tabella con MySQLi
*/
// inclusione del file di connessione
include "connessione.php";

// esecuzione della query per la selezione dei record
// query argomento del metodo query()
if (!$result = $connessione->query("SELECT id,nome,username,cognome,temp_pwd FROM utenti WHERE password is null")) {
  echo "Errore della query: " . $connessione->error . ".";
  exit();
}else{
  // conteggio dei record
  if($result->num_rows > 0) {
    // conteggio dei record restituiti dalla query
    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
		$myfile = fopen("dati".$row['id'].".txt", "w") or die("Unable to open file!"); 	
		echo $row['nome']." ".$row['cognome']." ".$row['temp_pwd']. "<br />";
		fwrite($myfile, "Gentilissimo/a ". $row['nome'].", lei è stato inserito nel sistema informativo del istituto.\r\nTi invitiamo ad accedere al registro elettronico tramite www .\r\nIl suo username è: '". $row['username']. "'.\r\nLa sua password provvisoria è: '".$row['temp_pwd']."', ti verrà chiesto di cambiarla al primo accesso.\r\nLa sua e-mail è: '".$row['temp_pwd']."'.");
		fclose($myfile);
		
    }
	
    // liberazione delle risorse occupate dal risultato
    $result->close();
  }
}
// chiusura della connessione
$connessione->close();
?>
