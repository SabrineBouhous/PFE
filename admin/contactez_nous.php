<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <head>
    
        <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contactez nous</title> 
    
</head> 
    <script type="text/javascript">

function success(){
   Swal.fire({

  icon: 'success',
  title: 'Votre message a été envoyer avec success',
  
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

function error_env(){
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
if (isset($_POST['envoyer'])) {
	$sujet=$_POST['sujet'];
	$message=$_POST['message'];
	$env = mail("ninamimy43@gmail.com",'kjkj',$message);
	if ($env) { ?>
		<script>
			success();
		</script>
<?php } else{ ?>
	<script>
			error_env();
	</script>
<?php }}
?>



<div class="container contact" style="-webkit-box-shadow: 0px 0px 16px 3px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 16px 3px rgba(0,0,0,0.75);
box-shadow: 0px 0px 16px 3px rgba(0,0,0,0.75);width:90%">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Contactez nous</h2>
				<h4>Nous serions ravis de vous entendre !</h4>
			</div>
		</div>
		<div class="col-md-9">
			<form method="POST">
			<div class="contact-form">
				<div class="form-group">
				  
				<div class="form-group">
				  <label class="control-label col-sm-2" for="sujet" required>Sujet:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="sujet" placeholder="Enter le sujet de votre email" name="sujet" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="message">Message:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="7" id="message"name="message" placeholder="Enter votre message"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit"  name="envoyer" class="btn btn-amber">Envoyer</button>
				  </div>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>
<style type="text/css">
	a{
		text-decoration:none;
		color: white;
	}
	.col-md-3{
		background: #ff9b00;
		padding: 2%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;
	}
	
	.contact-info img{
		margin-bottom:0%;
	}
	.contact-info h2{
		margin-bottom: 10%;
	}
	.col-md-9{
		background: #fff;
		padding: 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: green;
		color: #fff;
		font-weight: 600;
		width: 25%;
	}
	.contact-form button:focus{
		box-shadow:none;
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