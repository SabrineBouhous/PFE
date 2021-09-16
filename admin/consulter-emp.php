<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
   function succes_mod(){
     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Aucun employé été selectioné!',
  footer: '<a href="a.php">selectioner un employé </a>'
})}

  function succes_ajout(){
   Swal.fire({
   icon: 'success',
  title: 'Vous avez ajouter un nouveau empoyé avec succes',
  showConfirmButton: false,
  timer: 1900
})
  }

function error(){
 Swal.fire({
  
  icon: 'error',
  title: 'Une érreur est survenu , veuillez esseyer plus tard',
  showConfirmButton: false,
  timer: 1900
})
  }

</script>
                


<?php
require 'dashboard_admin.php';
$id=$_GET['id'];
$idemp=$_GET['idemp'];
$date=date("Y-m-d h:m:s");
$type="pv_recrutement";
$admin= "Administrateur personnel";
if (isset($_POST["pv_recrutement"])){?>
  <script type="text/javascript">
 window.open('PV_recrutement.php?id=<?php echo $id; ?>&idemp=<?php echo $idemp ?>', '_blank');
    </script>
<?php }
if (isset($_POST["Avertisement"])) {
  $en=$_POST["dateabs"];
  $nb=$_POST["opt"];?>
  <script type="text/javascript">
 window.open('Avertissement.php?id=<?php echo $id; ?>&idemp=<?php echo $idemp ?>&dateabs=<?php echo $en ?>&nb=<?php echo $nb ?>');
    </script>
<?php }
if (isset($_POST["pv_d'entrée"])) {
  $en=$_POST["datePvEn"];
  $sr=$_POST["dateFPvEn"];?>

  <script type="text/javascript">
 window.open('PV_entrée.php?id=<?php echo $id; ?>&idemp=<?php echo $idemp ?>&dateent=<?php echo $en ?>&datesort=<?php echo $sr ?>', '_blank');
    </script>
<?php }
if (isset($_POST["fiche"])) {
$idemp=$_GET['idemp'];
$query = $pdo->query("SELECT * FROM employé WHERE idemp = '$idemp' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable) {
if ($resultat[$key]['Emploi'] !='Enseignant') { ?>
<script type="text/javascript"> 
        window.open('fiche_info.php?id=<?php echo $id; ?>&idemp=<?php echo $idemp ?>');
    </script>
<?php
}else{ ?>
<script type="text/javascript"> 
        window.open('fiche_info_prof.php?id=<?php echo $id; ?>&idemp=<?php echo $idemp ?>', '_blank');
    </script>
<?php }}}
?>


 
<body>
<div class="container-2" style="margin-bottom: 50px;margin-left:2% ;margin-top: -8%">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fa fa-users"></i>Détails d'employé</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">

          <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href="ess.php?id=<?php echo $id ?>"> Gestion d'employés</a> / <a href="">Détails d'employé</a>
<div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:42%;font-size: 15px;display: inline;">

            <i class="fa fa-calendar"></i>
             <span class="date-range">
               <?php
               setlocale(LC_TIME, "fr_FR");
               $ddd=date('l');
               
                echo retourner_day($ddd)."-".date('d-m-y') ?>
             </span> 
           </div>
       </li>
        </ol>
       </div>
      </div>


<div class="container" style="" >
<div class="row">


      <div class="col-xs-1 col-sm-7">
      	<?php
    $id=$_GET['idemp'];
