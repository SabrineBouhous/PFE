<?php 


//afficher les erreurs
function show_error($key)
{
    global $errors; //Récupère la variable $errors dans la portée globale
    return !empty($errors[$key]) ? '<span class="error">'. $errors[$key] .'</span>' : ''; 
}

function redirect($page){
  header('location'.$page);
}



function ajout_minute($heure,$ajout)
{
$timestamp = strtotime("$heure");
$minute_ajout = strtotime("+$ajout minutes", $timestamp);
return $minute_ajout = date('H:i:s', $minute_ajout);
}

function soustraire_minute($heure,$minut)
{
$timestamp = strtotime("$heure");
$minute_sous = strtotime("-$minut minutes", $timestamp);
return $minute_sous = date('H:i:s', $minute_sous);
}

function lister_nom($chemin)
{

   $nom_repertoire = $chemin;
 
   $pointeur = opendir($nom_repertoire);
   
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      {

            //c'est un fichier, on l'affiche
           
            return basename($fichier, '.pdf');
    
   }
}
}


function remove($fichierAcopier , $emplacementFinal,$emplacementFinal2 ){
  if (!copy($fichierAcopier , $emplacementFinal)|| !copy($fichierAcopier , $emplacementFinal2) || !unlink($fichierAcopier)) { echo "La copie $file du fichier a échoué...\n";} 
}

function liste_mois($date_debut, $date_fin) { 
        $date_suite = array(); 
    //on flingue les tirets des dates 
    list($jour1, $mois1, $annee1) = explode("-", $date_debut); 
    list($jour2, $mois2, $annee2) = explode("-", $date_fin); 
    //on récupère le nombre de mois entre les deux dates 
    $nombre_mois = (($annee2 - $annee1)*12 + ($mois2 - $mois1)); 
    //on incrémente chaque mois depuis la date début jusquà la date fin 
    for($i = 0; $i < $nombre_mois; $i++){ 
        $mois = ($mois1 + $i); 
        //comptage du nombre de jour dans le mois +$i 
        $jour = date("j", mktime(0, 0, 0, $mois+1, 0, $annee1)); 
        //si le nombre de jour du mois +$i < au jour de la date fixée 
        if($jour < $jour1){ 
        //on mets le dernier jour du mois +$i 
            $date = date('m-Y', (mktime(0, 0, 0, $mois, $jour, $annee1))); 
        }else{ 
        //sinon on traite la meme date du mois +$i 
            $date = date('m-Y', (mktime(0, 0, 0, $mois, $jour1, $annee1))); 
        } 
        $date_suite[] = $date; 
    } 
    return $date_suite; 
} 

//returner le jour
function retourner_day($day){
  switch ($day) {
    case 'Saturday': 
     $day="samedi";
      break;
     case 'Sunday': 
     $day="dimanche";
      break;
       case 'Monday': 
     $day="lundi";
      break;
       case 'Tuesday': 
     $day="mardi";
      break;
       case 'Wednesday': 
     $day="mercredi";
      break;
       case 'Thursday': 
     $day="jeudi";
      break;
  }
  return $day;
}
function retourner_dayM($day){
  switch ($day) {
    case 'SATURDAY': 
     $day="samedi";
      break;
     case 'SUNDAY': 
     $day="dimanche";
      break;
       case 'MONDAY': 
     $day="lundi";
      break;
       case 'TUESDAY': 
     $day="mardi";
      break;
       case 'WEDNESDAY': 
     $day="mercredi";
      break;
       case 'THURSDAY': 
     $day="jeudi";
      break;
  }
  return $day;
}
function Genere_Password($size)
{
  $password="";
// Initialisation des caractères utilisables
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    for($i=0;$i<$size;$i++){
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }
    return $password;
}