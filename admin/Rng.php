<?php
require '../bdd.php';

use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');
$id=$_GET['emp'];
$repense=$_GET['rep'];
$nature=$_GET['natu'];
$pdf = new Fpdi();
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/Rnsg.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
$pdf->SetFont('Arial','',10);
   $pdf->SetMargins(3,0);
 

// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);

$date=date("Y-m-d");
 $pdf->SetXY(155,37);
$pdf->Cell(0,0,$date,0,1);
$query3 = $pdo->query("SELECT * FROM employé WHERE idemp='$id' ");

$resultat3 = $query3->fetch();
$nom=$resultat3['nom'];
$prenom=$resultat3['Prénom'];
 $pdf->SetXY(40,83);
$pdf->Cell(0,0,$resultat3['nom']." ".$resultat3['Prénom'],0,1);

$pdf->SetXY(40,91);
$pdf->Cell(0,0,$resultat3['service'],0,1);
 $name=$id."-".$date;
 $pdf->SetXY(27,115);
 $pdf->MultiCell(100,8,$nature, 0);
  $pdf->SetXY(77,115);
 $pdf->MultiCell(120,8,$repense, 0);
   $filename=$name.".pdf";
   $dir ="../Rnsg/";
   $pdf->Output($dir.$filename,'F');
   $vide="";
   $type_notification="Renseignement";
   $Nom_document=$dir.$filename;
   $resquete=$pdo->prepare ('INSERT INTO notification_admin (idemp,nom,prenom,date_noti,Nom_document,type_notification)VALUES("'.$id.'","'.$nom.'","'.$prenom.'","'.$date.'","'.$Nom_document.'","'.$type_notification.'")');
$resquete->execute();