    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <head>

  
        <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des paramètres</title> 
    
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

  function modification_success(){
  Swal.fire({
                         
  icon: 'success',
  title: 'La modification a été faite avec success ',
   showConfirmButton: false,
  timer: 1800
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
function success_supp(){


Swal.fire({
  icon: 'success',
  title: 'Supprimé!',
  text: 'La ligne a été Supprimée avec success',
  showConfirmButton: false,
  timer: 2000
})
}
 
</script>
<!------ Include the above in your HEAD tag ---------->
<?php
require 'dashboard_admin.php';
//groupe


if (isset($_POST['ajouter_grp'])) {
  $de1=$_POST['de1'];
  $de2=$_POST['de2'];
  $jusqua1=$_POST['Jusqu\'a1'];
  $jusqua2=$_POST['Jusqu\'a2'];
$resquete=$pdo->prepare ('INSERT INTO `groupe` (`de1`, `jusqu\'a1`, `de2`, `jusqu\'a2`) VALUES ("'.$de1.'", "'.$jusqua1.'", "'.$de2.'", "'.$jusqua2.'")');
if ($resquete->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout();
  </script>

<?php }
}
if (isset($_POST['supp_groupe']))  {
 $idgroupe=$_POST['idgroupe'];
$resquete=$pdo->prepare ("DELETE FROM  groupe WHERE id_groupe='$idgroupe' LIMIT 1");
if($resquete->execute()){
   ?>
<script>
  success_supp();
</script>
<?php }else{?>

<script>
  error_supp();
</script>
<?php }}

//statu
if (isset($_POST['ajouter_statu'])) {
  $statu=$_POST['statu'];
$resquete=$pdo->prepare ('INSERT INTO `statu_employé` (`statu`) VALUES ("'.$statu.'")');
if ($resquete->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout()();
  </script>

<?php }
}

if (isset($_POST['supp_statu']))  {
 $idgroupe=$_POST['id_statu'];
$resquete=$pdo->prepare ("DELETE FROM  statu_employé WHERE id_statu='$idgroupe' LIMIT 1");
if($resquete->execute()){
   ?>
<script>
  success_supp();
</script>
<?php }else{?>

<script>
  error_supp();
</script>
<?php }}

//fonction
if (isset($_POST['ajouter_fonction'])) {
  $fonction=$_POST['fonction'];
$resquete=$pdo->prepare ('INSERT INTO `fonction` (`fonction`) VALUES ("'.$fonction.'")');
if ($resquete->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout()();
  </script>

<?php }
}

if (isset($_POST['supp_fonction']))  {
 $id_fonction=$_POST['id_fonction'];
$resquete=$pdo->prepare ("DELETE FROM  fonction WHERE id_fonction='$id_fonction' LIMIT 1");
if($resquete->execute()){
   ?>
<script>
  success_supp();
</script>
<?php }else{?>

<script>
  error_supp();
</script>
<?php }}




//raison-archivement
if (isset($_POST['ajouter_raison'])) {
 $raison_archivement=$_POST['raison_archivement'];
$resquete=$pdo->prepare ('INSERT INTO `raison_archivement` (`raison`) VALUES ("'.$raison_archivement.'")');
if ($resquete->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout();
  </script>

<?php }
}

if (isset($_POST['supp_raison']))  {
 $id_r_archivement=$_POST['id_r_archivement'];
$resquete=$pdo->prepare ("DELETE FROM  raison_archivement WHERE id_r_archivement='$id_r_archivement' LIMIT 1");
if($resquete->execute()){
   ?>
<script>
  success_supp();
</script>
<?php }else{?>

<script>
  error_supp();
</script>
<?php }}

if (isset($_POST['ajouter_type'])) {
   $type=$_POST['type'];
$resquete=$pdo->prepare ('INSERT INTO `type_congé` (`type`) VALUES ("'.$type.'")');
if ($resquete->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout();
  </script>

<?php }
}


if (isset($_POST['supp_type']))  {
 $id_t_congé=$_POST['id_t_congé'];
$resquete=$pdo->prepare ("DELETE FROM  type_congé WHERE id_t_congé='$id_t_congé' LIMIT 1");
if($resquete->execute()){
   ?>
<script>
  success_supp();
</script>
<?php }else{?>

<script>
  error_supp();
</script>
<?php }}

if (isset($_POST['ajouter_filière'])) {
  $filière=$_POST['filière'];
  //$année=$_POST['années'];
  $query = $pdo->query("SELECT * FROM `param_filière` WHERE Filière='$filière' ");
    $nb = count($query->fetchAll());
    if ($nb>0) {
      echo "existe déja";
    }else{
 $resquete=$pdo->prepare ('INSERT INTO `param_filière` (`Filière`) VALUES ("'.$filière.'")');
if ($resquete->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout();
  </script>

<?php }


    }
             

}


if (isset($_POST['supp_filière']))  {
 $id_filière=$_POST['id_filière'];
$resquete=$pdo->prepare ("DELETE FROM  param_filière WHERE id_filière='$id_filière' LIMIT 1");
if($resquete->execute()){
   ?>
<script>
  success_supp();
</script>
<?php }else{?>

<script>
  error_supp();
</script>
<?php }}

if (isset($_POST['ajouter_module'])) {
  $module=$_POST['module'];
  $filière=$_POST['filière'];
  $anneé_m=$_POST['anneé_m'];


  $query= $pdo->query("SELECT * FROM module WHERE  Filière='$filière' AND Module='$module' AND anneé='$anneé_m' ");
     $nb = count($query->fetchAll());
    if ($nb>0) { ?>
      <script>
        function existe(){
          Swal.fire({
  title: '<strong> <u>Erreur</u></strong>',
  icon: 'warning',
  html:
    'Ce module existe déja',
  focusConfirm: false,
  confirmButtonText:
    'OK!',

})
        }
        existe();
      </script>
      
  <?php  }else{

 $resquete=$pdo->prepare ('INSERT INTO `module` (`module`, `filière`, `anneé`) VALUES ("'.$module.'","'.$filière.'","'.$anneé_m.'")');
if ($resquete->execute()) {?>
  <script>
    success();
  </script>
<?php }else{?>
  <script>
    error_ajout();
  </script>

<?php }


    }

}

if (isset($_POST['supp_module']))  {
 $id_module=$_POST['id_module'];
$resquete=$pdo->prepare ("DELETE FROM  module WHERE id_module='$id_module' LIMIT 1");
if($resquete->execute()){
   ?>
<script>
  success_supp();
</script>
<?php }else{?>

<script>
  error_supp();
</script>
<?php }}
?>


<div class="container-2" style="margin-bottom: 50px;margin-left:2%;margin-top: -8%">
<div id="page-wrapper">   
<div>
      <div class="page-title">
       <h2><i class="fas fa-cogs"></i> Gestion des paramètres</h2>
        <ol class="breadcrumb" style="width:100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php echo $id ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""> Gestion des paramètres</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:54%;font-size: 15px;display: inline;">
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


 <section id="service">
    <div class="container-1" style="margin-left:0%">
    <div class="row">
      <div class="col-md-6" style="margin-left:30%;">
       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default"  style="margin-bottom:10%" >
                    <div class="panel-heading" role="tab" id="headingthree">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                                Paramètres généraux 
                            </a>
                        </h4>
                    </div>

                    <div id="collapsefive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                        <div class="panel-body">

                          <section id="tabs" class="project-tab" style="padding: 1%;margin-top:1%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">Généraux </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="padding-top: 2% border: none ;border-bottom: 2px solid #667292;">
                          <?php 
                          
                          $query9 = $pdo->query("SELECT * FROM `para_general` WHERE id=1");
                             $resultat9= $query9->fetchAll();
                 
                            foreach ($resultat9 as $key => $variable){


                                        ?>
                            <fieldset style="border:2px solid #c1c7d9;padding-left:2%;margin-bottom: 3%">
                                 <form method="POST" style="display:inline;margin-top:50%;" >
                                  <label> Année universitaire : </label>
                                
                                De :<input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:100px" value="<?php echo $resultat9[$key]['date_debut']; ?>"  class="disabled"> Jusqu'à 
                                <input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:100px" value="<?php echo $resultat9[$key]['date_fin'];} ?>"  class="disabled">
                                <label style="margin-left: 12%; "> changer la période de l'année universitaire  : </label><br>
                                
                               De:  <input name="debut_an" type="date"  style="border: none ;border-bottom: 2px solid #667292; width:120px">
                                
                                <label style="margin-left: 12%; "> Jusqu'à  : </label>
                                
                                <input name="fin_an" type="date"  style="border: none ;border-bottom: 2px solid #667292; width:120px" required >
                                <button type="submit" name="modifier_an" class="btn btn-mdb-color"><i class="fas fa-check"></i></button>
                               
               
                
                </form>

                 <?php if (isset($_POST['modifier_an'])) {
                  $debut_an=$_POST['debut_an'];
                  $fin_an=$_POST['fin_an'];
                 
                   $resquete=$pdo->prepare ("UPDATE `para_general` SET `date_debut` = '$debut_an' , `date_fin` = '$fin_an'  WHERE id=1 ");
                   if($resquete->execute()){?>
                    <script>
                    
                      modification_success();
                    </script>
                  <?php }else{ ?>
                    <script>
                      error_ajout();
                    </script>

                  <?php }
                   
                }?>
              </fieldset>
              <?php 
                          
                          $query9 = $pdo->query("SELECT * FROM `para_general` WHERE id=2");
                             $resultat9= $query9->fetchAll();
                 
                            foreach ($resultat9 as $key => $variable){


                                        ?>
                            <fieldset style="border:2px solid #c1c7d9;padding-left:2%;margin-bottom: 3%">
                                 <form method="POST" style="display:inline;margin-top:50%;" >
                                  <label> Premier semestre : </label>
                                
                                De :<input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:100px" value="<?php echo $resultat9[$key]['date_debut']; ?>"  class="disabled"> Jusqu'à
                                <input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:100px" value="<?php echo $resultat9[$key]['date_fin'];} ?>"  class="disabled">
                                <label style="margin-left: 12%; "> changer la période de premier semestre  : </label><br>
                                
                               De:  <input name="debut_s1" type="date"  style="border: none ;border-bottom: 2px solid #667292; width:120px">
                                
                                <label style="margin-left: 12%; "> Jusqu'a  : </label>
                                
                                <input name="fin_s1" type="date"  style="border: none ;border-bottom: 2px solid #667292; width:120px" required >
                                <button type="submit" name="modifier_s1" class="btn btn-mdb-color"><i class="fas fa-check"></i></button>
                               
               
                
                </form>

                 <?php if (isset($_POST['modifier_s1'])) {
                  $debut_an=$_POST['debut_s1'];
                  echo $_POST['debut_s1'];
                  $fin_an=$_POST['fin_s1'];

                 
                   $resquete=$pdo->prepare ("UPDATE `para_general` SET `date_debut` = '$debut_an' , `date_fin` = ' $fin_an'  WHERE id=2 ");
                   if($resquete->execute()){?>
                    <script>
                    
                      modification_success();
                    </script>
                  <?php }else{ ?>
                    <script>
                      error_ajout();  
                    </script>

                  <?php }
                   
                }?>
              </fieldset>
               <?php 
                          
                          $query9 = $pdo->query("SELECT * FROM `para_general` WHERE id=3");
                             $resultat9= $query9->fetchAll();
                 
                            foreach ($resultat9 as $key => $variable){


                                        ?>
                            <fieldset style="border:2px solid #c1c7d9;padding-left:2%;margin-bottom: 3%">
                                 <form method="POST" style="display:inline;margin-top:50%;" >
                                  <label> Deuxième semestre : </label>
                                
                                De :<input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:100px" value="<?php echo $resultat9[$key]['date_debut']; ?>"  class="disabled"> Jusqu'à
                                <input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:100px" value="<?php echo $resultat9[$key]['date_fin'];} ?>"  class="disabled">
                                <label style="margin-left: 12%; "> changer la période de premier semestre  : </label><br>
                                
                               De:  <input name="debut_s2" type="date"  style="border: none ;border-bottom: 2px solid #667292; width:120px">
                                
                                <label style="margin-left: 12%; "> Jusqu'à  : </label>
                                
                                <input name="fin_s2" type="date"  style="border: none ;border-bottom: 2px solid #667292; width:120px" required >
                                <button type="submit" name="modifier_s2" class="btn btn-mdb-color"><i class="fas fa-check"></i></button>
                               
               
                
                </form>

                 <?php if (isset($_POST['modifier_s2'])) {
                  $debut_an=$_POST['debut_s2'];
                  echo $_POST['debut_s2'];
                  $fin_an=$_POST['fin_s2'];

                 
                   $resquete=$pdo->prepare ("UPDATE `para_general` SET `date_debut` = '$debut_an' , `date_fin` = ' $fin_an'  WHERE id=3 ");
                   if($resquete->execute()){?>
                    <script>
                    
                      modification_success();
                    </script>
                  <?php }else{ ?>
                    <script>
                      error_ajout();  
                    </script>

                  <?php }
                   
                }?>
              </fieldset>


        </div>
      </div>
    </div>
  </div>
    </section>
  </div>
</div>
</div>
</div> 
</div>
             <div class="col-md-7">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
                <div class="panel panel-default"  style="margin-bottom:4%;" >
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Paramètres de la gestion d'employés
                            </a>
                        </h4>
                    </div>

                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                        <div class="panel-body">

                          <section id="tabs" class="project-tab" style="padding: 1%;margin-top:1%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Groupes</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Statuts</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Raisons d'</a>
                                
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-pfonct" role="tab" aria-controls="nav-fonct-tab" aria-selected="false">Fonction</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="padding-top: 2% border: none ;border-bottom: 2px solid #667292;">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <form method="POST">
                              DE:  <input name="de1" type="Time" id="one" style="margin-right:2% ;border: none ;border-bottom: 2px solid #667292;"  required>
                Jusqu'à :  <input name="Jusqu'a1" type="Time" id="two" style="margin-right:2%; border: none ;border-bottom: 2px solid #667292;"   required>
                DE:  <input name="de2" type="Time" id="three"  style="margin-right:2% ;border: none ;border-bottom: 2px solid #667292;"  required>
                Jusqu'à :  <input name="Jusqu'a2" type="Time" id="four"  style="margin-right:5% ;border: none ;border-bottom: 2px solid #667292;"  required >
                
                <button type="submit" name="ajouter_grp" class="btn btn-mdb-color"><i class="fas fa-plus-square"></i></button>
              </form>
                                <table class="table" cellspacing="0" style="margin-top: 1%">
                                    <thead  class="thead-dark">
                                        <tr>
                                          <th></th>
                                            <th>N°</th>
                                            <th>De</th>
                                            <th>Jusqu'à</th>
                                            <th>De</th>
                                            <th>Jusqu'à</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1;
                                        $query = $pdo->query("SELECT * FROM `groupe`");
                             $resultat= $query->fetchAll();
                 
                            foreach ($resultat as $key => $variable){
                              

                                        ?>
                                       <tr>
                                      <td> <input type="checkbox" name=""></td>
                                        
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $resultat[$key]['de1']; ?></td>
                                            <td><?php echo $resultat[$key]['jusqu\'a1']; ?></td>
                                            <td><?php echo $resultat[$key]['de2']; ?></td>
                                            <td><?php echo $resultat[$key]['jusqu\'a2']; ?></td>
                                            <td>
                                            <form method="POST">
                                              <input type="hidden" name="idgroupe" value="<?php echo $resultat[$key]['id_groupe']; ?>" readonly>
                                              <button type="submit" name="supp_groupe" style="background-color: transparent;border:none"><i class="fas fa-trash-alt"></i></button>
                                              </form>
                                            </td>
                                            
                                         
                                        </tr>
                                         <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="padding:2%">
                              
                                <table class="table" cellspacing="0" style="margin-top: 1%;width:60%;margin-right:15%;display: inline;margin-bottom:3%">
                                    <thead  class="thead-dark">
                                        <tr>
                                          <th></th>
                                            <th>N°</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        $query2 = $pdo->query("SELECT * FROM `statu_employé`");
                            $resultat2= $query2->fetchAll();
                 
                            foreach ($resultat2 as $key => $variable){ ?>
                                        <tr>
                                          <td> <input type="checkbox" name=""></td>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $resultat2[$key]['statu']?></td>
                                            <td>
                                            <form method="POST">
                                              <input type="hidden" name="id_statu" value="<?php echo $resultat2[$key]['id_statu']; ?>" readonly>
                                              <button type="submit" name="supp_statu" style="background-color: transparent;border:none"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                       <?php } ?>

                                    </tbody>
                                </table>
                                
                              

                                  
                              <form method="POST" style="display:inline;margin-top:50%" >
                                
                                <input name="statu" type="text"   style="border: none ;border-bottom: 2px solid #667292; width:170px" placeholder="Ajouter un Statu"  required >
                
                <button type="submit" name="ajouter_statu" class="btn btn-mdb-color"><i class="fas   fa-plus-square"></i></button>
                  </form>

                                
                            </div>
                             <div class="tab-pane fade" id="nav-pfonct" role="tabpanel" aria-labelledby="nav-fonct-tab" style="padding:2%">
                              
                                <table class="table" cellspacing="0" style="margin-top: 1%;width:60%;margin-right:15%;display: inline;margin-bottom:3%">
                                    <thead  class="thead-dark">
                                        <tr>
                                          <th></th>
                                            <th>N°</th>
                                            <th>Fonction</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        $query2 = $pdo->query("SELECT * FROM `fonction`");
                            $resultat2= $query2->fetchAll();
                 
                            foreach ($resultat2 as $key => $variable){ ?>
                                        <tr>
                                          <td> <input type="checkbox" name=""></td>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $resultat2[$key]['fonction']?></td>
                                            <td>
                                            <form method="POST">
                                              <input type="hidden" name="id_fonction" value="<?php echo $resultat2[$key]['id_fonction']; ?>" readonly>
                                              <button type="submit" name="supp_fonction" style="background-color: transparent;border:none"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                       <?php } ?>

                                    </tbody>
                                </table>
                                
                              

                                  
                              <form method="POST" style="display:inline;margin-top:50%" >
                                
                                <input name="statu" type="text"   style="border: none ;border-bottom: 2px solid #667292; width:170px" placeholder="Ajouter une fonction"  required >
                
                <button type="submit" name="ajouter_fonction" class="btn btn-mdb-color"><i class="fas   fa-plus-square"></i></button>
                  </form>
                  
                                
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"style="padding:2%">
                                <table class="table" cellspacing="0"  style="margin-top: 1%;width:60%;margin-right:15%;display: inline;margin-bottom:3%">
                                    <thead  class="thead-dark">
                                        <tr>
                                          <th></th>
                                            <th>N°</th>
                                            <th>La raison</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $i=1 ;
                                        $query3 = $pdo->query("SELECT * FROM `raison_archivement`");
                            $resultat3= $query3->fetchAll();
                 
                            foreach ($resultat3 as $key => $variable){ ?>

                                      
                                        <tr>
                                          <td><input type="checkbox" name=""></td>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $resultat3[$key]['raison'] ?></td>
                                            <td>
                                            <form method="POST">
                                              <input type="hidden" name="id_r_archivement" value="<?php echo $resultat3[$key]['id_r_archivement']; ?>" readonly>
                                              <button type="submit" name="supp_raison" style="background-color: transparent;border:none"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                                 <form method="POST" style="display:inline;margin-top:50%" >
                                
                                <input name="raison_archivement" type="text"   style="border: none ;border-bottom: 2px solid #667292; width:170px" placeholder="Ajouter une raison"  required >
                
                <button type="submit" name="ajouter_raison" class="btn btn-mdb-color"><i class="fas   fa-plus-square"></i></button>
                 </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
<div class="panel panel-default"  style="margin-bottom: 20%;" >
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                Paramètres de la gestion de congé 
                            </a>

                        </h4>

                    </div>

                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

                        <div class="panel-body">

                          <section id="tabs" class="project-tab" style="padding: 1%;margin-top:1%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-type-tab" data-toggle="tab" href="#nav-type" role="tab" aria-controls="nav-type" aria-selected="true">Types des congés</a>
                              
                                <a class="nav-item nav-link" id="nav-autre-tab" data-toggle="tab" href="#nav-autre" role="tab" aria-controls="nav-autre" aria-selected="false">Autres paramètres</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="padding-top: 2% border: none ;border-bottom: 2px solid #667292;">
                            <div class="tab-pane fade show active" id="nav-type" role="tabpanel" aria-labelledby="nav-type-tab" style="margin-top: 2%">
                              
                                <table class="table" cellspacing="0" style="margin-top: 1%;margin-top: 1%;width:60%;margin-right:15%;display: inline;margin-bottom:3%">
                                    <thead  class="thead-dark">
                                        <tr>
                                          <th></th>
                                            <th>N°</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1;
                                        $query5 = $pdo->query("SELECT * FROM `type_congé`");
                             $resultat5= $query5->fetchAll();
                 
                            foreach ($resultat5 as $key => $variable){


                                        ?>
                                       <tr>
                                      <td> <input type="checkbox" name=""></td>
                                        
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $resultat5[$key]['type']; ?></td>
                                            <td>
                                            <form method="POST">
                                              <input type="hidden" name="id_t_congé" value="<?php echo $resultat5[$key]['id_t_congé']; ?>" readonly>
                                              <button type="submit" name="supp_type" style="background-color: transparent;border:none"><i class="fas fa-trash-alt"></i></button>
                                              </form>
                                            </td>
                                            
                                         
                                        </tr>
                                         <?php } ?>
                                    </tbody>

                                </table>
                                <form method="POST" style="display:inline;margin-top:50%" >
                                
                                <input name="type" type="text"   style="border: none ;border-bottom: 2px solid #667292; width:170px;" placeholder="Ajouter un type"  required >
                
                <button type="submit" name="ajouter_type" class="btn btn-mdb-color"><i class="fas   fa-plus-square"></i></button>
                  </form>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-autre" role="tabpanel" aria-labelledby="nav-autre-tab"style="padding:2%">
                                <?php 
                                        $query6=$pdo->query("SELECT * FROM `autre_congé`");
                             $resultat6= $query6->fetchAll();
                 
                            foreach ($resultat6 as $key => $variable){
                              $nbr=$resultat6[$key]['nombre_max'];
                              $etat=$resultat6[$key]['etat'];
                               }
                                ?>
                        <fieldset style="border:2px solid #c1c7d9;padding-left:2%;margin-bottom: 3%">
                                 <form method="POST" style="display:inline;margin-top:50%;" >
                                  <label> Nombre maximale du jour a demander : </label>
                                
                                <input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:50px" value="<?php echo $nbr  ?>"  class="disabled"> Jours
                                <label style="margin-left: 12%; "> changer le Nombre maximale de jour a demander : </label>
                                
                                <input name="nb_max" min="1" type="number"   style="border: none ;border-bottom: 2px solid #667292; width:50px" required >
                                <button type="submit" name="modifier_nbr" class="btn btn-mdb-color"><i class="fas fa-check"></i></button>
                <?php if (isset($_POST['modifier_nbr'])) {
                  $nbr_up=$_POST['nb_max'];
                  $id_autre=1;
                   $resquete=$pdo->prepare ("UPDATE `autre_congé` SET `nombre_max` = '$nbr_up' WHERE `autre_congé`.`id_autre` = 1; ");
                   if($resquete->execute()){?>
                    <script>
                    
                      modification_success();
                    </script>
                  <?php }else{ ?>
                    <script>
                      error_ajout();
                    </script>

                  <?php }
                   
                }?>
                
                </form>
              </fieldset>
              <fieldset  style="border:2px solid #c1c7d9;padding-left:2%;margin-bottom: 3%">
                <form method="POST" style="display:inline;margin-top:50%" >
                <label> Etat des demandes de congé : </label>
                                
                                <input type="text"   style="border: none ;border-bottom: 2px solid #667292; width:80px" value="<?php if( $etat==0){ echo "Désactiver" ;}else{ echo "Activer"; }  ?>"     >
                                <label style="margin-left: 12%"> changer l'état des demandes de congé : </label>
                                
                                <select class="browser-default custom-select" name="modif_etat" style="border: none ;border-bottom: 2px solid #667292; width:120px">
                                  <option value="0">Désactiver</option>
                                  <option value="1">Activer</option>
                                </select>
                
                <button type="submit" name="modifier_etat" class="btn btn-mdb-color"><i class="fas fa-check"></i></button>  
                <?php if (isset($_POST['modifier_etat'])) {
                  $etat=$_POST['modif_etat'];
                  $id_autre=1;
                   $resquete=$pdo->prepare ("UPDATE `autre_congé` SET `etat` = '$etat' WHERE `autre_congé`.`id_autre` = 1; ");
                   if($resquete->execute()){?>
                    <script>
                    modification_success();
                          
                      
                    </script>
                  <?php }else{?>
                    <script>
                      error_ajout();
                          
                      
                    </script>

                  <?php }
                   
                }?>
                 </form>
              </fieldset>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
  
</div>
</div>
<div class="col-md-5">
  
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default"  style="margin-bottom:6%" >
                    <div class="panel-heading" role="tab" id="headingthree">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="true" aria-controls="collapsethree" style="font-size:17px">
                                Paramètres de la gestion de  <span style="font-size:16px" >pointage</span>
                            </a>
                        </h4>
                    </div>

                    <div id="collapsethree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                        <div class="panel-body">

                          <section id="tabs" class="project-tab" style="padding: 1%;margin-top:1%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">généraux</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="padding-top: 2% border: none ;border-bottom: 2px solid #667292;">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              Générer le rapport le :  <input name="nbr" type="text"  id="one" style="border: none ;border-bottom: 2px solid #667292;width:10% ;background-color:transparent;" value="<?php 
                              $query8 = $pdo->query("SELECT * FROM `para_pointage`");
                             $resultat8= $query8->fetchAll();  foreach ($resultat8 as $key => $variable){ echo   $resultat8[$key]['nbr_jrs'];} ?>"   disabled> de chaques mois.  
                              <form method="POST"  style="margin-left:2%">   
                              Changer le jour: <select class="browser-default custom-select" name="nbr" style="border-color:transparent;border-bottom: 2px solid #667292;; text-align: center;width:120px;height: 25px;font-size: 12px;margin-right: 5%" >
            <?php 
            
             for ($v=1; $v <29; $v++) { ?>

            <option value="<?php echo $v ?>"><?php echo $v?></option>

              
            <?php } ?>
          </select>
                
                <button type="submit" name="upd_nbr" class="btn btn-mdb-color"><i class="fas fa-plus-square"></i></button>
              </form>    
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
  </div>
</div>
</div>
   <?php if (isset($_POST['upd_nbr'])) {
                  $nbr=$_POST['nbr'];
                  $id=1;
                   $resquete1=$pdo->prepare ("UPDATE `para_pointage` SET `nbr_jrs` = '$nbr' WHERE id='$id'; ");
                   if($resquete1->execute()){?>
                    <script>
                    
                      modification_success();
                    </script>
                  <?php }else{ ?>
                    <script>
                      error_ajout();
                    </script>

                  <?php }} ?>
                <div class="panel panel-default"  style="margin-bottom: 20%">
                    <div class="panel-heading" role="tab" id="headingFout">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"style="font-size:17px">
                                Paramètres de la gestion de <span style="font-size:16px" >planning</span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <section id="tabs" class="project-tab" style="padding: 1%;margin-top:1%">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-Filiere" role="tab" aria-controls="nav-Filiere" aria-selected="true">Filière</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-module" role="tab" aria-controls="nav-profile" aria-selected="false">Module</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="padding-top: 2% border: none ;border-bottom: 2px solid #667292;">
                            <div class="tab-pane fade show active" id="nav-Filiere" role="tabpanel" aria-labelledby="nav-home-tab">
                              <form method="POST" style="margin-top:5%">
                              
                               <input name="filière" type="Text" style="margin-right:2% ;border: none ;border-bottom: 2px solid #667292;width:190px" placeholder="Filière"  required>
                
                
                
                <button type="submit" name="ajouter_filière" class="btn btn-mdb-color"><i class="fas fa-plus-square"></i></button>
              </form>
                                <table class="table" cellspacing="0" style="margin-top: 1%">
                                    <thead  class="thead-dark">
                                        <tr>
                                          <th></th>
                                            <th>N°</th>
                                            <th>Filière</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1;
                                        $query4= $pdo->query("SELECT * FROM `param_filière`");
                             $resultat4= $query4->fetchAll();
                 
                            foreach ($resultat4 as $key => $variable){


                                        ?>
                                       <tr>
                                      <td> <input type="checkbox" name=""></td>
                                        
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $resultat4[$key]['Filière']; ?></td>
                                            
                                            
                                            <td>
                                            <form method="POST">
                                              <input type="hidden" name="id_filière" value="<?php echo $resultat4[$key]['id_filière']; ?>" readonly>
                                              <button type="submit" name="supp_filière" style="background-color: transparent;border:none"><i class="fas fa-trash-alt"></i></button>
                        </form>
                                            </td>
                                          
                                         
                                        </tr>
                                         <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-module" role="tabpanel" aria-labelledby="nav-profile-tab" style="padding:2%">                                
                             <form method="POST" style="margin-top:5%">                              
                               <input name="module" type="Text" style="margin-right:2% ;border: none ;border-bottom: 2px solid #667292;width:180px" placeholder="Module"  required>
                    <select class="browser-default custom-select" name="anneé_m" style="border-color:transparent;border-bottom: 2px solid #667292;; text-align: center;width:50px;height: 25px;font-size: 12px;margin-right: 5%" >
                      <option  value="1" >1ere</option>
                      <option  value="2" >2eme</option>
                      <option  value="3" >3eme</option>
                      <option  value="4" >4eme</option>
                      <option  value="5" >5eme</option>
                    </select>
                  <select class="browser-default custom-select" name="filière" style="border-color:transparent;border-bottom: 2px solid #667292;; text-align: center;width:120px;height: 25px;font-size: 12px;margin-right: 5%" >
            <?php 
            $query3 = $pdo->query("SELECT * FROM `param_filière` ");
            $resultat3 = $query3->fetchAll();
             foreach ($resultat3 as $key => $variable){ ?>

            <option value="<?php echo $resultat3[$key]['id_filière']; ?>"><?php echo $resultat3[$key]['Filière']?></option>

              
            <?php } ?>
          </select>


                
                
                <button type="submit" name="ajouter_module" class="btn btn-mdb-color"><i class="fas fa-plus-square"></i></button>
              </form>
                                <table class="table" cellspacing="0" style="margin-top: 1%">
                                    <thead  class="thead-dark">
                                        <tr>
                                          <th></th>
                                            <th>N°</th>
                                            <th>Module</th>
                                            <th>Filière</th>
                                            <th>Anneé</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1;
                                        $query4= $pdo->query("SELECT * FROM param_filière , module WHERE param_filière.id_filière=module.filière ");
                             $resultat4= $query4->fetchAll();
                 
                            foreach ($resultat4 as $key => $variable){
                              $filière_module=$resultat4[$key]['filière'];
                            $query7= $pdo->query("SELECT * FROM param_filière WHERE id_filière='$filière_module' ");
                             $resultat7= $query7->fetchAll();
                 
                            foreach ($resultat7 as $key => $variable){

                                        ?>
                                       <tr>
                                      <td> <input type="checkbox" name=""></td>
                                        
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $resultat4[$key]['Module']; ?></td>
                                            <td><?php echo $resultat7[$key]['Filière']; ?></td>
                                            <td><?php echo $resultat4[$key]['anneé']; ?></td>
                                            
                                            <td>
                                            <form method="POST">
                                              <input type="hidden" name="id_module" value="<?php echo $resultat4[$key]['id_module']; ?>" readonly>
                                              <button type="submit" name="supp_module" style="background-color: transparent;border:none"><i class="fas fa-trash-alt"></i></button>
                                              </form>
                                            </td>
                                            
                                         
                                        </tr>
                                         <?php } } ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
 </div>
</div>
</div>
  
</div>
</div>

</div>
</section>






















               




<style type="text/css">
  
  
#accordion .panel{
    border: none;
    border-radius: 0;
    box-shadow: none;
   /* margin: 0 30px 10px 30px;*/
    overflow: hidden;
    position: relative;
}
#accordion .panel-heading{
    padding: 0;
    border: none;
    border-radius: 0;
    position: relative;
}
#accordion .panel-title a{
    display: block;
    padding: 15px 20px;
    margin: 0;
    background:#667292;
    font-size: 18px;
    font-weight: 700;
    letter-spacing: 1px;
    color: #fff;
    border-radius: 0;
    position: relative;
}
#accordion .panel-title a.collapsed{ background: #1c2336;}
#accordion .panel-title a:before,
#accordion .panel-title a.collapsed:before{
   
    font-family: fontawesome;
    width: 30px;
    height: 30px;
    line-height: 25px;
    border-radius: 50%;
    background: #fe7725;
    font-size: 14px;
    font-weight: normal;
    color: #fff;
    text-align: center;
    border: 3px solid #fff;
    position: absolute;
    top: 10px;
    right: 14px;
}
#accordion .panel-title a.collapsed:before{
  
    background: #ababab;
    border: 4px solid #667292;
}
#accordion .panel-title a:after,
#accordion .panel-title a.collapsed:after{
    content: "";
    width: 17px;
    height: 7px;
    background: #fff;
    position: absolute;
    top: 22px;
    right: 0;
}
#accordion .panel-title a.collapsed:after{
    width: 19px;
    background: #ababab;
}
#accordion .panel-body{
    border-left: 3px solid #fe7725;
    border-top: none;
    background: #fff;
    /*font-size: 15px;*/
    color: #1c2336;
    line-height: 27px;
    position: relative;
}
#accordion .panel-body:before{
    content: "";
    height: 3px;
    width: 50%;
    background: #fe7725;
    position: absolute;
    bottom: 0;
    left: 0;
}
#accordion .panel-body p{
  padding: 10px;
}

.project-tab {
    padding: 10%;
    margin-top: -8%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
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