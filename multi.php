<?php 
require 'dashboard_admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etapes pour commencer l'année</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data" >
                <h3>
                    Les dates de l'année
                </h3>
                <fieldset >
                    <h2>Entrée les dates qui concerne l'anneé universitaire</h2>
                    <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="email" class="form-control" id="inputEmail4MD" placeholder="Email">
        <label for="inputEmail4MD">Email</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="password" class="form-control" id="inputPassword4MD" placeholder="Password">
        <label for="inputPassword4MD">Password</label>
      </div>
    </div>
                </fieldset>

                <h3>
                    Social Profiles
                </h3>
                <fieldset>
                    <h2>Social profiles</h2>
                    <div class="form-group">
                        <input type="text" name="socials_twitter" id="socials_twitter" placeholder="Twitter"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="socials_facebook" id="socials_facebook" placeholder="Facebook"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="socials_google" id="socials_google" placeholder="Google Plus"/>
                    </div>
                </fieldset>

                <h3>
                    Personal Details
                </h3>
                <fieldset> 
                    <h2>Personal Details</h2>
                    <div class="form-group">
                        <input type="text" name="your_name" id="your_name" placeholder="Your name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="your_phone" id="your_phone" placeholder="Phone"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="your_addr" id="your_addr" placeholder="Address"/>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    
</body>
</html>
<script type="text/javascript">
    (function($) {

    var form = $("#signup-form");
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'Previous',
            next : 'Next',
            finish : 'Submit',
            current : ''
        },
        titleTemplate : '<div class="title"><span class="title-text">#title#</span><span class="title-number">0#index#</span></div>',
        onFinished: function (event, currentIndex)
        {
            alert('Sumited');
        }
    });
    
    
})(jQuery);

</script>