//Cambia il testo del modulo di login quando si inizia a compilarlo
old_pwd="";
old_usr="";
function controllainput(){
    var new_pwd=document.getElementById('password').value;
    var new_usr=document.getElementById('username').value;
    if(old_pwd!=new_pwd||old_usr!=new_usr){
      document.getElementById('frase').innerText="Effettua il login per accedere al registro elettronico";
      clearInterval(intervallo);
    }
    old_pwd=new_pwd;
    old_usr=new_usr;
}
function checkInterval(){
  intervallo = setInterval(controllainput,100);
}
