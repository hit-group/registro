<?php
	session_start();

	// elimina tutte le variabile di sessione
	session_unset();

	// distrugge la sessione
	session_destroy();

	// Rimanda alla pagina principale
	header("Location: /");
	die();
?>
