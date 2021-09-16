<script type="text/javascript">

  
 function error_format() {
       Swal.fire({
  icon: 'error',
  title: 'Erreur',
  text: 'Veuillez respecter la format des champs erronées!',


  confirmButtonText:
    '<button style="background-color:white;border:none;color:black;width:70px" onclick="document.getElementById(\'add\').click()"> Ok!</button>',
})}
</script>

<?php 
$ida=$_GET['id'];
require 'dashboard_admin.php';
$queryy = $pdo->query("SELECT * FROM `statu_employé`");
$resultath = $queryy->fetchAll();
if (isset($_POST['ajouter']))
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

   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Matricule"])){
      $errors['Matricule'] = "Le champ Matricule ne doit contenir que les lettres et les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Grade"])){
      $errors['grade'] = "Le champ grade ne doit contenir que les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["NIV_etude"])){
      $errors['NIV_etude'] = "Le champ Niveau d'étude ne doit contenir que les lettres et les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["diplome"])){
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
  $adresse=$_POST['adresse'];
  $nbr=$_POST['Nombre_enfants'];
  $Statu=$_POST['Statu'];  
  $Matricule=$_POST['Matricule'];
  $dateentree=$_POST['date_entree'];
  $emploi=$_POST['emploi'];
  $grade=$_POST['Grade'];
  $echlon=$_POST['Echlon'];
  $niv=$_POST['NIV_etude'];
  $Diplome=$_POST['diplome'];
  $ccp=$_POST['Num_ccp'];
  $role=$_POST['role'];
  $user=$_POST['Matricule'];
  $service=$_POST['service'];
  $groupe=$_POST['Groupe'];
  $email=$_POST['email'];
  $function=$_POST['fonct'];
  echo $function;
  // generer un mp
  $mon_mot_de_passe = Genere_Password(10); 
  $pwd=sha1($mon_mot_de_passe); 
  $query = $pdo->query("SELECT Matricule FROM `employé` WHERE Matricule='$Matricule' ");
$resultat4 = $query->fetchAll();
$num_of_rows = count($resultat4); 
if($num_of_rows>0){
    $errors['Matricule'] = "Ce Matricule existe déja => Le Matricule doit etre <strong>unique</strong> pour chaque employé!";
}else{
$resquete=$pdo->prepare ("INSERT INTO `employé` (`idemp`, `nom`, `Prénom`, `sex`, `Date_de_Naissance`, `lieu_de_Naissance`, `Adresse`, `Numero_Tel`, `Situation_Familiale`, `Nombre_denfant`, `Statut`, `Matricule`, `DateEntré`, `Emploi`, `Grade`, `Echelon`, `Niv_Détude`, `Diplome`, `N°CCP`, `Nom_Utilisateur`, `Mot_de_passe`, `role`, `service`, `id_groupe`, `email`, `fonction`, `traveaux_recherche`, `emplois_hors_enseignement`, `date_obtention_diplome`, `plus_d'infos`, `spécialité`, `discipline`, `Curriculum`, `Initiative`, `Cpct`) VALUES (NULL, '$nom', '$pre', '$sex', '$date', '$lieu', '$adresse', '$numt', '$situation', '$nbr', '$Statu', '$Matricule', '$dateentree', '$emploi', '$grade', '$echlon', '$niv', '$Diplome', '$ccp', '$user', '$pwd', '$role', '$service', '$groupe', '$email', '$function', '', '', '', '', '', '0', '0', '0', '0');");

if($resquete->execute()){
  echo "helllo";  ?> 
<script type="text/javascript">
  function succes_ajout(){
   Swal.fire({
  
  icon: 'success',
  title: 'Vous avez ajouter un nouveau employé avec succes',
  showConfirmButton: false,
  timer: 1900
})
  }
succes_ajout();
    </script>
    <html>
<head>
<meta http-equiv="refresh" content="1;url=a.php?id=<?php echo $ida;?>">
</head>
</html>
<?php }else{ ?>
  <script type="text/javascript">errors();</script>
  
<?php }}}else{
  ?>
<script>
    error_format ();
</script>
<?php
}}
$query = $pdo->query("SELECT * FROM `employé`");
$resultat = $query->fetchAll();
  ?>
  <!DOCTYPE html>
