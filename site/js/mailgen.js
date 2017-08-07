//Si occupa di generare un indirizzo email più possibile simile a quello reale
//in fase di registrazione degli utenti. La funzione mailGen() viene chiamata
//dall'evento onkeyup sugli input nome e cognome e dopo fnSelect() che a sua volta
//viene chiamata da onchange sul select che permette di scegliere il ruolo
//dell'utente.

function mailGen(){
  
  
  document.getElementById("exampleInputEmail1").value="";

  var in_nome=document.getElementById("inputnome").value;
  var in_cognome=document.getElementById("inputcognome").value;
  var in_classe="";
  if(document.getElementById("roleselect").value=="Studente"){
	  
      in_classe=document.getElementById("inputclasse").value;
  }
	
  
  if(in_nome==""||in_cognome=="")
    return;
  var value="";

  in_nome=in_nome.replace(/\s+/g, '');
  in_cognome=in_cognome.replace(/\s+/g, '');
  if(document.getElementById("roleselect").value=="Studente"){
        in_classe=in_classe.replace(/\s+/g, '');
  }



  in_nome=in_nome.toLowerCase();
  in_cognome=in_cognome.toLowerCase();
  if(document.getElementById("roleselect").value=="Studente"){
        in_classe=in_classe.toLowerCase();
  }

  if(document.getElementById("roleselect").value=="Studente"){
    value=value+in_classe+"-";
  }

  value=value+in_nome+"."+in_cognome+"@istitutopilati.it";


  document.getElementById("exampleInputEmail1").value=value;
}
