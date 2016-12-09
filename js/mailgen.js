//Si occupa di generare un indirizzo email più possibile simile a quello reale
//in fase di registrazione degli utenti. La funzione mailGen() viene chiamata
//dall'evento onkeyup sugli input nome e cognome e da fnSelect() che a sua volta
//viene chiamata da onchange sul select che permette di scegliere il ruolo
//dell'utente.

function mailGen(){
  //alert("Mailgen");
  var in_nome=document.getElementById("inputnome").value;
  var in_cognome=document.getElementById("inputcognome").value;
  if(in_nome==""||in_cognome=="")
    return;
  var value="";
  if(document.getElementById("roleselect").value=="Studente")
    value=value+"s-";
  value=value+in_nome+"."+in_cognome+"@istitutopilati.it";
  document.getElementById("exampleInputEmail1").value=value;
}
