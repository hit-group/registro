<?php
  //Pagina che riceve l'appello

  //TODO: Ricevere la classe, il numero di studenti e l'appello
  //
  // require($_SERVER['DOCUMENT_ROOT']."/include/session/onlydoc.php"); //Consente l'accesso solo ai docenti
  // require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Consente l'accesso solo all'amministratore
  // require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database




  echo "<table>";


  foreach ($_POST as $key => $value) {
      echo "<tr>";
      echo "<td>";
      echo $key;
      echo "</td>";
      echo "<td>";
      echo $value;
      echo "</td>";
      echo "</tr>";
  }


  echo "</table>";

?>
