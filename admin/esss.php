
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php 
require 'dashboard_admin.php';
$query = $pdo->query("SELECT * FROM `employé`");
$resultat = $query->fetchAll();
if (isset($_POST['Modifier']))
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
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Grade"])){
      $errors['grade'] = "Le champ grade ne doit contenir que les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["NIV_etude"])){
      $errors['NIV_etude'] = "Le champ Niveau d'étude ne doit contenir que les lettres et les chiffres";
   }
   if(!preg_match("#^[a-zA-Z0-9]*$# ",$_POST["Diplome"])){
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
  $Diplome=$_POST['Diplome'];
  $ccp=$_POST['Num_ccp'];
  $role=$_POST['role'];
  $user=$_POST['Matricule'];
  $service=$_POST['service'];
  $groupe=$_POST['Groupe'];
  $email=$_POST['email'];
  $fonction=$_POST['fonct']; 
  $id=$_GET['idemp'];
$query = $pdo->query("SELECT Matricule FROM `employé` WHERE Matricule='$Matricule' AND idemp<>'$id'  ");
$resultat = $query->fetchAll();

$num_of_rows = count($resultat); 

if($num_of_rows==1){
  $message='<div class="alert alert-danger">Ce Matricule existe déja => Le Matricule doit etre <strong>unique</strong> pour chaque employé!</div>';
}else{

   $resquete=$pdo->prepare ("UPDATE employé SET  nom =?,  Prénom =?, sex =?, Date_de_Naissance =?, lieu_de_Naissance =?, Adresse =?, Numero_tel =?, Situation_Familiale =?, Nombre_denfant =?,Statut=?, Matricule =?, DateEntré =?, Emploi =?, Grade =?, Echelon =? , Niv_Détude = ?, Diplome =?,N°CCP=?, Role =?,service=?,id_groupe=?,email=? , fonction =?WHERE  idemp = ? ");
 $req=$resquete->execute(array($nom,$pre,$sex,$date,$lieu,$adresse,$numt,$situation,$nbr,$Statu,$Matricule,$dateentree,$emploi,$grade,$echlon,$niv,$Diplome,$ccp,$role,$service,$groupe,$email,$fonction,$id));
 if($req){ 
  echo "hello"; ?>
    <script type="text/javascript">
 function succes_mod(){
     Swal.fire({
  icon: 'success',
  title: 'Modification avec succes!',
  showConfirmButton: false,
  footer: '<a href="ess.php?id=<?php echo $id;?>"><i class="fa fa-thumbs-up"style="color:green;"></i> </a>'
})} succes_mod();
    </script>

<?php  }else{
 echo "hello";  ?>
  <script type="text/javascript">
  errors();
    </script>
<?php } 
}

}}else{ $message="";}

?>
<body>
  <div class="container" style="background-color: transparent;margin-bottom: 30px; font-size: 35px; font-weight: bold; margin-left:2% ;position: relative;">Gestion des employés
</div>
  
<div class="container" style="width:100%;margin-bottom: 50px; height: 40px; background-color: #b2b2b2;color: white; font-size: 20px; font-weight: bold;margin-left:2%;margin-right:2px;position: relative;"><a  style="text-decoration: none; color: white;"  href="dashboard.php?id=<?php echo $id ?>">Dashoard</a>/ <a style="text-decoration: none; color: white;" href="">Gestion des employés</a>
</div>  
    
    
<form method="POST">
<div class="grid-container" style="margin-left: 15%; margin-right:28%">
<div class="button material-icons fab-icon" style="padding-left: 15%; padding-right: 10%;border-top:2px solid #fd8b66;background: white; padding-top:20px; -webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); width:500px; padding-left: 20px; padding-right: 20px; margin-left: 2%; margin-bottom:0px;padding-top:5px;padding-bottom:10px">
  <button id="add" data-toggle="modal" data-target="#basicExampleModal" type="button" rel="tooltip" class="btn peach-gradient"  style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 36%; margin-right:22%;"><i class="fas fa-user-plus"></i> Ajouter </button> 

   <button class="btn peach-gradient" type="submit" name="supprimer" style="background: #A770EF;background: -webkit-linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);  background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF); color: #fff;border: 3px solid #eee; width: 35%; margin-right:1%"><i class="fas fa-user-minus"></i> Supprimer </button>

