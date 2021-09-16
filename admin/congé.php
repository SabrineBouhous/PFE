<?php
require '../bdd.php';
use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');
if (isset($_GET['noti'])) {
    $id_noti=$_GET['noti'];}
if (isset($_GET['emp'])) {
    $id_emp=$_GET['emp'];}

// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/congé.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);	
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);

// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(60, 119);
// extraire de la table congé
$date=date("Y/m/d");
$query = $pdo->query("SELECT * FROM `employé` WHERE idemp='$id_emp'");
$resultat = $query->fetchAll();

         

foreach ($resultat as $key => $variable)
          {
$nom= $resultat[$key]['nom']." ".$resultat[$key]['Prénom'];

$grade=$resultat[$key]['Grade'];
$pdf->Write(0, $nom);
$pdf->SetXY(60, 129);
$pdf->Write(0, $grade);
$pdf->SetXY(95, 139);
		  }
$query2 = $pdo->query("SELECT * FROM `notification_admin` WHERE id='$id_noti'");
$resultat2 = $query2->fetchAll();

foreach ($resultat2 as $key => $variable){
$de=$resultat2[$key]['de'];

$jusqua=$resultat2[$key]['jusqua'];
$pdf->Write(0, $de);
$pdf->SetXY(164, 139);
$pdf->Write(0, $jusqua);
$pdf->SetXY(157, 160);
$pdf->Write(0, $date);

}

$pdf->Output();


?>