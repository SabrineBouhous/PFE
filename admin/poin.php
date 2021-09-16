<head>
  
        <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de pointage</title> 
</head>
<?php
require 'dashboard_admin.php';?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  
<?php
$nom="Année_unive";
//vider la table pour la remplir a nouveau
$statement = $pdo->prepare("TRUNCATE TABLE pointage_année");// vider une table
$statement->execute();
$statement1 = $pdo->prepare("TRUNCATE TABLE rappor_année");// vider une table
$statement1->execute();

 $query1 = $pdo->query("SELECT * FROM para_general WHERE nom='$nom' ");
 $resultat1 =$query1->fetchAll();
foreach ($resultat1 as $key => $variable)
      {
        $date_debut=$resultat1[$key]['date_debut'];

        $date_fin=$resultat1[$key]['date_fin'];
      }
    $newDate = new DateTime($date_debut);
    $date_debut = $newDate->format('d-m-Y');
    $newDate = new DateTime($date_fin);
    $date_fin = $newDate->format('d-m-Y');


$month =liste_mois($date_debut,$date_fin);
//print_r($month);

//select le pdf_pointage from le dossier vers la base de données
 $nom_repertoire ="../pointage_pdf/pointage_actuel";

   $pointeur = opendir($nom_repertoire);
   
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      {

            //c'est un fichier, on l'insert
           
            $name_pdf=basename($fichier, '.pdf');
            $name_pdf=$name_pdf.".pdf";
            $filePath=$nom_repertoire."/". $name_pdf;
            
       //insertion de pdf_pointage dans la bdd
     $blob =$filePath;
      
        $stmt =$pdo->prepare ('INSERT INTO pointage_année(nom,data) VALUES("'.$name_pdf.'", "'.$filePath.'")');
        $stmt->execute();
    
   }    
} 


//select le pdf_rapport from le dossier vers la base de données
 $nom_repertoire_rapport ="../pointage_pdf/rapport_pointage";
   $pointeur_rapport = opendir($nom_repertoire_rapport);
   
   //pour chaque fichier et dossier
   while ($fichier = readdir($pointeur_rapport))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      {

            //c'est un fichier, on l'insert
           
            $name_pdf_rapport=basename($fichier, '.pdf');
            $name_pdf_rapport=$name_pdf_rapport.".pdf";
            $filePath_rapport=$nom_repertoire_rapport."/". $name_pdf_rapport;
            
       //insertion de pdf_pointage dans la bdd
     $blob =$filePath_rapport;
      
        $stmt1 =$pdo->prepare ('INSERT INTO rappor_année(nom,data) VALUES("'.$name_pdf_rapport.'", "'.$filePath_rapport.'")');
        $stmt1->execute();
    
   }    
} 


$query = $pdo->query("SELECT * FROM pointage_année ");
    $resultat = $query->fetchAll();

$query1 = $pdo->query("SELECT * FROM rappor_année");
    $resultat1 = $query1->fetchAll();

 
   


 ?>



<div class="container-2" style="margin-bottom: 50px;margin-left:2% ">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fas fa-hand-point-up"></i> Gestion de pointage</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""></i> Gestion de pointage</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:60%;margin-top:-8%;font-size: 15px;display: inline;">
            <i class="fa fa-calendar"></i>
             <span class="date-range">
               <?php
               setlocale(LC_TIME, "fr_FR");
               echo retourner_day(date('l'))."-".date('d-m-y'); ?>
             </span> 
           </div>
       </li>
          
        </ol>
       </div>
      </div>  






<div class="grid-container" style="">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:5px solid #880e4f;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:100%; padding-left:5px; padding-right: 20px; margin-bottom:20px;padding-top:5px;padding-bottom:10px">

  <!-- Grid row -->
  

<div class="grid-container" >



<div class="col-md-3">
  
                <form class="form-inline d-flex justify-content-center md-form form-sm active-purple active-purple-2 mt-2">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" id="system-search" name="q" placeholder="Search for" required>
</form>

        </div>



  <form method="POST">
         <table id="example" class="table table-striped table-bordered table-list-search " style=" padding-right: 10px;width:100%; background-color:white;text-align: center;"> 
        <thead class="thead-dark">
            <tr>

           
                <th  style="width: 10%">Mois-Année</th>
                <th  style="width: 10%">Rapport</th>
                <th  style="width: 20%">Pointage </th>
                
</tr>
            
            
        </thead>
        <?php 
        $query15 = $pdo->query("SELECT * FROM rappor_année ");
          $resultat15 =$query15->fetchAll();
$query1 = $pdo->query("SELECT * FROM pointage_année ");
          $resultat1 =$query1->fetchAll();
            foreach ($month as $value) {
    
 ?>

        <tbody>

        
            <tr scope="row" >
                    <td colspan=""  class="page-header" style="background-color: #880e4f;color: white;font-size: 18px;padding-top:2%;"> <?php echo $value ; ?></td>
                    <td   class="page-header">

<?php
      //Afficher les pdf_rapport
        foreach ($resultat15 as $key => $variable){ 


        $name_rappo = explode('.',$resultat15[$key]['nom'], 2);
        $name_rappo=$name_rappo[0];
        
        
        if ($name_rappo==$value) {

    ?> 
                        <button class="btn btn-unique"><a style="color: white"href="<?php echo $resultat15[$key]['data'] ?>">Rapport</a></button>


                    </td>
                   
    <?php }} ?>
                   
<?php
      //Afficher les pdf
        foreach ($resultat1 as $key => $variable){ 
        $name_poin = explode('.',$resultat1[$key]['nom'], 2);
        $name_poin=$name_poin[0];
        
        
        if ($name_poin==$value) {

    ?> 

  
                 

<td  colspan=""   style="background-color:#eeeeee;"  >
    <button class="btn btn-unique"><a style="color: white" href="<?php echo $resultat[$key]['data'] ?>">Pointage </a></button></td>
</tr>  
  <?php }else{ ?> <td  colspan=""   style="background-color:#eeeeee;"  > </td>
</tr>  <?php } } ?>              
</tbody>
<?php } ?>
</table>
</form>
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
.active-purple-2 input.form-control[type=text]:focus:not([readonly]) {
 border-bottom: 1px solid #ce93d8;
  box-shadow: 0 1px 0 0 #ce93d8;
}
.active-purple input.form-control[type=text] {
  border-bottom: 1px solid #ce93d8;
  box-shadow: 0 1px 0 0 #ce93d8;
}
.active-purple .fa, .active-cyan-2 .fa {
  color: #ce93d8;
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
a{
    color:  white;
    text-decoration: none;
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