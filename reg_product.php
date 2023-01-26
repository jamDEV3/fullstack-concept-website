<?php

include('includes/header.php');
include('includes/nav.php');

require('connect_db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet"> 

</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <h3 style="padding: 50px">MEN</h3>
            <div class="row justify-content-center">
                <?php $q = "SELECT * FROM products_table";
                
                $r = mysqli_query($link, $q);

                if (mysqli_num_rows($r) > 0)
                {
                    
                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                    {
                        if ($row['category_id'] == 'M')
                        {
                            
                        echo '
                            <div class="justify-content-center">
                                <div class="col-sm" style="padding-bottom:20px">
                                    <div class="card" style="width: 18rem">
                                        <img src="'. $row['item_img'].'" class="card-img-top" alt="'. $row['item_name'].'">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">'. $row['item_name'].'</h5>
                                            <p class="card-text">'. $row['item_desc'].'</p>
                                            <p class="card-text"> &pound '. $row['item_price'].'</p>
                                            <a href="added.php?id='.$row['item_id'].'" class="btn btn-light">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                        }
                    }

                }
                
                ?>

            </div>

            <h3 style="padding: 50px">WOMEN</h3>
            <div class="row justify-content-center">
                <?php $q = "SELECT * FROM products_table";
                
                $r = mysqli_query($link, $q);

                if (mysqli_num_rows($r) > 0)
                {
                    
                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                    {
                        if ($row['category_id'] == 'F')
                        {

                        echo '
                            <div class="justify-content-center">
                                <div class="col-sm" style="padding-bottom:20px">
                                    <div class="card" style="width: 18rem;">
                                        <img src="'. $row['item_img'].'" class="card-img-top" alt="'. $row['item_name'].'">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">'. $row['item_name'].'</h5>
                                            <p class="card-text">'. $row['item_desc'].'</p>
                                            <p class="card-text"> &pound '. $row['item_price'].'</p>
                                            <a href="added.php?id='.$row['item_id'].'" class="btn btn-light">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                        }
                    }

                }
                                    
                ?>

            </div>

            <h3 style="padding: 50px">SPECIAL</h3>
            <div class="row justify-content-center">
                <?php $q = "SELECT * FROM products_table";
                
                $r = mysqli_query($link, $q);

                if (mysqli_num_rows($r) > 0)
                {
                    
                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                    {
                        if ($row['category_id'] == 'SP'){

                        echo '
                            <div class="justify-content-center">
                                <div class="col-sm" style="padding-bottom:20px">
                                    <div class="card" style="width: 18rem;">
                                        <img src="'. $row['item_img'].'" class="card-img-top" alt="'. $row['item_name'].'">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">'. $row['item_name'].'</h5>
                                            <p class="card-text">'. $row['item_desc'].'</p>
                                            <p class="card-text"> &pound '. $row['item_price'].'</p>
                                            <a href="added.php?id='.$row['item_id'].'" class="btn btn-light">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                        }
                    }

                    mysqli_close( $link );

                }
                    
                ?>
                
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>