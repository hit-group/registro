<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="img/user_logo.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION["nomecompleto"]; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION["username"]; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <?php
        //Voce del menu "home"
        echo ('<li class="');
        if(!isset($pag))
          echo ('active');
        echo ('"><a href="/"><i class="fa fa-link"></i> <span>Home</span></a></li>');

      if($_SESSION["ruolo"]=="studente"){

      }elseif($_SESSION["ruolo"]=="docente") {

      }elseif($_SESSION["ruolo"]=="amministratore") {

        //Voce del menu per aggiungere (registrare) nuovi utenti (studenti o docenti)
        echo ('<li class="');
        if($pag=="addusr")
          echo ('active');
        echo ('"><a href="/?p=addusr"><i class="fa fa-link"></i> <span>Inserimento utenti</span></a></li>');


        echo '
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Lista utenti</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="'; if($show==all)echo "active"; echo'"><a href="/?p=usrlist&show=all"><i class="fa fa-circle-o"></i> Tutti</a></li>
            <li class="'; if($show==stu)echo "active"; echo'"><a href="/?p=usrlist&show=stu"><i class="fa fa-circle-o"></i> Studenti</a></li>
            <li class="'; if($show==doc)echo "active"; echo'"><a href="/?p=usrlist&show=doc"><i class="fa fa-circle-o"></i> Docenti</a></li>
            <li class="'; if($show==adm)echo "active"; echo'"><a href="/?p=usrlist&show=adm"><i class="fa fa-circle-o"></i> Amministratori</a></li>
          </ul>
        </li>';


        echo ('<li class="');
        if($pag=="printpwd")
          echo ('active');
        echo ('"><a href="/?p=printpwd"><i class="fa fa-table"></i> <span>Stampa password</span></a></li>');
      }
      ?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->


</aside>
