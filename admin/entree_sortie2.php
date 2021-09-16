<?php
require '../bdd.php';

use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');

$pdf = new Fpdi();
// add a page
 $query1 = $pdo->query("SELECT * FROM statu_employé ");
$resultat1 = $query1->fetchAll();
foreach ($resultat1 as $key => $variable){
$id_statu = $resultat1[$key]['id_statu'];
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/entree_sortie.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
$pdf->SetFont('Arial','',10);
   $pdf->SetMargins(3,0);
 

// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);

$date=date("Y-m-d");
$query3 = $pdo->query("SELECT * FROM para_general WHERE id=1 ");
$resultat3 = $query3->fetch();
$annee_uni=explode('-',$resultat3['date_debut']);
$annee_universitaire=$annee_uni[0];
$ann=$annee_uni[0]+1;
$anee_universitaire=$annee_universitaire."/".$ann;
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(126,90);
$pdf->Cell(0,0,$anee_universitaire,0,1);
 $pdf->SetXY(111,100);
 $pdf->Cell(0,0,'Statu :',0,0);
 $pdf->SetXY(126,100);
 $pdf->Cell(0,0,$resultat1[$key]['statu'],0,1);
 $pdf->Cell(0,5,'',0,1);
 $pdf->SetFont('Arial','B',10);
$pdf->Cell(8,10,'#',1,0,'C');

$pdf->Cell(50,10,'Nom  Prenom',1,0,'C');
$pdf->Cell(23,10,'Signature',1,0,'C');
$pdf->Cell(30,10,'Date entree',1,0,'C');
$pdf->Cell(23,10,'Signature',1,0,'C');
$pdf->Cell(30,10,'Date sortie',1,0,'C');
$pdf->Cell(40,10,'APRECIATION',1,1,'C');
$nbr=0;

$Emploi="Professeur";
 $query = $pdo->query("SELECT * FROM employé INNER JOIN entrée_sortie ON(employé.idemp=entrée_sortie.idemp) WHERE employé.Statut='$id_statu' AND employé.Emploi!='$Emploi' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){
 
$nbr++;


$ap="";

 $pdf->Cell(8,10,$nbr,1,0);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,$resultat[$key]['nom']." ".$resultat[$key]['Prénom'],1,0,'C');
$pdf->Cell(23,10,$resultat[$key]['entrée'],1,0,'C');
$pdf->Cell(30,10,$resultat[$key]['date_entree'],1,0,'C');
$pdf->Cell(23,10,$ap,1,0,'C');
$pdf->Cell(30,10,$resultat[$key]['date_sortie'],1,0,'C');
$pdf->Cell(40,10,$ap,1,1,'C');

	}
}

//Professeur

$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/entree_sortie.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
$pdf->SetFont('Arial','',10);
   $pdf->SetMargins(3,0);
   // use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);


$date=date("Y-m-d");
$query3 = $pdo->query("SELECT * FROM para_general WHERE id=1 ");
$resultat3 = $query3->fetch();
$annee_uni=explode('-',$resultat3['date_debut']);
$annee_universitaire=$annee_uni[0];
$ann=$annee_uni[0]+1;
$anee_universitaire=$annee_universitaire."/".$ann;
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(126,90);
$pdf->Cell(0,0,$anee_universitaire,0,1);
 $pdf->SetXY(111,100);
 $pdf->Cell(0,0,'Emploi :',0,0);
 $pdf->SetXY(129,100);
 $pdf->Cell(0,0,'Professeur',0,1);
 $pdf->Cell(0,5,'',0,1);
 $pdf->SetFont('Arial','B',10);
$pdf->Cell(8,10,'#',1,0,'C');

$pdf->Cell(50,10,'Nom  Prenom',1,0,'C');
$pdf->Cell(23,10,'Signature',1,0,'C');
$pdf->Cell(30,10,'Date entree',1,0,'C');
$pdf->Cell(23,10,'Signature',1,0,'C');
$pdf->Cell(30,10,'Date sortie',1,0,'C');
$pdf->Cell(40,10,'APRECIATION',1,1,'C');
$nbr=0;
 
 	 $prof = $pdo->query("SELECT * FROM employé INNER JOIN entrée_sortie ON(employé.idemp=entrée_sortie.idemp)  AND employé.Emploi ='$Emploi' ");
$Professeur = $prof->fetchAll();
foreach ($Professeur as $key => $variable){
$nbr++;


$ap="";

 $pdf->Cell(8,10,$nbr,1,0);
 $pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,$resultat[$key]['nom']." ".$resultat[$key]['Prénom'],1,0,'C');
$pdf->Cell(23,10,$resultat[$key]['entrée'],1,0,'C');
$pdf->Cell(30,10,$resultat[$key]['date_entree'],1,0,'C');
$pdf->Cell(23,10,$ap,1,0,'C');
$pdf->Cell(30,10,$resultat[$key]['date_sortie'],1,0,'C');
$pdf->Cell(40,10,$ap,1,1,'C');

	}

$name=$annee_universitaire."-".$ann;
   $filename=$name.".pdf";
   $dir ="../Document_employé/entree_sortie/";
   $pdf->Output($dir.$filename,'F');