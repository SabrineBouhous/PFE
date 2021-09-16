<?php

require '../bdd.php';

use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');
if (isset($_GET['idemp'])) {
    $idemp=$_GET['idemp'];}
    $pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/fiche_info_emp.pdf');
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);

// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);
$query = $pdo->query("SELECT * FROM `employé` WHERE idemp='$idemp'");
$resultat = $query->fetchAll();

         

foreach ($resultat as $key => $variable)
          {
$nom= $resultat[$key]['nom'];
$pdf->SetXY(70, 92);
$pdf->Write(0, $nom);
$prénom= $resultat[$key]['Prénom'];
$pdf->SetXY(70, 100);
$pdf->Write(0, $prénom);
$a= $resultat[$key]['Date_de_Naissance']."   ".$resultat[$key]['lieu_de_Naissance'];
$pdf->SetXY(90, 108);
$pdf->Write(0, $a);
$ad= $resultat[$key]['Adresse'];
$pdf->SetXY(70, 116);
$pdf->Write(0, $ad);
$num= $resultat[$key]['Numero_Tel'];
$pdf->SetXY(90, 125);
$pdf->Write(0, $num);
$mail= $resultat[$key]['email'];
$pdf->SetXY(90, 133.5);
$pdf->Write(0, $mail);
$N= $resultat[$key]['N°CCP'];
$pdf->SetXY(90, 140.5);
$pdf->Write(0, $N);
$g=$resultat[$key]['Grade'];
$Grade = $pdo->query("SELECT * FROM grade where id_grade='$g'");
$Grade = $Grade->fetch();
$gr=$Grade['grade'];
$pdf->SetXY(90, 149);
$pdf->Write(0, $gr);
$function= $resultat[$key]['fonction'];
$G = $pdo->query("SELECT * FROM fonction where id_fonction='$function'");
$fu = $G ->fetch();
$fun=$fu['fonction'];
$pdf->SetXY(90, 157.5);
$pdf->Write(0, $fun);
$DateEntré= $resultat[$key]['DateEntré'];
$pdf->SetXY(90, 165.5);
$pdf->Write(0, $DateEntré);
}
$pdf->Output();