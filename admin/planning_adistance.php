   <?php
require 'dashboard_admin.php';
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
    <title>Planning A distance"</title> 
    
</head> 
<script type="text/javascript">


  function success(){
   Swal.fire({

  icon: 'success',
  title: 'une nouvelle ligne a été inserer avec success',
  
  showConfirmButton: false,
  timer: 1900
})
  }

  function error_ajout(){
   Swal.fire({
  
  icon: 'warning',
  title: 'Une érreur est survenu , veuillez esseyer plus tard',
  showConfirmButton: false,
  timer: 1900
})
  }

   function error_filiere(){
   Swal.fire({
  
  icon: 'warning',
  title: 'cette filière ne se compose pas du module séléctionné !!',
  html:'Veuillez remplir des informations correctes',
  showConfirmButton: true,
 

})
  }
   function error_année(){
   Swal.fire({
  
  icon: 'warning',
  title: 'cette filière ne se compose pas du ce nombre d\'années séléctionné !!',
  html:'Veuillez remplir des informations correctes',
  showConfirmButton: true,
 

})
  }

</script>
<?php

$type="A distance";
$query = $pdo->query("SELECT * FROM planning INNER JOIN employé ON (planning.idemp=employé.idemp)  WHERE type='$type' GROUP BY planning.idemp ");
$resultat = $query->fetchAll();

if (isset($_POST['ajouter'])) {
  $idem=$_POST['idemp'];
  $filière=$_POST['filière'];
  $modulee=explode("-",$_POST['module']);
  $module=$modulee[0];
  $an=$modulee[1];
  $de=$_POST['de'];
  $jusqua=$_POST['jusqua'];
  $jour=$_POST['jour'];
  $salle=$_POST['salle'];

$query6 = $pdo->query("SELECT * FROM param_filière INNER JOIN  module ON (param_filière.id_filière = module.filière ) AND param_filière.id_filière='$filière' AND module.id_module='$module'");
 $resultat6 = $query6->fetchAll();
if (count($resultat6)==0) {

  ?>
<script>

  error_filiere();
</script>
  
<?php
}else{
$type="A distance";

$resquete8=$pdo->prepare ('INSERT INTO `planning` ( `idemp`, `type`, `jour`, `de`, `jusqua`, `année`, `filière`, `module`, `salle`) VALUES ("'.$idem.'", "'.$type.'", "'.$jour.'", "'.$de.'", "'.$jusqua.'", "'.$an.'", "'.$filière.'","'.$module.'", "'.$salle.'")');
if ($resquete8->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout()();
  </script>

<?php }

 }
 

}


?>






<div class="container-2" style="margin-bottom: 50px;margin-left:2%;margin-top: -8%">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fa fa-calendar"></i></i> Plannings (A distance)</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href="planning.php?id=<?php echo $id ?>">  Gestion des plannings</a> / <a href=""> Plannings (A distance)</a>  <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:34%;font-size: 15px;display: inline;">
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
      


  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #05a174;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">

<form method="POST">
  <?php
$Emploi="Professeur";
$query9 = $pdo->query("SELECT * FROM employé WHERE Emploi='$Emploi' ");
$resultat9 = $query9->fetchAll(); ?>
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-0"style="width:25%">
      <label > Enseignant :</label>
      <select class="browser-default custom-select" name="ifo_gene" style="border-color:transparent;border-bottom: 2px solid #0be7b8;height:40PX;font-size: 17px">
 <?php foreach ($resultat9 as $key => $variable){ ?>
<option  value="<?php echo $resultat9[$key]['idemp'] ?>"><?php echo $resultat9[$key]['nom']." ".$resultat9[$key]['Prénom']." || ".$resultat9[$key]['Matricule']  ?>
</option>
<?php } ?>

</select>
    </div>
    <!-- Default input -->
    <div class="form-group col-md-0 " style="width:12%">
      <label >Jour :</label>
      <select  class="browser-default custom-select" name="jour_gene" style="border-color:transparent;border-bottom: 2px solid #0be7b8;height:40PX;font-size: 17px">
 
