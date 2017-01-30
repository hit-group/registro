<?php
  //require_once($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php");
  require $_SERVER['DOCUMENT_ROOT']."/include/session/onlyadmin.php";
  include $_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php";

  echo "Lista utenti<br><br>";

  if($show=="all"){
    // Create connection

    $sql = "SELECT u.nome,u.cognome,u.classe,c.id,c.nome as nomeClasse,u.username,u.email,u.ruolo FROM utenti as u, classi as c WHERE u.classe = c.id";
    $result = $connessione->query($sql);

    echo '						<div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Utenti registrati</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Classe</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Ruolo</th>
                      </tr>
                      </thead>
                      <tbody>
                      ';
    if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
           $user= $row["username"];
           $id=$row["ID"];
           echo '<tr id="usr';
           echo "$id";
           echo '">';

           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>
                 <td>". $row["nomeClasse"]. "</td>
                 <td><a href='/?p=usrinfouser=$user'>". $user . "</a></td>
                 <td>". $row["email"] ."</td>
                 <td>". $row["ruolo"] ."</td>";
           echo "</tr>";
         }
    } else {
         //echo "0 risultati";
    }
    echo '</tbody>
        <tfoot>
        <tr>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Classe</th>
          <th>Username</th>
          <th>Email</th>
          <th>Ruolo</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    ';




  }elseif($show=="stu"){



    $sql = "SELECT u.nome,u.cognome,u.classe,c.id,c.nome as nomeClasse,u.username,u.email,u.ruolo FROM utenti as u, classi as c WHERE u.classe = c.id AND ruolo='studente'";
    $result = $connessione->query($sql);

    echo '						<div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Utenti registrati</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Classe</th>
                        <th>Username</th>
                        <th>Email</th>

                      </tr>
                      </thead>
                      <tbody>
                      ';
    if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
			 $user= $row["username"];
           echo "<tr>";
           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>
                 <td>". $row["nomeClasse"]. "</td>
                 <td><a href='/?p=usrinfo&user=$user'>". $user . "</a></td>
                 <td>". $row["email"] ."</td>";

           echo "</tr>";
         }
    } else {
         //echo "0 risultati";
    }
    echo '</tbody>
        <tfoot>
        <tr>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Classe</th>
          <th>Username</th>
          <th>Email</th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    ';



  }elseif($show=="doc"){


    $sql = "SELECT * FROM utenti WHERE ruolo='docente'";
    $result = $connessione->query($sql);

    echo '						<div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Utenti registrati</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Cognome</th>

                        <th>Username</th>
                        <th>Email</th>

                      </tr>
                      </thead>
                      <tbody>
                      ';
    if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
		   $user= $row["username"];
           echo "<tr>";
           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>

                 <td><a href='/?p=usrinfo&user=$user'>". $user . "</a></td>
                 <td>". $row["email"] ."</td>";

           echo "</tr>";
         }
    } else {
         //echo "0 risultati";
    }
    echo '</tbody>
        <tfoot>
        <tr>
          <th>Nome</th>
          <th>Cognome</th>

          <th>Username</th>
          <th>Email</th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    ';


  }elseif($show=="adm"){

    $sql = "SELECT * FROM utenti WHERE ruolo='amministratore'";
    $result = $connessione->query($sql);

    echo '						<div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Utenti registrati</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Cognome</th>

                        <th>Username</th>
                        <th>Email</th>

                      </tr>
                      </thead>
                      <tbody>
                      ';
    if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
			 $user= $row["username"];
           echo "<tr>";
           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>

				 <td><a href='/?p=usrinfo&user=$user'>". $user . "</a></td>
                 <td>". $row["email"] ."</td>";
           echo "</tr>";
         }
    } else {
         //echo "0 risultati";
    }
    echo '</tbody>
        <tfoot>
        <tr>
          <th>Nome</th>
          <th>Cognome</th>

          <th>Username</th>
          <th>Email</th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    ';



  }

  $connessione->close();

?>
