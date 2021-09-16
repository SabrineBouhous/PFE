
<?php
require 'dashboard_admin.php';

$id=$_GET['id'];
$emploi = $pdo->query("SELECT * FROM `employé` WHERE idemp='$id'");
$emploi = $emploi->fetch();
$de_la=$emploi['Emploi'];

$query = $pdo->query("SELECT * FROM `notification_admin` ORDER BY id DESC   ");
$resultat = $query->fetchAll();




?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<head>
    
        <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications</title> 
    
</head> 

<script type="text/javascript">
  
  function succes(){
   Swal.fire({
  
  icon: 'success',
  title: 'Le document demandé est pret a imprimer ',
  showConfirmButton: false,
  timer: 2500
})
  }

    function succes_document(){
   Swal.fire({
  
  icon: 'success',
  title: 'Le demande a été Refuser ',
  showConfirmButton: false,
  timer: 2500
})
  }

 function error(){
   Swal.fire({
  
  icon: 'warning',
  title: 'Une érreur est survenu , veuillez esseyer plus tard',
  showConfirmButton: false,
  timer: 1900
})
  }

</script>


<div class="container-2" style="margin-bottom: 50px;margin-left:2%;margin-top: -8%">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fas fa-bell"></i> Notifications</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""> <i class="fas fa-bell"></i>Notifications</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:66%;font-size: 15px;display: inline;">
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



<?php