<option value="Samedi">Samedi</option>
  <option  value="Dimanche">Dimanche</option>
   <option  value="Lundi">Lundi</option>
    <option  value="Mardi">Mardi</option>
     <option  value="Mercredi">Mercredi</option>
      <option  value="Jeudi">Jeudi</option>
    </select>
    </div>


    <div class="form-group col-md-0" style="width:90px">
      <label >De :</label>
      <input type="time" class="form-control" name="de_gene"  style="border-color:transparent;border-bottom: 2px solid #0be7b8;height:40PX;font-size: 17px" required=>
    </div>
     <div class="form-group col-md-0"  style="width:90px">
      <label for="inputPassword4">Jusqu'a :</label>
      <input type="time" class="form-control" name="jusqua_gene" style="border-color:transparent;border-bottom: 2px solid #0be7b8;height:40PX;font-size: 17px" required>
    </div>


    <div class="form-group col-md-0" style="width: 102px">
      <label >Filière :</label>
      <select class="browser-default custom-select" name="filière_gene" style="border-color:transparent;border-bottom: 2px solid #0be7b8;height:40PX;font-size: 17px">
<?php 
            $query3 = $pdo->query("SELECT * FROM `param_filière` ");
            $resultat3 = $query3->fetchAll();
             foreach ($resultat3 as $key => $variable){ ?>

            <option value="<?php echo $resultat3[$key]['id_filière'];?>"><?php echo $resultat3[$key]['Filière']?></option>

              
            <?php } ?>
          </select>
      </div>
        <div class="form-group col-md-0" style="width: 200px">
      <label  > Moldule :</label>
      <select class="browser-default custom-select" name="module_gene" style="border-color:transparent;border-bottom: 2px solid #0be7b8;height:40PX;font-size: 17px">
        <?php 
            $query5 = $pdo->query("SELECT * FROM `module` ");
            $resultat5 = $query5->fetchAll();
             foreach ($resultat5 as $key => $variable){ ?>

            <option value="<?php echo $resultat5[$key]['id_module']."-".$resultat5[$key]['anneé'];?>"><?php echo $resultat5[$key]['Module']." || ".$resultat5[$key]['anneé']." ere/eme"; ?></option>

              
            <?php } ?>

          </select>
      </div>

   
    <div class="form-group col-md-0" style="width:100px">
      <label for="inputPassword4">Salle :</label>
      <input class="form-control" placeholder="Salle" name="salle_gene"  style="border-color:transparent;border-bottom: 2px solid #0be7b8;height:40PX;font-size: 17px" required>
    </div>

<button type="submit" name="ajouter_generale" class="btn aqua-gradient" style="width:30px;height:30PX;margin-top:4%;padding-right:10px;padding-left:8px"><i class="fas fa-calendar-plus"></i></button>
    </div>
  </form>

</div>
</div>  

<?php
if (isset($_POST['ajouter_generale'])) {
  $query = $pdo->query("SELECT * FROM planning INNER JOIN employé ON (planning.idemp=employé.idemp) GROUP BY planning.idemp ");
$resultat = $query->fetchAll();


  $idem=$_POST['ifo_gene'];
  $filière=$_POST['filière_gene'];
  $modulee=explode("-",$_POST['module_gene']);
  $module=$modulee[0];
  $an=$modulee[1];
  $de=$_POST['de_gene'];
  $jusqua=$_POST['jusqua_gene'];
  $jour=$_POST['jour_gene'];
  $salle=$_POST['salle_gene'];
$query6 = $pdo->query("SELECT * FROM param_filière INNER JOIN  module ON (param_filière.id_filière = module.filière ) AND param_filière.id_filière='$filière' AND module.id_module='$module'");
 $resultat6 = $query6->fetchAll();
if (count($resultat6)==0) {

  ?>
<script>

  error_filiere();
</script>
  
<?php
}else{
$type="A distance";;

$resquete8=$pdo->prepare ('INSERT INTO `planning` ( `idemp`, `type`, `jour`, `de`, `jusqua`, `année`, `filière`, `module`, `salle`) VALUES ("'.$idem.'", "'.$type.'", "'.$jour.'", "'.$de.'", "'.$jusqua.'", "'.$an.'", "'.$filière.'","'.$module.'", "'.$salle.'")');
if ($resquete8->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout()();
  </script>

<?php }

 }
 



  
}
?>

  


<div class="grid-container" style="">

  <div class="tableau" style="background: white; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%;margin-top: 0%; padding-bottom:2px; margin-bottom: 3%;padding-left:1%;padding-right: 1%">


<div class="col-md-3">
                <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan  active-cyan-2 mt-2">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" id="system-search" name="q" placeholder="Search for" required>
