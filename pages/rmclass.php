<?php

	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/include/session/onlyadmin.php"); //Consente l'accesso solo ai docenti
	require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Consente l'accesso solo all'amministratore
	require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database


	$result = $connessione->query("SELECT * FROM classi");

	if(isset($_GET["result"])){
		if($_GET["result"]=="ok"){
			echo '<div id="infobox" class="alert alert-success alert-dismissible">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <h4><i class="icon fa fa-check"></i> Fatto!</h4>
					 Classe eliminata correttamente.
				 </div>';
		}elseif($_GET["result"]=="fail"){
			echo '<div id="infobox" class="alert alert-danger alert-dismissible">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <h4><i class="icon fa fa-ban"></i> Errore!</h4>
					 Impossibile eliminare una classe con degli utenti all\'interno.
				 </div>';

		}
	}





			echo '
	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title">Elimina una classe</h3>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->


	  <form id="usrregform" role="form" method="post" action="/include/forms/rmclass.php">
	    <div class="box-body">
	      <div class="form-group">
	        <label>Classe da eliminare</label>
	        <select id="roleselect"  name="classe" form="usrregform" class="form-control select2" style="width: 100%;">
						<option value="" disabled selected>Scegli una classe</option>
	          ';

							if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {

										$annoB = intval($row["anno"]); //2017
										$annoA = $annoB-1; 						 //2016
										echo '<option value='.$row["id"].'>'.$row["nome"].' '.$annoA.'-'.$annoB.'</option>';
									}
							 } else {

							 }


	        echo '</select>
	      </div>


	    </div>
	    <!-- /.box-body -->

	    <div class="box-footer">
	      <button type="submit" class="btn btn-danger">Elimina</button>
	    </div>
	  </form>
	</div>
	';


?>
