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
 
	if(isset($_SESSION["msg_succ"])&&$_SESSION["msg_succ"]==true){
	$_SESSION["msg_succ"]=false;
	
	echo '<div id="infobox" class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Fatto!</h4>
			Password modificata correttamente. La password temporanea nuova è: ' .$_SESSION["session_password"].'
		  </div>';
}


  //Pulisce il paramerto 'user' per evitare SQL injections
  $username=mysqli_real_escape_string($connessione,$username);

  // esecuzione della query per la selezione dei record
  // query argomento del metodo query()


if (!$result = $connessione->query("SELECT u.id,u.username,u.cognome,u.ruolo,u.email,u.nome as nomeUtente,c.nome as nomeClasse, password, temp_pwd FROM classi as c RIGHT JOIN utenti as u ON c.id = u.classe WHERE u.username = '$username'")) {
    echo "Errore della query: " . $connessione->error . ".";
    exit();
  }else{
    // conteggio dei record
    if($result->num_rows > 0) {
      // conteggio dei record restituiti dalla query
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo '

      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Informazioni sull\'utente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->


        <form id="usrregform" role="form">
          <div class="box-body">
            <div class="form-group">
              <label>ID Utente:</label>';
              echo " ".$row["id"];
              echo '<br>

              <label>Username:</label>';
              echo " ".$row["username"];
              echo '<br>

              <label>Nome:</label>';
              echo " ".$row["nomeUtente"];
              echo '<br>

              <label>Cognome:</label>';
              echo " ".$row["cognome"];
              echo '<br>

              <label>Classe:</label>';
              echo " ".$row["nomeClasse"];
              echo '<br>

              <label>Indirizzo e-mail:</label>';
              echo " ".$row["email"];
              echo '<br>

              <label>Ruolo:</label>';
              echo " ".$row["ruolo"];
              echo '<br>

              <label>Password:</label>';
              if($row["password"]==""){
                echo " Non impostata";
              }else{
                echo " Impostata";
              }
              echo '<br>

              <label>Password temporanea:</label>';
              if($row["temp_pwd"]==""){
                echo " Non impostata";
              }else{
                echo " Impostata";
              }
              echo '<br>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <div class="btn btn-primary" onclick="location.href=\'/include/forms/pwdmod.php?user=';
            echo "$username";
            echo '\'">Cambia Password</div>
            <div class="btn btn-danger" onclick="location.href=\'/include/forms/userdel.php?user=';
            echo "$username";
            echo '\'">Elimina</div>
          </div>

        </form>
      </div>
      <!-- /.box -->';


      // liberazione delle risorse occupate dal risultato
      $result->close();
    }else{
      echo "Errore: utente ". $username ." non presente nel database.";
    }
  }
  // chiusura della connessione
  $connessione->close();


?>
