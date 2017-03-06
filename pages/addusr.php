<script src="js/mailgen.js"></script>
<!-- Precompila il campo indirizzo email per gli utenti che vengono registrati -->

<script src="js/autohide.js"></script>
<!-- Chiude automaticamente la notifica "utente creato" -->

<?php
  if(isset($_SESSION["msg_succ"])&&$_SESSION["msg_succ"]==true){
    $_SESSION["msg_succ"]=false;
    echo '<div id="infobox" class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Fatto!</h4>
            Utente registrato correttamente.
          </div>';
  }
?>

<!-- general form elements -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Registra un utente</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->

  <script>
  function fnSelect() {
    //mailGen();
    if(document.getElementById("roleselect").value=="Studente"){
      //Mostra il selettore della classe
      document.getElementById("divnascosto").outerHTML='<div id="divnascosto" class="form-group"><label>Classe</label><select id="inputclasse" name="classe" form="usrregform" class="form-control select2" style="width: 100%;" onchange="mailGen();"><option>3 AFM S</option><option>4 AFM S</option><option>5 AFM S</option><option>3 CAT S</option><option>4 CAT S</option><option>5 CAT S</option></select><p class="help-block">Necessaria solo se l utente registrato è uno studente</p></div>';
    }else{
      //Nasconde il selettore della classe
      document.getElementById("divnascosto").outerHTML='<div id="divnascosto"><div>';
    }

  }
  </script>


  <form id="usrregform" role="form" action="/include/forms/post_register.php" method="post">
    <div class="box-body">
      <div class="form-group">
        <label>Ruolo</label>
        <select id="roleselect"  name="ruolo" form="usrregform" class="form-control select2" style="width: 100%;" onchange="fnSelect();mailGen();">
          <option>Studente</option>
          <option>Docente</option>
          <option>Amministratore</option>
        </select>
      </div>
      <!-- /.form-group -->

      <div class="form-group">
        <label for="inputnome">Nome</label>
        <input onkeyup="mailGen()" name="nome" type="text" class="form-control" id="inputnome" placeholder="Nome" required>
      </div>
      <div class="form-group">
        <label for="inputcognome">Cognome</label>
        <input onkeyup="mailGen()" name="cognome" type="text" class="form-control" id="inputcognome" placeholder="Cognome" required>
      </div>

      <div id="divnascosto" class="form-group">
        <label>Classe</label>
        <select id="inputclasse" name="classe" form="usrregform" class="form-control select2" style="width: 100%;" onchange="mailGen();">
          <option>3 AFM S</option>
          <option>4 AFM S</option>
          <option>5 AFM S</option>
          <option>3 CAT S</option>
          <option>4 CAT S</option>
          <option>5 CAT S</option>
        </select>
        <p class="help-block">Necessaria solo se l'utente registrato è uno studente</p>
      </div>
      <!-- /.form-group -->

      <div class="form-group">
        <label for="exampleInputEmail1">Indirizzo email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Indirizzo email">
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Registra</button>
    </div>
  </form>
</div>
<!-- /.box -->
