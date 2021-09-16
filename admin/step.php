<?php 
require 'dashboard_admin.php';
$query = $pdo->query("SELECT * FROM `groupe`");
$result = $query->fetchAll();
$nb = count($result);


?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container"style="width:70%;margin-left:15%; background-color:#2c3e50;padding-top:5%;padding-bottom:5%;padding-left: 5%;padding-right: 5%">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel" style="color: white">
        <div class="stepwizard-step">
            
                
                     
                
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p><h4>L'année universitaire</h4></p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p><h4>L'année universitaire</h4></p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p><h4>L'année universitaire</h4></p>
        </div>
    </div>
</div>
<form role="form" method="POST" style="background-color: white;padding-left:5%;padding-bottom:5%:padding-left:10%">
    <div class="row setup-content" id="step-1">
     <fieldset style="width: 100%;margin-top:5%">
                    <h3>Entrez date de début et de fin de l'anneé universitaire</h3>
                    <div class="form-row" style="margin-top:10%">
    <!-- Grid column -->
    <div class="col-md-5" style="margin-right: 10%;margin-left:4%">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="Date" class="form-control" id="inputdate" name="debutanneé" required="12/01/2000" >
        <label for="inputDate" style="font-size:20px">Début d'année universitaire</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-5">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="Date" class="form-control" id="inputdate" name="finanneé" required   >
        <label for="inputDate" style="font-size:20px">Fin de l'année universitaire</label>
      </div>
    </div>
</div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>

                </fieldset>

    </div>
    <div class="row setup-content" id="step-2">
         <fieldset style="width: 100%;">
                    <h3>Entrez date de début et de fin des semestres</h3>
                    <div class="form-row" style="margin-top:10%">
                <div class="col-md-5" style="margin-right:10%;margin-left:4%">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="Date" class="form-control" id="inputdate" name="debutsem1" required="12/01/2000" >
        <label for="inputDate" style="font-size:20px">Début du 1er semestre</label>
      </div>
    </div>
    <div class="col-md-5" >
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="Date" class="form-control" id="inputdate" name="Finsem1" required="12/01/2000" >
        <label for="inputDate"style="font-size:20px">Fin du 1er semestre</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-5" style="margin-right:10%;margin-left:4%">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="Date" class="form-control" id="inputdate" name="debutsem2" required  >
        <label for="inputDate"style="font-size:20px">Début de 2 ème semestre</label>
      </div>
    </div>
    <div class="col-md-5">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="Date" class="form-control" id="inputdate" name="finsem2" required  >
        <label for="inputDate"style="font-size:20px">Fin de 2 ème semestre</label>
      </div>
    </div>
       
       </div>
<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </fieldset>
            
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            
                
                
<fieldset> 
                    <h2>Entrez des groupes  de travails </h2>
                 <?php if($nb!=0){ ?>
   <div class="alert alert-warning" role="alert" style="margin-right: 5%">
  Cette étape n'est pas obligatoire parcequ'il ya des groupes déja 
</div> <?php }else{ ?>
                    
                        <div class="row">
    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
      <div class="md-form mt-0">
        <form method="POST">
                                DE:  <input name="de1" type="Time" id="one" style="margin-right:2% ;border: none ;border-bottom: 2px solid #667292; display: inline; width:5%"  required>
                                Jusqu'a :  <input name="Jusqu'a1" type="Time" id="two" style="margin-right:2%; border: none ;border-bottom: 2px solid #667292;display: inline;width:5%"   required>
                                DE:  <input name="de2" type="Time" id="three"  style="margin-right:2% ;border: none ;border-bottom: 2px solid #667292; display: inline;width:5%'"  required>
                                Jusqu'a :  <input name="Jusqu'a2" type="Time" id="four"  style="margin-right:5% ;border: none ;border-bottom: 2px solid #667292;display: inline;width:5%"  required >
                                
                                <button type="submit" name="ajouter_grp" class="btn btn-mdb-color"><i class="fas fa-plus-square"></i></button>
            </form>
                            </div>
                        </div>
                    </div>
<?php } ?>
                          
                </fieldset>
              
       <?php if($nb!=0){ ?>    <button type="submit" name="envoyer">ENVOYER!</button> <?php 
       if (isset($_POST['envoyer'])) {
    echo "non";
}



   }





        ?>
            
            <button type="submit" name="haha">kj!</button>
            <?php if (isset($_POST['haha'])) {  echo "non"; }?>
        </div>
        </div>
    </form>
</div>


<style type="text/css">


.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
<script type="text/javascript">
    $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>