<?php

if(!isset($_SESSION["ruolo"])){
  require($_SERVER['DOCUMENT_ROOT']."/include/session/stop.php");
  die("Accesso non effettuato!");
}

if($_SESSION["ruolo"]!="amministratore"){
  require($_SERVER['DOCUMENT_ROOT']."/include/session/stop.php");
  die("Utente non autorizzato!");
}

?>
