<meta charset="utf-8">
<?php 
function divi($var){
$p=(str_split($var,2));
return $p[0];
}
require '../bdd.php';
require_once( 'fpdf182/fpdf.php');
$Mois=date("m");
$m=date("y-m-d");
$b=strtotime("$m");
$final = date("m", strtotime("+1 month", $b));
// Chargement des données
   $pdf = new FPDF();
   $pdf->SetFont('Arial','',10);
   $pdf->SetMargins(2,6);
 $pdf->AddPage('L');
$nbr=0;
 $query1 = $pdo->query("SELECT * FROM  fonction INNER JOIN employé ON(employé.fonction=fonction.id_fonction) INNER JOIN grade ON(employé.Grade=grade.id_grade) Where Emploi != 'Professeur' ");
$resultat1 = $query1->fetchAll();
foreach ($resultat1 as $key => $variable){
    $id=$resultat1[$key]['idemp'];
  $pdf->Cell(300,5,'La republique algerienne democratique et populaire',0,1,"C");
      $pdf->Cell(200,5,'ministere de l\'enseignement superieur',0,0);
   $pdf->Cell(130,5,'Centre de formation continue _Bouzereah_:',0,1);
   //$pdf->Cell(1,5,$year,0,1);
   $pdf->Cell(200,5,'universite de formation continue',0,0);
   $pdf->Cell(10,5,'Mois :',0,0);
    $pdf->Cell(10,5,$Mois,0,1);
    $pdf->Cell(200,5,'',0,0);
   $pdf->Cell(15,5,'jusqu\'a:',0,0);
    $pdf->Cell(15,5,$final,0,1);
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(200,5,'',0,1);
 //   $pdf->Cell(0,5,$date,0,1);
   $pdf->Cell(0,5,'Ajustements mensuels du statut des employes ',0,1,'C');
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(30,10,'Nom Prenom',1,0,'C');
$pdf->Cell(10 ,10,'cle',1,0,'C');
$pdf->Cell(30,10,'ccp',1,0,'C');
$pdf->Cell(18,10,'Grade',1,0,'C');
$pdf->Cell(35,10,'Fonction',1,0,'C');
$pdf->Cell(35,10,'Type de reglement ',1,0,'C');
$pdf->Cell(35,10,'Nbr des jours remis',1,0,'C');
$pdf->Cell(60,10,'Documents justifiant la deduction',1,0,'C');
$pdf->Cell(20,10,'Absences',1,0,'C');
$pdf->Cell(20,10,'Remarque',1,1,'C');
  $nbr++;
  $ccp=$resultat1[$key]['N°CCP'];
$pdf->Cell(8,10,$nbr,1,0);
$pdf->Cell(30,10,$resultat1[$key]['nom']."".$resultat1[$key]['Prénom'],1,0,'C');
$pdf->Cell(10 ,10,divi($ccp),1,0,'C');
$pdf->Cell(30,10,$ccp,1,0,'C');
$pdf->Cell(18,10,$resultat1[$key]['grade'],1,0,'C');
$pdf->Cell(35,10,$resultat1[$key]['fonction'],1,0,'C');
$pdf->Cell(35,10,'',1,0,'C');
$pdf->Cell(35,10,'',1,0,'C');
$pdf->Cell(60,10,'',1,0,'C');
 $query = $pdo->query("SELECT * FROM  rappor_pointage Where idemp ='$id' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){
$pdf->Cell(20,10,$resultat[$key]['abscence']."/".$resultat[$key]['totale'],1,0,'C');
}
$pdf->Cell(20,10,'',1,1,'C');
}
//end tab
$pdf->Cell(200,5,'',0,1);
/* pagination
$page=1;
$pdf->Cell(98,5,'',0,0);
$pdf->Cell(0,5,'('.$page.')',0,0);

*/

$pdf->Cell(70,10,'Temoigne monsieur : ',0,0);
$pdf->Cell(68,10,'Directeur du centre : Bouzereah',0,1);

$pdf->Cell(70,5,'Et sous sa responsabilite personnelle l\'exactitude des informations figurant dans le tableau ci-dessus',0,1);
   $pdf->Cell(200,5,'',0,1);
$pdf->Cell(200,10,' ',0,0);
$pdf->Cell(90,1,'Signature du directeur du centre :',0,1,'R');