$query = $pdo->query("SELECT * FROM `employé` WHERE idemp= '$id' ");
$resultat = $query->fetchAll();
foreach ($resultat as $key => $variable){ ?>
      	<form >
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
         <h2 style="padding-bottom:20px"><i>Informations administrative :</i></h2>
       <div class="form-row" >
       	    <div class="form-group col-md-4">
      <label for="inputPassword4">Date d'entrée</label>
      <input type="text" class="form-control" id="inputPassword4" value=" <?php echo $resultat[$key]['DateEntré'] ?> " readonly style=" border: none;border-bottom: 1px solid red; background-color: transparent;">
    </div>
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

</div>
</form>
        <!-- Horizontal material form -->
<form style="margin-top: 40px;padding-top:20px; border-top:2px solid purple; background-color: white; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);width:100%;padding-left: 20px; padding-right: 20px;">
 <h5 style="padding-bottom:20px"><i>Informations de contact:</i></h5>
  <!-- Grid row -->
  <div class="form-group row">
    <!-- Material input -->
    <label for="inputEmail3MD" class="col-sm-2 col-form-label">Adresse</label>
    <div class="col-sm-10" style="padding-left: 50px;">
      <div class="md-form mt-0">
        <input type="email" class="form-control" id="inputEmail3MD" value="<?php echo $resultat[$key]['Adresse'] ?>" readonly style=" border: none;border-bottom: 1px solid purple; background-color: transparent;">
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
        <input type="text" class="form-control" id="inputPassword3MD" value="<?php echo $resultat[$key]['Numero_Tel'] ?>" readonly style=" border: none;border-bottom: 1px solid purple; background-color: transparent; ">
      </div>
    </div>
  </div>
   <div class="form-group row">
    <!-- Material input -->
    <label for="inputPassword3MD" class="col-sm-2 col-form-label" >Email</label>
    <div class="col-sm-10" style="padding-left: 50px;">
      <div class="md-form mt-0">
        <input type="text" value="<?php echo "Nour.elhouda@gmail.com" ?>" class="form-control" id="inputPassword3MD" readonly style=" border: none;border-bottom: 1px solid purple; background-color: transparent; ">
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Grid row -->

  <!-- Grid row -->
  
  <!-- Grid row -->
</form>
<div style="border-top:2px solid #bd5734;padding-top:20px;  background-color: white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);">
 <h5 style="padding-bottom:20px;margin-left: 5%"><i>Documents :</i></h5>
 <div class="form-group row" style="padding-left: 15%">
    <div class="dropdown">
  <button onclick="drp()" class="btn"style="height:100%;background-color:#bd5734;border:1px solid #bd5734;color: white ;width:108%" >Autres documents</button>
  <div id="myDropdown" class="dropdown-content">
  	    <button class ="btn"  data-toggle="modal" data-target="#dateentrée " style="background-color: #bd5734; color: white;width:80%;margin-left:10%">pv_d'entrée</button>
    <button class ="btn"  data-toggle="modal" data-target="#dateent " style="background-color: #bd5734; color: white;width:80%;margin-left:10%">Avertisement</button>
    <form method="POST">
    <button class ="btn" style="background-color: #bd5734; color: white;width:80%;margin-left:10%"name="pv_recrutement">pv_d'instalation</button>
      </form>
  </div>
</div>
</div>
<br>
<div class="form-group row" style="padding-left: 15%">
     <form method="POST">
    <button class="btn" style="background-color: #bd5734; color:white;width:100%" name="fiche" >Fiche d'informations</button>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

   <div class="modal fade" id="dateentrée" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
          <div class="row">
    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de rentrée : </label>
      <div class="md-form mt-0">
        <input type="date"  type="date"name="datePvEn" class="form-control" style="border-bottom: 2px solid  #bd5734;">
      </div>
    </div>
    <!-- Grid column -->
    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de début du congé :</label>
      <div class="md-form mt-0">
        <input type="date" class="form-control" name="dateFPvEn" style="border-bottom: 2px solid  #bd5734;">
      </div>
    </div>
    <!-- Grid column -->
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="pv_d'entrée" >Ajouter</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>
<div class="modal fade" id="dateent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <label  for="exampleForm2"   style="margin-left:6%">Choisir le numéro d'avertissement: </label>
      <div class="md-form mt-0">
        <select class="form-control" name="opt" style="width: 80%;border-color:transparent;border-bottom: 2px solid yellow; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
          <?php for ($i=1; $i <6 ; $i++) {  ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>

      <?php  } ?>
          
        </select>
    </div>
</div>
          <div class="row">
    <!-- Grid column -->
    <div class="col" style="margin-left: 40px;margin-right: 40px;">
      <!-- Material input -->
      <label  for="exampleForm2">Date d'absence : </label>
      <div class="md-form mt-0">
        <input type="date"  type="date"name="dateabs" class="form-control" style="border-bottom: 2px solid yellow">
      </div>
    </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Avertisement" >Ajouter</button>
      </div>
    </div>
  </form>
  </div>
</div>

</body>

    <style>
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
  position: relative;
  display: inline-block;
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
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function drp() {
  document.getElementById("myDropdown").classList.toggle("show");

}
</script>







