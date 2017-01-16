<?php

	session_start();
		include_once "../../include/session/db_credentials.php";


	echo "post_register.php<br><br>";

	//Impedisce la prosecuzione se l'utente non è autenticato oppure non è l'amministratore
  if(!isset($_SESSION["ruolo"])){
    header("Location: /include/session/stop.php");
		//echo "Ruolo: ".$_SESSION["ruolo"];
    die("Utente non autenticato");
  }
	if($_SESSION["ruolo"]!="amministratore"){
		header("Location: /include/session/stop.php");
		die("Permessi non sufficienti");
	}

	if(isset($_POST["nome"])){
		echo "Nome: ".$_POST["nome"]."<br>";
	}else{
		die("Nome non fornito");
	}

  if(isset($_POST["cognome"])){
    echo "Cognome: ".$_POST["cognome"]."<br>";
  }else{
		die("Cognome non fornito");
	}

  if(isset($_POST["ruolo"])){
    echo "Ruolo: ".$_POST["ruolo"]."<br>";
  }else{
		die("Ruolo non fornito");
	}

  if(isset($_POST["classe"])){
    echo "Classe: ".$_POST["classe"]."<br>";
  }else{
		die("Classe non fornita");
	}

  if(isset($_POST["email"])){
    echo "Email: ".$_POST["email"]."<br>";
  }else{
		die("Email non formita");
	}


	  function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	  }


	
        function random_str($length, $keyspace = '0123456789')
        {
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[mt_rand(0, $max)];
            }
            return $str;
        }
        $password=random_str(6);
        


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
	$nome=mysqli_real_escape_string($conn,$nome);
	$cognome=mysqli_real_escape_string($conn,$cognome);
	$scuola=mysqli_real_escape_string($conn,$scuola);
	$classe=1;
	$email=mysqli_real_escape_string($conn,$email);
	$ruolo=mysqli_real_escape_string($conn,$ruolo);


				  // Controlla la connessione
				  if ($conn->connect_error) {
				      die("Connessione fallita: " . $conn->connect_error);
				  }
				  //$password=password_hash($password, PASSWORD_DEFAULT);
				  $sql = "INSERT INTO utenti (temp_pwd, nome, cognome, classe, scuola, ruolo, email)
				  VALUES ('$password', '$nome', '$cognome', '$classe', '$scuola', '$ruolo', '$email')";


				  if ($conn->query($sql) === TRUE) {

						$last_id = $conn->insert_id;
				    //echo "New record created successfully. Last inserted ID is: " . $last_id;
				    $conn->close();

						//Crea l'username accodando l'userid
				    $username = substr(clean($nome),0,1) . substr(clean($cognome),0,4) . $last_id;
						$username = str_replace('-', '', $username);
				    $username = strtolower($username);

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
