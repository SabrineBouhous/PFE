<?php

require '../bdd.php';

use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');
$datee=date("d-m-y");
if (isset($_GET['idemp'])) {
    $idemp=$_GET['idemp'];}
if (isset($_GET['dateabs'])) {
    $dateabs=$_GET['dateabs'];}
    if (isset($_GET['nb'])) {
    $nb=$_GET['nb'];}
    $pdf = new Fpdi();
      $date_noti=date("Y-m-d h:m:s ");
  $nom="avertisement";
  $le="le : ". $dateabs;

  $resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,Nom_document,date_noti,Raison,type_noti)VALUES("'.$idemp.'","'.$nom.'","'.$date_noti.'","'.$le.'","'.$nom.'")');
  $resquete->execute();
   
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/avertissement.pdf');
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);

// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);
$query = $pdo->query("SELECT * FROM employé WHERE idemp='$idemp' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){
$nom= $resultat[$key]['nom']." ". $resultat[$key]['Prénom'];
$pdf->SetXY(84, 94.7);
$pdf->Write(0, $nb);
$pdf->SetXY(137, 86.5);
$pdf->Write(0, $nom);
$pdf->SetXY(150, 112);
$pdf->Write(0, $dateabs);
}

$date =date('m-Y', strtotime($datee));
$name= $idemp."-".$date;
//echo $name;
$name.".pdf";

    $filename=$name.".pdf";
   $dir ="../Document_employé/avertissement/";
   $pdf->Output($dir.$filename,'F');
