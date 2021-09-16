<meta charset="utf-8">
<?php 
require '../bdd.php';
require 'fpdf182/fpdf.php';
$pdf = new FPDF();
// Chargement des données
$query = $pdo->query("SELECT * FROM statu_employé ");
$year=date("Y");
$q = $pdo->query("SELECT * FROM para_general where id=1 ");
$res = $q->fetch();
$anD=explode('-',$res['date_debut']);
$anD=$anD[0];
$anF=explode('-',$res['date_fin']);
$anF=$anF[0];
  $chandate_eval = $pdo->query("SELECT * FROM para_pointage WHERE id=1 ");
$chang_eval = $chandate_eval->fetch();
$y="Carte d'evaluation des employes du"." ".$chang_eval['sem'] ."semestre,l'annee fiscale ".$anD."/".$anF;
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){
  $st=$resultat[$key]['id_statu'];
  $pdf->SetFont('Arial','',10);
   $pdf->SetMargins(5,6);
   $pdf->AddPage('L');
   //date de pointage
   $pdf->Cell(220,5,'Ministere de l\'Enseignement Superieur et de la Recherche Scientifique',0,0);
   $pdf->Cell(50,5,'Categorie d\'employes :' ,"T L R",1);
   $pdf->Cell(220,5,'universite de formation continue',0,0);
   $pdf->Cell(50,5,$resultat[$key]['statu'],"L R B",1);
   $pdf->Cell(220,5,'Secretariat general',0,1);
   $pdf->Cell(220,5,'Sous-direction du budget et des finances',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'Carte de score pour la subvention de rentabilite',0,1,'C');
   $pdf->Cell(0,5,'Centre : Nord ALGER -Bouzareah-',0,1,'C');
   $pdf->Cell(0,5,$y,0,1,'C');
   $pdf->Cell(0,5,'',0,1);
$pdf->Cell(73,5,'',0,1);
$query1 = $pdo->query("SELECT * FROM employé where Emploi != 'Enseignant' AND Emploi != 'Directeur' AND Statut = '$st'");
$resultat1 = $query1->fetchAll();
//lheader
 $pdf->Cell(8,10 ,'#',"L R T",0,'C');
$pdf->Cell(50,10 ,'Nom Prénom',"L R T",0,'C');
$pdf->Cell(50,10 ,'Date et lieu de naissance',"L R T",0,'C');
$pdf->Cell(20 ,10,'N CCP',"L R T",0,'C');
$pdf->Cell(40,10 ,'Date d\'embauche',"L R T",0,'C');
$pdf->Cell(100,10,'Note',1,0,'C');
$pdf->Cell(20,10 ,'Total /30',"L R T",1,'C');
 $pdf->Cell(8,6,'',"L R B",0,'C');
$pdf->Cell(50,6,'',"L R B",0,'C');
$pdf->Cell(50,6,'',"L R B",0,'C');
$pdf->Cell(20,6,'',"L R B",0,'C');
$pdf->Cell(40,6,'',"L R B",0,'C');
$pdf->Cell(25,6,'discipline /6',"L R B",0,'C');
$pdf->Cell(25,6,'Curriculum /6',"L R B",0,'C');
$pdf->Cell(25,6,'Initiative/9',"L R B",0,'C');
$pdf->Cell(25,6,'Cpcte travail/9',"L R B",0,'C');
$pdf->Cell(20,6,'',"L R B",1,'C');
$nbr=0;
foreach ($resultat1 as $key => $variable){
  $nbr++;
    $pdf->Cell(8,10,$nbr,1,0,'C');
$pdf->Cell(50,10,$resultat1[$key]['nom']." ".$resultat1[$key]['Prénom'],1,0,'C');
$pdf->Cell(50,10,$resultat1[$key]['Date_de_Naissance']." ".$resultat1[$key]['lieu_de_Naissance'],1,0,'C');
$pdf->Cell(20 ,10,$resultat1[$key]['N°CCP'],1,0,'C');
$pdf->Cell(40,10,$resultat1[$key]['DateEntré'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['discipline'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['Curriculum'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['Initiative'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['Cpct'],1,0,'C');
$pdf->Cell(20,10,$resultat1[$key]['Note_Directeur'],1,1,'C');
}
}
$query2 = $pdo->query("SELECT * FROM statu_employé ");
$resultat2 = $query2->fetchAll();
$year=date("Y");
$y=$year;
foreach ($resultat2 as $key => $variable){
    $st=$resultat2[$key]['id_statu'];
$pdf->SetFont('Arial','',10);
   $pdf->SetMargins(5,6);
   $pdf->AddPage('L');
   //date de pointage
   $pdf->Cell(220,5,'Ministere de l\'Enseignement Superieur et de la Recherche Scientifique',0,0);
   $pdf->Cell(50,5,'Categorie d\'employes :' ,"T L R",1);
   $pdf->Cell(220,5,'universite de formation continue',0,0);
   $pdf->Cell(50,5,"Enseignant :","L R ",1);
   $pdf->Cell(220,5,'Secretariat general',0,0);
   $pdf->Cell(50,5,$resultat[$key]['statu'],"L R B",1);
   $pdf->Cell(220,5,'Sous-direction du budget et des finances',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'Carte de score pour la subvention de rentabilite',0,1,'C');
   $pdf->Cell(0,5,'Centre : Nord ALGER -Bouzeriah-',0,1,'C');
   $pdf->Cell(0,5,$y,0,1,'C');
$pdf->Cell(73,5,'',0,1);
$nbr=0;
$query1 = $pdo->query("SELECT * FROM employé where Emploi = 'Enseignant' AND Statut = '$st'");
$resultat1 = $query1->fetchAll();
//lheader
$pdf->Cell(8,10,'#',"L R T",0,'C');
$pdf->Cell(50,10,'Nom Prenom',"L R T",0,'C');
$pdf->Cell(50,10,'Date et lieu de naissance',"L R T",0,'C');
$pdf->Cell(20 ,10,'N CCP',"L R T",0,'C');
$pdf->Cell(40,10,'Date d\'embauche',"L R T",0,'C');
$pdf->Cell(100,10,'Note',1,0,'C');
$pdf->Cell(20,10,'Total /30',"L R T",1,'C');
 $pdf->Cell(8,6,'',"L R B",0,'C');
$pdf->Cell(50,6,'',"L R B",0,'C');
$pdf->Cell(50,6,'',"L R B",0,'C');
$pdf->Cell(20,6,'',"L R B",0,'C');
$pdf->Cell(40,6,'',"L R B",0,'C');
$pdf->Cell(25,6,'discipline /6',"L R B",0,'C');
$pdf->Cell(25,6,'Curriculum /6',"L R B",0,'C');
$pdf->Cell(25,6,'Initiative/9',"L R B",0,'C');
$pdf->Cell(25,6,'Cpcte travail/9',"L R B",0,'C');
$pdf->Cell(20,6,'',"L R B",1,'C');
foreach ($resultat1 as $key => $variable){
  $nbr++;
    $pdf->Cell(8,10,$nbr,1,0,'C');
$pdf->Cell(50,10,$resultat1[$key]['nom']." ".$resultat1[$key]['Prénom'],1,0,'C');
$pdf->Cell(50,10,$resultat1[$key]['Date_de_Naissance']." ".$resultat1[$key]['lieu_de_Naissance'],1,0,'C');
$pdf->Cell(20 ,10,$resultat1[$key]['N°CCP'],1,0,'C');
$pdf->Cell(40,10,$resultat1[$key]['DateEntré'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['discipline'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['Curriculum'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['Initiative'],1,0,'C');
$pdf->Cell(25,10,$resultat1[$key]['Cpct'],1,0,'C');
$pdf->Cell(20,10,$resultat1[$key]['Note_Directeur'],1,1,'C');
}
}
$date=date('Y-m-d');
    $filename=$date.".pdf";
   $dir ="../Document_employé/carte_score/";
   $pdf->Output($dir.$filename,'F');
 ?>