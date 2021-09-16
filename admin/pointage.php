<meta charset="utf-8">
<?php 
require 'bdd.php';
require 'admin/fpdf182/fpdf.php';
require 'function.php';
// Chargement des données

   $pdf = new FPDF();
    $query1 = $pdo->query("SELECT * FROM groupe ");
$resultat1 = $query1->fetchAll();
foreach ($resultat1 as $key => $variable){
  $id_groupe=$resultat1[$key]['id_groupe'];
  $de1=$resultat1[$key]['de1'];
  $jusqua1=$resultat1[$key]['jusqu\'a1'];
   $de2=$resultat1[$key]['de2'];
  $jusqua2=$resultat1[$key]['jusqu\'a2'];

   $pdf->SetFont('Arial','B',13);
   $pdf->SetMargins(6,6);
   $pdf->AddPage('P');
   //date de pointage
   $query3 = $pdo->query("SELECT * FROM pointage ");
$resultat3 = $query3->fetchAll();
foreach ($resultat3 as $key => $variable){ $date=$resultat3[$key]['date_pointage']; }

$idemp=$resultat3[$key]['idemp'];
    $dateee=date("d/m/Y", strtotime($date));
    
    
  $year=date('Y', strtotime($date));

  $day=date('l', strtotime($date));
  $jr=retourner_day($day);

   $pdf->Cell(130,5,'MINISTERE DE L\'ENSEIDNEMENT SUPERIEUR',0,1);
   $pdf->Cell(130,5,'INIVERSITE DE LA FOEMATION CONTINUE',0,1);
      $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'C.F.C ALGER NORD BOUZEAREAH',0,1);
   $pdf->Cell(0,5,'SEC ADMINISTRATION GENERALE',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'FEUILLE DE PRESENCE',0,1,'C');
   $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(30,5,'JOUR :',0,0);
    $pdf->Cell(20,5,$jr,0,1); 
    $pdf->Cell(30,5,'DATE :',0,0);
    $pdf->Cell(20,5,$dateee,0,1); 
       $pdf->Cell(0,5,'',0,1);



  $query = $pdo->query("SELECT * FROM employé INNER JOIN pointage ON(employé.idemp=pointage.idemp ) INNER JOIN groupe  ON(employé.id_groupe=groupe.id_groupe ) WHERE groupe.id_groupe ='$id_groupe'");
$resultat = $query->fetchAll();


 $pdf->SetFont('Arial','B',9);
   
   //Cell 
/* $pdf->(width,height,'text','T',1,'C',0 /* ,hna yji link);*/
 $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(30,10,'NOM',1,0,'C');
