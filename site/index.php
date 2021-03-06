<?php
	session_start();  //Avvia la sessione
	include_once 'include/nav/pagemanager.php';
	require_once 'include/session/db_credentials.php';
	//Se l'utente non è utenticato rimanda alla pagina di login
	if(!isset($_SESSION["username"])){
		header("Location: /login.php");
		die();
	}

	if(isset($_SESSION["cambiapassword"])&&$_SESSION["cambiapassword"]==true){
		header("Location: /changepwd.php");
		die();
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
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <link rel="icon" href="./img/favicon.ico" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HIT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HIT</b> Group</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="include/session/stop.php">
              <!-- The user image in the navbar-->
              <img src="/img/PowerIcon.png" class="" alt="">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

	<!-- Aggiunge il menu laterale -->
	<?php include 'include/nav/sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro elettronico
        <small>by HIT Group</small>
      </h1>

      <!--ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol-->

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->

			<!-- Imposta il layout su una sola colonna -->
			<div class="row">
				<div class="col-xs-12">


			<?php
				if($pag=="index")
					include 'pages/index.php';

				if($_SESSION["ruolo"]=="studente"){

				}elseif ($_SESSION["ruolo"]=="docente") {
					if($pag=="presenze")
						include 'pages/presenze.php';
					if($pag=="presenze2")
						include 'pages/presenze2.php';
				}elseif ($_SESSION["ruolo"]=="amministratore") {
					if($pag=="usrlist")
						include 'pages/usrlist.php';
					elseif ($pag=="addusr")
						include 'pages/addusr.php';
					elseif ($pag=="addusrok")
						include 'pages/addusr_ok.php';
					elseif ($pag=="printpwd")
						include 'pages/stampa-password.php';
					elseif ($pag=="usrinfo")
						include 'pages/usrinfo.php';
					elseif ($pag=="rmclass")
						include 'pages/rmclass.php';
						elseif ($pag=="adclass")
							include 'pages/adclass.php';
				}

			?>
					</div><!-- /.col -->
				</div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->


    <!-- Default to the left -->
    <strong>Copyright &copy; 2016-2017 <a href="https://hit-group.github.io/">HIT Group</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>

<!-- Script per mostrate tutti gli elementi in una datatable -->
<script src="js/datatables-showall.js"></script>

<script>
	//Script per le tabelle complesse
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>
</body>
</html>
