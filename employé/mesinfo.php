 <head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes informations</title> 
    
</head> 
<?php
require '../employé/dashboard_user.php';
$id=$_GET['id'];
if (isset($_POST['info'])){
  ?>
  <script type="text/javascript">
    alert("<?php echo $_POST['dated'];?>")
  </script>
  <?php
  $id=$_GET['id'];
  $pre=$_POST['dated'];
  $s=$_POST['rech'];
  $d=$_POST['spec'];
  $l=$_POST['emploi'];
   $p=$_POST['plus'];
  $resquete=$pdo->prepare (' INSERT INTO `more_enseignant` (`idemp`,`traveaux_recherche`,`emplois_hors_enseignement`,`date_obtention_diplome`, `plus_d\'infos`,`spécialité`)VALUES("'.$id.'","'.$s.'","'.$l.'","'.$pre.'","'.$p.'","'.$d.'")');
  if($resquete->execute()){?>
<script type="text/javascript">
  function succes_ajout(){
   Swal.fire({
  icon: 'success',
  title: 'Vous avez ajouter des informations avec succes',
  showConfirmButton: false,
  timer: 1900
})
  }
succes_ajout();
    </script>
<?php }else{
echo "hello";
}
}

$query = $pdo->query("SELECT * FROM `employé` WHERE idemp= '$id' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){ 


?>
<div class="container-2" style="margin-bottom: 50px;margin-left:2% ">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fa fa-users"></i> Mes informations</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""></i> Mes informations</a><div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:58%;font-size: 15px;display: inline;">
            <i class="fa fa-calendar"></i>
             <span class="date-range">
               <?php
               setlocale(LC_TIME, "fr_FR");
                echo date('D')."-".date('d-m-y') ?>
             </span> 
           </div>
       </li>
        </ol>
       </div>
      </div>


<div class="container" style="" >
<div class="row">


      <div class="col-xs-1 col-sm-7">
      	<form  >
          <div style="border-top:2px solid orange;background: white;padding-top:20px;  -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);width:100%;padding-left: 20px; padding-right: 20px;margin-bottom:3%">
        <h2 style="padding-bottom:20px"><i>Informations personnelles :</i></h2>

       <div class="form-row" >
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" class="form-control" id="inputEmail4"  value="<?php echo $resultat[$key]['nom']?>" readonly style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prénom</label>
      <input type="text" class="form-control" id="inputPassword4"  value="<?php echo $resultat[$key]['Prénom']?>" readonly style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
    </div>
  
    <div class="form-row">
    	  <div class="form-group col-md-4">
      <label for="inputPassword4">Sex</label>
      <input type="text" class="form-control" id="inputPassword4" value="<?php echo $resultat[$key]['sex']?>" readonly style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-4">
      <label for="inputCity">Situation familiale</label>
      <input type="text" class="form-control" id="inputCity" value="<?php echo $resultat[$key]['Situation_Familiale'] ?>" readonly style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-4">
      <label for="inputZip">Numéro de CCP</label>
      <input type="text" class="form-control" id="inputZip" value="<?php echo $resultat[$key]['N°CCP']?>" readonly style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
    </div>
    
  </div>
    
  </div>
   <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date de naissance</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?php echo $resultat[$key]['Date_de_Naissance']?>" readonly style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Lieu de naissance</label>
      <input type="text" class="form-control" id="inputPassword4"  value="<?php echo $resultat[$key]['lieu_de_Naissance']?>" readonly style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
    </div>
    
    
  </div>
 </div>
</form>
<form style="border-top:2px solid red;background: white;padding-top:20px;  -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);width:100%;padding-left: 20px; padding-right: 20px;" >
         <h2 style="padding-bottom:20px"><i>Informations administratives :</i></h2>
       <div class="form-row" >
    <!-- Default input -->
   <?php 
      $s=$resultat[$key]['Statut'];
       $query = $pdo->query("SELECT * FROM statu_employé WHERE id_statu='$s' ");
$resultat5 = $query->fetchAll();
foreach ($resultat5 as $key => $variable) { ?>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Statut</label>
      <input type="text" class="form-control" value="<?php echo $resultat5[$key]['statu'] ?>" readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
<?php } ?>
    <!-- Default input -->
    <div class="form-group col-md-4">
      <label for="inputPassword4">Date d'entrée</label>
      <input type="text" class="form-control" id="inputPassword4" value=" <?php echo $resultat[$key]['DateEntré'] ?> " readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Matricule</label>
      <input type="text" class="form-control" id="inputPassword4" value="<?php echo $resultat[$key]['Matricule'] ?>" readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
    
  </div>
   <div class="form-row" >
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Emploi</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?php echo $resultat[$key]['Emploi'] ?>" readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
     <!-- Default input -->
    <div class="form-group col-md-4">
      <label for="inputPassword4">Service</label>
      <input type="text" class="form-control" id="inputPassword4" value="<?php echo $resultat[$key]['service'] ?> " readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
    <!-- Default input -->
          <?php 
         $g=$resultat[$key]['Grade'];
    $query = $pdo->query("SELECT * FROM grade WHERE id_grade = '$g' ");
$resultat6 = $query->fetchAll();
foreach ($resultat6 as $key => $variable) { ?>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Grade</label>
      <input type="text" class="form-control" id="inputPassword4" value="<?php echo $resultat6[$key]['grade'] ?> " readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
<?php } ?>
    
  </div>
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-4">
      <label for="inputCity">Échelon</label>
      <input type="text" class="form-control" id="inputCity" value="<?php echo $resultat[$key]['Echelon']  ?>" readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-4">
      <label for="inputZip">Niveau d'étude</label>
      <input type="text" class="form-control" id="inputZip" value="<?php  echo $resultat[$key]['Niv_Détude'] ?>" readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Diplôme</label>
      <input type="text" class="form-control" id="inputZip" value="<?php echo $resultat[$key]['Diplome'] ?>" readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
  </div>
   
  <!-- Grid row -->
</form>
 </div>
      <div class="col-xs-12 col-sm-5">
        
        <!-- Contact user -->
        <form style="border-top:2px solid green;padding-top:20px;  background-color: white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);width:100%;padding-left: 20px; padding-right: 20px; ">
 <h5 style="padding-bottom:20px"><i>Informations du compte :</i></h5>
        
       <div class="form-row" >
    <!-- Default input -->
    <div class="form-group col-md-6" style="padding-left:10px;">
      <label for="inputEmail4">Nom d'utilisateur</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?php echo $resultat[$key]['Nom_Utilisateur'] ?>" readonly style=" border: none;border-bottom: 1px solid green; background-color: transparent;">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6" style="padding-right: 10px;">
      <label for="inputPassword4">Password</label>
      <input type="password"  id="myInput" class="form-control" value="<?php echo $resultat[$key]['Mot_de_passe'] ?>" readonly style=" border: none;border-bottom: 1px solid green; background-color: transparent;" >
      <br>
<input type="checkbox" onclick="myFunction()">Voir mot de passe
    </div>
</div>
</form>
        <!-- Horizontal material form -->
<form style="margin-top: 40px;padding-top:20px; border-top:2px solid yellow; background-color: white; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);width:100%;padding-left: 20px; padding-right: 20px;">
 <h5 style="padding-bottom:20px"><i>Informations de contact:</i></h5>
  <!-- Grid row -->
  <div class="form-group row">
    <!-- Material input -->
    <label for="inputEmail3MD" class="col-sm-2 col-form-label">Adresse</label>
    <div class="col-sm-10" style="padding-left: 50px;">
      <div class="md-form mt-0">
        <input type="email" class="form-control" id="inputEmail3MD" value="<?php echo $resultat[$key]['Adresse'] ?>" readonly style=" border: none;border-bottom: 1px solid yellow; background-color: transparent;">
      </div>
    </div>
  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  <div class="form-group row">
    <!-- Material input -->
    <label for="inputPassword3MD" class="col-sm-6 col-form-label" >Numéro de téléphone</label>
    <div class="col-sm-5">
      <div class="md-form mt-0">
        <input type="text" class="form-control" id="inputPassword3MD" value="<?php echo $resultat[$key]['Numero_Tel'] ?>" readonly style=" border: none;border-bottom: 1px solid yellow; background-color: transparent; ">
      </div>
    </div>
  </div>
   <div class="form-group row">
    <!-- Material input -->
    <label for="inputPassword3MD" class="col-sm-2 col-form-label" >Email</label>
    <div class="col-sm-10" style="padding-left: 50px;">
      <div class="md-form mt-0">
        <input type="text" value="<?php echo $resultat[$key]['email']?>" class="form-control" id="inputPassword3MD" readonly style=" border: none;border-bottom: 1px solid yellow; background-color: transparent; ">
      </div>
    </div>
  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  
  <!-- Grid row -->
</form>

<!-- Horizontal material form -->     <!-- Default form group -->

<!-- Default form group -->
<?php  if($resultat[$key]['Emploi']=="Enseignant"){ ?>
<div style="border-top:2px solid purple;padding-top:20px;  background-color: white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);">
 <h5 style="padding-bottom:20px"><i>Plus d'informations :</i></h5>
       
    <button class="btn btn-primary" name="fiche" data-toggle="modal" data-target="#plus-opti" >Ajouter plus d'infos </button>
</div>
<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>  
    <div class="modal fade" id="plus-opti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="height: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Plus d'informations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
          <label  for="exampleForm2"  style=" font-size: 20px; margin-top: 10%;margin-left: 10%;">Date d'obtention du dernier diplôme  </label>
          <input type="date" id="exampleForm2" class="form-control" name="dated" style="width: 80%;border-color:transparent;border-bottom: 2px solid purple; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
           <div class="form-check-inline">
             <label for="exampleForm2" style=" font-size: 20px; display: inline; margin-left: 10%;">Recherches:</label>
              <label for="exampleForm2" style=" font-size: 20px; display: inline; margin-left: 40%; ">Spécialité:</label>
            </div>
            <div class="form-check-inline">
            <textarea id="exampleForm2" class="form-control" name="rech"  style="width: 80%;border: 2px solid purple;border-top-color: transparent;margin-left: 9%;margin-top: 2%; margin-bottom: 10%;"></textarea>

          <textarea id="exampleForm2" class="form-control" name="spec"  style="width: 80%;border: 2px solid purple;border-top-color: transparent;margin-left: 10%; margin-bottom: 10%;"></textarea>
                </div>
                <label for="exampleForm2" style=" font-size: 20px; display: inline; margin-left: 10%; ">Emplois administratif hors enseignement</label>
            <textarea id="exampleForm2" class="form-control" name="emploi"  style="width: 80%;border: 2px solid purple;border-top-color: transparent;margin-left: 10%;margin-top: 2%;"></textarea>
             <label for="exampleForm2" style=" font-size: 20px; display: inline; text-align: center; margin-left: 10%; margin-top: 10%;">Plus d'infos</label>
          
            <textarea id="exampleForm2" class="form-control" name="plus"  style="width: 80%;border: 2px solid purple;border-top-color: transparent;margin-left: 10%;margin-top: 2%;"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="info">Envoyer</button>
              </div>
            </form>
    </div>
  </div>
</div>

<!-- Extended material form grid -->

<!-- Extended material form grid -->	
<style type="text/css">
	body{
    margin-top:20px;
    background:#f5f5f5;
}
/**
 * Panels
 */
/*** General styles ***/
.panel {
  box-shadow: none;
}
.panel-heading {
  border-bottom: 0;
}
.panel-title {
  font-size: 17px;
}
.panel-title > small {
  font-size: .75em;
  color: #999999;
}
.panel-body *:first-child {
  margin-top: 0;
}
.panel-footer {
  border-top: 0;
}

.panel-default > .panel-heading {
    color: #333333;
    background-color: transparent;
    border-color: rgba(0, 0, 0, 0.07);
}

/**
 * Profile
 */
/*** Profile: Header  ***/
.profile__avatar {
  float: left;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  margin-right: 20px;
  overflow: hidden;
}
@media (min-width: 768px) {
  .profile__avatar {
    width: 100px;
    height: 100px;
  }
}
.profile__avatar > img {
  width: 100%;
  height: auto;
}
.profile__header {
  overflow: hidden;
}
.profile__header p {
  margin: 20px 0;
}
/*** Profile: Table ***/
@media (min-width: 992px) {
  .profile__table tbody th {
    width: 200px;
  }
}
/*** Profile: Recent activity ***/
.profile-comments__item {
  position: relative;
  padding: 15px 16px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.profile-comments__item:last-child {
  border-bottom: 0;
}
.profile-comments__item:hover,
.profile-comments__item:focus {
  background-color: #f5f5f5;
}
       
       a{
 
  color:white;
}
#page-wrapper {
   
    padding: 0 30px;
    min-height: 100%;
    
}


#page-wrapper {
    padding: 0 15px;
    border: none;
    
}

.date-picker{    
    border-color: #138871;
    color: #fff;
    background-color: #149077;
    margin-top: -7px;
    border-radius: 0px;
    margin-right: -15px;
}

#page-wrapper .breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #e0e7e8;
    border-radius: 0px;
    
}

