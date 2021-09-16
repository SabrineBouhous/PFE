 <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications</title> 
    
</head> 
  
<?php

require 'dashboard_user.php';
$id=$_GET['id'];

$query = $pdo->query("SELECT * FROM `notification_user` WHERE idemp='$id' ORDER BY id DESC ");
$resultat = $query->fetchAll();




?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>




<div class="container-2" style="margin-bottom: 50px;margin-left:2% ">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fas fa-bell"></i> Notifications</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Acceuil</a> / <a href=""> <i class="fas fa-bell"></i>Notifications</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:63%;font-size: 15px;display: inline;">
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


<?php

if (isset($_GET['noti'])) {
    $id_noti=$_GET['noti'];
    $modifierstatu=$pdo->prepare ("UPDATE notification_user SET  statu =1 WHERE  id='$id_noti' ");
    $modifierstatu->execute();



   
    
  $query2 = $pdo->query("SELECT * FROM `notification_user` WHERE id='$id_noti'");
  $resultat2 = $query2->fetchAll();

         

foreach ($resultat2 as $key => $variable)
          {
          if ($resultat2[$key]['type_noti']!="evaluation" AND $resultat2[$key]['type_noti']!="PvEnt" AND $resultat2[$key]['type_noti']!="PvIns") {
if ($resultat2[$key]['etat']=="Accepter") {
  $etat="Accepté";
}else{
  $etat="Refusé"; }
     
 
 ?> 
        <div class="grid-container"  >

  <div class="button material-icons fab-icon" style="background:white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width: 700px; margin-left: 14%;margin-bottom:20px">
<div style="height:40px;background-color: orange;margin-bottom:10px;color: white;font-size:25px;padding-left:10px"><i>Details de Notification</i></div>
<?php if ($resultat2[$key]['type_noti']=="congé") {
	
?>

  <div class="form-row"style="margin-left:5px;margin-right:5px; text-align: center;">
Votre demande de congé a été <?php echo $etat ?> Le <?php echo $resultat2[$key]['date_noti'];?>
<br>
<?php if ($resultat2[$key]['etat']=="Refuser") {
  if ($resultat2[$key]['Raison']=="") {
    echo "Raison : pas de raison";
  }else
  echo "Raison :"." ".$resultat2[$key]['Raison'];

}?>

</div>



<?php }else{ ?>


  <div class="form-row"style="margin-left:5px;margin-right:5px ">
Votre demande de <?php echo $resultat2[$key]['Nom_document']?> a été <?php echo $etat ." "."Le"." ".$resultat2[$key]['date_noti'];?>

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
            <tr>
                <th style="width:10%">Date </i></th>
                <th style="width:8%">Concernant </i></th>
                <th  style="width:10%" >Etat </i>
        		</th>
                <th style="width: 20%">Envoyé par</th>
                <th style="width: 2%">Action</th>
            </tr>
            
        </thead>
        
        <tbody>

        	<?php 
          $r="Renseignement d'absence";
          $query = $pdo->query("SELECT * FROM `notification_user` WHERE idemp='$id'  ORDER BY id DESC ");
$resultat = $query->fetchAll();

          foreach ($resultat as $key => $variable) {  ?>

            <tr>

                <td><?php echo  $resultat[$key]['date_noti'] ?></td>
                    <?php if ($resultat[$key]['type_noti']=="congé") {?>
                      <td>demande d'un congé</td>
                      <td><?php echo $resultat[$key]['etat'] ?></td>
                      <td><?php echo $resultat[$key]['de_la_part'] ?></td>
                      <td><a href="?id=<?php echo $id ?>&noti=<?php echo $resultat[$key]['id']  ?>"> <i class="fas fa-eye" style="color: orange"></i></a></td>
                

                   <?php }
                   if ($resultat[$key]['type_noti']=="PvEnt") {?>
                      <td>PV d'entreé prêt</td>
                      <td></td>
                      <td><?php echo "Administrateur personnel"; ?></td>
                      <td><i class="fas fa-eye-slash" style="color: orange" ></i></a></td>

                

                   <?php }
                   if ($resultat[$key]['type_noti']=="PvIns") {?>
                      <td>PV d'installation prêt</td>
                      <td></td>
                      <td><?php echo "Administrateur personnel"; ?></td>
                      <td><i class="fas fa-eye-slash" style="color: orange" ></i></a></td>

                

                   <?php }
                   if ($resultat[$key]['type_noti']=="document") { ?>
                     <td> demande d'un(e) <?php echo $resultat[$key]['Nom_document'] ; ?></td>
                     <td></td>
                     <td><?php echo $resultat[$key]['de_la']  ?></td>
                     <td><a href="?id=<?php echo $id ?>&noti=<?php echo $resultat[$key]['id']  ?>"> <i class="fas fa-eye" style="color: orange"></i></a></td>
                
</td>

                     
                  <?php }
                  if ($resultat[$key]['type_noti']=="evaluation") { ?>
                     <td> Derniere evaluation ///</td>
                     <?php
                     $n=explode("|",$resultat[$key]['note']);
                    $g=$n[0]+$n[1]+$n[2]+$n[3]; 
                    $not1="Discipline =".$n[0].","."Curriculum =".$n[1];
                    $not2="Initiative =".$n[2].","."Capacité de travail =".$n[3];
                     ?>
                     <td><?php echo "evaluation générale : ".$g.'<br>'.$not1.'<br>'.$not2 ?></td>
                     <td><?php echo "Directeur" ?></td>
                     <td><i class="fas fa-eye-slash" style="color: orange" ></i></a></td>
                     
                

                   

  
                
<?php    } 

 if ($resultat[$key]['type_noti']=="Renseignement d'absence") {
$date = new DateTime($resultat[$key]['date_noti']);
$date->add(new DateInterval('P1D'));
$date_fin= $date->format('Y-m-d    H:m:s');
  ?>
                     <td>Questionnaire d'absence</td>
                     <td><?php echo "Disponible jusqu'a".'<br>'.$date_fin ?> </td>
                     <td>Administrateur personnel </td>
                     <td><i class="fas fa-eye-slash" style="color: orange" ></i></a></td>
                     

                 
                
 <?php }  } ?>
        
                   
                
            </tr>
         
             </tbody>
         
         </table>

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