</div>
</div>

 
  <div class="" style="margin-left:4%">
  <div style=" width:100%;border-top:2px solid #fd8b66;background: white;-webkit-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
-moz-box-shadow: 1px 1px 5px 0px rgba(173,168,173,1);
box-shadow: 1px 1px 5px 0px rgba(173,168,173,1); margin-bottom: 20px;">
 <table id="example" class="table table-striped table-bordered" style=" padding-right: 10px;width:100%; background-color:white;text-align: center;"> 
           <thead>
            <tr>
              <th  style="width:9px;"></th>
              <th  style="width:10px;">#</th>
              <th  style="width:130px;">Nom</th>
              <th  style="width:130px;">Prénom</th>
              <th  style="width:130px;">Matricule</th>
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
                            <a  href="esss.php?id=<?php
                            echo $id; ?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup2">
                            <i class="fas fa-pencil-alt" style="color: green;"></i></a>
                      
                 <a  class="col-sm-1" href="ess.php?id=<?php
                            echo $id; ?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup10"
                        type="button" rel="tooltip"><i class="fa fa-user" ></i></a>
          <a  href="ess.php?id=<?php
                            echo $id; ?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup3">
           <i class="fas fa-trash-alt" style="color: red;"></i></a> 
             <a  href="ess.php?id=<?php
                            echo $id; ?>&idemp=<?php
                            echo $resultat[$key]['idemp']; ?>#popup4">
                            <i class="fas fa-archive" style="color: grey;"></i></a> </td>

 </tr>
<?php } ?>
    
  </div>
  </div>

 </form>
           </tbody>
        </table>
      </div>
    </div>

</div>
</div> 
<?php
$query = $pdo->query("SELECT id_groupe FROM `groupe`");
$resultatg = $query->fetchAll(); ?>

<div id="popup2" class="overlay">
  <div class="popup">
       
       <h5>Modifier un employé<a class="close" href="?id=<?php echo $id;?>">×</a></h5>
        <hr>
    
      <div class="a">
      
          <?php 
