 <head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes demandes des documents</title> 
    
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
require '../bdd.php';
require 'dashboard_user.php';
$id=$_GET['id'];
$document="document";

$query = $pdo->query("SELECT * FROM `document_adminstratif`  WHERE idemp= '$id' ");
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
       <h2><i class="fas fa-file"></i> Mes documents pris</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Aceuil</a> / <a href=""> <i class="fas fa-file"></i> Archive des documents Pris</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:50%;font-size: 15px;display: inline;">
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



<div class="grid-container">

<div class="grid-container" >
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #bd5734;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px"><button type="button"style="margin-left:76%;height:6%;background-color:#bd5734;border:1px solid #bd5734;border-radius:7%;color: white" data-toggle="modal" data-target="#demanderDoc">Demander un document </button>


		<table id="example" class="table table-striped table-bordered" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%" style="cursor: pointer;">#</th></i></th>
                <th style="width:10%" style="cursor: pointer;">Date </i></th>
                <th style="width:20%" style="cursor: pointer;">Demande de</th>
        		</th>
                
            </tr>
            
        </thead>
      
 <?php
$v=1;
  foreach ($resultat as $key => $variable)
          {?>
<tr>
                <td><?php echo  $v++ ?></td>
                <td><?php echo  $resultat[$key]['Date_docu'] ?></td>
                <td> <?php echo $resultat[$key]['Nom_document'] ; ?></td>
               


 </tr>
 
 
 <?php } ?>

        
        <tbody>
</tbody>
</table>
</div>
</div>
<div class="modal fade" id="demanderDoc" tabindex="-1" role="dialog" aria-labelledby="expdemanderDoc"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #bd5734; color: white">
        <h5 class="modal-title" id="expdemanderDoc">Demander un document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <label>Sélectionner le document que vous souhaitez :</label>
        	<select class="browser-default custom-select" name="document">
              <option value="attestation de travail">attestation de travail</option>
              <option value="kach haja">kach haja </option>
              <option value="Two">Two</option>
              <option value="Three">Three</option>
            </select>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning waves-effec" style="width:100px;height: 40px;padding-top: 3px" data-dismiss="modal">Fermer</button>
        <button  class="btn btn-blue-grey" name="Envoyer" type="submit">Envoyer</button>
      </div>
    </div>
    </form>
  </div>
</div>

<?php
$query2 = $pdo->query("SELECT * FROM `employé` WHERE  idemp='$id' ");
$resultat2 = $query2->fetchAll();
foreach ($resultat2 as $key => $variable){

  $nom=$resultat2[$key]['nom'];
  $prenom=$resultat2[$key]['Prénom'];
  }
 $date_noti=date("Y-m-d H:i:s");
$type="document";

if (isset($_POST['Envoyer'])) {
$resquete=$pdo->prepare ('INSERT INTO notification_admin (idemp,nom,prenom,date_noti,Nom_document,type_notification)VALUES("'.$id.'","'.$nom.'","'.$prenom.'","'.$date_noti.'","'.$_POST['document'].'","'.$type.'")');
if($resquete->execute()){ ?>

   <script>
    succes();
    

    </script>;
   <?php
     }else{?>

   <script>error(); </script>;
   <?php

     }
}

?>


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