<?php
session_start();
include 'db_credentials.php';

//Se una sessione è attiva, la chiude e torna alla homepage.
if(isset($_SESSION["username"])){
  include 'stop.php';
  die();
}

//Controlla che tutti i parametri necessari siano stati forniti
if(!isset($_POST["username"])||$_POST["username"]==""){
  include 'stop.php';
  die();
}

if(!isset($_POST["password"])||$_POST["password"]==""){
  include 'stop.php';
  die();
}

//Controlla username e password

// Crea una nuova connessione
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$username=htmlspecialchars($_POST["username"]);
$password=htmlspecialchars($_POST["password"]);
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of one row
    $row = mysqli_fetch_assoc($result);

    //Se la password è valida
    if(password_verify($password,$row["password"])){
      $_SESSION["username"]=$row["username"];
      $_SESSION["nome"]=$row["nome"];
      $_SESSION["cognome"]=$row["cognome"];
      $_SESSION["email"]=$row["email"];
      $_SESSION["ruolo"]=$row["ruolo"];
      $_SESSION["scuola"]=$row["scuola"];
      $_SESSION["classe"]=$row["classe"];
      if($_SESSION["ruolo"]=="studente"){
        $_SESSION["nomecompleto"]=$_SESSION["nome"]." ".$_SESSION["cognome"];
      }elseif($_SESSION["ruolo"]=="docente") {
        $_SESSION["nomecompleto"]=$_SESSION["nome"]." ".$_SESSION["cognome"];
      }elseif($_SESSION["ruolo"]=="amministratore") {
        $_SESSION["nomecompleto"]="Amministratore";
      }
      //Salva un cookie con l'username (se richiesto dall'utente)
      if(isset($_POST["cookieremember"])){
          //l'utente ha richiesto di salvare il cookie
      }
      header("Location: /");
    }else{
      //Password errata
      header("Location: /login.php?info=wrong");
      die();
    }
} else {
  //Username errato
  header("Location: /login.php?info=wrong");
  die();
}
$conn->close();
?>
