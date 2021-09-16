<?php
$id=$_GET['id'];
require '../bdd.php';
$query = $pdo->query("SELECT * FROM `groupe`");
$result = $query->fetchAll();
$nb =count($result);
if (isset($_POST['logout'])) {
  
  session_unset();
  session_destroy();
  header("location: ../login.php");
}

?>
<script type="text/javascript">
  var nb=<?php echo $nb; ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<body>
  <form method="POST">
<button type="submit" name="logout" style="background: transparent;border: none;"><i class="fas fa-sign-out-alt fa-lg" style="margin-top:3%;margin-left:2%">Déconnecter</i></button></form>
<div class="container">
    <h2 class="text-center" style="margin-bottom:3%">Informations de l'année universitaire:</h2>
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form  method="POST">
                        <div class="card border-primary rounded-0" id="div1" style="">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3>Début et fin</h3>
                                    <p class="m-0">Entrez la date de début et fin d'année universitaire</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                
                                <label>Date début d'année</label>
    <p><input type="Date" class="form-control" name="debutanneé" id="debutanneé"></p>
    <div class="invalid-feedback" id="errorda">
         Ce champs est obligatoire !!
        </div> 
    <label>Date fin d'année</label>
    <p><input type="Date" class="form-control" name="finanneé" id="finanneé"></p>
    <div class="invalid-feedback" id="errorfa">
          Ce champs est obligatoire !!
        </div> 

                                <div class="text-center">
                                    <button type="button" value="next" class="btn btn-info btn-block rounded-0 py-2" onclick="showdiv2()">Suivant</button>
                                </div>
                            </div>

                        </div>


                        <div class="card border-primary rounded-0"id="div2" style="display: none;">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3>Les semèstres</h3>
                                    <p class="m-0">Entrez date de début et de fin des semèstres:</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                              <label>Date début de semèstre 1 :</label> 
    <p><input type="Date" class="form-control"  name="debutsem" id="debutsem"></p>
     <div class="invalid-feedback" id="errords1">
          Ce champs est obligatoire !!
        </div> 
    <label>Date fin de semèstre 1 :</label>
    <p><input type="Date" class="form-control"  name="finsem" id="finsem"></p>
      <div class="invalid-feedback" id="errorfs1">
          Ce champs est obligatoire !!
        </div>
    <label>Date début de semèstre 2 :</label> 
    <p><input type="Date" class="form-control"  name="debutsem2" id="debutsem2"></p>
      <div class="invalid-feedback" id="errords2">
          Ce champs est obligatoire !!
        </div>
    <label>Date fin de semèstre 2 :</label>
    <p><input type="Date" class="form-control"  name="finsem2" id="finsem2"></p>
      <div class="invalid-feedback" id="errorfs2">
          Ce champs est obligatoire !!
        </div>

                                <div class="text-center">
                                  <button type="button" value="previous" class="btn btn-info btn-block rounded-0 py-2" onclick="showdiv1()">Précedent</button>
                                    <button type="button" value="next" class="btn btn-info btn-block rounded-0 py-2" onclick="showdiv3()" >Suivant</button>

                                </div>
                            </div>

                        </div>

                            <div class="card border-primary rounded-0"id="div3" style="display: none;">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3>Les horraires de travail</h3>
                                    <p class="m-0">Entrez des groupes  de travails </p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <?php if($nb!=0){ ?>
  
  
   <div class="alert alert-warning" role="alert" style="margin-right: 5%">
  Cette étape n'est pas obligatoire parcequ'il ya des groupes déja 
</div> <?php }else{?>
  

     
  <label>De (Période 01) :</label> 
    <p><input type="time" class="form-control" name="de1" id="de1"></p>
    <div class="invalid-feedback" id="errorde1">
          Ce champs est obligatoire !!
        </div>
    <label>jusqu'a (Période 01) :</label>
    <p><input type="time" class="form-control" name="jusqua1" id="jusqua1"></p>
    <div class="invalid-feedback" id="errorjus1">
          Ce champs est obligatoire !!
        </div>
    <label>De (Période 02) :</label> 
    <p><input type="time" class="form-control" name="de2" id="de2"></p>
    <div class="invalid-feedback" id="errorde2">
          Ce champs est obligatoire !!
        </div>
    <label>jusqu'a (Période 02) :</label>
    <p><input type="time" class="form-control" name="jusqua2"id="jusqua2"></p>
    <div class="invalid-feedback" id="errorjus2">
          Ce champs est obligatoire !!
        </div>

  <?php } ?>
                                

                                <div class="text-center">
                                  <button type="button" value="previous" class="btn btn-info btn-block rounded-0 py-2" onclick="showdiv22()">Précedent</button>
                                    <button type="submit" name="envoyer" id="envoyerr" hidden >a</button>

                                    <button type="submit"  value="next" id="envoy" class="btn btn-info btn-block rounded-0 py-2" onclick="env()">Envoyer</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->




                </div>
  </div>
