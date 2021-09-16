 <?php
////////////////////////////////////////////////////
session_start();
///////////////////////////////////////////////////
require 'function.php';
require 'bdd.php';


 if (isset($_POST['submit']))
{

  if(preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Nom_Utilisateur"])=="")
    {
      $errors['user_name'] = "Nom d'utilisateur incorrect";
   
    }

  if(preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Mot_de_passe"])=="")
    {
      $errors['Mot_de_passe'] = "Nom d'utilisateur incorrect";
    }
  if(empty($errors))
    {
  $user=$_POST['Nom_Utilisateur'];
  $pwd=$_POST['Mot_de_passe'];
  $query = $pdo->query("SELECT *FROM `employé` WHERE Nom_Utilisateur='$user' AND Mot_de_passe='$pwd'  ");
  $resultat =$query->fetchAll();

  $num_of_rows = count($resultat); ;
    if($num_of_rows==0){
       $message='<div class="alert alert-danger">Nom d\'utilisateur ou Mot de passe <strong>INCORRECT!!</strong></div>';
    }else{

/////////////////////////////////////////////////////////////////////////////////////
      $_SESSION['Nom_Utilisateur']=$user;
      $_SESSION['Mot_de_passe']=$pwd;
/////////////////////////////////////////////////////////////////////////////////////
      foreach ($resultat as $key => $variable)
      {
        if ($resultat[$key]['role']=="admin")  
        {
          $idd=$pdo->query("SELECT idemp FROM `employé` WHERE Nom_Utilisateur='$user' AND Mot_de_passe='$pwd'  ");
           foreach ($resultat as $key => $variable){ 
            $idd=$resultat[$key]['idemp'];

          $etaat=$pdo->query("SELECT * FROM `para_general` WHERE id=1  ");
           $e=$etaat->fetch();
           if($e['etat']==0){
            $iddd="location:admin/Milti_step.php?id=".$idd;
            $message ="";
            header($iddd);
           }else{
            


           $iddd="location:admin/dashboard.php?id=".$idd;
            $message ="";
            header($iddd);
          }
}
          
        }elseif ($resultat[$key]['role']=="utilisateur") {
          $idd=$pdo->query("SELECT idemp FROM `employé` WHERE Nom_Utilisateur='$user' AND Mot_de_passe='$pwd'  ");
           foreach ($resultat as $key => $variable){ 
            $idd=$resultat[$key]['idemp'];
            
           
            $message ="";
            $iddd="location:employé/dashboard.php?id=".$idd;
            header($iddd);
  
            
          


          
        }
      }
}




     }
}


    }else{
  $message="";

}


//pointage
$date_auj=date('Y-m-d');

$date_jour=date('l');
$date_jr_nbr=date('d'); 
$date_we="false";
$nom="Année_unive";


$poin = $pdo->query("SELECT * FROM `para_pointage` ");
 $poinA =$poin->fetch();
 $pointageAct=$poinA['etat'];
$premier_poin=$poinA['premi_pointage'];
$date_act=$poinA['date_act'];
$date_actplus=date('Y-m-d', strtotime($date_act. ' + 1 days'));
 $query1 = $pdo->query("SELECT * FROM `para_general` WHERE nom='$nom' ");
 $resultat1 =$query1->fetchAll();
foreach ($resultat1 as $key => $variable)
      {
        $date_debut=$resultat1[$key]['date_debut'];

        $date_fin=$resultat1[$key]['date_fin'];
      }


//si le pointage est actv
if($pointageAct== 1 && $date_auj >= $date_actplus ){


$date_finplus1=date('Y-m-d', strtotime($date_fin. ' + 1 days'));

if ( $date_auj > $date_debut && $date_auj <= $date_finplus1) {  

 //rani f la période ta3 lkhdma
$query2 = $pdo->query("SELECT * FROM `pointage` "); //ajbad la derniere date
 $resultat2 =$query2->fetchAll();
 foreach ($resultat2 as $key => $variable)
      {
      $date_p=$resultat2[$key]['date_pointage'];
    

      }
    
    $day_p=date("l", strtotime($date_p));   

  //$tomorrow_day_p=date('l', strtotime($day_p. ' + 1 days'));
  //echo $tomorrow_day_p;
//echo $date_auj;

      if ( $date_auj != $date_p) { //vérifier ila dépassina hadk nhar
        //changer l'état de la table


         $resquete=$pdo->prepare ("UPDATE pointage SET  etat =1");
$resquete->execute();
//ajbadli l'état ta3ha bach nchofha jdida ou pas
  $query4 = $pdo->query("SELECT * FROM `pointage` "); //ajbad l'état
 $resultat4 =$query4->fetchAll();
 foreach ($resultat4 as $key => $variable)
      {
      $etat=$resultat4[$key]['etat'];
          }
          
          if($etat == 1){ //ila 9dima 


        $query6 = $pdo->query("SELECT * FROM `para_pointage` "); //ajbad w9tach l rapport
 $resultat6 =$query6->fetchAll();
 foreach ($resultat6 as $key => $variable)
      {
      $nbr_jrs=$resultat6[$key]['nbr_jrs'];
          }

      $query3 = $pdo->query("SELECT * FROM `weekend` "); //ajbad les weekend
    $resultat3 =$query3->fetchAll();
    foreach ($resultat3 as $key => $variable)
      { //vérifier si weekend
     
        $weekend=$resultat3[$key]['nom'];   
      if ( $day_p === $weekend ) { // verifier ila nhar lpointage(lbarah) kan weekend
        $date_we="true"; 

        break;
        
      }
      }

      if($date_we == "true"){ //ila lbarah(tab de pointage == weekend)

       $statement = $pdo->prepare("TRUNCATE TABLE `pointage`");// vider une table(emp)
      $statement->execute();
       $query5 = $pdo->query("SELECT * FROM `employé` WHERE Emploi!='Professeur' "); //remplissage de la bdd a nv(emp)
    $resultat5 =$query5->fetchAll();
      $nv_point="non";
    foreach ($resultat5 as $key => $variable)
      { 
        $idemp=$resultat5[$key]['idemp'];

        $resquete5=$pdo->prepare ('INSERT INTO pointage (idemp,pointage_entrée,pointage_sortie,date_pointage) VALUES("'.$idemp.'","'.$nv_point.'","'.$nv_point.'","'.$date_auj.'")');
        $resquete5->execute();

       } //vider une table(prof)
       $statement1 = $pdo->prepare("TRUNCATE TABLE `samedi`");
       $statement2= $pdo->prepare("TRUNCATE TABLE `dimanche`");
       $statement3 = $pdo->prepare("TRUNCATE TABLE `lundi`");
       $statement4 = $pdo->prepare("TRUNCATE TABLE `mardi`");
       $statement5 = $pdo->prepare("TRUNCATE TABLE `jeudi`");
       $statement6 = $pdo->prepare("TRUNCATE TABLE `mercredi`");
      $statement1->execute();
       $statement2->execute();
        $statement3->execute();
         $statement4->execute();
          $statement5->execute();
           $statement6->execute();

           //remplir table(prof) a nv

//ajbadli les planning ta3 chaque prof
  $querypro = $pdo->query("SELECT * FROM employé , planning WHERE employé.idemp=planning.idemp "); 
    $resultatprof =$querypro->fetchAll();
      $entrée="non";
foreach ($resultatprof as $key => $variable)
      {
        $id_prof=$resultatprof[$key]['idemp'];
        $id_planning=$resultatprof[$key]['id'];
        $pointag="non";
        // choisir les jours
        
        switch ($resultatprof[$key]['jour']) {
    case 'Mercredi':
        $prof = $pdo->prepare('INSERT INTO  mercredi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
        $professeur = $prof->execute();
        break;
    case 'Mardi':
    
         $prof = $pdo->prepare('INSERT INTO  mardi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
    case 'Monday':
        $prof = $pdo->prepare('INSERT INTO  lundi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
        $professeur = $prof->execute();
        break;
    case 'Dimanche':
         $prof = $pdo->prepare('INSERT INTO  dimanche (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
    case 'Samedi':
   
         $prof = $pdo->prepare('INSERT INTO  samedi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
    case 'Jeudi':
         $prof = $pdo->prepare('INSERT INTO  jeudi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
}

       }


       }elseif ($date_we =="false") { //ila machi weekend

              if( $date_jr_nbr == $nbr_jrs ){  //ila rana f nhar l rapport 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              //si le premier pointage(crée pour la premiere fois)
if ( $premier_poin == 0){
//premier pointage+modifier le premier pointage
  include 'admin/pointage.php';
  $id_p=1;
  $p=1;
$pre_p=$pdo->prepare ("UPDATE para_pointage SET premi_pointage =? WHERE  id = ? ");
$pp=$pre_p->execute(array($p,$id_p));

 }  else{

           include 'admin/new_day.php';/* ajouter les pages au pdf*/

}

           //n'ajouter fel rapport:+ncriyi nv rapport

$query8 = $pdo->query("SELECT * FROM `employé` "); /* pour chaque emp modifier la table rapport*/
    $resultat8 =$query8->fetchAll();
   
    foreach ($resultat8 as $key => $variable)//pour chaque emp

      {   $idemp=$resultat8[$key]['idemp']; 

      $siempexiste = $pdo->query("SELECT * FROM `rappor_pointage` "); /* hawas 3lih fel rapport*/
    $empexiste =$siempexiste->fetchAll();
    $countr=count($empexiste);
    if ($countr == 0) { //si l'employé n'existe pas (inserer le)
      $insemp = $pdo->prepare('INSERT INTO  rappor_pointage (idemp)VALUES("'.$idemp.'")');
         $insempoyé = $insemp->execute();
    }


             //modifier la table rapport:

if($resultat8[$key]['Emploi']=="Professeur"){
  
  //trouve le jour précédant
          $jour_pré=date('l', strtotime(' - 1 days'));
            switch ($jour_pré) {
    case 'Wednesday':
        $prof = $pdo->query("SELECT * FROM  mercredi WHERE id_prof='$idemp' ");
        $professeur = $prof->fetchAll();
        break;
    case 'Tuesday':
   
         $prof = $pdo->query(" SELECT * FROM  mardi WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
        break;
    case 'Monday':

        $prof = $pdo->query(" SELECT * FROM `lundi`  ");
        $professeur = $prof->fetchAll();
        
        break;
    case 'Sunday':
         $prof = $pdo->query(" SELECT * FROM  dimanche WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
         

        break;
    case 'Saturday':
   
         $prof = $pdo->query(" SELECT * FROM  samedi WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
        break;
    case 'Thursday':
         $prof = $pdo->query(" SELECT * FROM  jeudi WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
        break;
}

//por chaque emp dakhal lpointage(date)
foreach ( $professeur as $key => $variable)

      { 
        $poin=$professeur[$key]['pointag']; 
         //ajbad l rappport
          $query10 = $pdo->query("SELECT * FROM `rappor_pointage` WHERE idemp='$idemp'"); /**/
          $resultat10 =$query10->fetchAll();
          //ajbadd les info
          foreach ($resultat10 as $key => $variable)
      { 

    $présence=$resultat10[$key]['présence']+1;  
    $totale=$resultat10[$key]['totale']+1; 
    
    //nchif ila ja n'incrementi
    if ($poin=="oui") {
      $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  présence =?,  totale =? WHERE  idemp = ? ");
      $req= $resquete9->execute(array($présence,$totale,$idemp));
      
    }else{//ila majach
$resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  abscence =?,  totale =? WHERE  idemp = ? ");
$abs=$resultat10[$key]['abscence']+1;
            $req= $resquete9->execute(array($abs,$totale,$idemp));
    }


       }



        }

        }else{
        
          
//ila machi prof

           $query7 = $pdo->query("SELECT * FROM `pointage` WHERE idemp='$idemp'"); /**/
    $resultat7 =$query7->fetchAll();
    foreach ($resultat7 as $key => $variable)
      { 
        
        $p_ent=$resultat7[$key]['pointage_entrée']; 
        $p_sor=$resultat7[$key]['pointage_sortie']; 
        //ajbadli les info bac nincrementihom
         $query10 = $pdo->query("SELECT * FROM `rappor_pointage` WHERE idemp='$idemp'"); /**/
    $resultat10 =$query10->fetchAll();
    foreach ($resultat10 as $key => $variable)
      { 
        $nbr_p=$p_ent;
    $nbr_p=$resultat10[$key]['présence']+1; 
    $nbr_ent_sans_s=$resultat10[$key]['entré_sans_sortie']+1; 
    $totale=$resultat10[$key]['totale']+1; 
   


       }
        if ($p_sor == "oui" && $p_ent == "oui") { //marquer une présence+totale

           $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  présence =?,  totale =? WHERE  idemp = ? ");
            $req= $resquete9->execute(array($présence,$totale,$idemp));
        }
        if ($p_sor == "non" && $p_ent =="oui") { // demi présence+totale
          $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  entré_sans_sortie =?,  totale =? WHERE  idemp = ? ");
            $req= $resquete9->execute(array($nbr_ent_sans_s,$totale,$idemp));
        }
        if ($p_sor == "non" && $p_ent =="non") { // abscence totale
          $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  abscence =?,  totale =? WHERE  idemp = ? ");
           $abs=$resultat10[$key]['abscence']+1;
            $req= $resquete9->execute(array($abs,$totale,$idemp));
        }
          
    }
    
  }
}
//générer un nv rapport
            include 'admin/générer_rapport.php';
            //ab3at notificaion bali aw wajad rapp+poitage
          /*  $type_noti="Rapport et pointage"
            $noti_admin=$pdo->prepare ('INSERT INTO notification_admin (type_noti,date_noti)VALUES("'.$type_noti.'","'.$date_act.'")');
            $noti_admin->execute();
*/

                       //deplacer le pointage vers l'archive et pointage années

           $chemin="pointage_pdf/pointage_actuel";
$nom=lister_nom($chemin).".pdf";
$fichierAcopier =$chemin."/".$nom;
$emplacementFinal="pointage_pdf/pointage_année/".$nom;
$emplacementFinal2="pointage_pdf/archive_pointage/".$nom;
 remove($fichierAcopier , $emplacementFinal,$emplacementFinal2 );

             
            // vider rapport+
            $viderrapport = $pdo->prepare("TRUNCATE TABLE `rappor_pointage`");
      $viderrapport->execute();
      //remplir le rapport a nv
            $rem_rap = $pdo->query("SELECT * FROM `employé` ");
            $remplir_rap =$rem_rap->fetchAll();
            foreach ($remplir_rap as $key => $variable){
              $ide=$remplir_rap[$key]['idemp'];
              $insra = $pdo->prepare('INSERT INTO  rappor_pointage (idemp,de)VALUES("'.$ide.'","'.$date_auj.'")');
         $insrap = $insra->execute();
      }
      

            // vider une table pointage+jour
           $statement = $pdo->prepare("TRUNCATE TABLE `pointage`");// vider une table pointage+jour
      $statement->execute();
      

       $query5 = $pdo->query("SELECT * FROM `employé` WHERE Emploi!='Professeur' "); /*remplissage de la bdd a  avec nvmois=oui*/
    $resultat5 =$query5->fetchAll();
      $nv_point="non";
      $nv_mois="oui";
    foreach ($resultat5 as $key => $variable)
      { 
        $idemp=$resultat5[$key]['idemp'];
 
        $resquete5=$pdo->prepare ('INSERT INTO pointage (idemp,pointage_entrée,pointage_sortie,date_pointage,nv_mois) VALUES("'.$idemp.'","'.$nv_point.'","'.$nv_point.'","'.$date_auj.'","'.$nv_mois.'")');
        $resquete5->execute();
 
       }
       //3amar les jour
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   }else{ // date_auj=! date du rapport

       
       $query7 = $pdo->query("SELECT * FROM `pointage` "); /**/
    $resultat7 =$query7->fetchAll();
    foreach ($resultat7 as $key => $variable)
      { 
        $nv_mois=$resultat7[$key]['nv_mois']; //vérifier si un nv mois
      

    }
         
        if( $nv_mois === "oui" ){ // taritement des pdf

        include 'admin/pointage.php'; /*genreer un nv pdf  */


      } else{ 
        

       include 'admin/new_day.php';/* ajouter les pages au pdf */ } 
//remplir le rapprot apres vider la table
//nzidlo prof
$query8 = $pdo->query("SELECT * FROM `employé` "); /* pour chaque emp modifier la table rapport*/
    $resultat8 =$query8->fetchAll();
    $countr=count($resultat8);
    if ($countr == 0) { //si l'employé n'existe pas (inserer le)
      # code...
    }
    foreach ($resultat8 as $key => $variable)
      { 
        $idemp=$resultat8[$key]['idemp']; 

             //modifier la table rapport:
         
        if($resultat8[$key]['Emploi']=="Professeur"){
  
  //trouve le jour précédant
          $jour_pré=date('l', strtotime(' - 1 days'));

           switch ($jour_pré) {
    case 'Wednesday':
        $prof = $pdo->query("SELECT * FROM  mercredi WHERE id_prof='$idemp' ");
        $professeur = $prof->fetchAll();
        break;
    case 'Tuesday':
   
         $prof = $pdo->query(" SELECT * FROM  mardi WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
        break;
    case 'Monday':

        $prof = $pdo->query(" SELECT * FROM `lundi`  ");
        $professeur = $prof->fetchAll();
        
        break;
    case 'Sunday':
         $prof = $pdo->query(" SELECT * FROM  dimanche WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
         

        break;
    case 'Saturday':
   
         $prof = $pdo->query(" SELECT * FROM  samedi WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
        break;
    case 'Thursday':
         $prof = $pdo->query(" SELECT * FROM  jeudi WHERE id_prof='$idemp' ");
         $professeur = $prof->fetchAll();
        break;
}


//por chaque emp dakhal lpointage(date)
foreach ( $professeur as $key => $variable)

      { 
        $poin=$professeur[$key]['pointag']; 
         //ajbad l rappport
          $query10 = $pdo->query("SELECT * FROM `rappor_pointage` WHERE idemp='$idemp'"); /**/
          $resultat10 =$query10->fetchAll();
          //ajbadd les info
          foreach ($resultat10 as $key => $variable)
      { 

    $présence=$resultat10[$key]['présence']+1;  
    $totale=$resultat10[$key]['totale']+1; 
    
    //nchif ila ja n'incrementi
    if ($poin=="oui") {
      $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  présence =?,  totale =? WHERE  idemp = ? ");
      $req= $resquete9->execute(array($présence,$totale,$idemp));
      
    }else{//ila majach
$resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  abscence =?,  totale =? WHERE  idemp = ? ");
$abs=$resultat10[$key]['abscence']+1;
            $req= $resquete9->execute(array($abs,$totale,$idemp));
    }


       }



        }

        }else{
           $query7 = $pdo->query("SELECT * FROM `pointage` WHERE idemp='$idemp'"); /**/
    $resultat7 =$query7->fetchAll();
    foreach ($resultat7 as $key => $variable)
      { 
        
        $p_ent=$resultat7[$key]['pointage_entrée']; 
        $p_sor=$resultat7[$key]['pointage_sortie']; 
        //ajbadli les info bac nincrementihom
         $query10 = $pdo->query("SELECT * FROM `rappor_pointage` WHERE idemp='$idemp'"); /**/
    $resultat10 =$query10->fetchAll();
    foreach ($resultat10 as $key => $variable)
      { //s$nbr_p=$resultat10[$key]['pointage_entrée']; 
    $nbr_p=$resultat10[$key]['présence']+1; 
    $nbr_ent_sans_s=$resultat10[$key]['entré_sans_sortie']+1; 
    $totale=$resultat10[$key]['totale']+1; 
    


       }
        if ($p_sor == "oui" && $p_ent == "oui") { //marquer une présence+totale

           $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  présence =?,  totale =? WHERE  idemp = ? ");
            $req= $resquete9->execute(array($présence,$totale,$idemp));
        }
        if ($p_sor == "non" && $p_ent =="oui") { // demi présence+totale
          $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  entré_sans_sortie =?,  totale =? WHERE  idemp = ? ");
            $req= $resquete9->execute(array($nbr_ent_sans_s,$totale,$idemp));
        }
        if ($p_sor == "non" && $p_ent =="non") { // abscence totale
          $resquete9=$pdo->prepare ("UPDATE rappor_pointage SET  abscence =?,  totale =? WHERE  idemp = ? ");
          $abs=$resultat10[$key]['abscence']+1;
            $req= $resquete9->execute(array($abs,$totale,$idemp));
        }
          
    }
  }
}


         // vider la table ++ remplissage a nv 
      $statement = $pdo->prepare("TRUNCATE TABLE `pointage`");// vider une table
      $statement->execute();
       $query5 = $pdo->query("SELECT * FROM `employé` WHERE Emploi!='Professeur' "); //remplissage de la bdd a nv
    $resultat5 =$query5->fetchAll();
      $nv_point="non";
    foreach ($resultat5 as $key => $variable)
      { 
        $idemp=$resultat5[$key]['idemp'];

        $resquete5=$pdo->prepare ('INSERT INTO pointage (idemp,pointage_entrée,pointage_sortie,date_pointage) VALUES("'.$idemp.'","'.$nv_point.'","'.$nv_point.'","'.$date_auj.'")');
        $resquete5->execute();

       }
       
      }
     

     }  

      }
  }
}
  


}
$date_finplus=date('Y-m-d', strtotime($date_fin. ' + 2 days'));

if ($date_auj >= $date_finplus  ) {
  //vider tous les tables:
  $cong = $pdo->prepare("TRUNCATE TABLE `congé`");// vider congé
  $cong->execute();
  $poin = $pdo->prepare("TRUNCATE TABLE `pointage`");// vider pointage
  $poin->execute();
 //  $grp = $pdo->prepare("TRUNCATE TABLE `groupe`");// vider groupe
 // $grp->execute(); 
 // $mdl = $pdo->prepare("TRUNCATE TABLE `module`");// vider module
 // $mdl->execute(); 
  $noti_ad = $pdo->prepare("TRUNCATE TABLE `notification_admin`");// vider notification emp
  $noti_ad->execute(); 
  $noti_user = $pdo->prepare("TRUNCATE TABLE `notification_user`");// vider notification user
  $noti_user->execute(); 
  //$para_f = $pdo->prepare("TRUNCATE TABLE `para_f`");// vider paramet filiere
  //$para_f->execute(); 
  $plan = $pdo->prepare("TRUNCATE TABLE `planning`");// vider planning
  $plan->execute(); 
  $pointagev = $pdo->prepare("TRUNCATE TABLE `pointage`");// vider pointage
  $pointagev->execute(); 
  $pointagea = $pdo->prepare("TRUNCATE TABLE `pointage_année`");// vider pointage_année
  $pointagea->execute(); 
  $rappo_po = $pdo->prepare("TRUNCATE TABLE `pointage_année`");// vider rapport
  $rappo_po->execute(); 
  $week = $pdo->prepare("TRUNCATE TABLE `weekend`");// vider weekend
  $week->execute(); 
  //supp les jour
   $statement1 = $pdo->prepare("TRUNCATE TABLE `samedi`");
       $statement2= $pdo->prepare("TRUNCATE TABLE `dimanche`");
       $statement3 = $pdo->prepare("TRUNCATE TABLE `lundi`");
       $statement4 = $pdo->prepare("TRUNCATE TABLE `mardi`");
       $statement5 = $pdo->prepare("TRUNCATE TABLE `jeudi`");
       $statement6 = $pdo->prepare("TRUNCATE TABLE `mercredi`");
      $statement1->execute();
       $statement2->execute();
        $statement3->execute();
         $statement4->execute();
          $statement5->execute();
           $statement6->execute();
           $statement7 = $pdo->prepare("TRUNCATE TABLE `entrée_sortie`");
           $statement7->execute();
  //modifier les tables:
  //modifier para_générale
  $etatp=0;
  $date_a="0000-00-00";
 $para=$pdo->prepare ("UPDATE para_general SET etat =?  ");
$parag=$para->execute(array($etatp));
//modifier para_pointage
$id_p=1;
$para_po=$pdo->prepare ("UPDATE para_pointage SET etat =? ,date_act =? ,date_eval=?  WHERE  id = ? ");
$para_po=$para_po->execute(array($etatp,$date_a,$date_a,$id_p));
}


?>


        <!-- Font Awesome -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<!-- Google Fonts -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Bootstrap core CSS -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Material Design Bootstrap -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        
        <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!------ Include the above in your HEAD tag ---------->




<section class="login-block"style="padding-top: 20px; padding-bottom: 34px;">
    
    
    
    <div class="container">
  <div class="row">
    <div class="col-md-4 login-sec">
        <h2 class="text-center">Connectez maintenant</h2>
       <!-- Material form login -->
<div class="card" style="box-shadow: none; background-color: transparent;">
  <?php if(empty($errors)){ echo $message ; } ?>
  <form method="POST">
  <!-- Large input -->
<div class="md-form form-lg">
  <input type="text" id="inputLGEx" class="form-control form-control-lg" name="Nom_Utilisateur" required>
  <label for="inputLGEx">Nom d'utilisateur</label>
  <?php
           echo show_error('user_name') ?> 
</div>
<!-- Large input -->
<div class="md-form form-lg">
  <input type="password" id="inputLGEx" class="form-control form-control-lg" name="Mot_de_passe" required>
  <label for="inputLGEx">Mot de passe</label>
  <?php 
          echo show_error('Mot_de_passe') ?> 
          
</div>
<div class="md-form " style="margin-left:50%;color:#ff7043">
  <a href="reset_pw.php" for="inputreset" style="color:#ff7043 ">Mot de passe oublié !</a>
  <?php 
          echo show_error('Mot_de_passe') ?> 
          
</div>

<button type="submit" class="btn btn-deep-orange" name="submit">Connexion</button>

  
    
  <!--Card content-->
  <div class="card-body px-lg-3 pt-0">

    <!-- /Form -->
    </form>
    

     

    
  

  </div>

</div>
<!-- Material form login -->

    </div>
    <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
        
      <img class="d-block img-fluid" src="photo/zjaj.jpg" alt="First slide" style="height: 550px; width: 730px; -webkit-box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);
-moz-box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);
box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);">
      
      
      <div class="carousel-caption d-none d-md-block">
       
        <div class="banner-text">
            
        </div>  
  </div>
    </div>
    <div class="carousel-item">
        
      <img class="d-block img-fluid" src="photo/batima.jpg" alt="First slide" style="height: 550px;width: 730px;-webkit-box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);
-moz-box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);
box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);">
      
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            
        </div>  
    </div>
    </div>
    <div class="carousel-item">
        
      <img class="d-block img-fluid" src="photo/bab.jpg" alt="First slide" style="height: 550px;width: 730px;-webkit-box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);
-moz-box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);
box-shadow: 2px 4px 6px 0px rgba(110,104,110,1);">
      
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            
        </div>  
    </div>
  </div>
            </div>     
        
    </div>
  </div>
</div>
</section>
<style type="text/css">


/*-----------MEDIA QUERIES*/

@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
   background-color: #9fa9a3; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 200px 0;
}
.banner-sec{ no-repeat left bottom; background-size:cover; min-height:600px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#f0f0f0; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color:#ff7043;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}

.banner-text{width:100%; position:absolute; bottom:10px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
</style>







