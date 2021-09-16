 <head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les documents pris</title> 
    
</head> 

<?php
require '../bdd.php';
require 'dashboard_admin.php';


$query = $pdo->query("SELECT * FROM  document_adminstratif,employé WHERE document_adminstratif.idemp=employé.idemp");
$resultat = $query->fetchAll();



?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



<div class="container-2" style="margin-bottom: 50px;margin-left:2%;margin-top: -8% ">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2> <i class="fas fa-file"></i> Listes des documents pris</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""></i> Listes des documents pris</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:58%;font-size: 15px;display: inline;">
            <i class="fa fa-calendar"></i>
             <span class="date-range">
               <?php
               setlocale(LC_TIME, "fr_FR");
                echo retourner_day(date('l'))."-".date('d-m-y') ?>
             </span> 
           </div>
       </li>
          
        </ol>
       </div>
      </div>


<div class="grid-container" >
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">


<div class="dropdown" style="margin-left:1%;height:6%;background-color:#bd5734;border:1px solid #bd5734;border-radius:7%;display: inline;margin-top: 0%">
  <button onclick="drp()" style="height:100%;background-color:#bd5734;border:1px solid #bd5734;border-radius:7%;color: white ; " >Exporter Autres</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <button class ="btn"  data-toggle="modal" data-target="#Brd"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">Bordereau d’envoi </button>
        <button class ="btn"  data-toggle="modal" data-target="#PvIn"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">PV d'installation</button>
    <button class ="btn"  data-toggle="modal" data-target="#PvEn"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">PV d'entreé</button>
    <button class ="btn"  data-toggle="modal" data-target="#Aver"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">Avertissement</button>

  </div>
</div>

  <button type="button" style="margin-left:85%;height:6%;background-color:#bd5734;border:1px solid #bd5734;border-radius:7%;display: inline;"><a href="exporter_archive.php?type=docActu" style="color: white">Exporter en PDF</a></button>

<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                <th style="width:9%">Nom</th>
                <th style="width:9%">Prénom</th>
                <th style="width:5%">Document pris</th>
                <th style="width:5%">Date de la prise</th>
                
            </tr>
            
        </thead>
        <tbody>
      
 <?php
