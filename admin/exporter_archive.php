<?php 
require '../bdd.php';
require 'fpdf182/fpdf.php';
// Chargement des données
   $pdf = new FPDF();
   //employés
   if($_GET['type']=='employé'){
    $query1 = $pdo->query("SELECT * FROM  archive_employé");
$resultat1 = $query1->fetchAll();


   $pdf->SetFont('Arial','',10);
   $pdf->SetMargins(5,6);
   $pdf->AddPage('P');
   
$date=date("d/m/Y");
    
  $year=date('Y', strtotime($date));
   $pdf->Cell(130,5,'ministere de l\'enseignement superieur',0,0);
   $pdf->Cell(20,5,'date :',0,0);
   $pdf->Cell(1,5,$date,0,1);
   $pdf->Cell(130,5,'universite de formation continue',0,1);

   $pdf->Cell(0,5,'ALGER NORD : Universite d\'Alger Bouzareah',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'Archive des employes',0,1,'C');
   $pdf->Cell(0,5,'',0,1);
 $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(30,10,'Nom',1,0,'C');
$pdf->Cell(30,10,'Prénom',1,0,'C');
$pdf->Cell(30,10,'Matricule',1,0,'C');
$pdf->Cell(20,10,'D d\'entree',1,0,'C');
$pdf->Cell(20,10,'D de sortie',1,0,'C');
$pdf->Cell(30,10,'Emploie',1,0,'C');

$pdf->Cell(30,10,'Raison',1,1,'C');
$nbr=0;
foreach ($resultat1 as $key => $variable){
$nbr=$nbr+1;
  $nom=$resultat1[$key]['nom'];
  $Prénom=$resultat1[$key]['Prénom'];
  $Matricule=$resultat1[$key]['Matricule'];
  $DateEntré=$resultat1[$key]['DateEntré'];
  $DateSortie=$resultat1[$key]['DateSortie'];
  $Emploie=$resultat1[$key]['Emploie'];
  $Grade=$resultat1[$key]['Grade'];
  $raison=$resultat1[$key]['raison'];
$pdf->Cell(8,10,$nbr,1,0);
$pdf->Cell(30,10,$nom,1,0,'C');
$pdf->Cell(30,10,$Prénom,1,0,'C');
$pdf->Cell(30,10,$Matricule,1,0,'C');
$pdf->Cell(20,10,$DateEntré,1,0,'C');
$pdf->Cell(20,10,$DateSortie,1,0,'C');
$pdf->Cell(30,10,$Emploie,1,0,'C');

$pdf->Cell(30,10,$Raison,1,1,'C');
}
$pdf->Output();
}