<html>
<head>
  <title>employé</title>
</head>
<body>
<div class="container-2" style="margin-bottom: 50px;margin-left:2% ">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fa fa-users"></i>Gestion des employés </h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Aceuil</a> / <a href=""> <i class="fa fa-users"></i> Gestion des employés </a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:56%;font-size: 15px;display: inline;">
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
    
    
<form method="POST">
<div class="grid-container">
<div class="button material-icons fab-icon" style="padding-left: 15%; padding-right: 10%;border-top:2px solid #fd8b66;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:500px; padding-left: 20px; padding-right: 20px; margin-left: 2%; margin-bottom:0px;padding-top:5px;padding-bottom:10px">
  <button id="add" data-toggle="modal" data-target="#addemp" type="button" rel="tooltip" class="btn peach-gradient"  style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 36%; margin-right:22%;"><i class="fas fa-user-plus" ></i> Ajouter </button> 

   <button class="btn peach-gradient" type="submit" name="supprimer" style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 35%; margin-right:1%"><i class="fas fa-user-minus"></i> Supprimer </button>

</div>
</div>

 
  <div class="" >
  <div style=" width:100%;border-top:2px solid #fd8b66;background: white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); margin-bottom: 20px;">
 <table id="example" class="table table-striped table-bordered" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;"> 
           <thead class="thead-dark">
            <tr>
              <th  style="width:9px;"></th>
              <th  style="width:10px;">#</th>
              <th  style="width:130px;">Nom</th>
              <th  style="width:110px;">Prénom</th>
              <th  style="width:110px;">Matricule</th>
              <th  style="width:100px;">fonction</th>
              <th  style="width:70px;">Action</th>
              
              
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
                            <a  href="a.php?id=<?php echo $ida;?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup2">
                            <i class="fas fa-pencil-alt" style="color: green;"></i></a>
                      
                 <a  class="col-sm-1" href="a.php?id=<?php echo $ida;?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup10"
                        type="button" rel="tooltip"><i class="fa fa-user" ></i></a>
          <a  href="a.php?id=<?php echo $ida;?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup3">
           <i class="fas fa-trash-alt" style="color: red;"></i></a> 
             <a  href="a.php?id=<?php echo $ida;?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup4">
                            <i class="fas fa-archive" style="color: grey;"></i></a> </td>

 </tr>
<?php } ?>
    
</tbody>
</table>
</div>
</div>
</form>
</div>
</div>
<?php 
$query = $pdo->query("SELECT id_groupe FROM `groupe`");
$resultatg = $query->fetchAll(); ?>
<div class="modal fade" id="addemp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content" style="width: 1000px;margin-right:50%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau employé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST">
        <h3 style="padding-top:20px;color: #bc5a45;padding-left:30px"><i>Informations personnelles :</i></h3>
       <div class="form-row" style="padding-top:20px;">
          
    <!-- Default input -->
   <div class="form-group col-md-2" >
      <label for="">Nom</label>
      <input type="text"
      name="nom" onclick="verifNom(this)" required value="<?php echo isset($_POST["nom"])  ? $_POST["nom"]: '' ?>"  class=" <?php if(show_error('nom')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>
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
      <input type="text" name="adresse" class=" <?php if(show_error('adresse')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" id="inputPassword4" required  value="<?php echo isset($_POST["adresse"])  ? $_POST["adresse"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
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
               <?php foreach ($resultath as $key => $variable) {?>
                <option style="color: black;" value="<?php echo isset($_POST["Statut"])  ? $_POST["Statut"]: '' ?>"><?php echo $resultath[$key]['id_statu'];?></option>
              <?php }?>
                
            </select>
          </div>
          <div class="form-group col-md-2">
             <label for="">Grade</label>
      <?php 