$v=1;
  foreach ($resultat as $key => $variable)
          {?>

<tr>
                <td><?php echo  $v++ ?></td>
                <td><?php echo  $resultat[$key]['nom'] ?></td>
                <td> <?php echo $resultat[$key]['Prénom'] ; ?></td>
                <td> <?php echo $resultat[$key]['Nom_document'] ; ?></td>
                <td> <?php echo $resultat[$key]['Date_docu'] ; ?></td>

 </tr>
 
 
 <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  
<div class="modal fade" id="PvEn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PV d'entreé :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">

  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de rentrée : </label>
      <div class="md-form mt-0">
        
        <input type="date"  type="date"name="datePvEn" class="form-control" style="border-bottom: 2px solid #bd5734">
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de début du congé :</label>
      <div class="md-form mt-0">
        <input type="date" class="form-control" name="dateFPvEn" style="border-bottom: 2px solid #bd5734">
      </div>
    </div>
    <!-- Grid column -->
  </div>
          
          <label  for="exampleForm2"  style=" font-size: 20px; margin-top: 10%;margin-left: 10%;">Choisir l'employé : </label>
         <?php $query9 = $pdo->query("SELECT * FROM employé ");
$resultat9 = $query9->fetchAll(); ?>
<select type="date" id="exampleForm2" class="form-control" name="empPvEn" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
 <?php foreach ($resultat9 as $key => $variable){ ?>
<option  value="<?php echo $resultat9[$key]['idemp'] ?>"><?php echo $resultat9[$key]['nom']." ".$resultat9[$key]['Prénom']." ".$resultat9[$key]['Matricule']  ?>
</option>
<?php } ?>

</select>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Fermer</button>
        <button type="submit"class="btn btn-brown" class="btn" name="pv_d'entrée" >Exporter</button>
      </div>
  </form>
  </div>
</div>
</div>

<div class="modal fade" id="PvEn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PV d'entreé :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">

  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de rentrée : </label>
      <div class="md-form mt-0">
        
        <input type="date"  type="date"name="datePvEn" class="form-control" style="border-bottom: 2px solid #bd5734">
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de début du congé :</label>
      <div class="md-form mt-0">
        <input type="date" class="form-control" name="dateFPvEn" style="border-bottom: 2px solid #bd5734">
      </div>
    </div>
    <!-- Grid column -->
  </div>
          
          <label  for="exampleForm2"  style=" font-size: 20px; margin-top: 10%;margin-left: 10%;">Choisir l'employé : </label>
         <?php $query9 = $pdo->query("SELECT * FROM employé ");
$resultat9 = $query9->fetchAll(); ?>
<select type="date" id="exampleForm2" class="form-control" name="empPvEn" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
 <?php foreach ($resultat9 as $key => $variable){ ?>
<option  value="<?php echo $resultat9[$key]['idemp'] ?>"><?php echo $resultat9[$key]['nom']." ".$resultat9[$key]['Prénom']." ".$resultat9[$key]['Matricule']  ?>
</option>
<?php } ?>

</select>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Fermer</button>
        <button type="submit"class="btn btn-brown" class="btn" name="pv_d'entrée" >Exporter</button>
      </div>
  </form>
  </div>
</div>
</div>





<div class="modal fade" id="PvEn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PV d'entreé :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">

  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de rentrée : </label>
      <div class="md-form mt-0">
        
        <input type="date"  type="date"name="datePvEn" class="form-control" style="border-bottom: 2px solid #bd5734">
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2">Date de début du congé :</label>
      <div class="md-form mt-0">
        <input type="date" class="form-control" name="dateFPvEn" style="border-bottom: 2px solid #bd5734">
      </div>
    </div>
    <!-- Grid column -->
  </div>
          
          <label  for="exampleForm2"  style=" font-size: 20px; margin-top: 10%;margin-left: 10%;">Choisir l'employé : </label>
         <?php $query9 = $pdo->query("SELECT * FROM employé ");
$resultat9 = $query9->fetchAll(); ?>
<select type="date" id="exampleForm2" class="form-control" name="empPvEn" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
 <?php foreach ($resultat9 as $key => $variable){ ?>
<option  value="<?php echo $resultat9[$key]['idemp'] ?>"><?php echo $resultat9[$key]['nom']." ".$resultat9[$key]['Prénom']." ".$resultat9[$key]['Matricule']  ?>
</option>
<?php } ?>

</select>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Fermer</button>
        <button type="submit"class="btn btn-brown" class="btn" name="pv_d'entrée" >Exporter</button>
      </div>
  </form>
  </div>
</div>
</div>

<div class="modal fade" id="PvIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PV d'installation :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
<label  for="exampleForm2"  style=" font-size: 20px; margin-top: 10%;margin-left: 10%;">Choisir l'employé : </label>
         <?php $query9 = $pdo->query("SELECT * FROM employé ");
$resultat9 = $query9->fetchAll(); ?>
<select type="date" id="exampleForm2" class="form-control" name="empPvIn" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
 <?php foreach ($resultat9 as $key => $variable){ ?>
<option  value="<?php echo $resultat9[$key]['idemp'] ?>"><?php echo $resultat9[$key]['nom']." ".$resultat9[$key]['Prénom']." ".$resultat9[$key]['Matricule']  ?>
</option>
<?php } ?>

</select>
 
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Fermer</button>
        <button type="submit"class="btn btn-brown" class="btn" name="pv_Ins" >Exporter</button>
        
      </div>
  </form>
  </div>
</div>
</div>



<div class="modal fade" id="Brd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bordoreau</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="row" >
  
    <div class="col">
      <!-- Material input -->
      <label  for="exampleForm2"   style="margin-left:6%">Choisir nombre des documents: </label>
      <div class="md-form mt-0">
        <select class="form-control" id="opt" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
          <?php for ($i=1; $i <6 ; $i++) {  ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>

      <?php  } ?>
          
        </select>
    </div>
</div>
<div class="col">
      <div class="md-form mt-0">
          <input type="button" class="btn btn-brown" onclick="myFunction()" value="envoyer" style="margin-top:15%">
      </div>
    </div>

</div>
<form method="POST">

<div class="row" id="n">
</div>

      
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Fermer</button>
        <button class="btn btn-brown" class="btn" name="Bordereau" onclick="ff()" >Exporter</button>



      </div>

  </form>
  </div>
</div>
</div>
<div class="modal fade" id="Aver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Avertissement :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
         <label  for="exampleForm2"   style="margin-left:6%">Choisir le numéro d'avertissement: </label>
      <div class="md-form mt-0">
        <select class="form-control" name ="opti" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
          <?php for ($i=1; $i <6 ; $i++) {  ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>

      <?php  } ?>
          
        </select>
    </div>

  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col" style="margin-left: 40px;margin-right: 40px;">
      <!-- Material input -->
      <label  for="exampleForm2">Date d'absence </label>
      <div class="md-form mt-0">
        
        <input type="date"  type="date"name="dateabs" class="form-control" style="border-bottom: 2px solid #bd5734">
      </div>
    </div>
  </div>
          
          <label  for="exampleForm2"  style=" font-size: 20px; margin-top: 10%;margin-left: 10%;">Choisir l'employé : </label>
         <?php $query9 = $pdo->query("SELECT * FROM employé ");
$resultat9 = $query9->fetchAll(); ?>
<select type="date" id="exampleForm2" class="form-control" name="empPvEn" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
 <?php foreach ($resultat9 as $key => $variable){ ?>
<option  value="<?php echo $resultat9[$key]['idemp'] ?>"><?php echo $resultat9[$key]['nom']." ".$resultat9[$key]['Prénom']." ".$resultat9[$key]['Matricule']  ?>
</option>
<?php } ?>

</select>
</div>

      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Fermer</button>
        <button type="submit"class="btn btn-brown" class="btn" name="avert" >Exporter</button>
      </div>
  </form>
  </div>
</div>
</div>

<script>
function myFunction() {
  var i =document.getElementById('opt').value;
    var kkkkk='<div class="row" style="margin-left:4%"><div class="col-5"><label  for="exampleForm2">Categorie des documents:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Catdoc5" id="Catdoc5" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-2"><label  for="exampleForm2">Nombre:</label><div class="md-form mt-0"><input type="number" min=1 class="form-control" name="Numdoc5" id="Numdoc5" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-5"><label  for="exampleForm2">Apréciation:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Aprdoc5" id="Aprdoc5" style="border-bottom: 2px solid #bd5734"></div></div></div>';
    var kkkk='<div class="row" style="margin-left:4%"><div class="col-5"><label  for="exampleForm2">Categorie des documents:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Catdoc4" id="Catdoc4" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-2"><label  for="exampleForm2">Nombre:</label><div class="md-form mt-0"><input type="number" min=1 class="form-control" name="Numdoc4" id="Numdoc4" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-5"><label  for="exampleForm2">Apréciation:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Aprdoc4" id="Aprdoc4" style="border-bottom: 2px solid #bd5734"></div></div></div>';
    var kkk='<div class="row" style="margin-left:4%"><div class="col-5"><label  for="exampleForm2">Categorie des documents:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Catdoc3"id="Catdoc3" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-2"><label  for="exampleForm2">Nombre:</label><div class="md-form mt-0"><input type="number" min=1 class="form-control" name="Numdoc3" id="Numdoc3" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-5"><label  for="exampleForm2">Apréciation:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Aprdoc3" id="Aprdoc3" style="border-bottom: 2px solid #bd5734"></div></div></div>';
    var kk='<div class="row" style="margin-left:4%"><div class="col-5"><label  for="exampleForm2">Categorie des documents:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Catdoc2" id="Catdoc2" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-2"><label  for="exampleForm2">Nombre:</label><div class="md-form mt-0"><input type="number" min=1 class="form-control" name="Numdoc2" id="Numdoc2" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-5"><label  for="exampleForm2">Apréciation:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Aprdoc2" id="Aprdoc2" style="border-bottom: 2px solid #bd5734"></div></div></div>';
    var k='<div class="row" style="margin-left:4%"><div class="col-5"><label  for="exampleForm2">Categorie des documents:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Catdoc1" id="Catdoc1" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-2"><label  for="exampleForm2">Nombre:</label><div class="md-form mt-0"><input type="number" min=1 class="form-control" name="Numdoc1" id="Numdoc1" style="border-bottom: 2px solid #bd5734"></div></div><div class="col-5"><label  for="exampleForm2">Apréciation:</label><div class="md-form mt-0"><input type="text" class="form-control" name="Aprdoc1" id="Aprdoc1" style="border-bottom: 2px solid #bd5734"></div></div></div>';

  if (i==1) {
  document.getElementById("n").innerHTML = document.getElementById("n").innerHTML+k;
  }
   if (i==2) {
  document.getElementById("n").innerHTML = document.getElementById("n").innerHTML+k+kk;
  }
   if (i==3) {
  document.getElementById("n").innerHTML = document.getElementById("n").innerHTML+k+kk+kkk;
  }
   if (i==4) {
  document.getElementById("n").innerHTML = document.getElementById("n").innerHTML+k+kk+kkk+kkkk
  }
   if (i==5) {
  
  document.getElementById("n").innerHTML = document.getElementById("n").innerHTML+k+kk+kkk+kkkk+kkkkk;
  }
}




     <?php   /* <label  for="exampleForm2"  style=" font-size: 20px; margin-top: 10%;margin-left: 10%;">Choisir l'employé : </label>
         <?php $query9 = $pdo->query("SELECT * FROM employé ");
$resultat9 = $query9->fetchAll(); ?>
<select type="date" id="exampleForm2" class="form-control" name="empPvIn" style="width: 80%;border-color:transparent;border-bottom: 2px solid #bd5734; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">
 <?php foreach ($resultat9 as $key => $variable){ ?>
<option  value="<?php echo $resultat9[$key]['idemp'] ?>"><?php echo $resultat9[$key]['nom']." ".$resultat9[$key]['Prénom']." ".$resultat9[$key]['Matricule']  ?>
</option>
<?php } ?>

</select>
*/?>

  //succes_ajout();
  //cat=<?php //echo $cat; ?>&nbr=<?php //echo $nbr ?>&apr=<?php //echo $apr ?>&n=i
// window.open('bordoreau.php?'.document.write(i), '_blank');
    </script>

<p id="demo"></p>

<script>
function ff() { 
 var str2 =document.getElementById('opt').value;
var str1 = "bordoreau.php?N=";
var str3 = "&cat1=";
var str4 = "&cat2=";
var str5 = "&cat3=";
var str6 = "&cat4=";
var str7 = "&cat5=";


var str13 = "&nbr1=";
var str14 = "&nbr2=";
var str15= "&nbr3=";
var str16= "&nbr4=";
var str17= "&nbr5=";


var str23 = "&apr1=";
var str24 = "&apr2=";
var str25 = "&apr3=";
var str26 = "&apr4=";
var str27 = "&apr5=";
  if (document.getElementById('opt').value==1) {

 /*var l=getElementById('opt').value;
 var s="bordoreau.php?"
 var m=s.concat(l);*/

var str9=document.getElementById('Catdoc1').value;
 

var str18=document.getElementById('Numdoc1').value;

var str28=document.getElementById('Aprdoc1').value;

var res = str1.concat(str2).concat(str3).concat(str9).concat(str13).concat(str18).concat(str23).concat(str28);
 window.open(res, '_blank');
  
}
if (document.getElementById('opt').value==2) {

  var str9=document.getElementById('Catdoc1').value;
var str10=document.getElementById('Catdoc2').value;


var str18=document.getElementById('Numdoc1').value;
var str19=document.getElementById('Numdoc2').value;


var str28=document.getElementById('Aprdoc1').value;
var str29=document.getElementById('Aprdoc2').value;

var res = str1.concat(str2).concat(str3).concat(str9).concat(str13).concat(str18).concat(str23).concat(str28).concat(str4).concat(str10).concat(str14).concat(str19).concat(str24).concat(str29);
 window.open(res, '_blank');

}
if (document.getElementById('opt').value==3) {
 var str9=document.getElementById('Catdoc1').value;
var str10=document.getElementById('Catdoc2').value;
var str11=document.getElementById('Catdoc3').value;



var str18=document.getElementById('Numdoc1').value;
var str19=document.getElementById('Numdoc2').value;
var str20=document.getElementById('Numdoc3').value;



var str28=document.getElementById('Aprdoc1').value;
var str29=document.getElementById('Aprdoc2').value;
var str30=document.getElementById('Aprdoc3').value;
var res = str1.concat(str2).concat(str3).concat(str9).concat(str13).concat(str18).concat(str23).concat(str28).concat(str4).concat(str10).concat(str14).concat(str19).concat(str24).concat(str29).concat(str5).concat(str11).concat(str15).concat(str20).concat(str25).concat(str30);
 window.open(res, '_blank');

}

if (document.getElementById('opt').value==4) {

   var str9=document.getElementById('Catdoc1').value;
var str10=document.getElementById('Catdoc2').value;
var str11=document.getElementById('Catdoc3').value;
var str12=document.getElementById('Catdoc4').value;


var str18=document.getElementById('Numdoc1').value;
var str19=document.getElementById('Numdoc2').value;
var str20=document.getElementById('Numdoc3').value;
var str21=document.getElementById('Numdoc4').value;


var str28=document.getElementById('Aprdoc1').value;
var str29=document.getElementById('Aprdoc2').value;
var str30=document.getElementById('Aprdoc3').value;
var str31=document.getElementById('Aprdoc4').value;
var res = str1.concat(str2).concat(str3).concat(str9).concat(str13).concat(str18).concat(str23).concat(str28).concat(str4).concat(str10).concat(str14).concat(str19).concat(str24).concat(str18).concat(str5).concat(str11).concat(str15).concat(str20).concat(str25).concat(str30).concat(str6).concat(str12).concat(str16).concat(str21).concat(str26).concat(str31);
 window.open(res, '_blank');

}
if (document.getElementById('opt').value==5) {


var str9=document.getElementById('Catdoc1').value;
var str10=document.getElementById('Catdoc2').value;
var str11=document.getElementById('Catdoc3').value;
var str12=document.getElementById('Catdoc4').value;
var str40=document.getElementById('Catdoc5').value;


var str18=document.getElementById('Numdoc1').value;
var str19=document.getElementById('Numdoc2').value;
var str20=document.getElementById('Numdoc3').value;
var str21=document.getElementById('Numdoc4').value;
var str22=document.getElementById('Numdoc5').value;


var str28=document.getElementById('Aprdoc1').value;
var str29=document.getElementById('Aprdoc2').value;
var str30=document.getElementById('Aprdoc3').value;
var str31=document.getElementById('Aprdoc4').value;
var str32=document.getElementById('Aprdoc5').value;
var res = str1.concat(str2).concat(str3).concat(str9).concat(str13).concat(str18).concat(str23).concat(str28).concat(str4).concat(str10).concat(str14).concat(str19).concat(str24).concat(str18).concat(str5).concat(str11).concat(str15).concat(str20).concat(str25).concat(str30).concat(str6).concat(str12).concat(str16).concat(str21).concat(str26).concat(str31).concat(str7).concat(str40).concat(str17).concat(str22).concat(str27).concat(str32);
 window.open(res);

}


}

</script>

<?php


 

if (isset($_POST["pv_d'entrée"])) {

    $en=$_POST["datePvEn"];
    $empPvEn=$_POST["empPvEn"];
    $en1=$_POST["dateFPvEn"];

    ?>
<script type="text/javascript">
  function succes_ajout(){
   Swal.fire({
  
  icon: 'success',
  title: 'Le document est enregistrer',
  showConfirmButton: false,
  timer: 1900
})
  }
succes_ajout();
 window.open('PV_entrée.php?id=<?php echo $id; ?>&idemp=<?php echo $empPvEn ?>&date=<?php echo $en ?>&dateE=<?php echo $en1 ?>', '_blank');
    </script>
<?php


 }

if (isset($_POST["pv_Ins"])) {

    
    $empPvIn=$_POST["empPvIn"];
   

    ?>
<script type="text/javascript">
  function succes_ajout(){
   Swal.fire({
  
  icon: 'success',
  title: 'Le document est enregistrer',
  showConfirmButton: false,
  timer: 1900
})
  }
succes_ajout();
 window.open('pv_recrutement.php?id=<?php echo $id; ?>&idemp=<?php echo $empPvIn ?>', '_blank');
    </script>
<?php

 }

if (isset($_POST["avert"])) {
  $nb=$_POST["opti"];
    $en=$_POST["dateabs"];
    $empPvEn=$_POST["empPvEn"];

    ?>
<script type="text/javascript">
  function succes_ajout(){
   Swal.fire({
  
  icon: 'success',
  title: 'Le document est enregistrer',
  showConfirmButton: false,
  timer: 1900
})
  }
succes_ajout();
 window.open('Avertissement.php?id=<?php echo $id; ?>&idemp=<?php echo $empPvEn ?>&dateabs=<?php echo $en ?>&nb=<?php echo $nb ?>', '_blank');
    </script>
<?php


 }

?>


<style type="text/css">
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



  $(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5,
        

       } 

        );
} );




function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function drp() {
  document.getElementById("myDropdown").classList.toggle("show");
}
function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

</script>