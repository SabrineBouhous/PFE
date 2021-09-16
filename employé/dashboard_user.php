       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

       function succes(){
   Swal.fire({
  
  icon: 'success',
  title: 'Votre demande a été envoyé avec success',
  showConfirmButton: false,
  timer: 1900
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

  <?php
   
require '../bdd.php';
require '../function.php';

 session_start();
if (isset($_POST['logout'])) {
  
  session_unset();
  session_destroy();
  header("location: login.php");
}
if (empty($_SESSION['Nom_Utilisateur'])) {
  header("location: ../login.php");
}
$id=$_GET['id'];
$query = $pdo->query("SELECT * FROM `notification_user` WHERE statu=0 AND idemp='$id' ORDER BY id DESC ");
$result = $query->fetchAll();
$nb = count($result);
$query = $pdo->query("SELECT * FROM `notification_user`");
$resultat = $query->fetchAll();
$querydeux = $pdo->query("SELECT * FROM `notification_user` WHERE statu=1");
$resultdeux = $querydeux->fetchAll();
$query4 = $pdo->query("SELECT * FROM `employé` WHERE idemp='$id'");
$result4 = $query4->fetchAll();

foreach ($result4 as $key => $variable) { 
  $nom_emp=$result4[$key]['nom'];
  $prenom_emp=$result4[$key]['Prénom'];
  $matri_emp=$result4[$key]['Matricule'];
  $emploi=$result4[$key]['Emploi'];
  $id_groupe=$result4[$key]['id_groupe'];
}
$query5 = $pdo->query("SELECT * FROM `groupe` WHERE id_groupe='$id_groupe'");
$result5 = $query5->fetchAll();

foreach ($result5 as $key => $variable) { 
  $de1=$result5[$key]['de1'];
  $jusqua1=$result5[$key]['jusqu\'a1'];
  $de2=$result5[$key]['de2'];
  $jusqua2=$result5[$key]['jusqu\'a2'];
  
}


$date = strftime("%d %B %Y");


$time=date('H:i:s');
$query6= $pdo->query("SELECT * FROM `pointage` WHERE idemp='$id'");
$result6= $query6->fetchAll();
$count=count($result6);

foreach ($result6 as $key => $variable) { 
  $pointage_entrée =$result6[$key]['pointage_entrée'];
  $pointage_sortie =$result6[$key]['pointage_sortie'];

}

if (isset($_POST['pointerEntré'])) {
  $pointage="oui";
 $resquete=$pdo->prepare ("UPDATE `pointage` SET `pointage_entrée` = '$pointage' WHERE idemp='$id'");
 if($resquete->execute()){  ?>
<script>

</script>
<?php }else{ ?>
<script>

 </script> <?php
}
}

if (isset($_POST['pointerSortie'])) {
  $pointage="oui";
 $resquete=$pdo->prepare ("UPDATE `pointage` SET `pointage_sortie` = '$pointage' WHERE idemp='$id'");
 if($resquete->execute()){  ?>
<script>
        
</script>
<?php }else{ ?>
<script>

 </script> <?php
}
}
if (isset($_POST['pointerprof'])) {
   $h=$_POST['heure'];
   $jouract=date("l");
      $jour=retourner_day($jouract);
  $query = $pdo->query("SELECT * FROM `planning` WHERE idemp='$id' AND de='$h' AND jour='$jour' ");
$resultat = $query->fetchAll();
  foreach ($resultat as $key => $value) {
$jour=$resultat[$key]['jour'];
$id_pla=$resultat[$key]['id'];
  } 
  if ($jour="dimanche") {
  $ressquete=$pdo->prepare ("UPDATE `dimanche` SET `pointag` = 'oui' WHERE id_prof='$id' AND id_planning='$id_pla' ");
 $ressquete->execute();
   }
   if ($jour="lundi") {
  $ressquete=$pdo->prepare ("UPDATE `lundi` SET `pointag` = 'oui' WHERE id_prof='$id' AND id_planning='$id_pla' ");
 $ressquete->execute();
   }
   if ($jour="mardi") {
  $ressquete=$pdo->prepare ("UPDATE `mardi` SET `pointag` = 'oui' WHERE id_prof='$id' AND id_planning='$id_pla' ");
 $ressquete->execute();
   }
   if ($jour="mercredi") {
  $ressquete=$pdo->prepare ("UPDATE `mercredi` SET `pointag` = 'oui' WHERE id_prof='$id' AND id_planning='$id_pla' ");
 $ressquete->execute();
   }
  }




  $date_act=date('Y-m-d');


//mahdar dokhol w khoroj
$debuann = $pdo->query("SELECT * FROM `para_general` WHERE id=1");
$debuann = $debuann->fetch();


?>

<?php
$query2 = $pdo->query("SELECT * FROM `employé` WHERE  idemp='$id' ");
$resultat2 = $query2->fetchAll();
foreach ($resultat2 as $key => $variable){

  $nom=$resultat2[$key]['nom'];
  $prenom=$resultat2[$key]['Prénom'];
  }
 $date_noti=date("Y-m-d H:i:s");
$type="document";
$nmdoc="attestation_travail";

if (isset($_POST['attestation_travail'])) {
$resquete=$pdo->prepare ('INSERT INTO notification_admin (idemp,nom,prenom,date_noti,Nom_document,type_notification)VALUES("'.$id.'","'.$nom.'","'.$prenom.'","'.$date_noti.'","'.$nmdoc.'","'.$type.'")');
if($resquete->execute()){ echo "."?>
   <script>
    succes()
    </script>;
    <!DOCTYPE html>
<html>
   <head>
<meta http-equiv="refresh" content="0;url=?id=<?php echo $id; ?> ">
</head>
</html>
   <?php
     }else{ echo "." ?>

   <script>
   error() 
 </script>

 <html>
   <head>
<meta http-equiv="refresh" content="0;url=?id=<?php echo $id; ?> ">
</head>
</html>
   <?php

     }
}

?>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header" style="background-color: #2C3E50;height:170px">
              <img src="../photo/logo.png" style="width:70%;margin-left:7%">
                
            </div>


            <ul class="list-unstyled components"style="background-color: #2C3E50;padding-top:30%">
                
                
                <li>
                 <a href="dashboard.php?id=<?php echo $id ?>"><h5><i class="fas fa-home"></i>   Accueil</h5></a>
                </li>
                <li>
                    <a href="#"><h5><i class="fas fa-question-circle"></i> Aide</h5></a>
                </li>
                <li>
                    <a href="contactez_nous.php?id=<?php echo $id ?>"><h5><i class="fas fa-envelope"></i> Contactez nous</h5></a>
                </li>
                <li>
                    <a href="#"><h5><i class="fas fa-info-circle"></i> A propos</h5></a>
                </li>
               
            </ul>
            <ul>

              <?php
       
              
               if ($emploi=="Professeur"){ ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal" style=" width:auto">Mon Planning</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pointage_prof" style=" width:auto">Mon pointage</button>

            <?php  }elseif ($emploi=="Employé-de-bureau" || $emploi=="agent-de-sécurité" ) { ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pointage">
  Mon pointage
</button>
           <?php   }  ?>
           <form method="POST">
                <button type="submit" class="btn btn-primary" name="attestation_travail" style=" width:auto;margin-left:-10%">attestation  de travail</button>
                </form>
                <?php
           //début d'annee
      

// pointage fin
//$date_plus = strtotime(date("Y-m-d", strtotime($date_ac)) . " +1 day");





            ?>
            </ul>

            
        </nav>

        <!-- Page Content Holder -->
        <div id="content" style="background-color: #f0f0f0">

            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <?php if ($nb>0){ ?> <span class="num" style=" color: red; cursor: pointer;"><?php echo $nb; ?></span><?php } ?>
                               <i class="fa fa-bell dropdown-toggle mr-4" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false" style="cursor: pointer;<?php if ($nb>0){ ?> color: red <?php } ?> "></i>
            <ul class="noti dropdown-menu" style="width:350px;margin-left:60% ">
          <div style="height:auto ;max-height: 300px; overflow:auto;color: black">
             <?php //la notification
        if ($nb>0){ 
         
          foreach ($result as $key => $variable)
          {?>

      <?php if ($result[$key]['type_noti']== "congé") { ?>
        <a  class="dropdown-item" id="noti" href="notification_user.php?id=<?php echo $id ?>&noti=<?php echo $result[$key]['id'];?>"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;color:black">
          <?php

                   echo "Votre demande de congé a été"." ".$result[$key]['etat'].'<br>'."||".$result[$key]['date_noti']; ?></a>  
                   <?php
                 }

                 if ($result[$key]['type_noti']=="document") { ?>
                  <a  class="dropdown-item" id="noti" href="notification_user.php?id=<?php echo $id ?>&noti=<?php echo $result[$key]['id']; ?> "  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;color:black">
                    <?php
                   echo "Votre demande de"." ".$result[$key]['Nom_document'] ." "."a été"." ".$result[$key]['etat'].'<br>'."||".$result[$key]['date_noti']; ?> </a> <?php }

                   if ($result[$key]['type_noti']=="PvEnt") { ?>
                  <a  class="dropdown-item" id="noti" href="notification_user.php?id=<?php echo $id ?>&noti=<?php echo $result[$key]['id']; ?> "  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;color:black">
                    <?php
                   echo "L'administrateur a vous préparer un PV".'<br>'. "d'entreé ".'<br>'."||".$result[$key]['date_noti']; ?> </a> <?php }
                   if ($result[$key]['type_noti']=="PvIns") { ?>
                  <a  class="dropdown-item" id="noti" href="notification_user.php?id=<?php echo $id ?>&noti=<?php echo $result[$key]['id']; ?> "  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;color:black">
                    <?php
                   echo "L'administrateur a vous préparer un PV".'<br>'. "d'installation ".'<br>'."||".$result[$key]['date_noti']; ?> </a> <?php }
                 if ($result[$key]['type_noti']=="evaluation") { ?>
                  <a  class="dropdown-item" id="noti" href="notification_user.php?id=<?php echo $id ?>&noti=<?php echo $result[$key]['id']; ?> "  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;color:black">
                    <?php
                    $n=explode("|",$result[$key]['note']);
                    $n=$n[0]+$n[1]+$n[2]+$n[3];
                   echo "Votre nouvelle évaluation est "." ".$n.'<br>'."||".$result[$key]['date_noti'];?> </a> <?php } 
                   if ($result[$key]['type_noti']=="Renseignement d'absence") { ?>
                    <a  class="dropdown-item" id="noti"     style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;color:black"> <?php
                   echo "Suite a votre absence d'hier , vous devez".'<br>'." remplir ce renseignement d'absence".'<br>'." dans les 24h suivantes ".'<br>'."||".$result[$key]['date_noti']; ?>

                     <?php 
$date_nn = new DateTime($result[$key]['date_noti']);
$date_nn->add(new DateInterval('P1D'));
$date_n= $date_nn->format('Y-m-d    H:m:s');
$date_a=date('Y-m-d H:m:s');

                     ?>
                   </a><button class="btn btn-primary" <?php if($date_a > $date_n){ ?> disabled <?php } ?>  data-toggle="modal" data-target="#RNSG">Questionnaire<?php echo $date_a;
echo $date_n; ?></button> <?php } 
     }  }else{ ?> 
           <a class="dropdown-item" id="noti" style="  text-align: center;text-decoration: none; color: #e0876a;font-weight: bold;border-bottom: 1px solid #e0876a;border-top: 1px solid #e0876a;" >aucune nouvelle notification</a>


     <?php  } ?>
     </div>
      <a  class="dropdown-item" id="noti" href="notification_user.php?id=<?php echo $id ?>" style="  text-align: center;text-decoration: none; color: #e0876a;font-weight: bold;border-bottom: 1px solid #e0876a;border-top: 1px solid #e0876a;">voir toutes les notifications</a>
</ul>
 </li>
                      <li class="nav-item active">
                        <i class="fas fa-user"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
            <ul class="noti dropdown-menu" style="width:150px;margin-left:82%;height: auto;padding-left:0%;padding-right:10% ">          
                  <form method="POST">
                <button name="logout" type="submit" class="dropdown-item" id="noti"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;: 5%"><i  class="fas fa-sign-out-alt"class="fa fa-user" style="color:black;font-size:16px; line-height:24px; width :24px;" ></i>

                <span class="text" style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;" >Déconnecter</span> </button> 
                 </form> 
                     
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



<!-- Button trigger modal -->

<?php
$query3 = $pdo->query("SELECT * FROM planning WHERE idemp='$id' ");
$resultat3 = $query3->fetchAll();
$i=1; 
 ?>
<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Votre planning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="planning" >
       <table class="table table-bordered  table-striped">
  <thead class="black white-text" style="background-color: black;color: white">
     <tr>
    <th>#</th>
    <th>Le jour</th>
    <th>De ---------- Jusqu'a</th>
    <th>La filière</th>
    <th>L'année</th>
    <th>Le Module</th>
    <th>La salle</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($resultat3 as $key => $variable){ ?>
  <tr >
        <td style="background-color: #e1e1e1;border-left: 1px solid black"><?php echo $i++ ?></td>
    <td style="background-color: white;border-left: 1px solid black"><?php echo $resultat3[$key]['jour'] ?></td>
    <td style="background-color:#e1e1e1;"><?php echo "de ".$resultat3[$key]['de']."a ".$resultat3[$key]['jusqua']  ?></td>
    <td style="background-color: "><?php echo $resultat3[$key]['filière'] ?></td>
    <td style="background-color: white"><?php echo $resultat3[$key]['année']."(ere/eme)" ?></td>
    <td style="background-color: #e1e1e1"><?php echo $resultat3[$key]['module'] ?></td>
    <td style="background-color: white;border-right: 1px solid black"><?php echo $resultat3[$key]['salle'] ?></td>

  </tr>
 <?php } ?>   
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primaryhidden-print"  id='btn' value='Print' onclick='printDiv()'>Imprimer</button>
   </div>
 </div>
</div>
</div>







<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="pointage" tabindex="-1" role="dialog" aria-labelledby="pointer"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointer">Votre pointage d'aujourd'hui</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <?php
          $date_at=date('Y-m-d');
$debuann = $pdo->query("SELECT * FROM `para_general` WHERE id=1");
$debuann = $debuann->fetch();
if($date_at==$debuann['date_debut']){
          ?>
          <form method="POST">
          <h5 style="display: inline;">Pointage d'entrée de l'anneé universitaire :</h5><span style="margin-left:18%">
            <button type="submit" class="btn btn-info " name="pointerEntréAnn" >Pointer</button>
        </form>
    <?php } 

    if($date_at==$debuann['date_fin']){
          ?>
          <form method="POST">
          <h5 style="display: inline;">Pointage de la sortie de l'anneé universitaire :</h5><span style="margin-left:18%">
            <button type="submit" class="btn btn-info " name="pointerntréAnn" >Pointer</button>
        </form>
    <?php }

      $kik = $pdo->query("SELECT * FROM pointage WHERE idem='$id' "); /*remplissage de la bdd a  avec nvmois=oui*/
    $countt=$kik->fetchAll();
    $countt=count($countt);
              if ($countt>0) {  

    if (isset($_POST['pointerEntréAnn'])) {
      
      $o="Oui";
     $ree=$pdo->prepare ("UPDATE `entrée_sortie` SET   entrée = ? WHERE  id = ? ");
$ree=$ree->execute(array($o,$id)); 
    }
if (isset($_POST['pointerntréAnn'])) {
      $o="Oui";
     $ree=$pdo->prepare ("UPDATE `entrée_sortie` SET sortie =?   WHERE  id = ? ");
$ree=$ree->execute(array($o,$id)); 
    }


     ?>
      <form method="POST">
        <div style="border:1px solid black;margin-bottom:8px">
          <?php $limiteentre=ajout_minute($de1,30);  ?>
          <h5 style="display: inline;">Pointage d'entrée :</h5><span style="margin-left:18%">[de <?php echo $de1; ?>a <?php  echo $limiteentre ?> ]</span>
           <?php if ( $time >= $de1 ) {
                if ( $time <= $limiteentre) {

 if($pointage_entrée=="non"){
          ?>
          <button type="submit" class="btn btn-info " name="pointerEntré" >Pointer</button>
    <?php  }else{?>
      <div class="alert alert-success" role="alert" style="margin: 5%;text-align:center;">Vous avez déja pointés  <i class="far fa-smile-wink"></i></div>
  <?php } ?>
<?php }else{ 

            if($pointage_entrée=="non"){
          ?>
          <div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Vous êtes en retard !! <i class="far fa-frown-open"></i> </div>

    <?php  }else{?>
      <div class="alert alert-success" role="alert" style="margin: 5%;text-align:center;">Vous avez déja pointé  <i class="far fa-smile-wink"></i></div>
  <?php }}}else{ 
      if($pointage_entrée =="non"){ ?>
<div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Il est  tôt, veuillez patienter <i class="far fa-surprise"></i></div>
  <?php  } } ?>
              
           </div>





            <?php $limitsortie=soustraire_minute($jusqua2,15);  ?>
        <div style="border:1px solid black">
          <h5 style="display: inline;">Pointage de sortie :</h5><span style="margin-left:18%">[de <?php echo $limitsortie; ?>a <?php  echo $jusqua2 ?> ]</span>
<?php if ( $time <= $jusqua2 ) {
                if ( $time >= $limitsortie) {

 if($pointage_entrée=="non"){ ?>
  <div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Vous n'avez pas pointés a  l'entrée <i class="far fa-surprise"></i></div>
        <?php }else{  if($pointage_sortie=="non"){ ?> <button type="submit" class="btn btn-info " name="pointerSortie" >Pointer</button>  <?php }else{ ?> <div class="alert alert-success" role="alert" style="margin: 5%;text-align:center;">Vous avez pointé déja <i class="far fa-smile-wink"></i></div>
 <?php }}}else{ if($pointage_entrée=="non"){ ?>
  <div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Vous n'avez pas pointés a  l'entrée <i class="far fa-surprise"></i></div>
        <?php }else{ ?> <div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Il est  tôt, veuillez patienter <i class="far fa-surprise"></i></div> <?php }

 }}else{ 

if($pointage_entrée=="non"){ ?>
  <div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Vous n'avez pas pointés a  l'entrée <i class="far fa-surprise"></i></div>
        <?php }else{ if ($pointage_sortie=="oui") {  ?>
          <div class="alert alert-success" role="alert" style="margin: 5%;text-align:center;">Vous avez pointés déja <i class="far fa-smile-wink"></i></div> 
     <?php   }else{ ?>
          <div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Vous êtes en retard !! <i class="far fa-frown-open"></i> </div>

  <?php }}} ?>


        </div>
        
      
      </form>
    <?php } ?>
      <div class="modal-footer">
        <span style="margin-left:30%">Le <?php echo $date; ?></span>
      </div>
    </div>
  </div>  
</div>
</div>
   
 <?php
  $jouract=date("l");
 $jour=retourner_day($jouract);
$query = $pdo->query("SELECT * FROM `planning` WHERE (idemp='$id' AND jour='$jour')");
$resultat2 = $query->fetchAll();
?>
<div class="modal fade" id="pointage_prof" tabindex="-1" role="dialog" aria-labelledby="pointer_prof"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow: scroll; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="pointer_prof">Votre pointage d'aujourd'hui</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
        <div style="border:1px solid black;margin-bottom:8px">
          <?php
  foreach ($resultat2  as $key => $value) {
  $de= $resultat2[$key]['de'];
  $jusqua=$resultat2[$key]['jusqua'];
 $limite=soustraire_minute($de,15) ?>
 <div>
          <h5 style="display: inline;">Pointage d'heure :</h5><span style="margin-left:17%">[de <?php  echo $de ?> à <?php echo $jusqua ?>] </span>
        </div>
           <?php 
  if ( $time >= $limite ){ 
  if ( $time <= $de ) {?>
    <form method="POST">
      <input type="hidden" name="heure" value="<?php echo $de;?>">
          <button type="submit" class="btn btn-info " name="pointerprof" style="margin-left:200px;" >Pointer </button>
    </form>
              <?php  }else{ ?>
<div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Session exprimé !! <i class="far fa-frown-open"></i> </div>
  <?php   }}else{ ?>
          <div class="alert alert-danger" role="alert"  style="margin: 5%;text-align:center;">Ops !! Il est  tôt, veuillez patienter <i class="far fa-surprise"></i></div>
  <?php   } }?>
              
           </div>

      </form>
      <div class="modal-footer">
        <span style="margin-left:30%">Le <?php echo $date; ?></span>
      </div>
    </div>
  </div>  
</div>
</div>







<div class="modal fade" id="pointage_prof" tabindex="-1" role="dialog" aria-labelledby="pointer_prof"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointer_prof">Votre pointage d'aujourd'hui</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      bodyy
      <div class="modal-footer">
        
      </div>
    </div>
  </div>  
</div>
</div>





        
             
      
    <div class="modal fade" id="RNSG" tabindex="-1" role="dialog" aria-labelledby="labelaria"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelaria">Remplissage de renseignement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form method="POST"> 
      <div class="modal-body">
                  <!--Material textarea-->
    <label for="form7">Nature de renseignement</label>
<div class="md-form">
  <textarea id="form7" class="md-textarea form-control" rows="3"name="nature"></textarea>
  
</div>
<!--Textarea with icon prefix-->
     <label for="form10">Repense de concerné</label>
<div class="md-form">
  
  <textarea id="form10" class="md-textarea form-control" rows="3"  name="Repense"></textarea>
  
</div>
 
        </div>
        
   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="EenvoyerRNG">Envoyer</button>
      </div>
       </form>
    </div>
  </div>
</div>
  

<?php
if (isset($_POST['EenvoyerRNG'])) {
  $nature=$_POST['nature'];
  $repense=$_POST['Repense'];

   ?>

      <script type="text/javascript"> 
       // window.open('../admin/Rng.php?emp=<?php //echo $_GET['id'] ?>&rep=<?php //echo $repense ?>&nat=<?php// echo $nature ?> ', '_blank');
       window.open('../admin/Rng.php?emp=<?php echo $_GET['id']; ?>&rep=<?php echo $repense; ?>&natu=<?php echo $nature; ?>', '_blank');
    </script>
<?php

}
if (isset($_POST['entreeAnn'])) {
  //modifier
  $ent="oui";
  $et=1;
  $entA=$pdo->prepare ("UPDATE entrée_sortie SET  entrée  =?, etat=? WHERE  idemp = ? ");
            $entA= $entA->execute(array($ent,$et,$id));
}
if (isset($_POST['sortieAnn'])) {
  //modifier
  $ent="oui";
  $et=1;
  $entA=$pdo->prepare ("UPDATE entrée_sortie SET  sortie  =?, etat=? WHERE  idemp = ? ");
            $entA= $entA->execute(array($ent,$et,$id));
}
?>
<style type="text/css">
	a{
		text-decoration:none;
		color: white
	}
</style>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });


  function printDiv() 
{
var divToPrint=document.getElementById('planning');

var divToPrint=document.getElementById('planning');
var newWin=window.open('','Print-Window');
newWin.document.open();
newWin.document.write('<div style="margin-top:2%;font-size:26px;text-align:center">Université de la formation continue</div>');
newWin.document.write('<div style="margin-top:0%;font-size:26px;text-align:center"> centre bouzareah</div>');
newWin.document.write('<div style="margin-top:3%;font-size:20px;">Nom :<?php echo  $nom_emp ?></div>');
newWin.document.write('<div style="margin-top:0%;font-size:20px;">Prénom :<?php echo  $prenom_emp ?></div>');
newWin.document.write('<div style="margin-top:0%;font-size:20px;">Matricule :<?php echo  $matri_emp ?></div>');
newWin.document.write('<div style="margin-top:0%;margin-bottom:4%;font-size:22px;display:inline; margin-left:80%">Le :<?php echo $date;?><br><hr></div>');
newWin.document.write('<div style="margin-top:4%;font-size:26px;text-align:center">Votre planning</div>');
newWin.document.write('<style> table{ margin-left:15%;width:70%;text-align:center;font-size:20px}</style>');
newWin.document.write('<html><body onload="window.print()">'+ divToPrint.innerHTML+'</body></html>');

newWin.document.close();
setTimeout(function(){newWin.close();},10);
}

   function popup(id_noti,){
    var popup = document.getElementById('notifi');
    
    }
    </script>


  