$Grade = $pdo->query("SELECT * FROM `grade`");
$Grade = $Grade->fetchAll();
/*$f = $pdo->query("SELECT * FROM `Grade` WHERE id_Grade ='$fnc'");
$f = $f->fetch();*/
    ?>
            <select name="Grade" class="form-control browser-default custom-select" required value="<?php echo isset($grd)  ? $grd:  $_POST["Grade"]?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%;margin-left: 2%">
                <?php foreach ($Grade as $key => $variable){  ?> 
                <option style="color: black;" value="<?php echo $resultath[$key]['id_statu'] ?>"><?php echo $resultath[$key]['statu'];?></option>
                
                <?php } ?>
              </select>

  </div>

    <!-- Default input -->
      <div class="form-group col-md-2">
      <label for="">Emploi</label>
      <select name="emploi" class="form-control browser-default custom-select" required value="<?php echo isset($_POST["emploi"])  ? $_POST["emploi"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <option value="employé-de-bureau">employé de bureau</option>
                <option value="agent-de-sécurite">agent-de-sécurite</option>
                <option value="professeur">professeur</option>
                
            </select>
          </div>
      
      
    <!-- Default input -->
    
     <div class="form-group col-md-2">
      <label for="">Niv_D'étude</label>
      <input type="text" name="NIV_etude"class=" <?php if(show_error('NIV_etude')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($_POST["NIV_etude"])  ? $_POST["NIV_etude"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">
      </div>
      <div class="invalid-feedback">
          <?php echo show_error('NIV_etude');?>
        </div> 
    
     
     <div class="form-group col-md-1">
            <label for="role">role:</label>
            <select name="role" class="form-control browser-default custom-select" required value="<?php echo isset($_POST["role"])  ? $_POST["role"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <option value="admin">Admin</option>
                <option value="utilisateur">Utilisateur</option>
                
            </select>
          </div>

    <div class="form-group col-md-1">
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
      <input type="text" name="diplome"class=" <?php if(show_error('diplome')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($_POST["diplome"])  ? $_POST["diplome"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
        </div>
      <div class="invalid-feedback">
          <?php echo show_error('diplome');?>
        </div>
  
  
    
               <div class="form-group col-md-1">
            <label for="role">Groupe:</label>
          <select name="Groupe"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%" class="form-control browser-default custom-select" required value="groupe">
            <?php foreach ($resultatg as $key => $variable) {?>
                <option style="color: black;" value="<?php echo $resultatg[$key]['id_groupe'];?> "><?php echo $resultatg[$key]['id_groupe'];?></option>
              <?php }?>
            </select>
          </div>
            <div class="form-group col-md-2" id="fonc" >
             <label for="">Fonction</label>
      <?php 
    $fonction = $pdo->query("SELECT * FROM `fonction`");
$fonction = $fonction->fetchAll();
    ?>
            <select name="fonct" class="form-control browser-default custom-select" required value="<?php echo isset($_POST["fonct"])  ? $_POST["fonct"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%;margin-left: 2%">
                <?php foreach ($fonction as $key => $variable){  ?> 
                <option value="<?php echo $fonction[$key]['id_fonction'] ?> "><?php echo $fonction[$key]['fonction'] ?> </option>
                
                <?php } ?>
              </select>

  </div>
  <div class="form-group col-md-2">
      <label for="">Service</label>
      <input type="text" name="service"class=" form-control " required value="<?php echo isset($_POST["service"])  ? $_POST["service"]: '' ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
        </div>

        <div class="form-group col-md-2">
             <label for="">email</label>
      <input type="email"
      name="email" required value="<?php echo isset($_POST["email"])  ? $_POST["email"]: '' ?>" class="form-control'
        "
       style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;">
       
</div>

  </div>


    <div style="text-align: center;">          
                         <button type="submit" name="ajouter" class="btn blue-gradient">Ajouter</button>  
                        
                         <button class="btn peach-gradient">Annuler</button>  </a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </body>
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