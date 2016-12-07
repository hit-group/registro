<?php
  echo "Lista utenti<br><br>";

  if($show=="all"){
    echo "tutti gli utenti";
  }elseif($show=="stu"){
    echo "studenti";
  }elseif($show=="doc"){
    echo "docenti";
  }elseif($show=="adm"){
    echo "amministratori";
    
  }
  include 'tests/usr_dump.php';
?>
