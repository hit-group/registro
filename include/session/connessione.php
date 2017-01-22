<?php
/*
  Connessione al DBMS e selezione del database.
*/

/*
# blocco dei parametri di connessione
$db_servername = "localhost";
$db_username = "root";
$db_password = "rebenciuc";
$db_name = "registro_db";
*/

# stringa di connessione al DBMS
// istanza dell'oggetto della classe MySQLi
$connessione = new mysqli($db_servername, $db_username, $db_password, $db_name);

// verifica su eventuali errori di connessione
if ($connessione->connect_errno) {
    echo "Connessione fallita: ". $connessione->connect_error . ".";
    exit();
}
?>
