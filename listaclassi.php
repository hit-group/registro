<?php

	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/include/session/onlyadmin.php"); //Consente l'accesso solo ai docenti
	require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Consente l'accesso solo all'amministratore
	require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database



	$result = $connessione->query("SELECT * FROM classi");

	echo '<form mothod="post" action="eliminazione.php">';
	echo '<select><option value="" disabled selected>Scegli una classe</option>';


	if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$annoB = intval($row["anno"]); //2017
				$annoA = $annoB-1; 						//2016
				echo '<option value='.$row["id"].'>'.$row["nome"].' '.$annoA.'-'.$annoB.'</option>';
			}
 } else {

 }
	echo '<br><br><input type="submit" value="Elimina"></input>';
	echo '</select>';
	echo '</form>';

?>
