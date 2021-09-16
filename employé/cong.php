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
  $date_noti=date("Y-m-d");
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
       <h2><i class="fas fa-file"></i>Listes des congés </h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Aceuil</a> / <a href=""> <i class="fas fa-file"></i> Gérer mes congés </a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:57%;font-size: 15px;display: inline;">
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
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:500px; padding-left: 20px; padding-right: 20px; margin-left: 2%; margin-bottom:0px;padding-top:5px;padding-bottom:10px">
<?php

foreach ($resultat3 as $key => $variable){

  $etat=$resultat3[$key]['etat'];

}
 ?> 
   <button class="col btn btn-funky-moon<?php if($etat==0){?> disabled <?php } ?>" data-toggle="modal" data-target="#demandecongé" style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 36%; margin-right:22%;"><i class="fas fa-plus-circle"></i> Demander congé</button>

  <button class="col btn btn-funky-moon"  data-toggle="modal" data-target="#centralModalSm"style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 35%; margin-right:1%"><i class="fas fa-calendar-alt"></i> congé annuelle</button>




</div>
</div>
< 
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





<style type="text/css">

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