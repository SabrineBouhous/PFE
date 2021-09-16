<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <head>
    
        <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Réinitialiser le mot de passe</title> 
    
</head> 

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->



<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <?php 
 require 'function.php';
 require 'bdd.php';
if (isset($_POST['Envoyer'])) {
 $email=$_POST['Email'];

 $emp_email=$pdo->query("SELECT * FROM `employé` WHERE email='$email' ");
 $emp_email =$emp_email->fetchAll();
 if (count($emp_email)==0) { ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:3%; width:50%;margin-left:25%;text-align: center;">
  <strong>Cet email n'existe pas!!</strong> , veuillez introduire un email existant!
  
</div>

 <?php }else{ 
  foreach ($emp_email as $key => $variable)
      {
        $id=$emp_email[$key]['idemp'];
      }
  $sujet="réinitialisez votre mot de passe";
  $nv_pw=Genere_Password(10);
  $message="Votre nouveau mot de passe est :".$nv_pw."\n Mot de passe réinitialisé Le".date('d-m-Y H:m');
  $resquete=$pdo->prepare ("UPDATE `employé` SET `Mot_de_passe` = '$nv_pw'WHERE idemp='$id' ");
  if($resquete->execute()){
  $env = mail("ninamimy43@gmail.com",$sujet,$message);
  if ($env) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:3%; width:50%;margin-left:25%;text-align: center;">
  <strong>Votre Mot de passe a été réinitialisé</strong> , Consulter votre boite émail pour le trouver.
  
</div>
<?php }else{ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:3%; width:50%;margin-left:25%;text-align: center;">
  <strong>Votre Mot de passe a été réinitialisé</strong> , Consulter votre boite émail pour le trouver.
  
</div>
<?php  }
 
}else{
  echo "prblm de cnx";
} 


}
}



 ?>
 <div class="form-gap"></div>
<div class="container" style="margin-left:35%">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Mot de passe oublié?</h2>
                  <p>vous pouvez réinitialiser votre mot de passe.</p>
                  <div class="panel-body">
    
                  
                        
                        <!-- Default auto-sizing form -->
<form method="post">
  <!-- Grid row -->
  <div class="form-row align-items-center" style="margin-left:5%">
    <!-- Grid column -->
   
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-auto"style="width:310px;margin-bottom:30px">
      <!-- Default input -->
      <label class="sr-only" for="inlineFormInputGroup">Email</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control py-0" id="inlineFormInputGroup" name="Email" placeholder="Email">
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-auto">
      <button type="submit" class="btn btn-lg btn-primary btn-block" name="Envoyer" style="width:300px">Envoyer</button>
    </div>
  </div>
  <!-- Grid row -->
</form>
<!-- Default auto-sizing form -->
                      </div>
                      
                      
                      <i class="fas fa-arrow-alt-circle-left" ></i>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
<style type="text/css">
  .form-gap {
    padding-top:70px;
  
}
body{
  background-color: #f0f0f0

    }
</style>

























