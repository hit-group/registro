<?php
  echo "Lista utenti<br><br>";

  if($show=="all"){
    // Create connection
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT u.nome,u.cognome,u.classe,c.id,c.nome as nomeClasse,u.username,u.email,u.ruolo FROM utenti as u, classi as c WHERE u.classe = c.id";
    $result = $conn->query($sql);

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
           $id=$row["ID"];
           echo '<tr id="usr';
           echo "$id";
           echo '">';

           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>
                 <td>". $row["nomeClasse"]. "</td>
                 <td>". $row["username"] . "</td>
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



    $conn->close();

  }elseif($show=="stu"){

    // Create connection
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM utenti WHERE ruolo='studente'";
    $result = $conn->query($sql);

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
           echo "<tr>";
           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>
                 <td>". $row["classe"]. "</td>
                 <td>". $row["username"] . "</td>
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

    $conn->close();

  }elseif($show=="doc"){
    // Create connection
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM utenti WHERE ruolo='docente'";
    $result = $conn->query($sql);

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
           echo "<tr>";
           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>

                 <td>". $row["username"] . "</td>
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

    $conn->close();

  }elseif($show=="adm"){
    // Create connection
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM utenti WHERE ruolo='amministratore'";
    $result = $conn->query($sql);

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
           echo "<tr>";
           echo "<td>". $row["nome"]. "</td>
                 <td>". $row["cognome"]. "</td>

                 <td>". $row["username"] . "</td>
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

    $conn->close();


  }


?>
