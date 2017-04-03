<?php
	//Pagina di scelta degli utenti


	require($_SERVER['DOCUMENT_ROOT']."/include/session/onlydoc.php"); //Consente l'accesso solo ai docenti
	require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Consente l'accesso solo all'amministratore
	require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database

	$classe = $_GET["classe"];
	$classe = mysqli_real_escape_string($connessione, $classe);
	$sql = "SELECT nome FROM classi WHERE id = $classe";
	$result = $connessione->query($sql);

	if ($result->num_rows > 0) {
			 // output data of first row
			 $row = $result->fetch_assoc();
			 $nomecl = $row['nome'];
	}
	$connessione->close();

	require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database

	  $sql = "SELECT u.nome,u.cognome,u.classe,c.id,c.nome as nomeClasse,u.username,u.email,u.ruolo FROM utenti as u, classi as c WHERE u.classe = c.id AND ruolo='studente' AND u.classe = $classe";
	  $result = $connessione->query($sql);



	    echo '<div class="box box-primary">
								<form id="formpresenze" action="/include/forms/rxpresenze.php" method="post">
									

	                  <div class="box-header">
	                    <h3 class="box-title">Classe ';
											echo $nomecl;
											echo '</h3>';
											echo '</div>
	                  <!-- /.box-header -->

	                  <div class="box-body table-responsive no-padding">
	                    <table id="example1us" class="table table-bordered table-striped">
	                      <thead>
	                      <tr>
													<th>#</th>
	                        <th>Nome</th>
	                        <th>Cognome</th>
													<th>Presente</th>

	                      </tr>
	                      </thead>
	                      <tbody>
	                      ';
	    if ($result->num_rows > 0) {
	         // output data of each row
					 $i = -1;
	         while($row = $result->fetch_assoc()) {
						 $i = $i + 1;
				 $user= $row["username"];
	           echo "<tr>";
						 echo "<td>". ($i + 1) . "</td>
	           				<td>". $row["nome"]. "</td>
	                 <td>". $row["cognome"]. "</td>
									 <td><select form='formpresenze' name='stud" . $i ; echo "'>
  <option style='color: green;' value='presente' selected='selected'>Presente</option>
  <option style='color: red;' value='assente'>Assente</option></select></td>
									 ";


	           echo "</tr>";
	         }
	    } else {
	         //echo "0 risultati";
	    }
	    echo '</tbody>
	        <tfoot>
	        <tr>
						<th>#</th>
	          <th>Nome</th>
	          <th>Cognome</th>
						<th>Presente</th>


	        </tr>
	        </tfoot>
	      </table>
	    </div>
	    <!-- /.box-body -->

			<div class="box-footer">
	      <button type="submit" class="btn btn-primary">Salva</button>
	    </div>
			</form>

	    </div>

	    <!-- /.box -->
	    ';

$connessione->close();
?>