</form>

        </div>



    <table id="example" class="table table-striped table-bordered table-list-search " style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>

           
                <th  style="width: 10%">Nom</th>
                <th  style="width: 10%">Prénom</th>
                <th  style="width: 17%" >Matricule</i>
            </th>
                <th  style="width: 9%">Le jour</th>
                <th  style="width: 20%">De -- Jusqu'a</th>
              <th  style="width: 10%">filière</th> 
                
                <th  style="width: 17%">Le Module</th>
                <th  style="width: 10%">La salle</th>
                <th  style="width: 2%">Action </th>
                
            </tr>
            
            
        </thead>

           <?php  foreach ($resultat as $key => $variable){ 
            $idemp=$resultat[$key]['idemp']; ?>

        <tbody>

      
            <tr scope="row">
                    <td colspan=""  class="page-header"> <?php echo $resultat[$key]['nom'] ?></td>
                    <td colspan=""  class="page-header"><?php echo $resultat[$key]['Prénom']; ?></td>
                    <td colspan="6"  class="page-header"> <?php echo $resultat[$key]['Matricule']; ?>
                      


                    </td>
                    <td><button type="button" class="tbtn"><i class="fa fa-plus-circle plus"></i>Action<i class="fa fa-minus-circle minus "></i></button></td>
                </tr>

            <tr class="toggler toggler1 " >

 <td rowspan="50" colspan="3" style="background-color: #05a174"></td>
 <form method="POST">
 <td style="background-color: #05a174" style="border:none;padding-left:-80%">
   
   <select class="browser-default custom-select" name="jour" style="border-color:transparent;border-bottom: 2px solid #28a745; text-align: center;width:100%;height: 25px;font-size: 12px">
<option value="Samedi">Samedi</option>
  <option value="Dimanche">Dimanche</option>
   <option value="Lundi">Lundi</option>
    <option value="Mardi">Mardi</option>
     <option value="Mercredi">Mercredi</option>
      <option value="Jeudi">Jeudi</option>
      

</select>
 </td>

<td style="background-color: #05a174" style="border:none;">
    <input name="de" style="border-color:transparent;border-bottom: 2px solid #28a745; text-align: center;width: 50%; margin-right:2%;margin-left:-90%;" type="time" id="two" placeholder="De" required=""> A
   <input name="jusqua" style="border-color:transparent;border-bottom: 2px solid #28a745; text-align: center;width: 50%;margin-right:-90%;" type="time" id="two" placeholder="Jusqu'a" required=""></td>
   <td style="background-color: #05a174" style="border:none;">
    <select class="browser-default custom-select" name="filière" style="border-color:transparent;border-bottom: 2px solid #28a745; text-align: center;width:100%;height: 25px;font-size: 12px" required="">
            <?php 
            $query3 = $pdo->query("SELECT * FROM `param_filière` ");
            $resultat3 = $query3->fetchAll();
             foreach ($resultat3 as $key => $variable){ ?>

            <option value="<?php echo $resultat3[$key]['id_filière'];?>"><?php echo $resultat3[$key]['Filière']?></option>

              
            <?php } ?>
          </select>
    </td>

 
 

<td style="background-color: #05a174" style="border:none;">
  <select class="browser-default custom-select" name="module" style="border-color:transparent;border-bottom: 2px solid #28a745; text-align: center;width:100%;height: 25px;font-size: 12px">
  
<?php 
            $query5 = $pdo->query("SELECT * FROM `module` ");
            $resultat5 = $query5->fetchAll();
             foreach ($resultat5 as $key => $variable){ ?>

           <option value="<?php echo $resultat5[$key]['id_module']."-".$resultat5[$key]['anneé'];?>"><?php echo $resultat5[$key]['Module']." ".$resultat5[$key]['anneé']?></option>

              
            <?php } ?>
          </select>

</td>

<td style="background-color: #05a174" style="border:none;"><input name="salle" style="border-color:transparent;border-bottom: 2px solid #28a745; text-align: center;" type="text" id="three" placeholder="La salle" required></td>

<td style="background-color: #05a174" style="border:none;">
<input type="hidden" name="idemp" value="<?php echo $idemp ?>" readonly>
  <button type="submit" name="ajouter"  style="background-color: transparent; border:none;"><i class="fas fa-calendar-plus"></i></button></td>


</form>

</tr>
<?php   $query2 = $pdo->query("SELECT * FROM `planning` where idemp='$idemp' AND type='$type' ");
                 $resultat2 = $query2->fetchAll();
                 
                 foreach ($resultat2 as $key => $variable){ 
                    $module=$resultat2[$key]['module'];
                    $filière=$resultat2[$key]['filière'];
                  
                  

                  
                    
          ?>  
           
            <tr class="toggler toggler1" >
              
 
                      
                    
 <form method="POST">

                    <td  class="table-light"colspan=""  class="page-header"> <?php echo $resultat2[$key]['jour']; ?></td>
                    <td class="table-light" colspan=""  class="page-header"><?php echo  $resultat2[$key]['de']." "."a "." ".$resultat2[$key]['jusqua'] ?></td>
                    <?php  
                 $query8 = $pdo->query("SELECT * FROM `param_filière` where param_filière.id_filière='$filière' ");
                 $resultat8=$query8->fetchAll();
                 
                 foreach ($resultat8 as $key => $variable){?>
                   <td class="table-light" colspan=""  class="page-header"> <?php echo $resultat8[$key]['Filière']; ?></td>
                 <?php  } ?>
                   
                 <?php   $query4 = $pdo->query("SELECT * FROM `module` where module.id_module='$module' ");
                 $resultat4 = $query4->fetchAll();
                 
                 foreach ($resultat4 as $key => $variable){?>

                    <td class="table-light" colspan=""  class="page-header"> <?php echo $resultat4[$key]['Module']; ?></td>
                  <?php } ?>
                    <td class="table-light" colspan=""  class="page-header"> <?php echo $resultat2[$key]['salle']; ?></td>
                  
                    <td class="table-light"><input type="hidden" name="idemploie" value="<?php echo $resultat2[$key]['id']; ?>" readonly>
                      <button name="supprimer" type="submit" style="background-color: transparent; border:none;"><i   class="fas fa-calendar-minus"></i></button>
                      
                    </td>
 </form> 
            </tr>
        
          <?php } ?>

             </tbody>

        
             <?php } ?>
              
         
         </table>
