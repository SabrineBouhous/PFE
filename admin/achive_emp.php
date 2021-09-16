 <head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archive des employés</title> 
    
</head> 
<?php
require '../bdd.php';
require 'dashboard_admin.php';


$query = $pdo->query("SELECT * FROM `Archive_employé`");
$resultat = $query->fetchAll();


?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



 



<div class="container-2" style="margin-bottom: 50px;margin-left:2% ; margin-top: -8%">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fas fa-file-archive"></i> Archive des employés</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href="archive.php?id=<?php echo $id ?>"></i> Archives</a> / <a href="">Archive des employés</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:51%;font-size: 15px;display: inline;">
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
      </div>   

  


  
<div class="grid-container">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #fd8666;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">
<button type="button"  style="margin-left:85%;height:6%;background-color:#fd8666;border:1px solid #fd8666;border-radius:7%"><a href="exporter_archive.php?type=employé">Exporter en PDF</a></button>


    <table id="example" class="table table-striped table-bordered" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;">  
        <thead class="thead-dark">
            <tr>
                <th style="width:1%">ID</th>
                <th style="width:9%">Nom</th>
                <th style="width:9%">Prénom</th>
                <th style="width:7%">Service</th>
                <th style="width:5%">Dernier grade</th>
                <th style="width:6%">Date d'entré</th>
                <th style="width:7%">Date de sortie</th>
                <th style="width:12 %">Raison</th>
                <th style="width:2%">Details</th>

         
                
            </tr>
            
        </thead>
        <tbody>
      
 <?php
$v=1;
  foreach ($resultat as $key => $variable)
          {?>

<tr>
                <td><?php echo  $v++ ?></td>
                <td><?php echo  $resultat[$key]['nom'] ?></td>
                <td> <?php echo $resultat[$key]['Prénom'] ; ?></td>
                <td> <?php echo $resultat[$key]['service'] ; ?></td>
                <td> <?php echo $resultat[$key]['Grade'] ; ?></td>
                <td> <?php echo $resultat[$key]['DateEntré'] ; ?></td>
                <td> <?php echo $resultat[$key]['DateSortie'] ; ?></td>
                <td> <?php echo $resultat[$key]['raison'] ; ?></td>

                <td> <a href=""> <i class="fas fa-eye" style="color:  #667292"></i></a></td>
               


 </tr>
 
 
 <?php } ?>

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