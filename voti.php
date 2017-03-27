<!DOCTYPE html>
<html>
  <head>
    <title>Inserimento voti</title>
  <head>

  <body>
    <div class="form-group">
      <label>Classe</label>
      <select class="form-control select2" style="width: 100%;">
        <option>3 AFM S</option>
        <option>4 AFM S</option>
        <option>5 AFM S</option>
        <option>3 CAT S</option>
        <option>4 CAT S</option>
        <option>5 CAT S</option>
      </select>


      <div class="form-group">
        <label>Voto</label>
        <select class="form-control select2" style="width: 100%;">
          <option>10</option>
          <option>9.5</option>
          <option>9</option>
          <option>8.5</option>
          <option>8</option>
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
          <select class="form-control select2" style="width: 100%;">
            <option>Prova scritta</option>
            <option>Prova pratica</option>
            <option>Prova orale</option>
    </div>

    <input type="submit" value="INVIA">

    <?php

      $con=new mysqli("localhost","root","","registro_db");

      if(!$con){

          echo "Connessione al database fallita";

      }

      $result = $con-> query("SELECT cognome from utenti");

      //query("SELECT u.nome,u.cognome,u.classe,c.id,c.nome as nomeClasse,u.username,u.email,u.ruolo FROM utenti as u, classi as c WHERE u.classe = c.id");
      if($result->num_rows>0){

        while($array = $result-> fetch_array(MYSQLI_ASSOC)){

              echo "".$array['cognome']."<br>";




        }
    }



    $result = $con-> query("SELECT classe from utenti");

    //query("SELECT u.nome,u.cognome,u.classe,c.id,c.nome as nomeClasse,u.username,u.email,u.ruolo FROM utenti as u, classi as c WHERE u.classe = c.id");
    if($result->num_rows>0){

      while($array = $result-> fetch_array(MYSQLI_ASSOC)){

            echo "".$array['classe']."<br>";




      }
  }





    ?>

  </body>
</html>
