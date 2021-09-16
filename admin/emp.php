  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
  
  function succes_ajout(){
   Swal.fire({
  
  icon: 'success',
  title: 'Vous avez ajouter un nouveau empoyé avec succes',
  showConfirmButton: false,
  timer: 1900
})
  }

 {
function error{
 Swal.fire({
  
  icon: 'warning',
  title: 'Une érreur est survenu , veuillez esseyer plus tard',
  showConfirmButton: false,
  timer: 1900
})
  }

</script>
                     


<?php
require 'dashboard_admin.php';
$query = $pdo->query("SELECT * FROM `employé`");
$resultat = $query->fetchAll();

if (isset($_POST['submit1']))
{
   
   if(!preg_match("#^[a-zA-Z]*$# ",$_POST["nom"])){
      $errors['nom'] = "Le nom doit contenir que les lettres";
   }
   
   if(!preg_match("#^[a-zA-Z]*$# ",$_POST["Prénom"])){
      $errors['Prénom'] = "Le Prénom doit contenir que les lettres";
   }
   if(!empty($_POST["NumeroTel"])){
    if(!preg_match("#^[0-9]*$# ",$_POST["NumeroTel"])){
      $errors['NumtTele'] = "Le champ Numero de tel ne doit contenir que les chiffres";
   }
 }

    if(!preg_match("#^[0-9]*$# ",$_POST["Nombre_enfants"])){
      $errors['Nombre_enfants'] = "Le champ Nombre d'enfant ne tel doit contenir que les lettres";
   }

   if(!preg_match("#^[0-9]*$# ",$_POST["Nombre_enfants"])){
      $errors['Nombre_enfants'] = "Le Nombre d'enfant de tel doit contenir que les lettres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Matricule"])){
      $errors['Matricule'] = "Le champ Matricule ne doit contenir que les lettres et les chiffres";
   }
   if(!preg_match("#^[a-zA-Z]*$# ",$_POST["emploi"])){
      $errors['emploi'] = "Le champ emploi ne doit contenir que les lettres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["grade"])){
      $errors['grade'] = "Le champ grade ne doit contenir que les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["NIV_etude"])){
      $errors['NIV_etude'] = "Le champ Niveau d'étude ne doit contenir que les lettres et les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["dimplome"])){
      $errors['Diplome'] = "Le champ Diplome d'étude ne doit contenir que les lettres et les chiffres";
   }
   
   
   
   
   if(empty($errors))
{
   

  $nom=$_POST['nom'];
  $pre=$_POST['Prénom'];
  $date=$_POST['date_N'];
  $sex=$_POST['Sex'];
  $lieu=$_POST['lieu_N'];
  $numt=$_POST['NumeroTel'];
  $situation=$_POST['situation'];
  $nbr=$_POST['Nombre_enfants'];
  $adresse=$_POST['address'];
  $nbr=$_POST['Nombre_enfants'];
  $Statu=$_POST['Statu'];  
  $Matricule=$_POST['Matricule'];
  $dateentree=$_POST['date_entree'];
  $emploi=$_POST['emploi'];
  $grade=$_POST['grade'];
  $echlon=$_POST['Echlon'];
  $niv=$_POST['NIV_etude'];
  $Diplome=$_POST['dimplome'];
  $ccp=$_POST['Num_ccp'];
  $role=$_POST['role'];
  $user=$_POST['Matricule'];
  $pwd=$_POST['Matricule'];
   $id=$_GET['id'];
$query = $pdo->query("SELECT Matricule FROM `employé` WHERE Matricule='$Matricule' AND idemp<>'$id'  ");
$resultat = $query->fetchAll();

$num_of_rows = count($resultat); 

if($num_of_rows==1){
  $message='<div class="alert alert-danger">Ce Matricule existe déja => Le Matricule doit etre <strong>unique</strong> pour chaque employé!</div>';
}else{

   $resquete=$pdo->prepare ("UPDATE employé SET  nom =?,  Prénom =?, sex =?, Date_de_Naissance =?, lieu_de_Naissance =?, Adresse =?, Numero_tel =?, Situation_Familiale =?, Nombre_denfant =?,Statut=?, Matricule =?, DateEntré =?, Emploi =?, Grade =?, Echelon =? , Niv_Détude = ?, Diplome =?,N°CCP=?, Role =? WHERE  idemp = ? ");
 $req= $resquete->execute(array($nom,$pre,$sex,$date,$lieu,$adresse,$numt,$situation,$nbr,$Statu,$Matricule,$dateentree,$emploi,$grade,$echlon,$niv,$Diplome,$ccp,$role,$id));

   
 
  if($req){
    $message='<div class="alert alert-success"> Employé modifié avec  <strong> succés!</strong> !</div>';

  }else{  $message='<div class="alert alert-danger"> erreur est survenue , veillez  réessayer !</div>';
 
  

   
}

}

}}else{
  $message="";

}

