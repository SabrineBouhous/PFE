 <head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gérer mes congés</title> 
    
</head> 
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


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
require 'dashboard_user.php';

$id=$_GET['id'];
$i=00;
$query = $pdo->query("SELECT * FROM `congé`  WHERE  idemp='$id' ");
$resultat = $query->fetchAll();



$query2 = $pdo->query("SELECT * FROM `employé` WHERE  idemp= '$id' ");
$resultat2 = $query2->fetchAll();
foreach ($resultat2 as $key => $variable){

  $nom=$resultat2[$key]['nom'];
  $prenom=$resultat2[$key]['Prénom'];

  }




//envoyer la demande de congé
$query3= $pdo->query("SELECT * FROM `autre_congé`");
$resultat3= $query3->fetchAll();
foreach ($resultat3 as $key => $variable){

  $nbrmax=$resultat3[$key]['nombre_max'];

}

if (isset($_POST['submit'])) {
  // date de debut et de fin
$range=$_POST['daterange'];
//echo $range;
$date = explode('-', $range, 2);

$date1=$date[0];

$date2=$date[1];
$diff = abs(strtotime($date2) - strtotime($date1));
$nbJours = $diff/86400;
if ($nbJours<=$nbrmax) {


// /* date de debut de de fin
  $date_noti=date("Y-m-d H:m:s");
  $lieu=$_POST['Lieu'];
  $type_notification="congé";
  $type_congé=$_POST['type_congé'];
  $motif=$_POST['motif'];
 
 
  
   //requette d'insertion

  $resquete=$pdo->prepare ('INSERT INTO notification_admin (idemp,nom,prenom,date_noti,lieu,de,jusqua,type_congé,motif,type_notification)VALUES("'.$id.'","'.$nom.'","'.$prenom.'","'.$date_noti.'","'.$lieu.'","'.$date1.'","'.$date2.'","'.$type_congé.'","'.$motif.'","'.$type_notification.'")');

  
if($resquete->execute()){ ?>

   <script>
    succes();
    

    </script>;
   <?php
     }else{?>

   <script>error(); </script>;
   <?php

     }
     
     
}else{
 ?>

   <script>
     function error_nbr(){
   Swal.fire({
  
  icon: 'warning',
  title: 'Le nombre de jours demandé dépasse le nombre de jour maximal',
  showConfirmButton: false,
  timer: 1900
})
  }

   

   error_nbr(); </script>;
   <?php
}

} ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>




<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>

<!------ Include the above in your HEAD tag ---------->

 



<div class="container-2" style="margin-bottom: 50px;margin-left:2% ">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fab fa-envira"></i>Listes des congés </h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""> <i class="fab fa-envira"></i> Gérer mes congés </a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:63%;font-size: 15px;display: inline;">
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



<div class="grid-container" >
  <div class="button material-icons fab-icon" style="padding-left: 15%; padding-right: 10%;border-top:2px solid #7a80dd;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:500px; padding-left: 20px; padding-right: 20px; margin-left:0%; margin-bottom:0px;padding-top:5px;padding-bottom:10px;">
<?php

foreach ($resultat3 as $key => $variable){

  $etat=$resultat3[$key]['etat'];

}
 ?> 



  <button class="col btn btn-funky-moon<?php if($etat==0){?> disabled <?php } ?>" data-toggle="modal" data-target="#demandecongé" style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 36%; margin-right:22%;"><i class="fas fa-plus-circle"></i> Demander congé</button>

  <button class="col btn btn-funky-moon"  data-toggle="modal" data-target="#centralModalSm"style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 35%; margin-right:1%"><i class="fas fa-calendar-alt"></i> congé annuelle</button>




</div>
</div>

  <div class="" >
  <div style=" width:100%;border-top:2px solid #7a80dd;background: white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); margin-bottom: 20px;">


    <table id="example" class="table table-striped table-bordered" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
         <thead class="thead-dark">  
            <tr>
              
              <th  style="width:10px;">#</th>
              <th  style="width:130px;">Date de début</th>
              <th  style="width:130px;">Date de fin</th>
              <th  style="width:70px;">Type</th>  
              <th  style="width:600px;">Motif</th>
              <th  style="width:70px;">Lieu</th>
              
            </tr>
          </thead>

         
          <tbody>

<?php $i=1;
 foreach ($resultat as $key => $variable){ ?> 
                    <tr>
                      
                      <td>   <?php echo $i++; ?>   </td>
                      <td>   <?php echo $resultat[$key]['date_debut']; ?></td>
                      <td>   <?php echo $resultat[$key]['date_fin']; ?>   </td>
                      <td>   <?php echo $resultat[$key]['type_congé']; ?>   </td>
                      <td>   <?php echo $resultat[$key]['Motif'];  ?> </td>
                      <td>   <?php echo $resultat[$key]['Lieu']; ?>   </td>
                     
                       
            </tr>
            <?php }?>
             </tbody>
         
         </table>

