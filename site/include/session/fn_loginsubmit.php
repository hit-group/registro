<?php


function checkLogin($username, $password){
    //Funzione che controlla se i dati inseriti per effettuare l'accesso sono
    //corretti o meno. Invia di conseguenza l'utente alla pagina di login, alla
    //pagina di cambio password o alla pagina principale del registro elettronico.

    //Include le credenziali di accesso al database
    include 'include/session/db_credentials.php';

    // Crea una nuova connessione
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    // Controlla la connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    //Modifica l'input in modo da evitare attacchi di tipo SQL injection
    $username=mysqli_real_escape_string($conn,$username);
    $password=mysqli_real_escape_string($conn,$password);


    $sql = "SELECT * FROM utenti WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of one row
        $row = mysqli_fetch_assoc($result);



        if($row["temp_pwd"]!=""){
          if($password==$row["temp_pwd"]){
            //Login con password temporanea riuscito.
            //Costringe a cambiarla.
            $_SESSION["cambiapassword"]=true; //true se il cambio è obbligato, false o unset se volontario
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

            header("Location: /changepwd.php");
            die();
          }else{
            //Password temporanea errata.
            //Procode con il controllo di quella vera.
          }
        }else{
          //Non c'è una password temporanea.
          //Procede con il controllo di quella vera.
        }



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
          //Username e password corretti

          //Elimina l'eventuale password temporanea
          $conn->close();



          $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
          $sql = "UPDATE utenti SET temp_pwd='' WHERE username='$username'";
          $result = $conn->query($sql);


          $conn->close();



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


}
?>
