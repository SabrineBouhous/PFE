<?php
/*require 'FPDI-2.3.2/src/fpdi.php';
include 'mohamed.pdf';
$pdf=new FPDI();

$pagenex=$pdf->setSourceFile('new.pdf');
$page=$pdf->importPage(1);


*/
use setasign\Fpdi\Fpdi;
require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');



// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('fichier/mahdar.pdf');
// import page 1
$tplIdx = $pdf->importPage(2);
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 10, 10, 200);

?>