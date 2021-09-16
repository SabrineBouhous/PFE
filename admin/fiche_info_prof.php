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
$pdf->setSourceFile('fichier/fiche_info_prof.pdf');
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);

// now write some text above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);
$query = $pdo->query("SELECT * FROM employé INNER JOIN statu_employé ON(employé.Statut= statu_employé.id_statu) WHERE idemp='$idemp' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){
	$s=$resultat[$key]['statu'];
	if ($s=='permanent') {
		$rep="oui";
		$pdf->SetXY(82 , 86);
        $pdf->Write(0, $rep);
	}
if ($s=='vacataire') {
		$rep="oui";
		$pdf->SetXY(127 , 86);
        $pdf->Write(0, $rep);
	}
	if ($s=='participant') {
		$rep="oui";
		$pdf->SetXY(174 , 86);
        $pdf->Write(0, $rep);
	}

$nom= $resultat[$key]['nom']."   ". $resultat[$key]['Prénom']."   ".$resultat[$key]['statu'];
$pdf->SetXY(70, 95);
$pdf->Write(0, $nom);
$a= $resultat[$key]['Date_de_Naissance']."   ".$resultat[$key]['lieu_de_Naissance'];
$pdf->SetXY(90, 103);
$pdf->Write(0, $a);
$ad= $resultat[$key]['Adresse'];
$pdf->SetXY(70, 111);
$pdf->Write(0, $ad);
$num= $resultat[$key]['Numero_Tel'];
$pdf->SetXY(90, 120);
$pdf->Write(0, $num);
$mail= $resultat[$key]['email'];
$pdf->SetXY(138.5, 119.5);
$pdf->Write(0, $mail);
$Situation_Familiale= $resultat[$key]['Situation_Familiale'];
$pdf->SetXY(90, 128);
$pdf->Write(0, $Situation_Familiale);
$Nombre_denfant= $resultat[$key]['Nombre_denfant'];
$pdf->SetXY(170, 128);
$pdf->Write(0, $Nombre_denfant);
$d= $resultat[$key]['Diplome'];
$pdf->SetXY(90, 135.5);
$pdf->Write(0, $d);
$g=$resultat[$key]['Grade'];
$Grade = $pdo->query("SELECT * FROM grade where id_grade='$g'");
$Grade = $Grade->fetch();
$gr=$Grade['grade'];
$pdf->SetXY(150, 135.5);
$pdf->Write(0, $gr);
$fl = $pdo->query("SELECT * FROM planning INNER JOIN param_filière ON( planning.filière= param_filière.id_filière ) where idemp='$idemp' ");
$fll = $fl->fetchAll();
foreach ($fll as $key => $variable){
$fili=$fll[$key]['Filière'].".";
$pdf->SetXY(50, 177.5);
$pdf->Write(0, $fili);
}
$pl = $pdo->query("SELECT * FROM planning INNER JOIN module ON(planning.module= module.id_module )where idemp='$idemp' ");
$pl = $pl->fetchAll();
foreach ($pl as $key => $variable){
$fun=$pl[$key]['Module'].".";
$pdf->SetXY(90, 160.5);
$pdf->Write(0, $fun);
	$rep="";
$pdf->SetXY(140, 177.5);
$pdf->Write(0, $rep);
	$rep="";
$pdf->SetXY(184, 177.5);
$pdf->Write(0, $rep);
}
$en = $pdo->query("SELECT * FROM more_enseignant where idemp='$idemp' ");
$ens = $en->fetchAll();
foreach ($ens as $key => $value) {
$ddd= $ens[$key]['date_obtention_diplome'];
$pdf->SetXY(120, 152.5);
$pdf->Write(0, $ddd);
$t=$ens[$key]['traveaux_recherche'];
$pdf->SetXY(90, 185.5);
$pdf->Write(0, $t);
$e=$ens[$key]['emplois_hors_enseignement'];
$pdf->SetXY(120, 194.5);
$pdf->Write(0, $e);
$e=$ens[$key]['plus_d\'infos'];
$pdf->SetXY(90, 202.5);
$pdf->Write(0, $e);
$N= $ens[$key]['spécialité'];
$pdf->SetXY(90, 144.5);
$pdf->Write(0, $N);
}
$pdf->Output();