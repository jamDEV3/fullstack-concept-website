<?php

include('includes/header.html');
include('includes/nav.html');

session_start();

if (!isset($_SESSION['user_id']))
{
    require ('login_tools.php');
    load();
}

$_SESSION = array();

session_destroy();

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
</head>
<body>

<div class="container" style="min-height: 640px">
    <div class="row justify-content-center">
        <div class="col-sm-6" style="padding: 50px">
            <h2> You are now logged out.</h1>
            <br>
            <h2>Return to front page?</h2>
            <br>
        </div>
        <a href="index.php" type="button" class="formButton">HOME</a>
    </div>
</div>

<?php

    include('includes/footer.html');

?>
    
</body>
</html>