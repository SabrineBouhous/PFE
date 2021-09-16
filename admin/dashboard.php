
<script src="https://kit.fontawesome.com/samplekit.js"
 crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
  
   function succes_pointage(){
    Swal.fire({
   
   icon: 'success',
   title: 'La gestion de pointage a été activé',
   showConfirmButton: false,
   timer: 1900
 })
   }

  function error_pointage(){
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

require 'dashboard_admin.php';
$date_act=date('Y-m-d');


//mahdar dokhol w khoroj
$debuann = $pdo->query("SELECT * FROM `para_general` WHERE id=1");
$debuann = $debuann->fetch();


if($date_act==$debuann['date_debut']){

  $kkk = $pdo->query("SELECT * FROM `entrée_sortie`");
$kkk = $kkk->fetchAll();

if (count($kkk)==0) {
    
  $mahdar = $pdo->query("SELECT * FROM `employé`");
$mahdar = $mahdar->fetchAll();
foreach ($mahdar as $key => $variable)
      {
        $idem=$mahdar[$key]['idemp'];
        $debuan=$debuann['date_debut'];
        $finuan=$debuann['date_fin'];
       // $ins=$pdo->prepare ("INSERT INTO `entrée_sortie` (`idemp`, `date_entree`, `date_sortie`)VALUES '$idem', '$debuan', '$finuan')");
       // $ins->execute();

$entrsor = $pdo->prepare('INSERT INTO  entrée_sortie (idemp,date_entree,date_sortie)VALUES("'.$idem.'","'.$debuan.'","'.$finuan.'")');
        $entrsor->execute();
      }}}
           ///fin d'annee => KHRAJLI  L MAHDER
$datedebut=$debuann['date_debut'];
$datedebuttt = strtotime(date("Y-m-d", strtotime($datedebut)) . " +1 day");
$datedebuttt=date('Y-m-d',$datedebuttt);

    if($date_act==$datedebuttt){

//awal mara
include 'entree_sortie1.php';
// $statement = $pdo->prepare("TRUNCATE TABLE `entrée_sortie`");// vider une table pointage+jour
     // $statement->execute();
    }
      ///fin d'annee => KHRAJLI  L MAHDER
$datefin=$debuann['date_fin'];
$datefin = strtotime(date("Y-m-d", strtotime($datefin)) . " +1 day");
$datefin=date('Y-m-d',$datefin);;
    if($date_act==$datefin){
//début d'anneé => KHARAJLI  LMAHDAR 
      //SUUP + N3AWDO
$query3 = $pdo->query("SELECT * FROM para_general WHERE id=1 ");
$resultat3 = $query3->fetch();
$annee_uni=explode('-',$resultat3['date_debut']);
$annee_universitaire=$annee_uni[0];
$ann=$annee_uni[0]+1;
$anee_universitaire="../entree_sortie/".$annee_universitaire."-".$ann.".pdf";
if(file_exists($anee_universitaire)){
unlink($anee_universitaire);
//n3awdo
include 'entree_sortie2.php';
}

    }
$query = $pdo->query("SELECT * FROM `employé`");
$result = $query->fetchAll();
$nb = count($result); 

if (isset($_POST['pointage'])) { 
$id_p=1;
$etat=1;

$resquete=$pdo->prepare ("UPDATE para_pointage SET etat =? ,date_act =? ,date_eval =?  WHERE  id = ? ");
$req1=$resquete->execute(array($etat,$date_act,$date_act,$id_p));
///remplir pointage
       $query5 = $pdo->query("SELECT * FROM `employé` WHERE Emploi!='Professeur' "); /*remplissage de la bdd a  avec nvmois=oui*/
    $resultat5 =$query5->fetchAll();
      $nv_point="non";
      $nv_mois="oui";
    foreach ($resultat5 as $key => $variable)
      { 
      
        $idemp=$resultat5[$key]['idemp'];

        $insertemp=$pdo->prepare ('INSERT INTO pointage (idemp,pointage_entrée,pointage_sortie,date_pointage,nv_mois) VALUES("'.$idemp.'","'.$nv_point.'","'.$nv_point.'","'.$date_act.'","'.$nv_mois.'")');
        
        $insertemp->execute();

       }
//remplir les jour

       $querypro = $pdo->query("SELECT * FROM employé , planning WHERE employé.idemp=planning.idemp "); 
    $resultatprof =$querypro->fetchAll();
      $entrée="non";
foreach ($resultatprof as $key => $variable)
      {

        $id_prof=$resultatprof[$key]['idemp'];
        $id_planning=$resultatprof[$key]['id'];
        $pointag="non";
        // choisir les jours
        
        switch ($resultatprof[$key]['jour']) {
    case 'Mercredi':
        $prof = $pdo->prepare('INSERT INTO  mercredi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
        $professeur = $prof->execute();
        break;
    case 'Mardi':
        
         $prof = $pdo->prepare('INSERT INTO  mardi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
    case 'Monday':
        $prof = $pdo->prepare('INSERT INTO  lundi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
        $professeur = $prof->execute();
        break;
    case 'Dimanche':
         $prof = $pdo->prepare('INSERT INTO  dimanche (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
    case 'Samedi':
   
         $prof = $pdo->prepare('INSERT INTO  samedi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
    case 'Jeudi':
         $prof = $pdo->prepare('INSERT INTO  jeudi (id_prof,id_planning,pointag)VALUES("'.$id_prof.'","'.$id_planning.'","'.$pointag.'")');
         $professeur = $prof->execute();
        break;
}

       }
if($req1){ ?>

   <script>
   succes_pointage();
    

    </script>;
   <?php
     }else{?>

   <script>error_pointage(); </script>;
   <?php

     }

}
?>

<head>
    <title> Accueil</title>
        <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="dash.css" rel="stylesheet" type="text/css"> 
</head>
<body>
<div class="container-2" style="margin-bottom: 50px;margin-left:2% ; margin-top:-8%">
     <div id="page-wrapper">   
      <div>
      <div class="page-title">
       <h2><i class="fas fa-home"></i>Accueil</h2>
        <ol class="breadcrumb" style="width: 100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="" ><i class="fas fa-home"></i>Accueil</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:76%;font-size: 15px;display: inline;">
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
      <?php 
//le pointage et le rapport
$query6 = $pdo->query("SELECT * FROM para_pointage "); //ajbad w9tach l rapport
 $resultat6 =$query6->fetchAll();
 foreach ($resultat6 as $key => $variable)
      {
      $nbr_jrs=$resultat6[$key]['nbr_jrs'];
          }
$dd=date('m-Y');
$dd=$nbr_jrs."-".$dd;
$auj= date("d-m-Y");
$dd=date($auj, strtotime('-1 days'));
// echo $auj;

          if( $auj == $dd ){
            // rana nhar l raport
            ?>
 <!--<script>
   $('.toast').toast('show');
  </script> -->
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong> Le pointage et le rapport du mois précedent sont prêts ,</strong>  vous pouvez les consulter
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <?php
          }
?>
   <div class="row" >
<div class="col-lg-3 col-sm-6" style="margin-right:5%">
                        <div class="circle-tile" >
                            <a href="ess.php?id=<?php echo $id ; ?>">
                                <div class="circle-tile-heading " style="background-color:#fd7965">
                                    <i class="fa fa-users fa-fw fa-3x" style="margin-top:15% "></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue" style="background-color:#fd7965">
                                <div class="circle-tile-description text-faded">
                                   Gestion des employés
                                </div>
                                <div class="circle-tile-number text-faded" style="font-size:25px">
                                    <?php echo "2"; ?> employés
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="ess.php?id=<?php echo $id ?>" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6" style="margin-right:5%">
                        <div class="circle-tile">
                            <a href="gestion_congé.php?id=<?php echo $id ; ?>">
                                <div class="circle-tile-heading " style="background-color: #ca88f3">
                                    
                                    <i class="fab fa-envira fa-fw fa-3x" style="margin-top: 15%"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content"  style="background-color:#ca88f3">
                                <div class="circle-tile-description text-faded">

                                   Gestion des congés
                                </div>
                                <div class="circle-tile-number text-faded">
                                  <?php  
                                  $cong = $pdo->query("SELECT * FROM `congé`");
                                  $cong = $cong->fetchAll();
                                  $con = count($cong); 
                                  echo $con." "."congés";
                                  ?>
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="page_help_admin.php?id=<?php echo $id; ?>" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="document.php?id=<?php echo $id ; ?>">
                                <div class="circle-tile-heading " style="background-color: #bd5734">
                                    <i class="fas fa-file fa-3x" style="margin-top: 15%"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content " style="background-color: #bd5734">
                                <div class="circle-tile-description text-faded">
                                  Gestion des documents
                                </div>
                                <div class="circle-tile-number text-faded" style="font-size: 25px">
                                  <?php  
                                  $docu = $pdo->query("SELECT * FROM `document_adminstratif`");
                                  $docu = $docu->fetchAll();
                                  $doc = count($docu); 
                                  echo $doc." "."documents";
                                  ?>
                                    
                                </div>
                                <a href="page_help_admin.php?id=<?php echo $id;?>" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                  </div>
                     <div class="row" >
                            <div class="col-lg-3 col-sm-6"style="margin-right:5%">
                        <div class="circle-tile">
                            <?php
                            $query = $pdo->query("SELECT * FROM para_pointage  ");
                            $resultat =$query->fetch();
                            ?>
                           <a href="poin.php?id=<?php echo $id ; ?>"<?php if($resultat['etat']==0){ ?> class="disabled" <?php } ?>>
                                <div class="circle-tile-heading" style="background-color:#880e4f">
                                    
                                    <i class="fas fa-hand-point-up fa-3x"style="margin-top:15% "></i>
                                    
                                </div>
                            </a>
                            

                            <div class="circle-tile-content " style="background-color:#880e4f">
                                <div class="circle-tile-description text-faded">
                                    Gestion de pointage
                                </div>
                                <div class="circle-tile-number text-faded" style="font-size:25px">

                                    <?php if($resultat['etat']==0){  ?> 

                                        <form method="POST" style="margin-bottom: 0%">
                                        <button type="submit" name="pointage" style="font-size:20px;background-color:transparent;color: rgba(255,255,255,0.7);border:none;"> Activer le pointage</button> 
                                         <?php }else{ ?><?php } ?>
                                         <button type="submit" name="pointage" style="font-size:20px;background-color:transparent;color: rgba(255,255,255,0.7);border:none;"> Activer le pointage</button>
                                     </form>
                                </div>
                                <a href="calcle_pointage.php?id=<?php echo $id ;?>" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>

                        </div>
                    </div>
  <div class="col-lg-3 col-sm-6" style="margin-right:5%">
                        <div class="circle-tile">
                            <a href="planning.php?id=<?php echo $id ; ?>">
                                <div class="circle-tile-heading " style="background-color: #05a174">
                                    <i class="fa fa-calendar fa-3x" style="margin-top: 15%"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content " style="background-color: #05a174">
                                <div class="circle-tile-description text-faded">
                                 Gestion des plannings
                                </div>
                                <div class="circle-tile-number text-faded" style="background-color: #05a174;font-size: 25px">
                                  Présen/A distan
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="page_help_admin.php?id=<?php echo $id;?>" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="archive.php?id=<?php echo $id ; ?>">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-archive fa-3x" style="margin-top: 15%"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Gestion d'archivement
                                </div>
                                <div class="circle-tile-number text-faded" style="font-size: 25px">
                                4 gestions
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

         
         
        </div>
        </div>
    </div>









<?php 
//le pointage et le rapport
$query6 = $pdo->query("SELECT * FROM `para_pointage` "); //ajbad w9tach l rapport
 $resultat6 =$query6->fetchAll();
 foreach ($resultat6 as $key => $variable)
      {
      $nbr_jrs=$resultat6[$key]['nbr_jrs'];
          }
$dd=date('d');
$date_jr_nbr=date($nbr_jrs, strtotime(' +1 days'));
          if( $date_jr_nbr == $dd ){
            // rana nhar l raport
            ?>
<script>
    $('.toast').toast('show');
  </script>
  <?php
          }
?>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
  <div class="toast-header">
    <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img">
      <rect fill="#007aff" width="100%" height="100%" /></svg>
    <strong class="mr-auto">Gestion de pointage</strong>
    <small class="text-muted">Aujourd'hui</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Le pointage et le rapport du mois précedent sont prêts , vous pouvez les consulter
  </div>
</div>
</body>
</html>
<style>
.sidebar-toggle {
    color: #fff;
    font-size: 28px;
    display: inline-block;
    padding: 3px 22px;
}
@media (min-width:768px){
.container-1{float:left;}
.container-2{width:100%;float:left;}
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

.container-1{display: none;}
/*navbar-right=====START==========*/

.social-icon{margin:0px;padding:0px;}
.social-icon li {margin: 0px;padding: 0px;list-style-type: none;}
.social-icon li a {
    display: block;
    padding: 15px 14px;
    text-decoration:none;
}
.social-icon li a:focus{
   color:#fff;
    text-decoration:none;
}

.messages-link{
        color: #fff !important;
    background: #16a085 !important;

}

.alerts-link{
        color: #fff !important;
    background: #f39c12 !important;

}

.tasks-link{
        color: #fff !important;
    background: #2980b9 !important;

}

.user-link{
        color: #fff !important;
    background: #E74C3C !important;

}


/*navbar-right=======END========*/

/*sidebar-toggle=============*/
.sidebar-toggle:hover, .sidebar-toggle:focus {
    color: #fff;
    text-decoration: underline;
}


/*sidr-NAVBAR=======START========*/
.navbar-nav-1{width: 100%;background-color:#34495E;height:auto;overflow: hidden;z-index: 1020;position: relative;}

.side-user {
    display: block;
    width: 100%;
    padding: 15px;
    border-top: none !important;
    border-bottom: 1px solid #142638;
    text-align: center;
}
.close-btn {
    position: absolute;
    z-index: 99;
    color: #fff;
    font-size: 31px;
    top: 0px;
    left: 223px;    
    display: none;
    padding: 0px;
    cursor: pointer;
}
.close-btn .fa-window-close{color:#fff;font-size: 25px;}
.welcome {
    margin: 0;
    font-style: italic;
    color: #9aa4af;
}

.name {
    margin: 0;
    font-family: "Ubuntu","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 20px;
    font-weight: 300;
    color: #ccd1d7;
}
.side-user a{
   color:#fff;
}
.nav-search{border-top: 1px solid #54677a;}
.nav-search .form-control{border: 1px solid #000;border-radius: 0px;}
.nav-search .btn{border: 1px solid #000;border-radius: 0px;}

.dashboard>a{
    color:#fff;
    }
.side-nav li {
    border-top: 1px solid #54677a;
    border-bottom: 1px solid #142638;
}

.side-nav>li>a:active {
    text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
    outline: none;
    color: #fff;
    background-color: #34495e;
}

.panel {
    margin-bottom: 0;
    border: none;
    border-radius: 0;
    background-color: transparent;
    box-shadow: none;
}

.panel>a{
    position: relative;
    display: block;
    padding: 10px 15px;
    color: #fff;
}

.panel>ul>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
    color: darkcyan;
    background: black;
}
.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #3d566e;
}
/*sidr-NAVBAR=======END========*/
@media (min-width: 768px){

#page-wrapper {
   
    padding: 0 30px;
    min-height: 100%;
    border-left: 1px solid #2c3e50;
}
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


a{
    color:  white;
    text-decoration: none;
}

@media (min-width: 768px){
.circle-tile {
    margin-bottom: 30px;
}
}

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}

.circle-tile-heading {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto -40px;
    border: 3px solid rgba(255,255,255,0.3);
    border-radius: 100%;
    color: #fff;
    transition: all ease-in-out .3s;
}

/* -- Background Helper Classes */

/* Use these to cuztomize the background color of a div. These are used along with tiles, or any other div you want to customize. */

 .dark-blue {
    background-color: #34495e;
}

.green {
    background-color: #16a085;
}

.blue {
    background-color: #2980b9;
}

.orange {
    background-color: #f39c12;
}

.red {
    background-color: #e74c3c;
}

.purple {
    background-color: #8e44ad;
}

.dark-gray {
    background-color: #7f8c8d;
}

.gray {
    background-color: #95a5a6;
}

.light-gray {
    background-color: #bdc3c7;
}

.yellow {
    background-color: #f1c40f;
}

/* -- Text Color Helper Classes */

 .text-dark-blue {
    color: #34495e;
}

.text-green {
    color: #16a085;
}

.text-blue {
    color: #2980b9;
}

.text-orange {
    color: #f39c12;
}

.text-red {
    color: #e74c3c;
}

.text-purple {
    color: #8e44ad;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}



.circle-tile-heading .fa {
    line-height: 80px;
}

.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-description {
    text-transform: uppercase;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}

.circle-tile-number {
    padding: 5px 0 15px;
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
}

.circle-tile-footer {
    display: block;
    padding: 5px;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.1);
    transition: all ease-in-out .3s;
}

.circle-tile-footer:hover {
    text-decoration: none;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.2);
}


.morning {
    background: url(https://lh3.googleusercontent.com/-1YbV7nsVnX8/WMugaq-6BEI/AAAAAAAADSg/0wPfQ84vMUcCle_SkgiUDOumUKscMaA8QCL0B/w530-d-h353-p-rw/widget-bg-morning.jpg) center bottom no-repeat;
    background-size: cover;
}

.time-widget {
    margin-top: 5px;
    overflow: hidden;
    text-align: center;
    font-size: 1.75em;
}

.time-widget-heading {
    text-transform: uppercase;
    font-size: .5em;
    font-weight: 400;
    color: #fff;
}
#datetime{color:#fff;}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.9);
}

.tile {
    margin-bottom: 15px;
    padding: 15px;
    overflow: hidden;
    color: #fff;
}
</style>




