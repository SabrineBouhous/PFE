<?php
require '../bdd.php';

use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');

$pdf = new Fpdi();
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/PV_d_envoi.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
$pdf->SetFont('Arial','',10);
   $pdf->SetMargins(3,0);
 

// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);

$date=date("Y-m-d");
 $pdf->SetXY(173,29);
$pdf->Cell(0,0,$date,0,1);
$dis=105;
$n=$_GET['N'];
//$resultat3 = $query3->fetch();
/*$nom=$resultat3['nom'];
$prenom=$resultat3['Prénom'];
 $pdf->SetXY(40,83);
$pdf->Cell(0,0,$resultat3['nom']." ".$resultat3['Prénom'],0,1);*/

/*$pdf->SetXY(40,91);
$pdf->Cell(0,0,$resultat3['service'],0,1);
 $name=$date;*/
 for ($i=1; $i <=$n ; $i++) { 
 
$cat="cat".$i;
$apr="apr".$i;
$nbr="nbr".$i;
 $pdf->SetXY(30,$dis);
 $pdf->MultiCell(72,8,$_GET[$cat], 0);
  $pdf->SetXY(115,$dis);
 $pdf->MultiCell(10,8,$_GET[$nbr], 0);
  $pdf->SetXY(136,$dis);
 $pdf->MultiCell(60,8,$_GET[$apr], 0);
$dis=$dis+15;
  }
   $filename=$date.".pdf";
   $dir ="../Document_employé/Bordereau/";
   $pdf->Output($dir.$filename,'F');
   $vide="";
  /* $type_notification="Renseignement";
   $Nom_document=$dir.$filename;
   $resquete=$pdo->prepare ('INSERT INTO notification_admin (idemp,nom,prenom,date_noti,Nom_document,type_notification)VALUES("'.$id.'","'.$nom.'","'.$prenom.'","'.$date.'","'.$Nom_document.'","'.$type_notification.'")');
$resquete->execute();*/