<html>
  <head></head>

  <body>
    <form id="adduserform" method="post" action="new_usr_check.php">
      Nome: <input name="nome" type="text"></input><br>
      Cognome: <input name="cognome" type="text"></input><br>
      Password: <input name="password" type="text"></input><br>
      Email: <input name="email" type="email"></input><br>

      <input type="submit"></input><br>
    </form>

    Scuola:
    <select name="scuola" form="adduserform">
      <option value="ITET C.A. Pilati">ITET C.A. Pilati</option>
    </select><br><br>

    Ruolo:
    <select name="ruolo" form="adduserform">
      <option value="studente">Studente</option>
      <option value="docente">Docente</option>
      <option value="amministratore">Amministratore</option>
    </select>
    <br><br>

    Classe:
    <select name="classe" form="adduserform">
      <option value="3afms">3 AFM S</option>
      <option value="4afms">4 AFM S</option>
      <option value="5afms">5 AFM S</option>
      <option value="3cats">3 CAT S</option>
      <option value="4cats">4 CAT S</option>
      <option value="5cats">5 CAT S</option>
    </select>

  </body>


</html>
