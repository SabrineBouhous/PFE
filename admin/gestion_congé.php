<head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Géstion des congés</title> 
    
</head> 
<?php
require 'dashboard_admin.php';


$query = $pdo->query("SELECT * FROM `notification_user` ORDER BY id DESC ");
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
       <h2><i class="fab fa-envira"></i>Gestion des congés </h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""></i> Gestion des congés </a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:62%;font-size: 15px;display: inline;">
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

       if (isset($_GET['noti'])){
        $id_noti=$_GET['noti'];
       }else{
        $id_noti="";
       }

      $query2 = $pdo->query("SELECT * FROM congé INNER JOIN employé ON(congé.idemp=employé.idemp )");

       $resultat2 = $query2->fetchAll();
       
       
 
 ?> 
        <div class="grid-container" >
  <div class="button material-icons fab-icon" style="padding-left: 15%; padding-right: 10%;border-top:2px solid #7a80dd;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left: 20px; padding-right: 20px; margin-left:0%; margin-bottom:0px;padding-top:5px;padding-bottom:10px;">


    <table id="example" class="table table-striped table-bordered" style=" padding-right: 10px;width: auto; background-color:white;text-align: center;">  
        <thead>
            <tr  class="thead-dark">
                <th style="width:10%">Nom </th>
                <th style="width:8%">Prénom </th>
                <th  style="width:10%" >De 
            </th>
                <th style="width: 10%">Jusqu'a  </th>

                <th style="width: 2%">Action</th>
            </tr>
            
        </thead>
        
        <tbody>

          <?php 
           $query = $pdo->query("SELECT * FROM congé INNER JOIN employé ON(congé.idemp=employé.idemp)");
          $resultat = $query->fetchAll();
          foreach ($resultat as $key => $variable) {  ?>

            <tr>

                <td><?php echo  $resultat[$key]['nom'] ?></td>
                      <td><?php echo $resultat[$key]['Prénom'] ?></td>
                      <td><?php echo $resultat[$key]['date_debut'] ?></td>
                      <td><?php echo $resultat[$key]['date_fin'] ?></td>
                      <td><a href="?id=<?php echo $id ?>&noti=<?php echo $resultat[$key]['idemp'] ?>#popup2"> <i class="fas fa-eye" style="color: #6b70c2"></i></a></td>
                

                  <?php }?>

  

                
            </tr>
        
             </tbody>
         
         </table>

</div>
</div>  


</div>
</div>
<div id="popup2" class="overlay">
  <div class="popup">
       
       <h5>Détails de congé <a class="close" href="?id=<?php echo $id;?>">×</a></h5>
        <hr>
    
      <div class="a">
         <div class="form-row"style="margin-left:5px;margin-right:5px ">
<div class="col">
<label for="inputDisabledEx2" class="disabled" >Nom</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['nom'] ?>" disabled style=" border: none;border-bottom: 1px solid #6b70c2; background-color: transparent;">
</div>
<div class="col">
<label for="inputDisabledEx2" class="disabled">Prénom</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['Prénom'] ?>" disabled style=" border: none;border-bottom: 1px solid #6b70c2; background-color: transparent;">
</div>


<div class="col">
<label for="inputDisabledEx2" class="disabled">De</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['date_debut'] ?>" disabled style=" border: none;border-bottom: 1px solid #6b70c2; background-color: transparent;">
</div>
<div class="col">
<label for="inputDisabledEx2" class="disabled">Jusqu'a</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['date_fin'] ?>" disabled style=" border: none;border-bottom: 1px solid #6b70c2; background-color: transparent;">
</div>
</div>


<div class="form-row"style="margin-left:5px;margin-right:5px ">
<div class="col-2">
<label for="inputDisabledEx2" class="disabled">Type</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['type_congé'] ?>" disabled style=" border: none;border-bottom: 1px solid #6b70c2; background-color: transparent;">
</div>
<div class="col-2">
<label for="inputDisabledEx2" class="disabled">Lieu</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['Lieu'] ?>" disabled style=" border: none;border-bottom: 1px solid #6b70c2; background-color: transparent;">
</div>
<div class="col">
<label for="inputDisabledEx2" class="disabled">Motif</label>
<input type="text" id="inputDisabledEx2" class="form-control" value="<?php echo  $resultat2[$key]['Motif'] ?>" disabled style=" border: none;border-bottom: 1px solid #6b70c2; background-color: transparent;">
</div>
</div>



</div>
</div>
</div>
<style type="text/css">
    #popup2 .popup{
    width: 1000px;
  }
  #popup2 .popup {
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width:800px;
  margin-left: 15%;
  margin-top: 5%;
  position: relative;
  transition: all 5s ease-in-out;
}
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

