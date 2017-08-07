<?php
  //Pagina che riceve l'appello

  //TODO: Ricevere la classe, il numero di studenti e l'appello
  //
  // require($_SERVER['DOCUMENT_ROOT']."/include/session/onlydoc.php"); //Consente l'accesso solo ai docenti
  // require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Consente l'accesso solo all'amministratore
  require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database



  echo "<table>";
  foreach (array_slice($_POST, 1) as $key => $value) {
      $sql = "INSERT INTO presenze (studente, classe, giorno, ora_entrata, ora_uscita)";

      echo "<tr>";
      echo "<td>";
      echo $key = str_replace("stud", "", $key);
      echo "</td>";
      echo "<td>";
      echo $value;
      echo "</td>";
      echo "</tr>";
  }
  echo "</table>";



?>