if (isset($_POST['submit2']))
{
   
   if(!preg_match("#^[a-zA-Z]*$# ",$_POST["nom"])){
      $errors['nom'] = "Le nom doit contenir que les lettres";
   }
   
   if(!preg_match("#^[a-zA-Z]*$# ",$_POST["Prénom"])){
      $errors['Prénom'] = "Le Prénom doit contenir que les lettres";
   }
   if(!empty($_POST["NumeroTel"])){
    if(!preg_match("#^[0-9]*$# ",$_POST["NumeroTel"])){
      $errors['NumtTele'] = "Le champ Numero de tel ne doit contenir que les chiffres";
   }
 }

    if(!preg_match("#^[0-9]*$# ",$_POST["Nombre_enfants"])){
      $errors['Nombre_enfants'] = "Le champ Nombre d'enfant ne tel doit contenir que les lettres";
   }

   if(!preg_match("#^[0-9]*$# ",$_POST["Nombre_enfants"])){
      $errors['Nombre_enfants'] = "Le Nombre d'enfant de tel doit contenir que les lettres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Matricule"])){
      $errors['Matricule'] = "Le champ Matricule ne doit contenir que les lettres et les chiffres";
   }
   if(!preg_match("#^[a-zA-Z]*$# ",$_POST["emploi"])){
      $errors['emploi'] = "Le champ emploi ne doit contenir que les lettres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["grade"])){
      $errors['grade'] = "Le champ grade ne doit contenir que les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["NIV_etude"])){
      $errors['NIV_etude'] = "Le champ Niveau d'étude ne doit contenir que les lettres et les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["dimplome"])){
      $errors['Diplome'] = "Le champ Diplome d'étude ne doit contenir que les lettres et les chiffres";
   }

   
   


   
   if(empty($errors))
{
   

  $nom=$_POST['nom'];
  $pre=$_POST['Prénom'];
  $date=$_POST['date_N'];
  $sex=$_POST['Sex'];
  $lieu=$_POST['lieu_N'];
  $numt=$_POST['NumeroTel'];
  $situation=$_POST['situation'];
  $nbr=$_POST['Nombre_enfants'];
  $adresse=$_POST['address'];
  $nbr=$_POST['Nombre_enfants'];
  $Statu=$_POST['Statu'];  
  $Matricule=$_POST['Matricule'];
  $dateentree=$_POST['date_entree'];
  $emploi=$_POST['emploi'];
  $grade=$_POST['grade'];
  $echlon=$_POST['Echlon'];
  $niv=$_POST['NIV_etude'];
  $Diplome=$_POST['dimplome'];
  $ccp=$_POST['Num_ccp'];
  $role=$_POST['role'];
  $user=$_POST['Matricule'];
  $pwd=$_POST['Matricule'];
$query = $pdo->query("SELECT Matricule FROM `employé` WHERE Matricule='$Matricule' ");
$resultat = $query->fetchAll();

$num_of_rows = count($resultat); ;
if($num_of_rows>0){
  $message='<div class="alert alert-danger">Ce Matricule existe déja => Le Matricule doit etre <strong>unique</strong> pour chaque employé!</div>';
}else{

  $resquete=$pdo->prepare ('INSERT INTO employé (nom,Prénom,sex,Date_de_Naissance,lieu_de_Naissance,Adresse,Numero_Tel,Situation_Familiale,Nombre_denfant,Statut,Matricule,DateEntré,Emploi,Grade,Echelon,Niv_Détude,Diplome,N°CCP,Nom_Utilisateur,Mot_de_passe,Role)VALUES("'.$nom.'","'.$pre.'","'.$sex.'","'.$date.'","'.$lieu.'","'.$adresse.'","'.$numt.'","'.$situation.'","'.$nbr.'","'.$Statu.'","'.$Matricule.'","'.$dateentree.'","'.$emploi.'","'.$grade.'","'.$echlon.'","'.$niv.'","'.$Diplome.'","'.$ccp.'","'.$user.'","'.$pwd.'","'.$role.'")');
  
   
 
  if($resquete->execute()){
    ?>

   <script>
    succes_ajout();
    

    </script>;
   <?php

  }else{
   ?>

   <script>
    error();
    

    </script>;
   <?php

   
}

}}}


