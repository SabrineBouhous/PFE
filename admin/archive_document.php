 <head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archive des documents pris</title> 
    
</head> 
<?php
require '../bdd.php';
require 'dashboard_admin.php';


$query = $pdo->query("SELECT * FROM  archive_document INNER JOIN employé ON (archive_document.idemp=employé.idemp)");
$resultat = $query->fetchAll();



?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


 



 


<div class="container-2" style="margin-bottom: 50px;margin-left:2% ;margin-top: -8%">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fas fa-file-archive"></i> Archive des documents </h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href="archive.php?id=<?php echo $id ?>"> Archives</a> / <a href=""> Archive des documents </a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:47%;font-size: 15px;display: inline;">
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

  
<div class="grid-container" id="alld" >
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">

<div class="dropdown" style="margin-left:1%;height:6%;background-color:#bd5734;border:1px solid #bd5734;border-radius:7%;display: inline;margin-top: 0%">
  <button onclick="drp()" style="height:100%;background-color:#bd5734;border:1px solid #bd5734;border-radius:7%;color: white margin-left:5% ;color: white" >Archive de ...</button>
  <div id="myDropdown" class="dropdown-content">
    <button class ="btn"  onclick="showb()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%" >Bordereau d’envoi </button>
        <button class ="btn" onclick="showins()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">PV d'installation</button>
    <button class ="btn"  onclick="showent()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">PV d'entreé</button>
    <button class ="btn" onclick="showavertis()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%">Avertissement</button>
    <button class ="btn"  onclick="showrnsg()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">Renseignement</button>
    <button class ="btn"  onclick="showrentst()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">Entrée/sortie</button>
     <button class ="btn"  onclick="showaju()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">Ajustement mensuel</button>
      <button class ="btn"  onclick="showcarte()"  style="background-color: transparent; color: black;border:none;;width:90%;margin--right:2%"name="pv_recrutement">Carte de score</button>

  </div>
</div>

<button type="button" style="margin-left:85%;height:6%;background-color:#bd5734;border:1px solid #bd5734;border-radius:7%;color: white"><a href="exporter_archive.php?type=doc_archive">Exporter en PDF</a></button>


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
                <td><?php if(isset($resultat[$key]['nom'])) { echo  $resultat[$key]['nom']; }else{ echo " "; } ?></td>
                <td> <?php if(isset($resultat[$key]['Prénom'])){ echo  $resultat[$key]['Prénom']; }else { echo " "; } ?></td>
                <td> <?php echo $resultat[$key]['Nom_document'] ; ?></td>
                <td> <?php echo $resultat[$key]['Date_docu'] ; ?></td>

 </tr>
 
 
 <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  

<!-- archive avertissement-->
<div class="grid-container"  style=" display: none;" id="ave">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                <th style="width:9%">PV des avertissements de</th>
                <th style="width:9%">Date</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/avertissement";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode("-",$name_pdf);
             $E=$n[0];
$query = $pdo->query("SELECT * FROM employé WHERE idemp='$E'");
$resultat = $query->fetch();
            $filePath=$nom_repertoire."/". $name_pdf;
            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>
                <td><?php if (isset($resultat['nom']) &&(isset($resultat['Prénom']))) {
                  echo  $resultat['nom']." ".$resultat['Prénom'];
                }else{ echo " "; } ?></td>
                <td><?php echo $n[1]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo $filePath ?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>

<!-- bourderaux-->

<div class="grid-container" style=" display: none;" id="b">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                
                <th style="width:9%">Date</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/Bordereau";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode(".",$name_pdf);
             $filePathe=$nom_repertoire."/". $name_pdf;
             

            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>

        
                
                <td><?php echo $n[0]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo  $filePathe?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>
  <!-- erchive pv instalation-->
  <div class="grid-container" style=" display: none;" id="ins" >
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                <th style="width:9%">PV d'installation de</th>
                <th style="width:9%">Date</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/pv_installation";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode("-",$name_pdf);
             $E=$n[0];