//prof
   $pdf->SetFont('Arial','',10);
   $pdf->SetMargins(2,6);
 $pdf->AddPage('L');
$nbr=0;
 $query1 = $pdo->query("SELECT * FROM  fonction INNER JOIN employé ON(employé.fonction=fonction.id_fonction) INNER JOIN grade ON(employé.Grade=grade.id_grade) Where Emploi = 'Professeur' ");
$resultat1 = $query1->fetchAll();
foreach ($resultat1 as $key => $variable){
  $id=$resultat1[$key]['idemp'];
  $pdf->Cell(300,5,'La republique algerienne democratique et populaire',0,1,"C");
      $pdf->Cell(200,5,'ministere de l\'enseignement superieur',0,0);
   $pdf->Cell(130,5,'Centre de formation continue _Bouzereah_:',0,1);
   //$pdf->Cell(1,5,$year,0,1);
   $pdf->Cell(200,5,'universite de formation continue',0,0);
   $pdf->Cell(10,5,'Mois :',0,0);
    $pdf->Cell(10,5,$Mois,0,1);
    $pdf->Cell(200,5,'',0,0);
   $pdf->Cell(15,5,'jusqu\'a:',0,0);
    $pdf->Cell(15,5,$final,0,1);
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(200,5,'',0,1);
 //   $pdf->Cell(0,5,$date,0,1);
   $pdf->Cell(0,5,'Ajustements mensuels du statut des enseignants ',0,1,'C');
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(200,5,'',0,1);
   $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(30,10,'Nom Prenom',1,0,'C');
$pdf->Cell(10 ,10,'cle',1,0,'C');
$pdf->Cell(30,10,'ccp',1,0,'C');
$pdf->Cell(18,10,'Grade',1,0,'C');
$pdf->Cell(35,10,'Fonction',1,0,'C');
$pdf->Cell(35,10,'Type de reglement ',1,0,'C');
$pdf->Cell(35,10,'Nbr des jours remis',1,0,'C');
$pdf->Cell(60,10,'Documents justifiant la deduction',1,0,'C');
$pdf->Cell(20,10,'Absences',1,0,'C');
$pdf->Cell(20,10,'Remarque',1,1,'C');
  $nbr++;
  $ccp=$resultat1[$key]['N°CCP'];
$pdf->Cell(8,10,$nbr,1,0);
$pdf->Cell(30,10,$resultat1[$key]['nom']."".$resultat1[$key]['Prénom'],1,0,'C');
$pdf->Cell(10 ,10,divi($ccp),1,0,'C');
$pdf->Cell(30,10,$ccp,1,0,'C');
$pdf->Cell(18,10,$resultat1[$key]['grade'],1,0,'C');
$pdf->Cell(35,10,$resultat1[$key]['fonction'],1,0,'C');
$pdf->Cell(35,10,'',1,0,'C');
$pdf->Cell(35,10,'',1,0,'C');
$pdf->Cell(60,10,'',1,0,'C');
 $query = $pdo->query("SELECT * FROM  rappor_pointage Where idemp ='$id' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){
$pdf->Cell(20,10,$resultat[$key]['abscence']."/".$resultat[$key]['totale'],1,0,'C');
}
$pdf->Cell(20,10,'',1,1,'C');
}
//end tab
$pdf->Cell(200,5,'',0,1);
/* pagination
$page=1;
$pdf->Cell(98,5,'',0,0);
$pdf->Cell(0,5,'('.$page.')',0,0);

*/

$pdf->Cell(70,10,'Temoigne monsieur : ',0,0);
$pdf->Cell(68,10,'Directeur du centre : Bouzereah',0,1);

$pdf->Cell(70,5,'Et sous sa responsabilite personnelle l\'exactitude des informations figurant dans le tableau ci-dessus',0,1);
   $pdf->Cell(200,5,'',0,1);
$pdf->Cell(200,10,' ',0,0);
$pdf->Cell(90,1,'Signature du directeur du centre :',0,1,'R');

$nom=date("m-Y");
$name=$nom.".pdf";
echo $name;
   $dir ="../Document_employé/ajustement_mensuel/";
   $pdf->Output($dir.$name,'F');
 ?>

