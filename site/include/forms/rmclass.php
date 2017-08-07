<?php
  session_start();

  require($_SERVER['DOCUMENT_ROOT']."/include/session/onlyadmin.php"); //Consente l'accesso solo ai docenti
	require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Consente l'accesso solo all'amministratore
	require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database


  if(!isset($_POST['classe'])){
  	die();
  }else{
    $classe = $_POST['classe'];
    $classe = mysqli_real_escape_string($connessione, $classe);
  }

  	//inserting data order
  	// esecuzione della query per l'inserimento dei record
  	if (!$connessione->query("DELETE FROM classi where id=$classe")) {
  	  header("Location: /?p=rmclass&result=fail");
  	}else{
  	  header("Location: /?p=rmclass&result=ok");
  	}



?>
