<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<a class="button" href="#popup1">sing in with anab rafiq</a>


<div id="popup1" class="overlay">
	<div class="popup"><br/>
		sign in
		<a class="close" href="#">×</a><br>
		Email:<br /> <input name="email" value="" name="name" placeholder="email" /><br />
        
        Password:<br /> <input name="email" value="" name="name" placeholder="*******" /><br /><br />
        
       <button class="btn btn-success">submit </button> 
        
     <a href="sign up.html">   <button class="btn btn-danger">sign up</button></a>
        
  </div>
</div>
<style type="text/css">
	





.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}


pup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}.a9 {margin-top:300px; margin-left:300px; float:left;}
</style>