?> 
<?php
if (isset($_POST['supprimer'])) {
foreach ($_POST['checkbox'] as $key) {
$requete= $pdo->prepare ("DELETE FROM  employé WHERE idemp=$key");
$requete->execute(); }?>
<html>
<head>
<meta http-equiv="refresh" content="1;url=emppp.php">
</head>
<div class="alert success" style="background-color: #4CAF50;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>succés !</strong> Suppression avc succés 
</div>
</html> 
 <?php  }



?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>

<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
  <title>Gestion des employé</title>

</head>
<body>







 <div class="container" style="background-color: transparent;margin-left: 4%;margin-bottom: 30px; font-size: 35px; font-weight: bold; ">Liste des employés
</div>

<div class="container" style="width: 120%;margin-left:5%;margin-bottom: 30px; height: 40px; background-color: #b2b2b2;color: white; font-size: 20px; font-weight: bold"><a  style="text-decoration: none; color: white;"  href="dashboard.php?id=<?php echo $id ?>">Dashoard</a> / <a style="text-decoration: none; color: white;" href="">Gestion des employés</a>
</div>    

    

        <div class="grid-container" style="margin-left: 12%; margin-right: 20%">
  <div class="button material-icons fab-icon" style="padding-left: 10%; padding-right: 10%;border-top:2px solid #bc5a45;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width: 1000px; padding-left: 20px; padding-right: 20px; margin-left: 2%; margin-bottom:0px;padding-top:5px;padding-bottom:10px">



  <a  href="emp.php?#popup3" type="button" rel="tooltip" class="btn peach-gradient"  style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 20%; margin-right: 18%;"><i class="fas fa-user-plus"></i> Ajouter </a> 

   <button class="btn peach-gradient" type="submit" name="supprimer" style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 20%; margin-right: 18%"><i class="fas fa-user-minus"></i> Supprimer </button>



  <button class="btn peach-gradient" style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width:20%;"><i class="fas fa-file-contract"></i> rapport des employés</button>

</div>
</div>
    
 <div class="grid-container" style="margin-left:5%">

  
   <div class="tableau" style=" padding-left: 5%; padding-right: 10%;border-top:2px solid #bc5a45;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width: 1200px; padding-left: 20px; padding-right: 20px; margin-left: 2%; margin-bottom: 20px;">
  
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%"  style=" padding-right: 10px;width: 1200px; background-color:white;text-align: center;">
 
           <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Matricule</th>
              <th>fonction</th>
              <th>Action</th>
              
              
            </tr>
          </thead>

          

          <tbody>

<?php foreach ($resultat as $key => $variable){ ?> 
                    <tr>
                      <td>
                          
                        <input  type="checkbox" name="checkbox[]" value="<?php echo $resultat[$key]['idemp'];
                        ?>" >
                        
                  </td>
                      <td>   <?php echo $resultat[$key]['idemp']; ?>   </td>
                      <td>  <?php echo $resultat[$key]['nom'] ?>     </td>
                      <td>   <?php echo $resultat[$key]['Prénom'] ?>   </td>
                      <td>   <?php echo $resultat[$key]['Matricule'] ?>   </td>
                      <td>   <?php echo $resultat[$key]['Emploi'] ?>   </td>
<td style="text-align: center;">
                            <a  href="emppp.php?id=<?php echo $resultat[$key]['idemp']; ?>#popup2"
                        type="button" rel="tooltip" ><i class="fas fa-pencil-alt" style="color: green;"></i></a>
                      
                 <a  class="col-sm-1" href="detailemp.php?id=<?php echo $resultat[$key]['idemp']; ?>"
                        type="button" rel="tooltip"><i class="fa fa-user" ></i></a>
                    

               <a
                        href="emppp.php?id=<?php echo $resultat[$key]['idemp'];?>#popup1"
                        type="button" rel="tooltip"><i class="fas fa-trash" style="color: red;"></i>
                        </a>
                 </td>

 </tr>
           
                            
 <?php } ?>
 </form>
           </tbody>
        </table>
      </div>
    </div>

  
  </div>
  </div>
