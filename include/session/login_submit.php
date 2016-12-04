<?php

session_start();

//Se una sessione è attiva, la chiude e torna alla homepage.
if(isset($_SESSION["ses_username"])){
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
if($_POST["username"]=="gverdi1234"&&$_POST["password"]=="a"){
  $_SESSION["username"]=htmlspecialchars($_POST["username"]);
  $_SESSION["nome"]="Giuseppe";
  $_SESSION["cognome"]="Verdi";
  $_SESSION["scuola"]="Liceo B. Russell";
  $_SESSION["classe"]="III C";
  header("Location: /");
  die();
}else if($_POST["username"]=="mrossi4321"&&$_POST["password"]=="a"){
  $_SESSION["username"]=htmlspecialchars($_POST["username"]);
  $_SESSION["nome"]="Mario";
  $_SESSION["cognome"]="Rossi";
  $_SESSION["scuola"]="ITET C.A. Pilati";
  $_SESSION["classe"]="IV C";
  header("Location: /");
  die();
}else{
  header("Location: /login.php?info=wrong");
}

?>

<html>
  <head>
  </head>
  <body>
      Username<br>
      <?php echo htmlspecialchars($_POST["username"]); ?>
      <br><br>
      Password<br>
      <?php echo htmlspecialchars($_POST["password"]); ?>
  </body>
</html>