$idemp= $_GET['idemp'];
$query = $pdo->query("SELECT * FROM employé WHERE idemp= '$idemp' ");
$resultatt = $query->fetchAll();
foreach ($resultatt as $key => $variable){ 
?>
     <form class="form-horizontal" role="form" method="POST">
        <h3 style="padding-top:20px;color: #bc5a45;padding-left:30px"><i>Informations personnelles :</i></h3>
       <div class="form-row" style="padding-top:20px;">
          
    <!-- Default input -->
    <div class="form-group col-md-2" >
      <label for="">Nom</label>
      <input type="text"
      name="nom" required value="<?php echo isset($resultatt[$key]['nom'])? $resultatt[$key]['nom']: $_POST["nom"] ?>"  class=" <?php if(show_error('nom')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>
        "
       style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;">
        <div class="invalid-feedback">
          <?php echo show_error('nom');?>
        </div>
      

    </div>
    <!-- Default input -->
    <div class="form-group col-md-2">
      <label for="">Prénom</label>
      <input type="text" name="Prénom" class=" <?php if(show_error('Prénom')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"  required value="<?php echo isset($resultatt[$key]['Prénom'])? $resultatt[$key]['Prénom']: $_POST["Prénom"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">

      </div>
          <div class="invalid-feedback">
          <?php echo show_error('Prénom');?>
        </div> 

    
    <div class="form-group col-md-2">
       <label for="Sex">Sex:</label>
              <select type="gender" name="Sex" class="form-control browser-default custom-select"required value="<?php echo isset($resultatt[$key]['sex'])  ? $resultatt[$key]['sex']:  $_POST["Sex"] ?>" style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
    </div>
<div class="form-group col-md-2">
<label for="Situationfamiliale">Situation:</label>
              <select  name="situation"class="form-control browser-default custom-select" required value="<?php echo isset($resultatt[$key]['Situation_Familiale'])  ? $resultatt[$key]['Situation_Familiale']:  $_POST["situation"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; height: 25px;background-color: transparent;">
                <option value="Marié">Marié</option>
                <option value="Divorcé">Divorcé</option>
                <option value="Célibataire">Célibataire</option>
              </select>
          </div>

    <div class="form-group col-md-2">
      <label for="">Date de Naissance</label>
      <input type="Date"name="date_N" class="form-control" id="inputEmail4" required value="<?php echo isset($resultatt[$key]['Date_de_Naissance'])  ? $resultatt[$key]['Date_de_Naissance']:  $_POST["date_N"] ?>"  style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top:0%">
        </div>
    <div class="form-group col-md-2" style="padding-left:2px;">
      <label for=""style="padding-left:2px;">  lieu de naissance :</label>
      <input type="text" name="lieu_N" class=" <?php if(show_error('lieu_N')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required   value="<?php echo isset($resultatt[$key]['lieu_de_Naissance'])  ? $resultatt[$key]['lieu_de_Naissance']:  $_POST["lieu_N"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"><div class="invalid-feedback">
          <?php echo show_error('lieu_N');?>
        </div> 

    
</div>
    <div class="form-group col-md-2">
      <label for="">Nbr d'enfants</label>
      <input type="text" name="Nombre_enfants"class=" <?php if(show_error('Nombre_enfants')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>"  id="inputZip" required value="<?php echo isset($resultatt[$key]['Nombre_denfant'])  ? $resultatt[$key]['Nombre_denfant']:  $_POST["Nombre_enfants"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"><div class="invalid-feedback">
          <?php echo show_error('Nombre_enfants');?>
        </div> 
      </div>
      <div class="form-group col-md-2">
      <label for="">Numero de tel</label>
      <input type="text" name="NumeroTel" class=" <?php if(show_error('NumeroTel')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" id="inputCity" required value="<?php echo isset($resultatt[$key]['Numero_Tel'])  ? $resultatt[$key]['Numero_Tel']:  $_POST["NumeroTel"] ?>"  style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"><div class="invalid-feedback">
          <?php echo show_error('NumeroTel');?>
        </div> 
      </div>

    <div class="form-group col-md-3">
      <label for="">Adresse</label>
      <input type="text" name="adresse" class=" <?php if(show_error('adresse')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" id="inputPassword4" required  value="<?php echo isset($resultatt[$key]['Adresse'])  ? $resultatt[$key]['Adresse']:  $_POST["adresse"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
      <div class="invalid-feedback">
          <?php echo show_error('adresse');?>
        </div> 
      </div>
    
    <div class="form-group col-md-2">
             <label for="numccp">Numéro de CCP:</label>
             <input type="text"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px" name="Num_ccp" class=" <?php if(show_error('Num_ccp')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($resultatt[$key]['N°CCP'])  ? $resultatt[$key]['N°CCP']:  $_POST["Num_ccp"] ?>">
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
              <input type="text" name="Matricule"class=" <?php if(show_error('Matricule')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($resultatt[$key]['Matricule'])  ?$resultatt[$key]['Matricule']:  $_POST["Matricule"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">

             </div>
              <div class="invalid-feedback">
          <?php echo show_error('Matricule');?>
        </div> 
    <div class="form-group col-md-2">
      <label for="">Date d'entrée</label>
      <input type="Date"  name ="date_entree"class="form-control" required value="<?php echo isset($resultatt[$key]['DateEntré'])  ? $resultatt[$key]['DateEntré']:  $_POST["date_entree"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top:0%">
    </div>


          <?php

     /*     <div class="form-group col-md-2">
      <label for="">Grade</label>
      <input type="text" name="grade" class=" <?php if(show_error('grade')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value= "<?php echo isset($resultatt[$key]['Grade'])  ? $resultatt[$key]['Grade']:  $_POST["grade"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%"><div class="invalid-feedback">
          <?php echo show_error('grade');?>
        </div>
    </div>*/
    ?>

    <!-- Default input -->
    <div class="form-group col-md-2">
      <label for="">Emploi</label>

                

<?php
 $em=$resultatt[$key]['Emploi'];


?>

      <select name="emploi" class="form-control browser-default custom-select" required value="<?php echo isset($resultatt[$key]['Emploi'])  ? $resultatt[$key]['Emploi']:  $_POST["emploi"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <option value="Employé-de-bureau" <?php if($em =="Employé-de-bureau"){ ?> selected <?php } ?>>Employé de bureau</option>
                <option value="Agent-de-sécurite" <?php if($em=="Agent-de-sécurite"){ ?> selected <?php } ?> >Agent de sécurite</option>
                <option value="Professeur" <?php if($em=="Professeur"){ ?> selected <?php } ?> >Professeur</option>
                
            </select>
          </div>



      
    <!-- Default input -->
    
     <div class="form-group col-md-2">
      <label for="">Niv_D'étude</label>
      <input type="text" name="NIV_etude"class=" <?php if(show_error('NIV_etude')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($resultatt[$key]['Niv_Détude'])  ? $resultatt[$key]['Niv_Détude']:  $_POST["NIV_etude"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px">
      </div>
      <div class="invalid-feedback">
          <?php echo show_error('NIV_etude');?>
        </div> 
    
     
     <div class="form-group col-md-2">
            <label for="role">role:</label>
            <select name="role" class="form-control browser-default custom-select" required value="<?php echo isset($resultatt[$key]['Role'])  ? $resultatt[$key]['role']:  $_POST["role"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <option value="admin">Admin</option>
                <option value="utilisateur">Utilisateur</option>
                
            </select>
          </div>
          <div class="form-group col-md-2">
      <label for="">Diplome</label>
      <input type="text" name="Diplome"   class=" <?php if(show_error('Diplome')){ echo 'form-control is-invalid'; }else{ echo 'form-control'; }?>" required value="<?php echo isset($resultatt[$key]['Diplome'])  ? $resultatt[$key]['Diplome']: $_POST["Diplome"]; ?>" style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
        </div>
      <div class="invalid-feedback">
          <?php echo show_error('Diplome');?>
        </div>
<div class="form-group col-md-2">
    <label for="Statu">Statut:</label>


<?php
                $st=$resultatt[$key]['Statut']; 
    $statuu = $pdo->query("SELECT * FROM `statu_employé`");
$stat = $statuu->fetchAll();

    ?>

            <select name="Statu" class="form-control browser-default custom-select" required value="<?php echo isset($resultatt[$key]['Statut'])  ? $resultatt[$key]['Statut']:  $_POST["Statut"] ?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">

                <?php 
                foreach ($stat as $key => $variable){ ?> 
                <option value="<?php echo $stat[$key]['id_statu'] ?> " <?php if($st==$stat[$key]['id_statu']){ ?> selected <?php } ?>><?php echo $stat[$key]['statu'] ; 
 ?> </option>
                
                <?php } ?>
                
            </select>
          </div>
    
    <!-- Default input -->
  
  
  
    
                <div class="form-group col-md-1">
            <label for="role">Groupe:</label>
          <select name="Groupe"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%" class="form-control browser-default custom-select" required value="groupe">
            <?php foreach ($resultatg as $key => $variable) {?>
                <option style="color: black;" value="<?php echo isset($resultatt[$key]['id_groupe'])  ? $resultatt[$key]['id_groupe']:  $_POST["id_groupe"]; ?>"><?php echo $resultatg[$key]['id_groupe']?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group col-md-1">
            <?php $ec= $resultatt[$key]['Echelon']; ?>
            <label for="Echlon">Echlon:</label>
            <select type="gender" name="Echlon" class="form-control browser-default custom-select"  required value="<?php echo isset($ec)  ? $ec:  $_POST["Echlon"]?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%">
                <?php for ($i=1; $i <14 ; $i++) {
              
              ?>
            
              
                <option value="<?php echo $i ?>" <?php if($ec==$i){ ?> selected <?php } ?>><?php echo $i; ?></option>
                
              <?php } ?>
            </select>
          </div>
             <div class="form-group col-md-2">
      <label for="">Service</label>
      <input type="text" name="service"class=" form-control " required value="<?php echo isset($resultatt[$key]['service'])  ? $resultatt[$key]['service']:  $_POST["service"] ?>" style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px"> 
        </div>



                        <div class="form-group col-md-2">
             <label for="">email</label>
      <input type="email"
      name="email" required value="<?php echo isset($resultatt[$key]['email'])  ? $resultatt[$key]['email']:  $_POST["email"] ?>" class="form-control"
       style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;">
        <div class="invalid-feedback">
          <?php echo show_error('email');?>
        </div>

      
      </div>
<div class="form-group col-md-2">
             <label for="">Fonction</label>
      <?php 
$fnc=$resultatt[$key]['fonction'];
$fonction = $pdo->query("SELECT * FROM `fonction`");
$fonction = $fonction->fetchAll();
/*$f = $pdo->query("SELECT * FROM `fonction` WHERE id_fonction ='$fnc'");
$f = $f->fetch();*/
    ?>
            <select name="fonct" class="form-control browser-default custom-select" required value="<?php echo isset($resultatt[$key]['id_fonction'])  ? $resultatt[$key]['id_fonction']:  $_POST["id_fonction"]?>"style=" border: none;border-bottom: 1px solid #bc5a45; background-color: transparent;height: 25px;padding-top: 0%;margin-left: 2%">
                <?php foreach ($fonction as $key => $variable){  ?> 
                <option value="<?php echo $fonction[$key]['id_fonction'] ?>" <?php if($fnc==$fonction[$key]['id_fonction']){ ?> selected <?php } ?>><?php echo $fonction[$key]['fonction'] ?> </option>
                
                <?php } ?>
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
                <option value="<?php echo $Grade[$key]['id_grade'] ?>" <?php if($fnc==$Grade[$key]['id_grade']){ ?> selected <?php } ?>><?php echo $Grade[$key]['grade'] ?> </option>
                
                <?php } ?>
              </select>

  </div>

  </div>
<?php }?>

    <div style="text-align: center;">         <button class="btn blue-gradient" type="submit" name="Modifier">Modifier</button>
                        
                         <button class="btn peach-gradient">Annuler</button>  </a>
</div>
</form>
</div>
</div>
</div>
</body>
<style type="text/css"><style type="text/css">
.overlay {

  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 1;
  overflow: scroll;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}
#popup3 .popup {
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  margin-left: 30%;
  margin-top: 5%;
  position: relative;
  transition: all 5s ease-in-out;
}
#popup4 .popup {
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  margin-left: 30%;
  margin-top: 5%;
  position: relative;
  transition: all 5s ease-in-out;
}
a{
    text-decoration: none;
    color: white;
}
#popup2 .popup {
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 1000px;
  margin-left: 15%;
  margin-top: 5%;
  position: relative;
  transition: all 5s ease-in-out;
}
#popup10 .popup {
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 1000px;
  margin-left: 15%;
  margin-top: 5%;
  position: relative;
  transition: all 5s ease-in-out;
}
pup .close {
font-weight: bold;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}



@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  #popup2 .popup{
    width: 1000px;
  }
  #popup10 .popup{
    width: 1000px;
  }
  #popup3 .popup{
    width: 30%;
    color: white
  }
}.a9 {margin-top:300px; margin-left:300px; float:left;}
.alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn {
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
#cog{background-color: green;}
#poi{background-color: yellow;}
#pla{background-color: red;}
</style>
    <script type="text/javascript">
       $(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5,
        "aaSorting": [[0, "desc"]],
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
