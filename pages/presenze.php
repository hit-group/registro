<?php
	//Pagina di scelta della classe da eliminare


	require($_SERVER['DOCUMENT_ROOT']."/include/session/onlydoc.php"); //Consente l'accesso solo ai docenti
	require($_SERVER['DOCUMENT_ROOT']."/include/session/db_credentials.php"); //Consente l'accesso solo all'amministratore
	require($_SERVER['DOCUMENT_ROOT']."/include/session/connessione.php"); //Connette al database


	$result = $connessione->query("SELECT * FROM classi");





			echo '
	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title">Scegli una classe</h3>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->


	  <form id="usrregform" role="form" method="get" action="/">
	    <div class="box-body">
	      <div class="form-group">
	        <label>Seleziona la classe per la quale inserire le presenze</label>
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
					<input id="p" type="hidden" value="presenze2" name="p">
	      </div>


	    </div>
	    <!-- /.box-body -->

	    <div class="box-footer">
	      <button type="submit" class="btn btn-primary">Vai</button>
	    </div>
	  </form>
	</div>
	';


?>
