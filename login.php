<?php

include('includes/header.html');
include ('includes/nav.html');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet" > 
    <title>Navigation</title>
</head>
<body>

    <div class="row justify-content-center" style="padding-top:50px; padding-bottom:50px; min-height: 620px;">

        <div class=col-sm-6>
            <h3 style="text-align:center">LOGIN</h3>
            <form action="login_action.php" method="post">	
                <input type="text" name="email" class="form-control" placeholder="Email"> 
                <input type="password" name="pass"  class="form-control" placeholder="Password">	
                <input type="submit" value="LOGIN" class="formButton">
                <br>
            </form>

            <br>

            <?php

            if (isset($errors) && !empty($errors))
            {
                echo '<p id="err_msg">There was a problem:<br>';

                foreach ($errors as $msg)
                { 
                    echo " - $msg<br>";
                }

                echo 'Please try again or <a href="register.php">Register</a></p>';
            }

            ?>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
        
        include('includes/footer.html');

    ?>


</body>
</html>