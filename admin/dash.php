<?php
require '../bdd.php';

require 'dashboard_admin.php';


/*document.getElementById("opt").innerHTML = document.getElementById("opt").innerHTML+
  '  <div class="col"><label  for="exampleForm2">Date de début du congé :</label> <div class="md-form mt-0">'+
        '<input type="text" class="form-control" name="dateFPvEn" style="border-bottom: 2px solid #bd5734"></div> </div>'+'<div class="col">
      +'<label  for="exampleForm2">Date de début du congé :</label>+'<div class="md-form mt-0">+
        '<input type="text" class="form-control" name="dateFPvEn" style="border-bottom: 2px solid #bd5734"></div></div><div class="col">'+
    '<label  for="exampleForm2">Date de début du congé :</label><div class="md-form mt-0">'+
'<input type="text" class="form-control" name="dateFPvEn" style="border-bottom: 2px solid #bd5734"></div></div>';
  }
  */
  $mon_mot_de_passe = Genere_Password(10); 
echo $mon_mot_de_passe ;
echo date('H:m:s');
function redirect($page){
  header('location'.$page);
}
   $iddd="location:dashboard.php?id=".$id;
           header($iddd);
?>

