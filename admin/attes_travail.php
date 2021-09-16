<?php

require '../bdd.php';

use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');
if (isset($_GET['noti'])) {
    $id_noti=$_GET['noti'];}
if (isset($_GET['emp'])) {
    $id=$_GET['emp'];}



// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/attestation_du_travail.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);

// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(55, 127);
$date=date("Y-m-d");
$query = $pdo->query("SELECT * FROM `employé` WHERE idemp='$id'");
$resultat = $query->fetchAll();

         

foreach ($resultat as $key => $variable)
          {
$nom= $resultat[$key]['nom']."   ".$resultat[$key]['Prénom'];
$pdf->Write(0, $nom);
$pdf->SetXY(55,142);
$Date_de_Naissance= $resultat[$key]['Date_de_Naissance'];
$pdf->Write(0, $Date_de_Naissance);
/*$pdf->SetXY(55,150);
$lieu_de_naissance= $resultat[$key]['lieu_de_Naissance'];
$pdf->Write(0, $lieu_de_naissance);*/
$pdf->SetXY(55, 155);

$fonction=$resultat[$key]['fonction'];
$fonc = $pdo->query("SELECT * FROM fonction WHERE id_fonction='$fonction'  ");
$fonct = $fonc->fetch();
$f=$fonct['fonction'];
$pdf->Write(0, $f);
$pdf->SetXY(55, 169);
$DateEntré=$resultat[$key]['DateEntré'];
$pdf->Write(0, $DateEntré);
$pdf->SetXY(145, 221);
$pdf->Write(0, $date);
}

$pdf->Output();


?>





