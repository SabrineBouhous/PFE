<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>page d'aide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Page questions/réponses<small>Questions fréquemment posées </small></h1>
</div>

<!-- Bootstrap FAQ - START -->
<div class="container">
    <br />
    <br />
    <br />

    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        Cette section contient une mine d'informations, Si vous ne trouvez pas de réponse à votre question, assurez-vous de nous contacter.
    </div>

    <br />

    <div class="panel-group" id="accordion">
        <div class="faqHeader">Question sur les informatios personnel</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Où est ce que je peux consulter mes informations?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    Pour consultez vos informations vous devez accèder à la page d'aceuil puis cliquer sur l'icon en dessus de carreau "Mes informations".
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">Est ce que je peux modifier mes informations personnel?</a>
                </h4>
            </div>
            <div id="collapseTwelve" class="panel-collapse collapse">
                <div class="panel-body">
                   Non , vous ne pouvvez pas modifier vos informations personnel mais si vous trouvez une erreur n'hésiter pas a contacter l'admin .
                </div>
            </div>
        </div>
        <div class="faqHeader">Mes congés</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Où est ce que je peux consulter mes congés déja pris?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                  Pour consultez vos congés vous devez accèder à la page d'aceuil puis cliquer sur l'icon en dessus de carreau "Gérer mes congés".
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Où est ce que je peux demander un congé?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                   Pour demander un congé vous devez cliquer sur le boutton "DEMANDER CONGÉ" en haut de la page puis remplire le formulaire affiché.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Où est ce que je peux consulter la date d congé manuelle?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                     Pour consulter le congé annuelle vous devez cliquer sur le boutton "DEMANDER CONGÉ ANNUELLE" en haut de la page .
                    <br />
                </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Comment je peux savoir si ma demande était acceptée?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                     Pour savoir si votre demande était acceptée,le système vous envoie une notification dés que l'admin accept votre demande.
                    <br />
                </div>
            </div>
        </div>

        <div class="faqHeader">Documents administratifs</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Où est ce que je peux consulter mes congés déja pris?</a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                    Pour consultez vos documents déja demandés vous devez accèder à la page d'aceuil puis cliquer sur l'icon en dessus de carreau "mes demandes de docs".
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Où est ce que je peux demander un congé?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                     Pour demander un document administratif vous devez cliquer sur le boutton "DEMANDER DOCUMENT" en haut de la page puis remplire le formulaire affiché.
                </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Comment je peux savoir si ma demande était acceptée?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                     Pour savoir si votre demande était acceptée,le système vous envoie une notification dés que l'admin accept votre demande.
                    <br />
                </div>
            </div>
        </div>
         <div class="faqHeader">Mon pointage</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Où est ce que je peux pointer?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                    Pour <strong>Pointer</strong> vous devez cliquer sur le boutton "Mon pointage" au dessous tableau de bord.<br>
                    Vous pouvez aussi consulter si vous avez pointer déja,si vous êtes tôt ou tard.
                </div>
            </div>
        </div>
         <div class="faqHeader">Si vous etes un professeur</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Où est ce que je peux consulter mon planning?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                    Pour consulter votre planning vous devez cliquer sur le boutton "Mon planning" au dessous tableau de bord.
                </div>
            </div>
        </div>
        
    </div>
</div>

<style>
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "\e072"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
</style>

<!-- Bootstrap FAQ - END -->

</div>

</body>
</html>