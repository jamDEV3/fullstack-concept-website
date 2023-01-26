<?php

include ('includes/header.html');
include ('includes/nav.html');

require('connect_db.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="styles.css" media="print" onload="this.media='all'">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet"> 

</head>
<body>

    <div class="row justify-content-center" style="padding-top:50px; padding-bottom:60px;">

        <div class="col-sm-6">

            <h3 style="text-align:center">REGISTER</h3>

            <form action="register.php" method="post">

            <div class="form-row">
                <div class="col">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                </div>

                <div class="col">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">

                        <input type="password" name="pass1" class="form-control" placeholder="Create Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">

                        <input type="password" name="pass2" class="form-control" placeholder="Confirm Password" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
                </div>
            </div>


            <input type="submit" value="CREATE ACCOUNT" class="formButton">
            </form>

            <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    require ('connect_db.php');
                    $errors = array();

                    if (empty($_POST['first_name']))
                    { 
                        $errors[] = 'Requires first name.';
                    }
                    
                    else

                    { 
                        $fn = mysqli_real_escape_string($link, trim($_POST['first_name'])); 
                    }


                    if (empty($_POST['last_name']))
                    { 
                        $errors[] = 'Requires last name.';
                    }
                    
                    else

                    { 
                        $ln = mysqli_real_escape_string($link, trim($_POST['last_name'])); 
                    }

                    if (empty($_POST['email']))
                    { 
                        $errors[] = 'Requires email address.';
                    }
                    
                    else
                    { 
                        $e = mysqli_real_escape_string($link, trim($_POST['email'])); 
                    }

                    if (!empty($_POST['pass1']))
                    {
                        if ($_POST['pass1'] != $_POST['pass2'])
                        { 
                            $errors[] = 'Passwords do not match.'; 
                        }
                        
                        else
                        {
                            $p = mysqli_real_escape_string($link, trim($_POST['pass1'])); 
                        }
                    }
                    else { 
                        $errors[] = 'Requires a password.'; 
                    }

                    if (empty($errors))
                    {
                        $q = "SELECT user_id FROM user_table WHERE email='$e'";
                        $r = @mysqli_query ($link, $q);
                        if (mysqli_num_rows($r) != 0) $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>';
                    }

                    if (empty($errors)) 
                    {
                        $q = "INSERT INTO user_table (first_name, last_name, email, pass, reg_date) VALUES ('$fn', '$ln', '$e', '$p', NOW())";
                        $r = @mysqli_query ($link, $q);

                        if ($r)
                            { 
                                echo 
                                '
                                <h1>You are now registered. Please, login.</p>
                                <a href="login.php">Login</a>
                                ';
                            }
                        
                        mysqli_close($link); 
                    }

                    else 
                    {
                        echo '<p>The following error(s) occurred:<br>';

                        foreach ($errors as $msg)
                        { 
                            echo " - $msg<br>"; 
                        }
                        
                        echo 'Please try again.</div>';
                        mysqli_close($link);
                    }  
                }

            ?>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php

include ('includes/footer.html');

?>

</body>
</html>