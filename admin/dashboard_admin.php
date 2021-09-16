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
$query = $pdo->query("SELECT * FROM `notification_admin` WHERE statu=0 ORDER BY id DESC ");
$result = $query->fetchAll();
$nb = count($result);
$query = $pdo->query("SELECT * FROM `notification_admin`");
$resultat = $query->fetchAll();
$querydeux = $pdo->query("SELECT * FROM `notification_admin` WHERE statu=1");
$resultdeux = $querydeux->fetchAll();
$d=1;
$verifier = $pdo->query("SELECT * FROM `para_pointage` WHERE id='$d' ");
$verifier_eva = $verifier->fetch();
$dateeval=$verifier_eva['date_eval'];
$inter1_eval=date("Y-m-d", strtotime("-2 days ",strtotime($dateeval)));
$inter2_eval=date("Y-m-d", strtotime("+2 days ",strtotime($dateeval)));

$date=date('Y-m-d');
if ($date >=$inter1_eval && $date<= $inter2_eval ) {
  
  $button=0;
}else{
  $button=1;
  
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
<script type="text/javascript">
  
  function succes(){
  Swal.fire({
  icon: 'success',
  title: 'Demande acceptée !',
  showConfirmButton: false,
  footer: '<a href="" type="button" rel="tooltip" ><i class="fa fa-thumbs-up" style="color: green;"></i></a>'
})
  }

    function succes_document(){
   Swal.fire({
 icon: 'success',
  title: 'La demande a été Refuser ',
  showConfirmButton: false,
  footer: '<a href="notification_admin.php?id=<?php echo $id ?> type="button" rel="tooltip" ><i class="fa fa-thumbs-up" style="color: green;"></i></a>'
})
  }

 function error(){
   Swal.fire({
  
  icon: 'warning',
  title: 'Oops...',
  text: 'Une érreur est survenu , veuillez esseyer plus tard',
 showConfirmButton: false,
  footer: '<a href="" type="button" rel="tooltip" ><i class="fa fa-thumbs-down" style="color: red;"></i></a>'
})
  }

</script>   


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Accueil</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

<div class="modal fade" id="Evaluation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Evaluer les employés</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table table-striped">
  <thead>
    <tr class="thead-dark">
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Emploi</th>
      <th scope="col">Discipline</th>
      <th scope="col">Curriculum</th>
      <th scope="col">Initiative</th>
      <th scope="col">Capacité travail</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $emp = $pdo->query("SELECT * FROM `employé` WHERE  idemp!='$id' ");
  $empl = $emp->fetchAll();
  $n=1;
foreach ($empl as $key => $value) {

 ?>
    <tr>
      <th scope="row"><?php echo $n ?></th>
      <td><?php echo $empl[$key]['nom']?></td>
      <td><?php echo $empl[$key]['Prénom']?></td>
      <td><?php echo $empl[$key]['Emploi']?></td>
    <form method="POST">
      <td><select name="<?php echo "Discipline".$empl[$key]['idemp']?>">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        

      </select></td>
      <td><select name="<?php echo "Curriculum".$empl[$key]['idemp']?>">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        

      </select></td>
      <td><select name="<?php echo "Initiative".$empl[$key]['idemp']?>">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        

      </select></td>
      <td><select name="<?php echo "Capacité".$empl[$key]['idemp']?>">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        

      </select></td>

    </tr>
  <?php $n++; } ?>
  
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm" name="evaluer">Envoyer</button>
    </form>
      </div>
    </div>
  </div>
</div>

<?php
$etat_change=0;


if (isset($_POST['evaluer'])) {

  foreach ($empl as $key => $value) { 
    
     $ideva=$empl[$key]['idemp'];
     $typee="evaluation";
     $de_la="Directeur";
     $disp= $_POST["Discipline".$empl[$key]['idemp']];
     $cur= $_POST["Curriculum".$empl[$key]['idemp']];
     $ininit= $_POST["Initiative".$empl[$key]['idemp']];
     $cap= $_POST["Capacité".$empl[$key]['idemp']];
      $evaluat=$cap+$ininit+$cur+$disp;
     //$disp,$cur,$ininit,$cap,
      //  Initiative =? , Capacité=? 
      echo $cap;
$upd=$pdo->prepare ("UPDATE employé SET Note_Directeur =? , discipline =? , Curriculum =? , Initiative =? ,Cpct =? WHERE  idemp = ? ");
if($upd->execute(array($evaluat,$disp,$cur,$ininit,$cap,$ideva))){
  
  $date=date('Y-m-d H:m');
  //$not="Discipline =".$disp."|"."Curriculum =".$cur."|"."Initiative =".$ininit."|"."Capacité de travail =".$cap;
  $not=$disp."|".$cur."|".$ininit."|".$cap;
  $n=2;
  $noti_user=$pdo->prepare ('INSERT INTO notification_user (idemp,date_noti,type_noti,note,de_la_part)VALUES("'.$ideva.'","'.$date.'","'.$typee.'","'.$not.'","'. $de_la.'")');
  $noti_user->execute();
  $etat_change=1;
  $button=1;
  
}

   
  }
  
  include 'carte_de_score.php';
  
}
if ($etat_change==1) {
  $d=1;
  $chandate_eval = $pdo->query("SELECT * FROM `para_pointage` WHERE id='$d' ");
$chang_eval = $chandate_eval->fetch();
$date_eval=$chang_eval['date_eval'];
$sem=$chang_eval['sem']+1;
  $date_eval=date("Y-m-d", strtotime("+3 month",strtotime($date_eval)));

  $changer_date=$pdo->prepare ("UPDATE para_pointage SET date_eval =? , sem =? WHERE  id = ? ");
   $changer_date->execute(array($date_eval,$sem,$d));
   $etat_change=0;


}


?>
    <div class="wrapper" >
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="thisSide" >
            <div class="sidebar-header" style="background-color: #2C3E50;height:170px">
                <img src="../photo/logo.png" style="width:70%;margin-left:7%">
            </div>

            <ul class="list-unstyled components"style="background-color: #2C3E50;padding-top:30%">
                
                
                <li>
                 <a href="dashboard.php?id=<?php echo $id ?>"><h5><i class="fas fa-home"></i>Accueil</h5></a>
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
            
           <?php $Dire = $pdo->query("SELECT * FROM `employé` WHERE  idemp='$id' ");
                 $direteur = $Dire->fetch();
                 if ( $direteur['Emploi']=="Directeur") { ?>
                   <ul><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Evaluation" <?php if ($button==1 || $verifier_eva['etat']==0 ){ ?> disabled <?php }  ?>> Evaluation</a></button></ul>
          <?php      
if ($date >=$inter1_eval && $date<= $inter2_eval && $button == 0 ) {
 ?>
<script>
    $('.toast').toast('show');
  </script>
  <?php
}
           }else{ ?>
            <ul><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal"><a href="../employé/dashboard.php?id=<?php echo $_GET['id'] ?>">Mon compte</a></button></ul>

<?php } ?>
            
        </nav>

        <!-- Page Content Holder -->
        <div id="content" style="background-color: #f0f0f0 ;">

            <nav class="navbar navbar-expand-lg bg-light" >
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
                                <?php if ($nb==0){ ?> <span class="num" style=" color: red; cursor: pointer;"><?php echo "20"; ?></span><?php } ?>
                               <i class="fa fa-bell dropdown-toggle mr-4" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false" style="cursor: pointer;<?php if ($nb==0){ ?> color: red <?php } ?> "></i>
            <ul class="noti dropdown-menu" style="width:350px;margin-left:60% ">
           <div style="height:auto ;max-height: 300px; overflow:auto;color: black">
             <?php //la notification
        if ($nb>0){
         
          foreach ($result as $key => $variable)
          {?>

  <?php if ($result[$key]['type_notification']== "congé") { ?>
                  <a  class="dropdown-item" id="noti" href="notification_admin.php?id=<?php echo $id ; ?>&noti=<?php echo $result[$key]['id'];?>"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer; color: black">
                  <?php echo $result[$key]['nom']."    ".$result[$key]['prenom']." a vous envoyé une demande ".'<br>'."du congé ".'<br>'."||".$result[$key]['date_noti']; ?></a> 
                    <?php
                 }
                 if ($result[$key]['type_notification']=="document") { ?>
                  <a  class="dropdown-item" id="noti" href="notification_admin.php?id=<?php echo $id ; ?>&noti=<?php echo $result[$key]['id'];?>"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer; color: black">
                  <?php
                   echo $result[$key]['nom']."    ".$result[$key]['prenom']. " a vous envoyé une demande d'un(e)".'<br>'.$result[$key]['Nom_document'] .'<br>'."|| ".$result[$key]['date_noti']; } ?></a> 
                   <?php
                   if ($result[$key]['type_notification']=="Renseignement") { ?>
                  <a  class="dropdown-item" id="noti"   style="position:relative;font-family:sans-serif;top:3px;cursor:pointer; color: black">
                  <?php
                   echo $result[$key]['nom']."    ".$result[$key]['prenom']. " a vous renvoyé Le questionnaire".'<br>'. "d'abscence ".'<br>'."|| ".$result[$key]['date_noti']; } ?></a> 
                 </a>
 <?php } } else{ ?> 
        
         <a class="dropdown-item" id="noti" style="  text-align: center;text-decoration: none; color: #e0876a;font-weight: bold;border-bottom: 1px solid #e0876a;border-top: 1px solid #e0876a;" >aucune nouvelle notification</a>


     <?php }?>
     </div>
      <a  class="dropdown-item" id="noti" href="notification_admin.php?id=<?php echo $id ?>" style="  text-align: center;text-decoration: none; color: #e0876a;font-weight: bold;border-bottom: 1px solid #e0876a;border-top: 1px solid #e0876a;">voir toutes les notifications</a>
</ul>
 </li>
                      <li class="nav-item active">
                        <i class="fas fa-user"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
            <ul class="noti dropdown-menu" style="width:200px;margin-left:80%;height: auto;padding-left:0%;padding-right:10% ">
                           
                <a  class="dropdown-item" id="noti"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;: 5%"><i class="fas fa-user-circle" style="color:black;font-size:16px; line-height:24px;" ></i>
                <span class="text" style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;" >Mon compte</span></a>
                <a  class="dropdown-item" href="paramettre.php?id=<?php echo $id ?>" id="noti"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;: 5%"><i class="fas fa-cog" style="color:black;font-size:16px;margin-right:5% " ></i>
                <span class="text" style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;" >Mes  paramètres</span></a>
                <form method="POST">
                <button name="logout" type="submit" class="dropdown-item" id="noti"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;: 5%"><i  class="fas fa-sign-out-alt"class="fa fa-user" style="color:black;font-size:16px; line-height:24px;" ></i>

                <span class="text" style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;" >Déconnecter</span> </button> 
                 </form>    
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
          <div id="popup1" class="overlay">
  <div class="popup"><br/>
    <a class="close" href="">×</a><br>
      <div class="a">   
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
        <div class="grid-container" style="margin-left: 0%; margin-right: 20%">


  <div class="button material-icons fab-icon" style="background:white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1  px 5px 0px rgba(173,168,173,1);box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width: 700px; margin-left: 0%;margin-bottom:20px">
<div style="height:40px;background-color: orange;margin-bottom:10px;color: white;font-size:25px;padding-left:10px"><i>Details de Notification </i></div>
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
  <button type="button" class="btn btn-light-green" style="margin-top:3%">Voir ces congé</button>
<?php if ( $resultat2[$key]['etat']==0) { ?>
<button type="button" class="btn btn-amber" data-toggle="modal" data-target="#basicExampleModal" style="margin-left:43%;margin-top:3%">Refuser</button>
<button class="btn btn-primary" type="submit"  name="Accepter" style="margin-top:3%">Accepter</button>

<?php }?>
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
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['Nom_document'] ?>" disabled style=" border: none;border-bottom: 1px solid orange; background-color: transparent;">
</div>
<form method="POST" style="margin-left:67%">
<button type="submit" name="Refuser" class="btn btn-amber" style="margin-top:3%">Refuser</button>
<button type="submit" class="btn btn-primary" name="Accepter" style="margin-top:3%">Accepter</button>
</form>


</div>
<?php }  ?>
</div>
</div>
 <?php } } } ?>

</div>
</div>
</div> 

<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
  <div class="toast-header">
    <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img">
      <rect fill="#007aff" width="100%" height="100%" /></svg>
    <strong class="mr-auto">Evaluation</strong>
    <small class="text-muted">a prtire d'aujourd'hui</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Vous pouvez évaluer vos employé a partir d'aujourd'hui jusqu'a le <?php echo $inter2_eval; ?>
  </div>
</div>


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
    </script>
</body>

</html>
<style type="text/css">
  a{
  color: white;
  text-decoration:none;
}

</style>