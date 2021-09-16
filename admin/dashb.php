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
$query4 = $pdo->query("SELECT * FROM `employé` WHERE idemp='$id'");
$result4 = $query4->fetchAll();

foreach ($result4 as $key => $variable) { 
  $nom_emp=$result4[$key]['nom'];
  $prenom_emp=$result4[$key]['Prénom'];
  $matri_emp=$result4[$key]['Matricule'];
}
$date = strftime("%d %B %Y");

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
                
            </div>

            <ul class="list-unstyled components"style="background-color: #2C3E50">
                <p>Dummy Heading</p>
                
                <li>
                 <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Admins</a>
                </li>
                <li>
                    <a href="#">Aide</a>
                </li>
                <li>
                    <a href="#">Contacter nous</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
               
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
          <div style="height:auto ;max-height: 300px; overflow-y:scroll;">
             <?php //la notification
        if ($nb>0){
         
          foreach ($result as $key => $variable)
          {?>
<a  class="dropdown-item" id="noti" href="not.php?id=<?php echo $id ; ?>&noti=<?php echo $result[$key]['id'];?>?#popup1"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;">
  <?php if ($result[$key]['type_notification']== "congé") {
                   echo $result[$key]['nom']."    ".$result[$key]['prenom']." a vous envoyé une demande ".'<br>'."du congé ".'<br>'."||".$result[$key]['date_noti']; ?></a> 
                    <?php
                 }elseif ($result[$key]['type_notification']=="document") {
                   echo $result[$key]['nom']."    ".$result[$key]['prenom']. " a vous envoyé une demande d'un(e)".'<br>'.$result[$key]['Nom_document'] .'<br>'."|| ".$result[$key]['date_noti']; } ?></a> 
 <?php } }else{ ?> 
        
         <a class="dropdown-item" id="noti" style="  text-align: center;text-decoration: none; color: #e0876a;font-weight: bold;border-bottom: 1px solid #e0876a;border-top: 1px solid #e0876a;" >aucune nouvelle notification</a>
         <img src="../photo/feu.jpg" style="width: 70%; height:70%;margin-left: 14%;margin-top: 5%" >


     <?php }?>
     </div>
      <a  class="dropdown-item" id="noti" href="notification_admin.php?id=<?php echo $id ?>" style="  text-align: center;text-decoration: none; color: #e0876a;font-weight: bold;border-bottom: 1px solid #e0876a;border-top: 1px solid #e0876a;">voir toutes les notifications</a>
</ul>
 </li>
                      <li class="nav-item active">
                        <i class="fas fa-user"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
            <ul class="noti dropdown-menu" style="width:200px;margin-left:70%;height: auto;padding-left:0%;padding-right:10% ">
                           
                <a  class="dropdown-item" id="noti"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;: 5%"><i class="fas fa-user-circle" style="color:black;font-size:16px; line-height:24px;" ></i>
                <span class="text" style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;" >Mon compt</span></a>
                <a  class="dropdown-item" id="noti"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;: 5%"><i class="fas fa-cog" style="color:black;font-size:16px;margin-right:5% " ></i>
                <span class="text" style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;" >Mes  paramètre</span></a>
                <a  class="dropdown-item" id="noti"  style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;: 5%"><i  class="fas fa-sign-out-alt"class="fa fa-user" style="color:black;font-size:16px; line-height:24px;" ></i>
                <span class="text" style="position:relative;font-family:sans-serif;top:3px;cursor:pointer;" >Déconnecter</span></a>
                     
                </ul>
                               



                            </li>
                          
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

     
 
 ?> 
        <div class="grid-container" style="margin-left: 0%; margin-right: 20%">


  <div class="button material-icons fab-icon" style="background:white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1  px 5px 0px rgba(173,168,173,1);box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width: 700px; margin-left: 0%;margin-bottom:20px">
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
  <button type="button" class="btn btn-light-green" style="margin-top:3%">Voir ces congé</button>
<?php if ( $resultat2[$key]['etat']==0) {?>
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
    

<?php }} ?>

</div>
</div>
</div> 


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
  Launch demo modal
</button> 
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
    </script>
