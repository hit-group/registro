<?php

if(!isset($_SESSION["ruolo"])){
  require("include/session/stop.php");
  die("Accesso non effettuato!");
}

if($_SESSION["ruolo"]!="amministratore"){
  require("include/session/stop.php");
  die("Utente non autorizzato!");
}

?>
