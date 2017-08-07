<?php
if(isset($_GET["result"])){
  if($_GET["result"]=="ok"){
    echo '<div id="infobox" class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-check"></i> Fatto!</h4>
         Classe aggiunta correttamente.
       </div>';
  }elseif($_GET["result"]=="fail"){
    echo '<div id="infobox" class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-ban"></i> Errore!</h4>
         Impossibile aggiungere la classe.
       </div>';

  }
}

?>

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
      document.getElementById("divnascosto").outerHTML='<div id="divnascosto" class="form-group"><label>Classe</label><select name="classe" form="usrregform" class="form-control select2" style="width: 100%;"><option>3 AFM S</option><option>4 AFM S</option><option>5 AFM S</option><option>3 CAT S</option><option>4 CAT S</option><option>5 CAT S</option></select><p class="help-block">Necessaria solo se l utente registrato è uno studente</p></div>';
    }else{
      //Nasconde il selettore della classe
      document.getElementById("divnascosto").outerHTML='<div id="divnascosto"><div>';
    }

  }
  </script>

<script src="js/autosigla.js"></script>

  <form id="usrregform" role="form" action="/include/forms/addclass.php" method="post">
    <div class="box-body">

      <div class="form-group">
        <label for="inputnome">Nome</label>
        <input name="nome" type="text" class="form-control" id="inputnome" placeholder="Nome" onkeyup="genera();" onchange="genera();" required>
      </div>

      <div class="form-group">
        <label for="inputsigla">Sigla</label>
        <input name="sigla" type="text" class="form-control" id="inputsigla" placeholder="Sigla" required>
      </div>

      <div class="form-group">
        <label for="inputanno">Anno</label>
        <input name="anno" type="text" class="form-control" id="inputanno" placeholder="Anno" value="<?php echo date("Y") ?>" required>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Aggiungi</button>
    </div>
  </form>
</div>