$query = $pdo->query("SELECT * FROM  employé WHERE idemp='$E'");
$resultat = $query->fetch();
            $filePathee=$nom_repertoire."/". $name_pdf;
            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>

        
                <td><?php if (isset($resultat['nom']) &&(isset($resultat['Prénom']))) {
                  echo  $resultat['nom']." ".$resultat['Prénom'];
                }else{ echo " "; } ?></td>
                <td><?php echo $n[1]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo $filePathee ?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>
    <!-- PV d'entrée-->
    <div class="grid-container"  style=" display: none;" id="entr" >
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                <th style="width:9%">PV d'entrée de</th>
                <th style="width:9%">Date</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/Pv_entreé";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode("-",$name_pdf);
             $E=$n[0];
             $f=explode(".",$n[0]);
$query = $pdo->query("SELECT * FROM  employé WHERE idemp='$E'");
$resultat = $query->fetch();
            $filePath=$nom_repertoire."/". $name_pdf;
            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>

        
                <td><?php if (isset($resultat['nom']) &&(isset($resultat['Prénom']))) {
                  echo  $resultat['nom']." ".$resultat['Prénom'];
                }else{ echo " "; } ?></td>
                <td><?php echo $f[0]."-".$n[2]."-".$n[1]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo $filePath ?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>
    <div class="grid-container" style=" display: none;" id="rnsg">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                <th style="width:9%">Questionnaire de </th>
                <th style="width:9%">Date</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/Rnsg";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode("-",$name_pdf);
             $E=$n[0];
$query = $pdo->query("SELECT * FROM  employé WHERE idemp='$E'");
$resultat = $query->fetch();
            $filePath=$nom_repertoire."/". $name_pdf;
            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>

        
                <td><?php if (isset($resultat['nom']) &&(isset($resultat['Prénom']))) {
                  echo  $resultat['nom']." ".$resultat['Prénom'];
                }else{ echo " "; } ?></td>
                <td><?php echo $n[1]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo $filePath ?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>
    <!--entrée/sortie-->
    <div class="grid-container" style=" display: none;" id="entrées">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                
                <th style="width:9%">Année</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/entree_sortie";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode(".",$name_pdf);
             $filePathe=$nom_repertoire."/". $name_pdf;
             

            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>

        
                
                <td><?php echo $n[0]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo  $filePathe?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>
     <!--ajustement mansuel-->
    <div class="grid-container" style=" display: none;" id="ajustement">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                
                <th style="width:9%">Mois / année</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/ajustement_mensuel";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode(".",$name_pdf);
             $filePathe=$nom_repertoire."/". $name_pdf;
             

            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>

        
                
                <td><?php echo $n[0]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo  $filePathe?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>
      <!--carte-->
    <div class="grid-container" style=" display: none;" id="carte">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<table id="example" class="table table-striped table-bordered table-list-search" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">#</th>
                
                <th style="width:9%">Année</th>
                <th style="width:9%">Document (PDF)</th>
                
            </tr>

            
        </thead>
        <tbody>
         <?php
          $nom_repertoire ="../Document_employé/carte_score";

          $pointeur = opendir($nom_repertoire);
   $v=1;
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
    while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      { 

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
             $name_pdf=$name_pdf.".pdf";
             $n=explode(".",$name_pdf);
             $filePathe=$nom_repertoire."/". $name_pdf;
             

            
          ?>
          <tr>
          <td><?php echo  $v++ ?></td>

        
                
                <td><?php echo $n[0]  ?></td>
                <td><a type="button"class="btn btn-brown" href="<?php echo  $filePathe?>">Consulter</a></td>
                </tr>
      <?php }   } } ?>
                </tbody>
        </table>
      </div>
    </div>
      </div>
</div>



<style type="text/css">
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

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
  text-decoration:none;
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

 function showavertis(){
  var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("ave");
     y.style.display = "block";
}
 function showb(){
  var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("b");
     y.style.display = "block";
}
 function showins(){
  var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("ins");
     y.style.display = "block";
}
function showent(){
  var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("entr");
     y.style.display = "block";
}
function showrnsg(){
  var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("rnsg");
     y.style.display = "block";
}
function showrentst(){
  var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("entrées");
     y.style.display = "block";
}
function showaju() {
 var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("ajustement");
     y.style.display = "block";
}
function showcarte(){
   var x = document.getElementById("alld");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("carte");
     y.style.display = "block";
}

</script>