// congés
 if($_GET['type']=='congé'){
    $query1 = $pdo->query("SELECT * FROM  archive_congés ,employé WHERE archive_congés.idemp=employé.idemp");
$resultat1 = $query1->fetchAll();


   $pdf->SetFont('Arial','',10);
   $pdf->SetMargins(5,6);
   $pdf->AddPage('P');
   
$date=date("d/m/Y");
    
  $year=date('Y', strtotime($date));
   $pdf->Cell(130,5,'ministere de l\'enseignement superieur',0,0);
   $pdf->Cell(15,5,'date :',0,0);
   $pdf->Cell(1,5,$date,0,1);
   $pdf->Cell(130,5,'universite de formation continue',0,1);

   $pdf->Cell(0,5,'ALGER NORD : Universite d\'Alger Bouzareah',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'Archive des conges',0,1,'C');
   $pdf->Cell(0,5,'',0,1);
 $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(27,10,'Nom',1,0,'C');
$pdf->Cell(27,10,'Prenom',1,0,'C');
$pdf->Cell(30,10,'Matricule',1,0,'C');
$pdf->Cell(20,10,'de',1,0,'C');
$pdf->Cell(20,10,'Jusqu\'a',1,0,'C');
$pdf->Cell(15,10,'Type',1,0,'C');
$pdf->Cell(40,10,'Motif',1,0,'C');

$pdf->Cell(12,10,'Lieu',1,1,'C');
$nbr=0;
foreach ($resultat1 as $key => $variable){
  $nbr=$nbr+1;
  $nom=$resultat1[$key]['nom'];
  $Prénom=$resultat1[$key]['Prénom'];
  $Matricule=$resultat1[$key]['Matricule'];
  $DateEntré=$resultat1[$key]['date_debut'];
  $DateSortie=$resultat1[$key]['date_fin'];
  $type=$resultat1[$key]['type_congé'];
  $motif=$resultat1[$key]['Motif'];
  $lieu=$resultat1[$key]['Lieu'];
$pdf->Cell(8,10,$nbr,1,0);
$pdf->Cell(27,10,$nom,1,0,'C');
$pdf->Cell(27,10,$Prénom,1,0,'C');
$pdf->Cell(30,10,$Matricule,1,0,'C');
$pdf->Cell(20,10,$DateEntré,1,0,'C');
$pdf->Cell(20,10,$DateSortie,1,0,'C');
$pdf->Cell(15,10,$type,1,0,'C');
$pdf->Cell(40,10,$motif,1,0,'C');
$pdf->Cell(12,10,$lieu,1,1,'C');
}
$pdf->Output();
}
 if($_GET['type']=='docActu'){
    $query1 = $pdo->query("SELECT * FROM  document_adminstratif,employé WHERE document_adminstratif.idemp=employé.idemp");
$resultat1 = $query1->fetchAll();


   $pdf->SetFont('Arial','',10);
   $pdf->SetMargins(5,6);
   $pdf->AddPage('P');
   
$date=date("d/m/Y");
    
  $year=date('Y', strtotime($date));
   $pdf->Cell(130,5,'ministere de l\'enseignement superieur',0,0);
   $pdf->Cell(15,5,'date :',0,0);
   $pdf->Cell(1,5,$date,0,1);
   $pdf->Cell(130,5,'universite de formation continue',0,1);

   $pdf->Cell(0,5,'ALGER NORD : Universite d\'Alger Bouzareah',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'Les documents administrative pris',0,1,'C');
   $pdf->Cell(0,5,'',0,1);
 $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(40,10,'Nom',1,0,'C');
$pdf->Cell(40,10,'Prénom',1,0,'C');
$pdf->Cell(40,10,'Matricule',1,0,'C');
$pdf->Cell(40,10,'Document',1,0,'C');
$pdf->Cell(30,10,'Date de le prise',1,1,'C');
$nbr=0;
foreach ($resultat1 as $key => $variable){
  $nbr=$nbr+1;
  $nom=$resultat1[$key]['nom'];
  $Prénom=$resultat1[$key]['Prénom'];
  $Matricule=$resultat1[$key]['Matricule'];
  $Nom_doc=$resultat1[$key]['Nom_document'];
  $Date_Prise=$resultat1[$key]['Date_docu'];
$pdf->Cell(8,10,$nbr,1,0);
$pdf->Cell(40,10,$nom,1,0,'C');
$pdf->Cell(40,10,$Prénom,1,0,'C');
$pdf->Cell(40,10,$Matricule,1,0,'C');
$pdf->Cell(40,10,$Nom_doc,1,0,'C');
$pdf->Cell(30,10,$Date_Prise,1,1,'C');

}
$pdf->Output();
}

 if($_GET['type']=='doc_archive'){
    $query1 = $pdo->query("SELECT * FROM  archive_document,employé WHERE archive_document.idemp=employé.idemp");
$resultat1 = $query1->fetchAll();


   $pdf->SetFont('Arial','',10);
   $pdf->SetMargins(5,6);
   $pdf->AddPage('P');
   
$date=date("d/m/Y");
    
  $year=date('Y', strtotime($date));
   $pdf->Cell(130,5,'ministere de l\'enseignement superieur',0,0);
   $pdf->Cell(15,5,'date :',0,0);
   $pdf->Cell(1,5,$date,0,1);
   $pdf->Cell(130,5,'universite de formation continue',0,1);

   $pdf->Cell(0,5,'ALGER NORD : Universite d\'Alger Bouzareah',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'Les documents administrative pris',0,1,'C');
   $pdf->Cell(0,5,'',0,1);
 $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(40,10,'Nom',1,0,'C');
$pdf->Cell(40,10,'Prénom',1,0,'C');
$pdf->Cell(40,10,'Matricule',1,0,'C');
$pdf->Cell(40,10,'Document',1,0,'C');
$pdf->Cell(30,10,'Date de le prise',1,1,'C');
$nbr=0;
foreach ($resultat1 as $key => $variable){
  $nbr=$nbr+1;
  $nom=$resultat1[$key]['nom'];
  $Prénom=$resultat1[$key]['Prénom'];
  $Matricule=$resultat1[$key]['Matricule'];
  $Nom_doc=$resultat1[$key]['Nom_document'];
  $Date_Prise=$resultat1[$key]['Date_docu'];
$pdf->Cell(8,10,$nbr,1,0);
$pdf->Cell(40,10,$nom,1,0,'C');
$pdf->Cell(40,10,$Prénom,1,0,'C');
$pdf->Cell(40,10,$Matricule,1,0,'C');
$pdf->Cell(40,10,$Nom_doc,1,0,'C');
$pdf->Cell(30,10,$Date_Prise,1,1,'C');

}
$pdf->Output();
}
