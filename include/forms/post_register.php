<?php
  session_start();

  if($_SESSION["ruolo"]!="amministratore"){
    header("Location: /include/session/stop.php");
    die();
  }

  include_once "../../include/session/db_credentials.php";

  function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
  }


  if(isset($_POST["password"]))
    $password=htmlspecialchars($_POST["password"]);
  else
    $password="a"; //TODO genera password casualmente

  $nome=htmlspecialchars($_POST["nome"]);
  $cognome=htmlspecialchars($_POST["cognome"]);
  $scuola="ITET C.A. Pilati";
  $classe=htmlspecialchars($_POST["classe"]);
  $email=htmlspecialchars($_POST["email"]);
  $ruolo=htmlspecialchars(strtolower($_POST["ruolo"]));
  $ruolo=strtolower($ruolo);


  // Crea una nuova connessione
  $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

  //Modifica l'input in modo da evitare attacchi di tipo SQL injection
  $password=mysqli_real_escape_string($conn,$password);
  $nome=mysqli_real_escape_string($conn,$nome);
  $cognome=mysqli_real_escape_string($conn,$cognome);
  $scuola=mysqli_real_escape_string($conn,$scuola);
  $classe=mysqli_real_escape_string($conn,$classe);
  $email=mysqli_real_escape_string($conn,$email);
  $ruolo=mysqli_real_escape_string($conn,$ruolo);


  // Controlla la connessione
  if ($conn->connect_error) {
      die("Connessione fallita: " . $conn->connect_error);
  }
  //$password=password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO utenti (temp_pwd, nome, cognome, scuola, classe, ruolo, email)
  VALUES ('$password', '$nome', '$cognome', '$scuola', '$classe', '$ruolo', '$email')";


  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
    $conn->close();
    //Crea l'username accodando l'userid
    $username= clean($nome){0} . substr(clean($cognome),0,4) . $last_id;
    $username=strtolower($username);

    //si riconnette ed aggiorna il record appena creato
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    $sql = "UPDATE utenti SET username='$username' WHERE id=$last_id";
    if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
    if ($conn->query($sql) === TRUE) {
      echo "Username creato correttamente";
      //Utente creato con successo!
      //Mostra un messaggio di successo e torna alla pagina di inserimento dati
      $_SESSION["msg_succ"]=true;
      header("Location: /?p=addusr");
    } else {
      echo "Errore durante la creazione dell'username: " . $conn->error;
    }

  } else {
      echo "Errore: " . $sql . "<br>" . $conn->error;
      $conn->close();
  }
?>
