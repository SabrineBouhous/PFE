<?php

require '../bdd.php';

use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');

$datee=date("d-m-y");
if (isset($_GET['idemp'])) {
    $idemp=$_GET['idemp'];}
    
    $dd=$_GET['datesort']; 
    $ddd=$_GET['dateent']; 

$date =date('Y-m-d');
    $pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/PV_entrée.pdf');
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);

// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);
$query = $pdo->query("SELECT * FROM employé INNER JOIN fonction ON(employé.fonction=fonction.id_fonction) WHERE idemp='$idemp' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){
$nom= $resultat[$key]['nom']."   ". $resultat[$key]['Prénom'];
$pdf->SetXY(85, 102.5);
$pdf->Write(0, $nom);
$f= $resultat[$key]['fonction'];
$pdf->SetXY(85, 111);
$pdf->Write(0, $f);
//$d= $resultat[$key]['DateEntré'];
$pdf->SetXY(70, 128);
$pdf->Write(0,$dd);
$pdf->SetXY(150, 128);
$pdf->Write(0,$ddd);
$pdf->SetXY(130, 145);
$pdf->Write(0, $date);
}

$name= $idemp."-".$date;
//echo $name;


  $date_noti=date('Y-m-d H:m:s');

$admin= "Administrateur personnel";
$type_noti="PvEnt";
$resquete=$pdo->prepare (' INSERT INTO `notification_user` (`idemp`, `date_noti`,type_noti, `nom_document`,`de_la_part`)VALUES("'.$idemp.'","'.$date_noti.'","'.$type_noti.'","'.$type_noti.'","'.$admin.'")');
  $resquete->execute();

    $filename=$name.".pdf";
   $dir ="../Document_employé/Pv_entreé/";
   $pdf->Output($dir.$filename,'F');
  











