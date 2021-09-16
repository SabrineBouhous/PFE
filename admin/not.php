
<?php
require 'dashboard_admin.php';


$query = $pdo->query("SELECT * FROM `notification_admin` ORDER BY id DESC ");
$resultat = $query->fetchAll();




?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript">
  
   function succes(){
  Swal.fire({
  icon: 'success',
  title: 'Demande acceptée !',
  showConfirmButton: false,
  footer: '<a href="notification_admin.php?id=<?php echo $id ?>" type="button" rel="tooltip" ><i class="fa fa-thumbs-up" style="color: green;"></i></a>'
})
  }

    function succes_document(){
   Swal.fire({
 icon: 'success',
  title: 'La demande a été Refuser ',
  showConfirmButton: false,
  footer: '<a href="notification_admin.php?id=<?php echo $id ?>" type="button" rel="tooltip" ><i class="fa fa-thumbs-up" style="color: green;"></i></a>'
})
  }

 
 function error(){
   Swal.fire({
  
  icon: 'warning',
  title: 'Oops...',
  text: 'Une érreur est survenu , veuillez esseyer plus tard',
 showConfirmButton: false,
  footer: '<a href="notification_admin.php?id=<?php echo $id ?> type="button" rel="tooltip" ><i class="fa fa-thumbs-down" style="color: red;"></i></a>'
})
  }

</script>



<div class="container" style="background-color: transparent;margin-left: 4%;margin-bottom: 30px; font-size: 35px; font-weight: bold; ">Details de notification
</div>

<div class="container" style="width: 120%;margin-left:5%;margin-bottom: 30px; height: 40px; background-color: #b2b2b2;color: white; font-size: 20px; font-weight: bold"><a  style="text-decoration: none; color: white;"  href="dashboard.php?id= <?php echo $id ?>">Dashoard</a> / <a style="text-decoration: none; color: white;" href="">Notification</a>
</div>    



<?php

if (isset($_GET['noti'])) {
    $id_noti=$_GET['noti'];
    $modifierstatu=$pdo->prepare ("UPDATE notification_admin SET  statu =1 WHERE  id='$id_noti' ");
    $modifierstatu->execute();



   
    
} ?>
 




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

  //update etat
  $modifieretat=$pdo->prepare ("UPDATE notification_admin SET  etat =1 WHERE  id='$id_noti' ");
  $modifieretat->execute();

  //remplir noti_user
    $query2 = $pdo->query("SELECT * FROM `notification_admin` WHERE id='$id_noti'");
  $resultat2 = $query2->fetchAll();
foreach ($resultat2 as $key => $variable)
          {


if ($resultat2[$key]['type_notification']=="document") {
$resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,Nom_document,date_noti,etat,type_noti)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['Nom_document'].'","'.$date_noti.'","'.$Accepter.'","'.$resultat2[$key]['type_notification'].'")');
$resquete2=$pdo->prepare ('INSERT INTO document_adminstratif (idemp,Nom_document,Date_docu)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['Nom_document'].'","'.$date_noti.'")');
if($resquete->execute()&&$resquete2->execute()){?>

      <script type="text/javascript"> 
        succes(); 

     </script>
<?php

  switch ($resultat2[$key]['Nom_document']) {
    case "fiche de travail": ?>

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
  $resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,type_noti,date_noti,etat)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['type_notification'].'","'.$date_noti.'","'. $Accepter.'")');

  $resquete2=$pdo->prepare ('INSERT INTO congé (idemp,date_debut,date_fin,type_congé,Motif,Lieu)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['de'].'","'.$resultat2[$key]['jusqua'].'","'.$resultat2[$key]['type_congé'].'","'.$resultat2[$key]['motif'].'","'.$resultat2[$key]['lieu'].'")');
  

if($resquete->execute() && $resquete2->execute()){  
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
<?php }

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
$resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,Nom_document,date_noti,etat,type_noti)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['Nom_document'].'","'.$date_noti.'","'. $Refuser.'","'.$resultat2[$key]['type_notification'].'")');
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
  $resquete=$pdo->prepare ('INSERT INTO notification_user (idemp,type_noti,date_noti,etat,Raison)VALUES("'.$resultat2[$key]['idemp'].'","'.$resultat2[$key]['type_notification'].'","'.$date_noti.'","'. $Refuser.'","'.$_POST['raison'].'")');
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

</style>
<script type="text/javascript">




  $(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5,
        "aaSorting": [[0, "desc"]],
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