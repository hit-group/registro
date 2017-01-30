<?php
  session_start(); //Avvia la sessione
  require_once "include/session/db_credentials.php"; //Include le credenziali del database
  require "include/session/connessione.php"; //Crea una connessione con le credenziali appena incluse
  require "include/session/onlyadmin.php"; //Impedisce l'accesso ad utenti diversi dall'amministratore

  //Riceve il parametro get che specifica l'username

  if(!isset($_GET['user'])){
    die("username non specificato");
  }else{
    $username = $_GET["user"];
  }

  //Pulisce il paramerto 'user' per evitare SQL injections
  $username=mysqli_real_escape_string($connessione,$username);

  // esecuzione della query per la selezione dei record
  // query argomento del metodo query()

  if (!$result = $connessione->query("SELECT u.id,u.username,u.cognome,u.ruolo,u.email,u.nome as nomeUtente,c.nome as nomeClasse FROM classi as c RIGHT JOIN utenti as u ON c.id = u.classe WHERE u.username = '$username' ")) {
    echo "Errore della query: " . $connessione->error . ".";
    exit();
  }else{
    // conteggio dei record
    if($result->num_rows > 0) {
      // conteggio dei record restituiti dalla query
      $row = $result->fetch_array(MYSQLI_ASSOC);

      echo "id = ".$row["id"]."<br>";
      echo "username = ".$row["username"]."<br>";
      echo "nome = ".$row["nomeUtente"]."<br>";
      echo "cognome = ".$row["cognome"]."<br>";
      echo "classe = ".$row["nomeClasse"]."<br>";
      echo "ruolo = ".$row["ruolo"]."<br>";
      echo "email = ".$row["email"]."<br>";


      if($row["password"]==""){
        echo "Password : non impostata<br>";
      }else{
        echo "Password : impostata<br>";
      }


      if($row["temp_pwd"]==""){
        echo "Password temporanea: non impostata";
      }else{
        echo "Password temporanea: ".$row["temp_pwd"];
      }

      echo "<br><br><a href='infoutente.php?delete=$username'>Elimina</a>";
      echo "<br><a>Cambia password</a>";

      // liberazione delle risorse occupate dal risultato
      $result->close();
    }else{
      echo "Errore: utente ". $username ." non presente nel database.";
    }
  }
  // chiusura della connessione
  $connessione->close();


?>
