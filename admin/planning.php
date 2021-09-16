
<script src="https://kit.fontawesome.com/samplekit.js"
 crossorigin="anonymous"></script>
<?php
require '../bdd.php';

require 'dashboard_admin.php';
 ?>

<head>
   
        <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des plannings</title> 
    <link href="dash.css" rel="stylesheet" type="text/css"> 
</head>
<body>
<div class="container-2" style="margin-bottom: 50px;margin-left:2%:margin-top:-8%; ">
     <div id="page-wrapper">   
      <div>
      <div class="page-title">
       <h2><i class="fas fa-home"></i> Accueil</h2>
        <ol class="breadcrumb" style="width: 100%;height:45px; background-color: #b2b2b2;color: white">
         <li class="active" style="width:100%;"><a href="dashboard.php?id=<?php ?>" ><i class="fas fa-home"></i> Accueil</a> / <a href=""> Gestion des plannings</a> <div id="reportrange" class="btn btn-green btn-square date-picker" style="margin-left:57%;font-size: 15px;display: inline;">
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
   <div class="row" style="margin-left:5%" >
<div class="col-lg-5 col-sm-6" style="margin-right:10%">
                        <div class="circle-tile" >
                            <a href="planning_présentiel.php?id=<?php echo $id ; ?>">
                                <div class="circle-tile-heading " style="background-color:#05a174">
                                    <i class="fa fa-calendar fa-3x" style="margin-top: 15%"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue" style="background-color: #05a174">
                                <div class="circle-tile-description text-faded">
                                   Planning (présentiel)
                                </div>
                                <div class="circle-tile-number text-faded" style="font-size:25px">
                                    <?php 
                                    $type="présentiel"; 
                                  $plan = $pdo->query("SELECT * FROM `planning` WHERE type='$type'");
                                  $plan = $plan->fetchAll();
                                  $plann = count($plan); 
                                  echo $plann." "."séances";
                                  ?> 
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="a.php?id=<?php echo $id ; ?>" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6" style="margin-right:5%">
                        <div class="circle-tile">
                            <a href="planning_adistance.php?id=<?php echo $id ; ?>">
                                <div class="circle-tile-heading " style="background-color: #05a174">
                                    
                                   <i class="fa fa-calendar fa-3x" style="margin-top: 15%"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content"  style="background-color: #05a174">
                                <div class="circle-tile-description text-faded">
                                  plannings(a distance)
                                </div>
                                <div class="circle-tile-number text-faded">
                                  <?php 
                                    $type="A distance"; 
                                  $plan = $pdo->query("SELECT * FROM `planning` WHERE type='$type'");
                                  $plan = $plan->fetchAll();
                                  $plann = count($plan); 
                                  echo $plann." "."séances";
                                  ?> 
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="gestion_congé.php" class="circle-tile-footer">Plus d'info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    </div>
                  </div>
                </div>
              </body>
              
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