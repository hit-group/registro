<?php
session_start();
/*
  selezione di dati da una tabella con MySQLi
*/
// inclusione del file di connessione
require_once "include/session/db_credentials.php";
require "include/session/connessione.php";
require "include/session/onlyadmin.php";
require('fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('img/logoHitPilati.png',10,6,60);
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(40,10,'Registro Elettronico',0,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0,10,'HIT Group',0,0,'C');
    }
}




$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->SetFont('Times','',12);


// esecuzione della query per la selezione dei record
// query argomento del metodo query()
if (!$result = $connessione->query("SELECT id,nome,username,cognome,temp_pwd,email,ruolo FROM utenti WHERE password is null")) {
  echo "Errore della query: " . $connessione->error . ".";
  exit();
}else{
  // conteggio dei record
  if($result->num_rows > 0) {
    // conteggio dei record restituiti dalla query
    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
      $welcomeMess="\n\n\nGentile ";

      if($row["ruolo"]=="studente")
        $welcomeMess.="studente ";

      if($row["ruolo"]=="docente")
        $welcomeMess.="docente ";

      $welcomeMess.= $row['nome'] ." ".$row["cognome"].",\n";

      $pdf->AddPage();
      $pdf->Multicell(0,10,$welcomeMess.="ti comunichiamo che sei stato inserito nel sistema informativo dell'Istituto.\nPuoi accedere al registro elettronico al seguente indirizzo: http://192.168.1.5/",0,1);
      $pdf->Multicell(0,10,"\nLe tue credenziali di accesso sono le seguenti:",0,1);
      $pdf->Multicell(0,10,"Indirizzo e-mail:    ".$row['email']."\nUsername:            ".$row['username']."\nPassword:             ".$row['temp_pwd'],1,1);
      $pdf->Multicell(0,10,"\nPer motivi di sicurezza al primo accesso ti verra' richiesto di cambiare la password.",0,1);




      /*
		    $myfile = fopen("dati".$row['id'].".txt", "w") or die("Unable to open file!");
		      //echo $row['nome']." ".$row['cognome']." ".$row['temp_pwd']. "<br />";
          fwrite($myfile,
          "Gentile " . $row['nome'] ." ".$row["cognome"].", ti comunichiamo che sei stato inserito nel sistema informativo dell'Istituto.
Puoi accedere al registro elettronico al seguente indirizzo: http://192.168.1.5/

Le tue credenziali di accesso sono le seguenti:
Indirizzo e-mail:\t".$row['email']."
Username:\t\t\t".$row['username']."
Password:\t\t\t".$row['temp_pwd']."

Per motivi di sicurezza al primo accesso verrà richiesto di cambiare la password.");
		  fclose($myfile);
      */
    }

    // liberazione delle risorse occupate dal risultato
    $result->close();
  }
}


// chiusura della connessione
$connessione->close();

//Output del documento generato
$pdf->Output();


?>
