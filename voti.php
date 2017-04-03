<!DOCTYPE html>
<html>
  <head>
    <title>Inserimento voti</title>
  <head>

  <body>
    <div class="form-group">
      <label>VOTI</label>
      <?php

        $con=new mysqli("localhost","root","","registro_db");

        $result = $con->query("SELECT * FROM classi");

        if(!$con){

            echo "Connessione al database fallita";

        }




      echo '
	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title">Inserimento voti</h3>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->


	  <form id="usrregform" role="form" method="post" action="/include/forms/rmclass.php">
	    <div class="box-body">
	      <div class="form-group">
	        <label>Classe</label>
	        <select id="roleselect"  name="classe" form="usrregform" class="form-control select2" style="width: 20%;">
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
	    </div>
	  </form>
	</div>
	';?>


      <div class="form-group">
        <label>Voto</label>
        <select class="form-control select2" style="width: 5%;">
          <option value="" disabled selected>Seleziona il voto</option>
          <option>10</option>
          <option>9.5</option>
          <option>9</option>
          <option>7.5</option>
          <option>7</option>
          <option>6.5</option>
          <option>6</option>
          <option>5.5</option>
          <option>5</option>
          <option>4.5</option>
          <option>4</option>
        </select>

        <div class="form-group">
          <label>Tipo prova</label>
          <select class="form-control select2" style="width: 10%;">
            <option value="" disabled selected>Seleziona il tipo di prova</option>
            <option>Prova scritta</option>
            <option>Prova pratica</option>
            <option>Prova orale</option>
    </div>

    <input type="submit" value="INVIA">
    <?php


      $result = $con-> query("SELECT cognome from utenti");

      //query("SELECT u.nome,u.cognome,u.classe,c.id,c.nome as nomeClasse,u.username,u.email,u.ruolo FROM utenti as u, classi as c WHERE u.classe = c.id");
      if($result->num_rows>0){

        while($array = $result-> fetch_array(MYSQLI_ASSOC)){

              echo "".$array['cognome']."<br>";

        }
    }

    ?>
  </body>
</html>
