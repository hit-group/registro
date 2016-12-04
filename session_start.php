<?php
	session_start();
	$_SESSION["ses_username"] = "Utente";
	// Rimanda alla pagina principale
	header("Location: /");
	die();
?>
