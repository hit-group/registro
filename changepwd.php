<?php
  session_start();
  include_once('include/session/db_credentials.php');
  if(!isset($_SESSION["username"])){
    header("Location: /login.php");
    die();
  }

  if(isset($_SESSION["cambiapassword"])&&$_SESSION["cambiapassword"]==true){
    $messaggio="Cambio password richiesto<br>";
  }else{
    $messaggio="";
  }

  if(isset($_POST["password"])){

    //Cambia la password con $password ed elimina quella provvisoria
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $username = mysqli_real_escape_string($conn,$_SESSION["username"]);

    $sql = "UPDATE utenti SET temp_pwd='', password='$password' WHERE username='$username'";
    if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
    if ($conn->query($sql) === TRUE) {
      echo "Password cambiata correttamente";
      //Password cambiata con successo!
      $_SESSION["cambiapassword"]=false;
      header("Location: /");
      die();
    } else {
      echo "Errore durante il cambio della password: " . $conn->error;
      die();
    }

  }


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro elettronico</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/"><b>HIT </b>Group</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $_SESSION["nome"]; echo " "; echo $_SESSION["cognome"]; ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="img/user_logo.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post">
      <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="password">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <?php echo "$messaggio"; ?>Inserisci la nuova password per continuare
  </div>
  <div class="text-center">
    <a href="login.php">Annulla</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2016-2017 <b><a href="https://hit-group.github.io/" class="text-black">HIT Group</a></b>
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
