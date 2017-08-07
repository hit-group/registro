<?php
//Pagina che elimina un utente del database
//Solo gli amministratori possono eliminare utenti.
//Un utente non può eliminarsi da solo.

session_start();

require($_SERVER['DOCUMENT_ROOT']."/include/session/onlyadmin.php"); //Consente l'accesso solo all'amministratore
require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database

if(!isset($_GET["user"])){
  die("ERRORE: Username non specificato");
}

$username = $_GET["user"];
$username = mysqli_real_escape_string($connessione,$username); //Pulisce i parametri per evitare SQL injection

if($username==$_SESSION["username"]){
  die("ERRORE: Username non valido");
}

// esecuzione della query per la selezione dei record
// query argomento del metodo query()
if (!$result = $connessione->query("DELETE FROM utenti WHERE username = '$username'")) {
  echo "Errore della query: " . $connessione->error . ".";
  exit();
}else{
  $_SESSION["msg_succ"]=true;
  //Eliminazione andata a buon fine
}

$_SESSION["del_succ"]=true;

// chiusura della connessione
$connessione->close();

//Rimanda alla lista degli utenti
header("Location: /?p=usrlist");

?>