$pdf->Cell(30,10,'PRENOM',1,0,'C');
$pdf->Cell(25,10,'STATU',1,0,'C');
$pdf->Cell(30 ,10,'HORAIRES',1,0,'C');
$pdf->Cell(25,10,'ENTREE',1,0,'C');
$pdf->Cell(25,10,'SORTIE',1,0,'C');
$pdf->Cell(30,10,'APRECIATION',1,1,'C');
$nbr=0;
$entré="Abscent";
$sortie="Abscent";
foreach ($resultat as $key => $variable){

  $nbr++;
   if($resultat[$key]['pointage_entrée']=="oui"){ $entré="present"; }elseif ($resultat[$key]['pointage_entrée']=="non") { $entré="Abscent"; 
   //ab3atlo istifsar
      // 1)- envoyer une notification :
   $n_doc="Renseignement d'absence";
   $vide="";
   $de_la="Administrateur personnel ";
   $type_noti="Renseignement d'absence";
   $date_noti=date("Y-m-d H:m:s");
   $ree=$pdo->prepare ('INSERT INTO notification_user (idemp,Nom_document,date_noti,etat,type_noti,de_la_part)VALUES("'.$idemp.'","'.$n_doc.'","'.$date_noti.'","'. $vide.'","'.$type_noti.'","'.$de_la.'")');
    $ree->execute();
  }
  if($resultat[$key]['pointage_sortie']=="oui"){ $sortie="present"; }elseif ($resultat[$key]['pointage_sortie']=="non") { 
  	$sortie="Abscent"; 
  	//envoyer istifsar
  }

$date = $resultat[$key]['date_pointage'];
$d = date_parse_from_format("Y-m-d", $date);
$datee = $d["year"];
 
//vérifier congé

/*  
$idemp=$resultat[$key]['idemp'];
  $query2 = $pdo->query("SELECT * FROM congé WHERE idemp ='$idemp'");
$resultat2 = $query2->fetchAll();

 $obs="";
foreach ($resultat2 as $key $key => $variable){ 
  if ( $date > $resultat2[$key]['date_debut'] && $date <= $resultat2[$key]['date_fin']  ) {

 $obs="Conge";
  
} 

}*/
$obs="";
$id_statu=$resultat[$key]['Statut'];
$stat = $pdo->query("SELECT * FROM statu_employé WHERE id_statu='$id_statu'");
$stat = $stat->fetch();
$pdf->Cell(8,10,$nbr,1,0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(30,10,$resultat[$key]['nom'],1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,10,$resultat[$key]['Prénom'],1,0,'C');
$pdf->Cell(25,10,$stat['statu'],1,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(30,10,$de1."-".$jusqua2,1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,10,$entré,1,0,'C');
$pdf->Cell(25,10,$sortie,1,0,'C');
$pdf->Cell(30,10,$obs,1,1,'C');

}
//end tab
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,10,'Observation du reponsable du service',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,10,'Le Directeur',0,1,'R');
$pdf->Cell(68,10,'AOUMED DJAMEL',0,0);
/* pagination
$page=1;
$pdf->Cell(98,5,'',0,0);
$pdf->Cell(0,5,'('.$page.')',0,0);

*/
}

//pointage des professeurs

$pdf->SetFont('Arial','',10);
   $pdf->SetMargins(5,6);
   $pdf->AddPage('P');
/*
  $wek = $pdo->query("SELECT * FROM weekend ");
$weekend = $wek->fetchAll();
$i=1;
$week="false";

$jour=date('l', strtotime(' - 1 days'));
foreach ($weekend as $key => $value) {
	if ($weekend[$key]['nom']==$jour) {
		$week=2;
		break;
	}
}
if ($week==2) {
	$jour=date('l', strtotime(' - 2 days'));
	foreach ($weekend as $key => $value) {

	if ($weekend[$key]['nom']==$jour) {
		$week=3;
		break;
	}
}
}
if ($week==3) {
	$jour=date('l', strtotime(' - 3 days'));
	foreach ($weekend as $key => $value) {

	if ($weekend[$key]['nom']==$jour) {
		$week=4;
		break;
	}
}
}
if ($week==4) {
	$jour=date('l', strtotime(' - 4 days'));
	foreach ($weekend as $key => $value) {

	if ($weekend[$key]['nom']==$jour) {
		
		break;
	}
}
}
$k=1;
if ($k===1) {echo "oui";}
	
switch ($jour) {
    case 'Wednesday':
        $prof = $pdo->query("SELECT * FROM mercredi , employé WHERE mercredi.id_prof=employé.idemp ");
        $professeur = $prof->fetchAll();
        break;
    case 'Tuesday':
         $prof = $pdo->query("SELECT * FROM mardi , employé  WHERE mardi.id_prof=employé.idemp ");
         $professeur = $prof->fetchAll();
        break;
    case 'Monday':
        $prof = $pdo->query("SELECT * FROM lundi , employé  WHERE lundi.id_prof=employé.idemp ");
        $professeur = $prof->fetchAll();
        break;
    case 'Sunday':
         $prof = $pdo->query("SELECT * FROM dimanche , employé  WHERE dimanche.id_prof=employé.idemp ");
         $professeur = $prof->fetchAll();
        break;
    case 'Saturday':
         $prof = $pdo->query("SELECT * FROM samedi , employé  WHERE samedi.id_prof=employé.idemp ");
         $professeur = $prof->fetchAll();
        break;
    case 'Thursday':
         $prof = $pdo->query("SELECT * FROM jeudi , employé  WHERE jeudi.id_prof=employé.idemp ");
         $professeur = $prof->fetchAll();
        break;
}



    
*/
 $pdf->SetFont('Arial','B',13);
   $pdf->SetMargins(6,6);
   $pdf->AddPage('L');

   $pdf->Cell(130,5,'MINISTERE DE L\'ENSEIDNEMENT SUPERIEUR',0,1);
   $pdf->Cell(130,5,'INIVERSITE DE LA FOEMATION CONTINUE',0,1);
      $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'C.F.C ALGER NORD BOUZEAREAH',0,1);
   $pdf->Cell(0,5,'SEC ADMINISTRATION GENERALE',0,1);
   $pdf->Cell(0,5,'',0,1);
   $pdf->Cell(0,5,'FEUILLE DE PRESENCE',0,1,'C');
   $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(30,5,'JOUR :',0,0);
    $pdf->Cell(20,5,$jr,0,1); 
    $pdf->Cell(30,5,'DATE :',0,0);
    $pdf->Cell(20,5,$dateee,0,1); 
       $pdf->Cell(0,5,'',0,1);
 $pdf->SetFont('Arial','B',9);
   $pdf->SetMargins(2,2);
   $pdf->Cell(8,10,'#',1,0,'C');