</div>
</div> 
<div id="popup1" class="overlay">
  <div class="popup"><br/>
    <a class="close" href="emppp.php">×</a><br>
      <div class="alert"> 
  <strong>Warning!</strong> Etes vous de vouloir supprimer cet employé?
</div>

    <br /><br />
     <a
                        href="supp_emp.php?id=<?php echo $_GET['id']?>"> <button class="btn btn-danger">Oui</button>  </a>
                        <a
                        href="emppp.php"> <button class="btn btn-success">Non</button>  </a>
  </div>
</div>

<div id="popup2" class="overlay">
  <div class="popup"><br/>
    <a class="close" href="emppp.php">×</a><br>
      <div class="a">
      <?php 
$id= $_GET['id'];
$query = $pdo->query("SELECT * FROM `employé` WHERE idemp= '$id' ");
$resultatt = $query->fetchAll();
foreach ($resultatt as $key => $variable){ 
?>
      <form class="form-horizontal" role="form" method="POST">
        <div style=" border:solid grey; border-width: 2px;background-color: grey; ">
     <h2 style="padding-left:30px; color: white; "><i>Informations de " <?php  echo $resultatt[$key]['nom']; ?> <?php  echo $resultatt[$key]['Prénom']; ?>"</i></h2> </div>

        <h2 style="padding-top:20px"><i>Informations personnelles :</i></h2>
       <div class="form-row" style="padding-top:20px;">
          
    <!-- Default input -->
    <div class="form-group col-md-3" style="padding-left:50px;">
      <label for="">Nom</label>
      <input type="text"
      name="nom"  value="<?php echo isset($resultatt[$key]['nom'])? $resultatt[$key]['nom']: $_POST["nom"] ?>"  class=" <?php if(show_error('nom')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>
        "
        style=" border:1px solid grey; background-color: transparent;">
        <div class="invalid-feedback">
          <?php echo show_error('nom');?>
        </div>
      

    </div>
    <!-- Default input -->
    <div class="form-group col-md-3">
      <label for="Prénom">Prénom</label>
      <input type="text" name="Prénom" class=" <?php if(show_error('Prénom')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"   value="<?php echo isset($resultatt[$key]['Prénom'])  ? $resultatt[$key]['Prénom']:  $_POST["Prénom"] ?>"   style=" border:1px solid grey; background-color: transparent;">
      </div>
          <div class="invalid-feedback">
          <?php echo show_error('Prénom');?>
        </div> 

    
    <div class="form-group col-md-2">
       <label for="Sex">Sex:</label>
              <select type="gender" name="Sex" class="form-control" value="<?php echo isset($resultatt[$key]['sex'])  ? $resultatt[$key]['sex']:  $_POST["Sex"] ?>">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
    </div>
<div class="form-group col-md-2">
<label for="Situationfamiliale">Situation:</label>
              <select  name="situation"class="form-control" value="<?php echo isset($resultatt[$key]['Situation_Familiale'])  ? $resultatt[$key]['Situation_Familiale']:  $_POST["Situation_Familiale"] ?>">
                <option value="Marié">Marié</option>
                <option value="Divorcé">Divorcé</option>
                <option value="Célibataire">Célibataire</option>
              </select>
          </div>
    <div class="form-group col-md-3"style="padding-left:50px;">
      <label for="">Date_Naissance</label>
      <input type="Date"name="date_N" class="form-control" id="inputEmail4"  value="<?php echo isset($resultatt[$key]['Date_de_Naissance'])  ? $resultatt[$key]['Date_de_Naissance']:  $_POST["date_N"] ?>"   style=" border:1px solid grey; background-color: transparent;">
        </d iv>
    <div class="form-group col-md-3" style="padding-left:2px;">
      <label for=""style="padding-left:2px;">  lieu_naissance :</label>
      <input type="text" name="lieu_N" class=" <?php if(show_error('lieu_N')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"   value="<?php echo isset($resultatt[$key]['lieu_de_Naissance'])  ? $resultatt[$key]['lieu_de_Naissance']:  $_POST["lieu_N"] ?>"  ><div class="invalid-feedback">
          <?php echo show_error('lieu_N');?>
        </div> 

    
</div>
    <div class="form-group col-md-2">
      <label for="">Nbr enfant</label>
      <input type="text" name="Nombre_enfants"class=" <?php if(show_error('Nombre_enfants')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"  id="inputZip"  value="<?php echo isset($resultatt[$key]['Nombre_denfant'])  ? $resultatt[$key]['Nombre_denfant']:  $_POST["Nombre_enfants"] ?>"   style=" border:1px solid grey; background-color: transparent;"><div class="invalid-feedback">
          <?php echo show_error('Nombre_enfants');?>
        </div> 
      </div>
      <div class="form-group col-md-2">
      <label for="">Numero_Tel</label>
      <input type="text" name="NumeroTel" class=" <?php if(show_error('NumeroTel')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" id="inputCity"  value="<?php echo isset($resultatt[$key]['Numero_Tel'])  ? $resultatt[$key]['Numero_Tel']:  $_POST["NumeroTel"] ?>"   style=" border:1px solid grey; background-color: transparent;"><div class="invalid-feedback">
          <?php echo show_error('NumeroTel');?>
        </div> 
      </div>

    <div class="form-group col-md-3" style="padding-left:50px;">
      <label for="">Adresse</label>
      <input type="text" name="address" class=" <?php if(show_error('adresse')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" value="<?php echo isset($resultatt[$key]['Adresse'])  ? $resultatt[$key]['Adresse']:  $_POST["address"] ?>"   style=" border:1px solid grey; background-color: transparent;"> 
       </div>
      <div class="invalid-feedback">
          <?php echo show_error('adresse');?>
        </div> 
     
    
    <div class="form-group col-md-3">
             <label for="numccp">Numéro de CCP:</label>
             <input type="text" style=" border:1px solid grey; background-color: transparent;" name="Num_ccp" class=" <?php if(show_error('Num_ccp')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($resultatt[$key]['N°CCP'])  ? $resultatt[$key]['N°CCP']:  $_POST["Num_ccp"] ?>">
             <div class="invalid-feedback">
          <?php echo show_error('Num_ccp');?>
        </div> 
          

    
        </div>
      </div>
        <div class="form-row" >
<h2 style="padding-bottom:20px;padding-left:20px;"><i>Informations administratives :</i></h2>
</div>
       <div class="form-row" >
    <div class="form-group col-md-3"style="padding-left:50px;">
      <label for="Matricule">Matricule:</label>
              <input type="text" name="Matricule"class=" <?php if(show_error('Matricule')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($resultatt[$key]['Matricule'])  ?$resultatt[$key]['Matricule']:  $_POST["Matricule"] ?>">

             </div>
              <div class="invalid-feedback">
          <?php echo show_error('Matricule');?>
        </div> 
    <div class="form-group col-md-3">
      <label for="">Date d'entrée</label>
      <input type="Date"  name ="date_entree"class="form-control" value="<?php echo isset($resultatt[$key]['DateEntré'])  ? $resultatt[$key]['DateEntré']:  $_POST["date_entree"] ?>"   style=" border:1px solid grey; background-color: transparent;">
    </div>
        <div class="form-group col-md-2">
    <label for="Statu">Statut:</label>
            <select name="Statu" class="form-control" value="<?php echo isset($resultatt[$key]['Statut'])  ? $resultatt[$key]['Statut']:  $_POST["Statut"] ?>">
                <option value="Fonctionnair">Fonctionnair</option>
                <option value="Stagiaire">Stagiaire</option>
                
            </select>
          </div>
          <div class="form-group col-md-2">
      <label for="">Grade</label>
      <input type="text" name="grade" class=" <?php if(show_error('grade')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" value="<?php echo isset($resultatt[$key]['Grade'])  ? $resultatt[$key]['Grade']:  $_POST["grade"] ?>"style=" border:1px solid grey; background-color: transparent;"><div class="invalid-feedback">
          <?php echo show_error('grade');?>
        </div>
    </div>

    <!-- Default input -->
    <div class="form-group col-md-4"style="padding-left:50px;">
      <label for="">Emploi</label>
      <input type="text" name="emploi"  class=" <?php if(show_error('emploi')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"  value="<?php echo isset($resultatt[$key]['Emploi'])  ? $resultatt[$key]['Emploi']:  $_POST["emploi"] ?>"   style=" border:1px solid grey; background-color: transparent;"> 
      <div class="invalid-feedback">
          <?php echo show_error('emploi');?>
        </div>
      </div>
    <!-- Default input -->
    
     <div class="form-group col-md-3">
      <label for="">Niv_D'étude</label>
      <input type="text" name="NIV_etude"class=" <?php if(show_error('NIV_etude')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" value="<?php echo isset($resultatt[$key]['Niv_Détude'])  ? $resultatt[$key]['Niv_Détude']:  $_POST["NIV_etude"] ?>"   style=" border:1px solid grey; background-color: transparent;">
      <div class="invalid-feedback">
          <?php echo show_error('NIV_etude');?>
        </div> 
    </div>
     
     <div class="form-group col-md-3">
            <label for="role">role:</label>
            <select name="role" style=" border:1px solid grey; background-color: transparent;" class="form-control" value="<?php echo isset($resultatt[$key]['Role'])  ? $resultatt[$key]['role']:  $_POST["role"] ?>">
                <option value="admin">Admin</option>
                <option value="utilisateur">Utilisateur</option>
                
            </select>
          </div>

    <div class="form-group col-md-3"style="padding-left:50px;">
            <label for="Echlon">Echlon:</label>
            <select type="gender" style=" border:1px solid grey; background-color: transparent;" name="Echlon" class="form-control" value="<?php echo isset($resultatt[$key]['Echelon'])  ? $resultatt[$key]['Echelon']:  $_POST["Echelon"]?>">
                <option value="01">E_01</option>
                <option value="02">E_02</option>
                <option value="03">E_03</option>
                <option value="04">E_04</option>
            </select>
          </div>
    <!-- Default input -->
    <div class="form-group col-md-3">
      <label for="">Diplome</label>
      <input type="text" name="dimplome"class=" <?php if(show_error('diplome')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"  value="<?php echo isset($resultatt[$key]['Diplome'])  ? $resultatt[$key]['Diplome']:  $_POST["dimplome"] ?>"   style=" border:1px solid grey; background-color: transparent;"> 
      <div class="invalid-feedback">
          <?php echo show_error('diplome');?>
        </div>
    </div>
  
    
               <div class="form-group col-md-2">
            <label for="role">Groupe:</label>
          <select name="Groupe" style=" border:1px solid grey; background-color: transparent;" class="form-control"value="groupe">
                <option value="Fonctionnair"></option>
                <option value="Stagiaire"></option>
                
            </select>
          </div>
               <div class="form-group col-md-2">
            <label for="role">Service:</label>
              <select name="service" style=" border:1px solid grey; background-color: transparent;" class="form-control" value="service">
                <option value="Fonctionnair"></option>
                <option value="Fonctionnair"></option>
                
            </select>
          </div>

  </div>

<button class="btn button" type="submit" name="submit1" style="background-color: grey; color: white" >verfier</button>
 </form>
 
</div>
  <?php   if (isset($_POST['submit1'])){
  if(empty($errors)) { ?>
  <div style="padding-left: 400px;">
<a href="emppp.php"><button  class="btn btn-success" style="padding-left: 350px;" 
> modifier</button> </a>

     <span>
                        <a href="emppp.php"> <button class="btn btn-danger" style="padding-left: 350px;">Non</button>  </a>
                        </span>
                        <?php } }?>
                        </div>
                        
        </div>
      </div>


<!--popup3 ajouter un nv employé-->
<div id="popup3" class="overlay" style="background-color: white;width: 930px;height: 570px;padding-left: 5px;padding-right: 5px;margin-left: 15%;margin-top: 5%">

    <div style="background-color: #bc5a45; height:10%;width:104.5%;margin-top:0%;margin-left:-2.2%;text-align: center;padding-top:5px">
     <h3 style=" color: white;display: inline;"><i>Ajouter un nouveau employé</i></h3>
     <a class="close" href="emp.php" style="font-size:45px;color: white;margin-left:-5%">×</a><br>
      </div>
  
      
<form class="form-horizontal" role="form" method="POST">
        <h3 style="padding-top:20px;color: #bc5a45;padding-left:30px"><i>Informations personnelles :</i></h3>
       <div class="form-row" style="padding-top:20px;">
          
    <!-- Default input -->
    <div class="form-group col-md-2" >
      <label for="">Nom</label>
      <input type="text"
      name="nom" required value="<?php echo isset($_POST["nom"])  ? $_POST["nom"]: '' ?>"  class=" <?php if(show_error('nom')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>
        "
       style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;">
        <div class="invalid-feedback">
          <?php echo show_error('nom');?>
        </div>
      

    </div>
    <!-- Default input -->
    <div class="form-group col-md-2">
      <label for="">Prénom</label>
      <input type="text" name="Prénom" class=" <?php if(show_error('Prénom')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"  required value="<?php echo isset($_POST["Prénom"])  ? $_POST["Prénom"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">

      </div>
          <div class="invalid-feedback">
          <?php echo show_error('Prénom');?>
        </div> 

    
    <div class="form-group col-md-2">
       <label for="Sex">Sex:</label>
              <select type="gender" name="Sex" class="form-control browser-default custom-select"required value="<?php echo isset($_POST["Sex"])  ? $_POST["Sex"]: '' ?>" style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
    </div>
<div class="form-group col-md-2">
<label for="Situationfamiliale">Situation:</label>
              <select  name="situation"class="form-control browser-default custom-select" required value="<?php echo isset($_POST["situation"])  ? $_POST["situation"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; height: 25px;background-color: transparent;">
                <option value="Marié">Marié</option>
                <option value="Divorcé">Divorcé</option>
                <option value="Célibataire">Célibataire</option>
              </select>
          </div>

    <div class="form-group col-md-2">
      <label for="">Date de Naissance</label>
      <input type="Date"name="date_N" class="form-control" id="inputEmail4" required value="<?php echo isset($_POST["date_N"])  ? $_POST["date_N"]: '' ?>"  style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top:0%">
        </div>
    <div class="form-group col-md-2" style="padding-left:2px;">
      <label for=""style="padding-left:2px;">  lieu de naissance :</label>
      <input type="text" name="lieu_N" class=" <?php if(show_error('lieu_N')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required  value="<?php echo isset($_POST["lieu_N"])  ? $_POST["lieu_N"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"><div class="invalid-feedback">
          <?php echo show_error('lieu_N');?>
        </div> 

    
</div>
    <div class="form-group col-md-2">
      <label for="">Nbr d'enfants</label>
      <input type="text" name="Nombre_enfants"class=" <?php if(show_error('Nombre_enfants')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"  id="inputZip" required value="<?php echo isset($_POST["Nombre_enfants"])  ? $_POST["Nombre_enfants"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"><div class="invalid-feedback">
          <?php echo show_error('Nombre_enfants');?>
        </div> 
      </div>
      <div class="form-group col-md-2">
      <label for="">Numero de tel</label>
      <input type="text" name="NumeroTel" class=" <?php if(show_error('NumeroTel')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" id="inputCity" required value="<?php echo isset($_POST["NumeroTel"])  ? $_POST["NumeroTel"]: '' ?>"  style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"><div class="invalid-feedback">
          <?php echo show_error('NumeroTel');?>
        </div> 
      </div>

    <div class="form-group col-md-3">
      <label for="">Adresse</label>
      <input type="text" name="address" class=" <?php if(show_error('adresse')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" id="inputPassword4" required  value="<?php echo isset($_POST["adresse"])  ? $_POST["adresse"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
      <div class="invalid-feedback">
          <?php echo show_error('adresse');?>
        </div> 
      </div>
    
    <div class="form-group col-md-2">
             <label for="numccp">Numéro de CCP:</label>
             <input type="text"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px" name="Num_ccp" class=" <?php if(show_error('Num_ccp')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($_POST["Num_ccp"])  ? $_POST["Num_ccp"]: '' ?>">
             <div class="invalid-feedback">
          <?php echo show_error('Num_ccp');?>
        </div> 
          


    
        </div>
      </div>
        <div class="form-row" >
<h3 style="padding-bottom:20px;padding-left:30px;color: #bc5a45;"><i>Informations administratives :</i></h3>
</div>
       <div class="form-row" >
    <div class="form-group col-md-2">
      <label for="Matricule">Matricule:</label>
              <input type="text" name="Matricule"class=" <?php if(show_error('Matricule')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($_POST["Matricule"])  ? $_POST["Matricule"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">

             </div>
              <div class="invalid-feedback">
          <?php echo show_error('Matricule');?>
        </div> 
    <div class="form-group col-md-2">
      <label for="">Date d'entrée</label>
      <input type="Date"  name ="date_entree"class="form-control" required value="<?php echo isset($_POST["date_entree"])  ? $_POST["date_entree"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top:0%">
    </div>
        <div class="form-group col-md-2">
    <label for="Statu">Statut:</label>
            <select name="Statu" class="form-control browser-default custom-select" required value="<?php echo isset($_POST["Statu"])  ? $_POST["Statu"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <option value="Fonctionnair">Fonctionnair</option>
                <option value="Stagiaire">Stagiaire</option>
                
            </select>
          </div>
          <div class="form-group col-md-2">
      <label for="">Grade</label>
      <input type="text" name="grade" class=" <?php if(show_error('grade')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value= "<?php echo isset($_POST["grade"])  ? $_POST["grade"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%"><div class="invalid-feedback">
          <?php echo show_error('grade');?>
        </div>
    </div>

    <!-- Default input -->
    <div class="form-group col-md-2">
      <label for="">Emploi</label>
      <input type="text" name="emploi"  class=" <?php if(show_error('emploi')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($_POST["emploi"])  ? $_POST["emploi"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
      </div>
      <div class="invalid-feedback">
          <?php echo show_error('emploi');?>
        </div>
      
    <!-- Default input -->
    
     <div class="form-group col-md-2">
      <label for="">Niv_D'étude</label>
      <input type="text" name="NIV_etude"class=" <?php if(show_error('NIV_etude')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($_POST["NIV_etude"])  ? $_POST["NIV_etude"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">
      </div>
      <div class="invalid-feedback">
          <?php echo show_error('NIV_etude');?>
        </div> 
    
     
     <div class="form-group col-md-2">
            <label for="role">role:</label>
            <select name="role" class="form-control browser-default custom-select" required value="<?php echo isset($_POST["role"])  ? $_POST["role"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <option value="admin">Admin</option>
                <option value="utilisateur">Utilisateur</option>
                
            </select>
          </div>

    <div class="form-group col-md-2">
            <label for="Echlon">Echlon:</label>
            <select type="gender" name="Echlon" class="form-control browser-default custom-select"  required value="<?php echo isset($_POST["Echlon"])  ? $_POST["Echlon"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <option value="01">E_01</option>
                <option value="02">E_02</option>
                <option value="03">E_03</option>
                <option value="04">E_04</option>
            </select>
          </div>
    <!-- Default input -->
    <div class="form-group col-md-2">
      <label for="">Diplome</label>
      <input type="text" name="dimplome"class=" <?php if(show_error('diplome')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($_POST["diplome"])  ? $_POST["diplome"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
        </div>
      <div class="invalid-feedback">
          <?php echo show_error('diplome');?>
        </div>
  
  
    
               <div class="form-group col-md-1">
            <label for="role">Groupe:</label>
          <select name="Groupe"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%" class="form-control browser-default custom-select" required value="groupe">
                <option value="Fonctionnair"></option>
                <option value="Stagiaire"></option>
                
            </select>
          </div>
               <div class="form-group col-md-2">
            <label for="role">Service:</label>
              <select name="service"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%" class="form-control browser-default custom-select" required value="service">
                <option value="Fonctionnair"></option>
                <option value="Fonctionnair"></option>
                
            </select>
                    </div>

  </div>
 


<a href="emppp.php?id=<?php echo $_GET['id']?>" ><button class="btn button" type="submit" name="submit2"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;" onclick="
let timerInterval
Swal.fire({
  title: 'Auto close alert!',
  html: 'Verification en cours ... <b></b> ',
  timer: 3000,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});">Verifier</button></a>


     </form>
 <?php   if (isset($_POST['submit2'])){
  if(empty($errors)) { 


    ?>
    <div style="text-align: center;">          <a
                        href="emppp.php"> <button class="btn blue-gradient">Ajouter</button>  </a>
                        <a
                        href="emppp.php"> <button class="btn peach-gradient">Annuler</button>  </a>
                      </div>
                    <?php }} ?>
     </div>
     </div>
   </form>
 </div>
</div>
</div>
</body>
</html>





    <style type="text/css">

 

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

    </style>
    <script type="text/javascript">
      $(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );


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