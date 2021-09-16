<?php
require '../dashboard.php';
require '../function.php';
require '../bdd.php';
$query = $pdo->query("SELECT idemp, nom, Prénom ,Matricule,Emploi FROM `employé` ORDER BY idemp ");
$resultat = $query->fetchAll();


?>

<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
  <title>Gestion d'employés</title>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>

<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
</head>
<body>

  <div class="row" style="padding-left: 40%">
    <h2 class="text-center">Liste des employés</h2>
  </div>
    
        
    
 <div class="col-md-12" style=" padding-left: 10%; padding-right: 10%;" >       
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%"  style="width: 1500px; background-color: white;">
           <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Matricule</th>
              <th>fonction</th>
              <th>Modifier</th>
              <th>supprimer</th>
            </tr>
          </thead>

          <tfoot>
    
            <tr>
              <th></th>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Matricule</th>
              <th>fonction</th>
              <th>Modifier</th>
              <th>supprimer</th>

            </tr>
          </tfoot>

          <tbody>
<?php foreach ($resultat as $key => $variable){ ?> 
                    <tr>
                      <td>
                          
                        <input  type="checkbox" name="checkbox[]" value="<?php echo $resultat[$key]['idemp']?>" >
                        
                      </td>
                      <td>   <?php echo $resultat[$key]['idemp'] ?>   </td>
                      <td>   <?php echo $resultat[$key]['nom'] ?>   </td>
                      <td>   <?php echo $resultat[$key]['Prénom'] ?>   </td>
                      <td>   <?php echo $resultat[$key]['Matricule'] ?>   </td>
                      <td>   <?php echo $resultat[$key]['Emploi'] ?>   </td>
                      
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" 
                              data-toggle="modal"
                             data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
            <td>


             <a class="col-sm-1" 
            type="button" data-toggle="modal" data-target="#delete"><i class="fas fa-trash" style="color: red;"></i>
                 </a> <?php echo  $resultat[$key]['idemp'] ?> 
                <!-- Button trigger modal -->


 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header <?php echo $resultat[$key]['idemp'] ?></h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        
  </tr>
                            
  <?php } ?>
          </tbody>
        </table>

  
  </div>
  </div>
</div>   
    
    </body>
</html>
    <style type="text/css">
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
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

    </script>