</div>

<script type="text/javascript">
   function showdiv2(){
  var x = document.getElementById("div1");
  

if (document.getElementById("debutanneé").value=="") {
 document.getElementById("errorda").style.display = "block";
}else{
if (document.getElementById("finanneé").value=="") {
  document.getElementById("errorda").style.display = "none";
document.getElementById("errorfa").style.display = "block";
}else{
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("div2");
     y.style.display = "block";


}}}

function showdiv3(){
  var x = document.getElementById("div2");



if (document.getElementById("debutsem").value=="") {
 document.getElementById("errords1").style.display = "block";
}else{
if (document.getElementById("finsem").value=="") {
  document.getElementById("errords1").style.display = "none";
document.getElementById("errorfs1").style.display = "block";
}else{
  if (document.getElementById("debutsem2").value=="") {
  document.getElementById("errorfs1").style.display = "none";
document.getElementById("errords2").style.display = "block";
}else{
   if (document.getElementById("finsem2").value=="") {
  document.getElementById("errords2").style.display = "none";
document.getElementById("errorfs2").style.display = "block";
}else{

  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("div3");
     y.style.display = "block";
}}}}}








function showdiv1(){
  var x = document.getElementById("div2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("div1");
     y.style.display = "block";
}
function showdiv22(){
  var x = document.getElementById("div3");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
    var y = document.getElementById("div2");
     y.style.display = "block";
}
function env() {
   if (nb==0) {
if (document.getElementById("de1").value=="") {
 document.getElementById("errorde1").style.display = "block";
}else{
if (document.getElementById("jusqua1").value=="") {
  document.getElementById("errorde1").style.display = "none";
document.getElementById("errorjus1").style.display = "block";
}else{
  if (document.getElementById("de2").value=="") {
  document.getElementById("errorjus1").style.display = "none";
document.getElementById("errorde2").style.display = "block";
}else{
   if (document.getElementById("jusqua2").value=="") {
  document.getElementById("errorde2").style.display = "none";
document.getElementById("errorjus2").style.display = "block";
}else{

document.getElementById("envoy").setAttribute('type', 'submit');
alert(document.getElementById("envoy").type);
}}}}}else{
  
 /* function confirm(){
     Swal.fire({
  icon: 'success',
  title: 'Les informations sont bien enregistrés !',
  showConfirmButton: false,
  footer: '<button type="submit" value="next" name="envoyer" id="envoy" class="btn btn-info btn-block rounded-0 py-2" >Oui</button>'
})} 
     confirm();
   

*/
document.getElementById("envoyerr").click()


}
}


</script>
<?php

 if (isset($_POST['envoyer'])) {
  $debuta=$_POST['debutanneé'];
  $fina=$_POST['finanneé'];
  $debuts=$_POST['debutsem'];
  $fins=$_POST['finsem'];
  $debuts2=$_POST['debutsem2'];
  $fins2=$_POST['finsem2'];
  
  $etat=1;
  $ida=1;
  $idb=2;
  $idc=3;

  $resquete=$pdo->prepare ('UPDATE para_general SET  date_debut = ?,  date_fin = ?,etat= ? WHERE  id = ? ');
  $req=$resquete->execute(array($debuta,$fina,$etat,$ida));
   $resquete2=$pdo->prepare ('UPDATE para_general SET  date_debut = ?,  date_fin = ?,etat= ? WHERE  id = ? ');
  $req2=$resquete2->execute(array($debuts,$fins,$etat,$idb));
  $resquete3=$pdo->prepare ('UPDATE para_general SET  date_debut = ?,  date_fin = ?,etat= ? WHERE  id = ? ');
  $req3=$resquete3->execute(array($debuts2,$fins2,$etat,$idc));
  if ($nb==0) {
   

 $de1=$_POST['de1'];
  $de2=$_POST['de2'];
  $jusqua1=$_POST['jusqua1'];
  $jusqua2=$_POST['jusqua2'];
$resquete5=$pdo->prepare ('INSERT INTO `groupe` (`de1`, `jusqu\'a1`, `de2`, `jusqu\'a2`) VALUES ("'.$de1.'", "'.$jusqua1.'", "'.$de2.'", "'.$jusqua2.'")');
 $req5=$resquete5->execute();
}

if ($req && $req2 && $req3 || $req && $req2 && $req3 && $req5  ) { 
    
    //changer l'etat
$etat=1;
   $resquete4=$pdo->prepare ('UPDATE para_general SET  etat = ?');
  $req4=$resquete4->execute(array($etat));
  // 2/redirection
  // $iddd="location:dashboard.php?id=".$id;
        //   header($iddd); ?>
  <meta http-equiv="refresh" content="0;url=dashboard.php?id=<?php echo $id;?>">
            
    <?php
}
}
?>