@media (min-width:768px){
.container-1{float:left;}

}

@media (max-width:768px){
.container-1{width:100%;}
.container-2{width:100%;}

}
.container-1:after,
.container-2:before,
{
  display: table;
  content: " ";
}
.container-1:after,
.container-2:after,
{clear: both;}



table{
    width:100%;
}
#example_filter{
    float:right;
}
#example_paginate{
    float:right;
}
label {
    display: inline-flex;
    margin-bottom: .5rem;
    margin-top: .5rem;
}
a{
  text-decoration: none;
  color: white
}
#page-wrapper {
    padding: 0 30px;
    min-height: 100%;
}

#page-wrapper {
    padding: 0 15px;
    border: none;
}
.date-picker{    
    border-color: #138871;
    color: #fff;
    background-color: #149077;
    margin-top: -7px;
    border-radius: 0px;
    margin-right: -15px;
}
#page-wrapper .breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #e0e7e8;
    border-radius: 0px;
}
@media (min-width:768px){
.container-1{float:left;}
}
@media (max-width:768px){
.container-1{width:100%;}
.container-2{width:100%;}
}
.container-1:after,
.container-2:before,
{
  display: table;
  content: " ";
}
.container-1:after,
.container-2:after,
{clear: both;}
.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}
#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}
#myInput:focus {outline: 3px solid #ddd;}
.dropdown {
  position: absolute;
  display: inline;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown a:hover {background-color: #ddd;}
.show {display: block;}

                       
</style>


<script type="text/javascript">
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>



