if (isset($_GET['noti'])) {
    $id_noti=$_GET['noti'];
    $modifierstatu=$pdo->prepare ("UPDATE notification_admin SET  statu =1 WHERE  id='$id_noti' ");
    $modifierstatu->execute();



   
    
  $query2 = $pdo->query("SELECT * FROM `notification_admin` WHERE id='$id_noti'");
  $resultat2 = $query2->fetchAll();

         

foreach ($resultat2 as $key => $variable)
          {

     if ($resultat2[$key]['type_notification'] != "Renseignement") { 
     
     
 
 ?> 

<div class="grid-container" style="margin-left:7%;">

  <div class="button material-icons fab-icon" style="background:white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width: 700px; margin-left: 14%;margin-bottom:20px">
<div style="height:40px;background-color: orange;margin-bottom:10px;color: white;font-size:25px;padding-left:10px"><i>Details de Notification</i></div>
<?php if ($resultat2[$key]['type_notification']=="congé") {
	
?>

  <div class="form-row"style="margin-left:5px;margin-right:5px ">
<div class="col">
<label for="inputDisabledEx2" class="disabled" >Nom</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['nom'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<div class="col">
<label for="inputDisabledEx2" class="disabled">Prénom</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['prenom'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<div class="col">
<label for="inputDisabledEx2" class="disabled">Demande de </label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['type_notification'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>

<div class="col">
<label for="inputDisabledEx2" class="disabled">De</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['de'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<div class="col">
<label for="inputDisabledEx2" class="disabled">Jusqu'a</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['jusqua'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
</div>


<div class="form-row"style="margin-left:5px;margin-right:5px ">
<div class="col-2">
<label for="inputDisabledEx2" class="disabled">Type</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['type_congé'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<div class="col-2">
<label for="inputDisabledEx2" class="disabled">Lieu</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['lieu'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<div class="col">
<label for="inputDisabledEx2" class="disabled">Motif</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['motif'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
</div>

	
<form method="POST">
  <button type="button" class="btn btn-light-green" data-toggle="modal" data-target="#voir_ces" style="margin-top:3%">Voir ces congé</button>
<?php if ( $resultat2[$key]['etat']==0) {?>
<button type="button" class="btn btn-amber" data-toggle="modal" data-target="#basicExampleModal" style="margin-left:43%;margin-top:3%">Refuser</button>
<button type="submit" class="btn btn-primary" name="Accepter" style="margin-top:3%">Accepter</button>
<?php } ?>
</form>


<?php }else{ ?>
	<div class="form-row"style="margin-left:5px;margin-right:5px ">
<div class="col-4">
<label for="inputDisabledEx2" class="disabled" >Nom</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['nom'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<div class="col-4">
<label for="inputDisabledEx2" class="disabled">Prénom</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['prenom'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<div class="col-4">
<label for="inputDisabledEx2" class="disabled">Demande de </label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['Nom_document'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;margin-bottom: 20px">
</div>
<?php if ( $resultat2[$key]['etat']==0) {?>


<form method="POST" style="margin-left:67%">
<button type="submit" name="Refuser" class="btn btn-amber" style="margin-top:3%">Refuser</button>
<button type="submit" class="btn btn-primary" name="Accepter" style="margin-top:3%">Accepter</button>
</form>
<?php } ?>

</div>
<?php }  ?>
</div>
</div>
    

<?php }}} ?>
<div class="grid-container">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #ffa500;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">



		<table id="example" class="table table-striped table-bordered" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr><th style="width:1%">#</th>
                <th style="cursor: pointer;">Nom </th>
                <th style="cursor: pointer;">Prénom</th>
                <th style="cursor: pointer;">Date</i></th>
                <th>Concernant</th>
                <th style="cursor: pointer;" >Etat</i>
                <th> Action</th>
        		</th>
            </tr>
            
        </thead>
        
        <tbody>

 	<?php 
  $v=1;

       
       foreach ($resultat as $key => $variable) {  ?>

            <tr>
                <td><?php echo  $v++ ?></td>
                <td><?php echo  $resultat[$key]['nom'] ?></td>
                <td><?php echo $resultat[$key]['prenom'] ?></td>
                <td><?php echo $resultat[$key]['date_noti'] ?></td>
                <td><?php if ($resultat[$key]['type_notification'] == "Renseignement"){ ?> Renvoie d'un  <?php }else{ ?> Une demande d'un <?php }
                 echo $resultat[$key]['type_notification'] ?></td>
                <td><?php  if ($resultat[$key]['type_notification'] != "Renseignement"){  if($resultat[$key]['etat']==1){ echo "Traité";}else{ echo "Non Traité";}} ?></td> 
                <td><a <?php if ($resultat[$key]['type_notification'] == "Renseignement"){ ?> href="<?php echo $resultat[$key]['Nom_document'] ?>" <?php }else{ ?>  href="?id=<?php echo $id ?>&noti=<?php echo $resultat[$key]['id']  ?>" <?php } ?>> <i class="fas fa-eye" style="color: orange"></i></a></td>
                
            </tr>
        <?php } ?>
             </tbody>
         
         </table>

</div>
</div>  




<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color: orange; color: white; height:38px;padding-top: 2px">
        <h5 class="modal-title" id="exampleModalLabel">La raison de refus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
     
       <form method="POST"> 
        <div class="modal-body">
        <textarea type="text" name="raison" id="form1" class="form-control" placeholder="vous pouvez l'envoyer vide" style="border:none;border-top: 1px solid orange;border-bottom: 1px solid orange"></textarea>
      
      </div>
      <div class="modal-footer"style="padding-top: 1px;height:50px;">
        <button type="submit" class="btn btn-warning" name="Refuser" style="color: white" >Envoyer</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php 
    $date_noti=date("Y-m-d H:i:s");
    $Refuser="Refuser";
    $Accepter="Accepter";


if (isset($_POST['Accepter'])) {

  

  //remplir noti_user
    $query2 = $pdo->query("SELECT * FROM `notification_admin` WHERE id='$id_noti'");
  $resultat2 = $query2->fetchAll();
foreach ($resultat2 as $key => $variable)
          {


if ($resultat2[$key]['type_notification']=="document") {
  //notification
$resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,Nom_document,date_noti,etat,type_noti,de_la_part)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['Nom_document'].'","'.$date_noti.'","'. $Accepter.'","'.$resultat2[$key]['type_notification'].'","'.$de_la.'")');
//document
$resquet4=$pdo->prepare ('INSERT INTO document_adminstratif (idemp,Nom_document,Date_docu)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['Nom_document'].'","'.$date_noti.'")');
//archive
$resquet5=$pdo->prepare ('INSERT INTO archive_document (idemp,Nom_document,Date_docu)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['Nom_document'].'","'.$date_noti.'")');


if($resquete->execute() && $resquet4->execute() && $resquet5->execute()  ){ 
//update etat
  $modifieretat=$pdo->prepare ("UPDATE notification_admin SET  etat =1 WHERE  id='$id_noti' ");
  $modifieretat->execute(); 

  ?>

      <script type="text/javascript"> 
        succes(); 

     </script>
<?php
//insert f a table archive
  /*$resquete2=$pdo->prepare ('INSERT INTO congé (idemp,date_debut,date_fin,type_congé,Motif,Lieu)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['de'].'","'.$resultat2[$key]['jusqua'].'","'.$resultat2[$key]['type_congé'].'","'.$resultat2[$key]['motif'].'","'.$resultat2[$key]['lieu'].'")');
  
  $resquete2->execute();*/
  //3la hsab wach demanda(ykhasona)
  switch ($resultat2[$key]['Nom_document']) {
    case "attestation_travail":
    
        ?>


      <script type="text/javascript"> 
        window.open('attes_travail.php?emp=<?php echo $resultat2[$key]['idemp']?>&noti=<?php echo $id_noti ?>', '_blank');
    </script>
<?php
        break;}

 }else{ ?>

      <script type="text/javascript"> 
        error();

     </script>
<?php  }



}elseif ($resultat2[$key]['type_notification']=="congé") {
  $resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,type_noti,date_noti,etat,de_la_part)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['type_notification'].'","'.$date_noti.'","'. $Accepter.'","'. $de_la.'")');


  $resquete2=$pdo->prepare ('INSERT INTO congé (idemp,date_debut,date_fin,type_congé,Motif,Lieu)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['de'].'","'.$resultat2[$key]['jusqua'].'","'.$resultat2[$key]['type_congé'].'","'.$resultat2[$key]['motif'].'","'.$resultat2[$key]['lieu'].'")');

  $resquete3=$pdo->prepare ('INSERT INTO archive_congés (idemp,date_debut,date_fin,type_congé,Motif,Lieu)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['de'].'","'.$resultat2[$key]['jusqua'].'","'.$resultat2[$key]['type_congé'].'","'.$resultat2[$key]['motif'].'","'.$resultat2[$key]['lieu'].'")');

  
if($resquete->execute() && $resquete2->execute() && $resquete3->execute()
  ){  
  //update etat
  $modifieretat=$pdo->prepare ("UPDATE notification_admin SET  etat =1 WHERE  id='$id_noti' ");
  $modifieretat->execute();
?>

      <script type="text/javascript"> 
        succes();
        window.open('congé.php?emp=<?php echo $resultat2[$key]['idemp']?>&noti=<?php echo $id_noti ?>', '_blank');
    </script>
<?php
}else{ ?>

      <script type="text/javascript"> 
        error();

     </script>
     
<?php  }

}
  
  }}

if (isset($_POST['Refuser'])) {
 
 //update etat
  $modifieretat=$pdo->prepare ("UPDATE notification_admin SET  etat =1 WHERE  id='$id_noti' ");
  $modifieretat->execute();

  //remplir noti_user
   foreach ($resultat2 as $key => $variable)
          {

if ($resultat2[$key]['type_notification']=="document") {
$resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,Nom_document,date_noti,etat,type_noti,de_la_part)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['Nom_document'].'","'.$date_noti.'","'. $Refuser.'","'.$resultat2[$key]['type_notification'].'","'.$de_la.'")');
if ($resquete->execute()) {?>
<script type="text/javascript"> 
        succes_document(); 

     </script>
 <?php
}else {?>
<script type="text/javascript"> 
        error(); 

     </script>
 <?php   }

}elseif ($resultat2[$key]['type_notification']=="congé") {
  $resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,type_noti,date_noti,etat,Raison,de_la_part)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['type_notification'].'","'.$date_noti.'","'. $Refuser.'","'.$_POST['raison'].'","'.$de_la.'")');
if($resquete->execute()){
?>
<script type="text/javascript"> 
        succes_document(); 

     </script>
 <?php 
 }else {?>
<script type="text/javascript"> 
        error(); 

     </script>
 <?php   }

}
}
}
?>
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Liste des congés</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="planning" >
       <table class="table table-bordered  table-striped">
  <thead class="black white-text" style="background-color: black;color: white">
     <tr>
    <th>#</th>
    <th>Nom prénom</th>
    <th>Date de début congé____jusqu'a</th>
    <th>Congé pour un(e) </th>
    <th>lieu de congé </th>
    <th>Motif</th>
  </tr>
</thead>
<tbody>
   <?php
   $id_noti=$_GET['noti'];
$query = $pdo->query("SELECT * FROM `notification_admin` WHERE id='$id' AND etat=1 ");
$resultat3 = $query->fetchAll();
   $i=0;
   foreach ($resultat3 as $key => $variable){ ?>
  <tr >
        <td style="background-color: #e1e1e1;border-left: 1px solid black"><?php echo $i++ ?></td>
    <td style="background-color:#e1e1e1;"><?php echo " ".$resultat3[$key]['nom']." ".$resultat3[$key]['prenom'];  ?></td>
    <td style="background-color: "><?php echo "De".$resultat3[$key]['de']."a".$resultat3[$key]['jusqua'] ?></td>
    <td style="background-color: white"><?php echo $resultat3[$key]['type_congé']."" ?></td>
    <td style="background-color: white"><?php echo $resultat3[$key]['lieu']."" ?></td>
    <td style="background-color: #e1e1e1"><?php echo $resultat3[$key]['motif'] ?></td>

  </tr>
 <?php } ?>   
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
   </div>
 </div>
</div>
</div>
<div class="modal fade" id="voir_ces" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">liste des congés</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="planning" >
       <table class="table table-bordered  table-striped">
  <thead class="black white-text" style="background-color: black;color: white">
     <tr>
    <th>#</th>
    <th>Nom prénom</th>
    <th>Un congé pour un(e) </th>
    <th>De ---------- Jusqu'a</th>
    <th>Lieu</th>
    <th>Motif</th>
  </tr>
</thead>
<tbody>
  <?php
  $noti=$_GET['noti'];
  $query = $pdo->query("SELECT * FROM `notification_admin` WHERE id='$noti' AND etat=1 ");
$resultat3 = $query->fetchAll();
   foreach ($resultat3 as $key => $variable){ ?>
  <tr >
        <td style="background-color: #e1e1e1;border-left: 1px solid black"><?php echo $i++ ?></td>
    <td style="background-color: white;border-left: 1px solid black"><?php echo "".$resultat3[$key]['nom']." ".$resultat3[$key]['prenom'] ?></td>
    <td style="background-color: "><?php echo $resultat3[$key]['type_congé'] ?></td>
    <td style="background-color:#e1e1e1;"><?php echo "de ".$resultat3[$key]['de']."a ".$resultat3[$key]['jusqua']  ?></td>
    <td style="background-color: white"><?php echo $resultat3[$key]['lieu']."" ?></td>
    <td style="background-color: #e1e1e1"><?php echo $resultat3[$key]['motif'] ?></td>


  </tr>
 <?php } ?>   
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
   </div>
 </div>
</div>
</div>

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


</script>