<?php
/*
  Connessione al DBMS e selezione del database.
*/

include_once($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Credenziali di accesso al db

# stringa di connessione al DBMS
// istanza dell'oggetto della classe MySQLi
$connessione = new mysqli($db_servername, $db_username, $db_password, $db_name);

// verifica su eventuali errori di connessione
if ($connessione->connect_errno) {
    echo "Connessione fallita: ". $connessione->connect_error . ".";
    exit();
}
?>

