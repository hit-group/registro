<?php
session_start();
include 'include/session/db_credentials.php'; //Include le credenziali di accesso al database
require_once('include/session/fn_loginsubmit.php'); //Include le funzioni per effettuare il login

//Se una sessione è attiva, la chiude e torna alla homepage.
if(isset($_SESSION["username"])){
  include 'include/session/stop.php';
  die();
}

//Se tutti i parametri sono stati forniti tenta l'accesso, altrimenti mostra una
//pagina di login.

if(isset($_POST["username"])&&isset($_POST["password"])){
  //Tenta l'acceso
  checkLogin($_POST["username"],$_POST["password"]);
  die();
}else{
  //Prosegue mostrando la pagina di login
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="js/loginform.js"></script>
  <script src="js/cookieutils.js"></script>

</head>
<body class="hold-transition login-page" onload="checkInterval();checkCookie();">
<div class="login-box">
  <div class="login-logo">
    <a href="https://hit-group.github.io/"><b>HIT</b> Group</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" id="frase">
      <?php
        if(isset($_GET["info"])&&$_GET["info"]=="wrong")
          echo "Errore: i dati inseriti non sono corretti";
        else
          echo "Effettua il login per accedere al registro elettronico";
      ?>
    </p>
    <!-- form action="include/session/login_submit.php" method="post" -->
      <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input name="username" id="username" type="text" class="form-control" placeholder="Username" onchange="usernameChanged(this);">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" id="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input id="cb" type="checkbox" name="cookieremember" onclick="checkboxClick(this);" checked> Ricordami
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Vai</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });


  jQuery('input#cb').on('ifChanged', function (event) {
    if ($(this).prop('checked')) {
        checkboxClick(this);
    } else {
        checkboxClick(this);
    }
  });


</script>
</body>
</html>
