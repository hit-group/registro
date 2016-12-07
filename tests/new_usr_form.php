<html>
  <head></head>

  <body>
    <form id="adduserform" method="post" action="new_usr_check.php">
      Nome: <input name="nome" type="text"></input><br>
      Cognome: <input name="cognome" type="text"></input><br>
      Password: <input name="password" type="text"></input><br>
      Email: <input name="email" type="email"></input><br>
      Scuola: <input name="scuola" type="text" value="ITET C.A. Pilati"></input><br>
      Classe: <input name="classe" type="text"></input><br>
      <input type="submit"></input><br>
    </form>

    Ruolo:
    <select name="ruolo" form="adduserform">
      <option value="studente">Studente</option>
      <option value="docente">Docente</option>
      <option value="amministratore">Amministratore</option>
    </select>

  </body>


</html>
