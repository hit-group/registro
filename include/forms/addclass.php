<?php

  session_start();

  require($_SERVER['DOCUMENT_ROOT']."/include/session/onlyadmin.php"); //Consente l'accesso solo all'amministratore
  require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php");
  require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database


  // verifica su eventuali errori di connessione
  if ($connessione->connect_errno) {
      echo "Connessione fallita: ". $connessione->connect_error . ".";
      exit();
  }

  if(isset($_POST['sigla']) && isset($_POST['nome']) && isset($_POST['anno'])){

    $sigla = $_POST['sigla'];
    $nome = $_POST['nome'];
    $anno = $_POST['anno'];

    $sigla = mysqli_real_escape_string($connessione, $sigla);
    $nome = mysqli_real_escape_string($connessione, $nome);
    $anno = mysqli_real_escape_string($connessione, $anno);

    //inserting data order
    // esecuzione della query per l'inserimento dei record
    if (!$connessione->query("INSERT INTO classi (sigla, nome, anno) VALUES ('$sigla', '$nome','$anno')")) {
    echo "Errore della query: " . $connessione->error . ".";
  }else{
    echo "Inserimenti effettuati correttamente.";
    header("Location: /?p=adclass&result=ok");
  }

  }


  // chiusura della connessione
  $connessione->close();
?>