</div>
</div>  


 <div class="modal fade" id="demandecongé" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #aa66cc;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white; ">NOUVELLE DEMANDE DE CONGÈ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST">
              <label  for="exampleForm2"  style=" font-size: 20px; text-align:center;margin-top: 10%; margin-left: 23%;">Date de début - Date de fin</label>
            <input type="text" id="exampleForm2" class="form-control" name="daterange" style="width: 80%;border-color:transparent;border-bottom: 2px solid purple; text-align: center;margin-left: 10%;margin-bottom: 10%;margin-top:3%;">

               <div class="form-check-inline">

              <label for="exampleForm2" style=" font-size: 20px; text-align:center; width: 40%;display: inline;margin-left: 7%">Type de congé</label>
            <select class="browser-default custom-select" name="type_congé" style="width: 40%;;margin-left: 10%;border-color:transparent;border-bottom: 2px solid purple; text-align: center;margin-top:3%;margin-bottom: 10%;">
             <?php $query4= $pdo->query("SELECT * FROM `type_congé`");
$resultat4= $query4->fetchAll();
foreach ($resultat4 as $key => $variable){?>






              <option value="Maladie"><?php echo $resultat4[$key]['type']; ?></option>
              
             
             
<?php } ?>
 <option value="Maladie"><?php echo "Maladie d'un des parents"?></option>
            </select>
              </div>
              <div class="form-check-inline">

              <label for="exampleForm2" style=" font-size: 20px; text-align:center; width: 40%;display: inline;">Lieu   </label>
            <select class="browser-default custom-select" name="Lieu" style="width: 230px;;margin-left: 105px;border-color:transparent;border-bottom: 2px solid purple; text-align: center;margin-top:3%;margin-bottom: 10%;">
              <option value="interne">interne</option>
              <option value="Externe">Externe</option>
              
            </select>
              </div>
                
        

            <label for="exampleForm2" style=" font-size: 20px; text-align:center; display: block;">Motif</label>
            <textarea id="exampleForm2" class="form-control" name="motif"  style="width: 80%;border-top-color: transparent;border: 2px solid purple;border-top-color: transparent;margin-left: 10%;margin-top: 2%;"></textarea>

              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </form>

</div>
</div>
</div>
</body>
</html>
 <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">

          <!-- Change class .modal-sm to change the size of the modal -->
          <div class="modal-dialog modal-lg" role="document">


            <div class="modal-content">
              <div class="modal-header" style="background-color: #aa66cc; color: white">
                <h4 class="modal-title w-100" id="myModalLabel">CONGÈ ANNUEL</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php 
                $query = $pdo->query("SELECT * FROM `para_general` ");
                $resultatjk = $query->fetch();
                $f=explode('-',$resultatjk['date_fin']);
                $d=explode('-',$resultatjk['date_debut']);
                 ?>
              <div class="modal-body">
                <h5>Anneé actuelle : <?php echo $d[0]." / ".$f[0]; ?></h5>
                <hr>

                <h5 style="display: inline; margin-right:6%;">Le congé cette anneé sera Le :</h5>  <h5 style="display: inline; margin-right:5%;"><?php echo $resultatjk['date_fin']; ?> </h5>
                <?php
               $dureesejour =(strtotime($resultatjk['date_fin']) - strtotime($resultatjk['date_debut']))/86400;  
                 ?>
                <h5 style="margin-top: 6%;">Le temps qui reste : <?php echo $dureesejour ?> jours.</h5>
                <br> <!--Espace entre les lignes-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" >Close</button>
                
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
.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 1fr 1fr 1fr;
  gap: 1px 1px;
  grid-template-areas: "tableau tableau button ." "tableau tableau button ." "tableau tableau . .";

}

.tableau { grid-area: tableau; }

.button { grid-area: button; }
      .panel {
  box-shadow: none;
}
.Menu { grid-area: Menu; }
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
      .pagination>li {
display: inline;
padding:0px;
margin:2px ;
padding-left: 32px;
border:none !important;
}
.modal-backdrop {
  z-index: -1 !important;
}
/*
Fix to show in full screen demo
*/
iframe
{
    height:700px !important;
}

.btn {
display: inline-block;
padding: 6px 12px !important;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
line-height: 1.42857143;
text-align: center;
white-space: nowrap;
vertical-align: middle;
-ms-touch-action: manipulation;
touch-action: manipulation;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
background-image: none;
border: 1px solid transparent;
border-radius: 4px;
}

.btn-primary {
color: #fff !important;
background: #428bca !important;
border-color: #357ebd !important;
box-shadow:none !important;
}
.btn-danger {
color: #fff !important;
background: #d9534f !important;
border-color: #d9534f !important;
box-shadow:none !important;
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

#demandecongé{
background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
 opacity: 1;
  }

#centralModalSm{
background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
 opacity: 1;
  }
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



$(function() {
  $('input[name="daterange"]').daterangepicker({
    "showDropdowns": true,

    locale: {
"format": 'DD/MM/YYYY '
},
   
    "opens": "center"

  });
});

</script>