$pdf->Cell(30,10,'NOM',1,0,'C');
$pdf->Cell(30,10,'PRENOM',1,0,'C');
$pdf->Cell(25,10,'STATU',1,0,'C');
$pdf->Cell(40 ,10,'FILIERE',1,0,'C');
$pdf->Cell(40,10,'MODULE',1,0,'C');
$pdf->Cell(15,10,'ANNEE',1,0,'C');
$pdf->Cell(30,10,'HORAIRE',1,0,'C');
$pdf->Cell(25,10,'PRESENCE',1,0,'C');
$pdf->Cell(40,10,'APRECIATION',1,1,'C');
$nbr=0;
$entré="Abscent";
$sortie="Abscent";

foreach ($professeur as $key => $variable){ 

  $nbr++;
  $présence="Abscent";
  $id_plan=$professeur[$key]['id_planning']; 
  $heur = $pdo->prepare("SELECT * FROM planning WHERE id='$id_plan' LIMIT 1 ");
 $heur->execute(); 
 $plan = $heur->fetch();

  
    $module=$plan['module']; 
    $filiere=$plan['filière']; 
    $année=$plan['année']; 
    $de=$plan['de']; 
    $jus=$plan['jusqua']; 

  

  $modu = $pdo->query("SELECT * FROM module WHERE id_module='$module' LIMIT 1 ");
  $modu->execute();

  $module = $modu->fetch();
   $module=$module['module'];
  

   $fili = $pdo->query("SELECT * FROM param_filière WHERE id_filière='$filiere' ");
 $fili->execute();
  $filiere = $fili->fetch();
    $filiere=$filiere['filière'];
  
if ($professeur[$key]['pointag']=="oui") {
  $présence="Present";

}
  $pdf->Cell(8,10,$nbr,1,0);
  $pdf->SetFont('Arial','',9);
  $id_statu=$resultat[$key]['Statu'];
$stat = $pdo->query("SELECT * FROM statu_employé WHERE id_statu='$id_statu'");
$stat = $stat->fetch();
$pdf->Cell(30,10,$professeur[$key]['nom'],1,0,'C');
$pdf->Cell(30,10,$professeur[$key]['Prénom'],1,0,'C');
$pdf->Cell(25,10,$stat['statu'],1,0,'C');
$pdf->Cell(40,10,$filiere,1,0,'C');
$pdf->Cell(40,10,$module,1,0,'C');
$pdf->Cell(15,10,$année."ere/eme",1,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(30,10,$de."-".$jus,1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,10,$présence,1,0,'C');
$pdf->Cell(40,10,$obs,1,1,'C');


}

$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,10,'Observation du reponsable du service',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,10,'Le Directeur',0,1,'R');
$pdf->Cell(68,10,'AOUMED DJAMEL',0,0);


$name=date('m-Y', strtotime($date));

echo $name; 
//echo $name;
$name.".pdf";

    $filename=$name.".pdf";
   $dir ="pointage_pdf/pointage_actuel/";
   $pdf->Output($dir.$filename,'F');
 ?>