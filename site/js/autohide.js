//Chiude in automatico dopo 5 secondi l'avviso che notifica l'avvenuta creazione
//di un nuovo utente.

function eliminainfo(){
  document.getElementById('infobox').outerHTML="";
}

(function(){
setTimeout(eliminainfo, 5000)
})();
