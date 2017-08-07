function genera() {
  var sigla = document.getElementById("inputnome").value;

  sigla = sigla.toLowerCase();

  while(sigla.includes(" ")) {
    sigla = sigla.replace(" ", "");
  }
  
  sigla = sigla.substring(0, 5);

  document.getElementById("inputsigla").value = sigla;
}
