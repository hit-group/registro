<?php
  include "db_credentials.php";

  function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
  }

  $password=htmlspecialchars($_POST["password"]);
  $nome=htmlspecialchars($_POST["nome"]);
  $cognome=htmlspecialchars($_POST["cognome"]);
  $scuola=htmlspecialchars($_POST["scuola"]);
  $classe=htmlspecialchars($_POST["classe"]);
  $email=htmlspecialchars($_POST["email"]);
  $ruolo=htmlspecialchars($_POST["ruolo"]);

  // Crea una nuova connessione
  $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

  // Controlla la connessione
  if ($conn->connect_error) {
      die("Connessione fallita: " . $conn->connect_error);
  }
  $password=password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (password, nome, cognome, scuola, classe, ruolo, email)
  VALUES ('$password', '$nome', '$cognome', '$scuola', '$classe', '$ruolo', '$email')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    $conn->close();
    //Crea l'username accodando l'userid
    $username= clean($nome){0} . substr(clean($cognome),0,4) . $last_id;
    $username=strtolower($username);

    //si riconnette ed aggiorna il record appena creato
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    $sql = "UPDATE users SET username='$username' WHERE id=$last_id";
    if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
    if ($conn->query($sql) === TRUE) {
      echo "Username creato correttamente";
      //Utente creato con successo!
      //Rimanda alla homepage
      header("Location: /");
    } else {
      echo "Errore durante la creazione dell'username: " . $conn->error;
    }

  } else {
      echo "Errore: " . $sql . "<br>" . $conn->error;
      $conn->close();
  }
?>