</div>
</div> 

<?php
if (isset($_POST['supprimer'])){
$id=$_POST['idemploie'];
$resquete11=$pdo->prepare ("DELETE FROM  planning WHERE id='$id' LIMIT 1");
if($resquete11->execute()){?>
  <script>
    function succ_sup(){
      Swal.fire({
  icon: 'success',
  title: 'La suppression a été faite avec success',
  showConfirmButton: false,
  timer: 2000
})
    }
    succ_sup();
  </script>
  
<?php }else{
  ?>
  <script>
    error();
  </script>
  
<?php


} }?>



<div >

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
.active-cyan-2 input.form-control[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan input.form-control[type=text] {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan .fa, .active-cyan-2 .fa {
  color: #4dd0e1;
}
  .table{border-collapse:collapse;width:100%;border:solid 1px #c0c0c0;font-family:open sans;font-size:11px}
            .custom-table th,.custom-table td{text-align:left;padding:8px;border:solid 1px #c0c0c0}
            .custom-table th{color:#000080}
            .custom-table tr:nth-child(odd){background-color:#f7f7ff}
            .custom-table>thead>tr{background-color:#dde8f7!important}
            .tbtn{border:0;outline:0;background-color:transparent;font-size:13px;cursor:pointer}
            .toggler{display:none}
            .toggler1{display:table-row;}
            .custom-table a{color: #0033cc;}
            .custom-table a:hover{color: #f00;}
            .page-header{background-color: #eee;}


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



 




 $(document).ready(function () {
                $(".fa-plus-circle").click(function () {
                  
                    $(this).parents("tbody").find(".toggler").addClass("toggler1");
                    $(this).parents("tbody").find(".fa-plus-circle").removeClass("fa-plus-circle");
                    $(this).parents("tbody").find(".minus").addClass("fa-minus-circle");
                    

                    



                 
                    
                });
            });
 $(document).ready(function () {
                $(".fa-minus-circle").click(function () {
                    $(this).parents("tbody").find(".toggler1").removeClass("toggler1");
                    $(this).parents("tbody").find(".plus").addClass("fa-plus-circle");
                    $(this).parents("tbody").find(".minus").removeClass("fa-minus-circle");


                    
                });
            });


$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr ');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="10">No entries found.</td></tr>');
        }
    });
});



</script>






