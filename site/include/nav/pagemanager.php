<?php
//Si occupa di ottenere tutti i parametri GET richiesti dalle pagine, renderli sicuri e metterli in variabili normali.

  if(isset($_GET["p"]))
    $pag=htmlspecialchars($_GET["p"]);
  else
    $pag="index";

  if(isset($_GET["show"]))
    $show=htmlspecialchars($_GET["show"]);
  else
    $show="stu";

?>
