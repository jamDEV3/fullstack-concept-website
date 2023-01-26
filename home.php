<?php

include('includes/header.php');
include ('includes/nav.php') ;

require ('connect_db.php');

?>

<!doctype html>
<html lang="en">

<!-- HTML - Contains a little amount of CSS styling, mostly just small adjustments to elements spacing. Most of CSS is located on the styles.css sheet -->
    

<!-- Head of page, containg meta elements including Bootstrap and own CSS styles, along with fonts -->
<head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet" > 
    <title>MK Time</title>
</head>

<!-- Main content on page -->
<body>

    <!-- Sliding image reel displaying products, using Bootstrap Carousel -->
    <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="slide1"></div>
            </div>
            <div class="carousel-item">
                <div class="slide2"></div>
            </div>
            <div class="carousel-item">
                <div class="slide3"></div>
            </div>
        </div>
    </div>

    <!-- Container breaking up image content with text -->

    <div class="container-fluid" style="padding-top: 120px; padding-bottom: 180px;">
        <div class="row justify-content-center">
            <div class="col-sm-6" style="text-align: center">
                <h3 style="padding-top: 40px; padding-bottom: 80px">"Only Time Will Tell"</h3>
                <p>Where will you be in 5 years? As Watch-Makers here at MK Time, we are always looking forward. MK Time delivers quality and satisfaction in both our products and services. It is of utmost importance to us to meet your very needs with devotion, care, all within a nice timely manner. </p>
            </div>
        </div>
    </div>

    <!-- Container stretching across the viewport, showcasing the various categories of products. CSS styling used with hover element. -->

    <div class="container-fluid justify-content-center">
        <div class="row justify-content-center">
            <div class="col-sm-4 tile">
                <a href="product.php">
                    <img src="img/tile_1.jpg" alt="watch">
                    <div class="centered">For Him</div>
                </a>
            </div>
                
            <div class="col-sm-4 tile">
                <a href="product.php">
                    <img src="img/tile_2.jpg" alt="watch">
                    <div class="centered">For Her</div>
                </a>
            </div>

            <div class="col-sm-4 tile">
                <a href="product.php">
                    <img src="img/tile_3.jpg" alt="watch">
                    <div class="centered">Speciality</div>
                </a>
            </div>
        </div>
    </div>

    <!-- Container breaking up image content with text -->
    <div class="container-fluid" style="background-color: #9191A3; padding: 150px; color: white">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="row justify-content-center" style="text-align: center">
                    <img src="img/circle.jpg" class="rounded-circle" alt="watch" style="width:200px">
                    <p style="padding: 20px">MK Time is glad to help our planet. We believe that the planet gives us all so much, so we must give back to our Mother Earth. MK Time is always in pursuit of becoming an even more environmentally-conscious and friendly business.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Smaller preview of products on display, divided using Bootstrap rows, columns and card elements. Each product links to the products page. -->
    
    <div class="container">
        <div class="row justify-content-center">
            <h3 style="padding: 50px">PRODUCTS</h3>
            <div class="row justify-content-center">
                <?php $q = "SELECT * FROM products_table";
                
                $r = mysqli_query($link, $q);

                if (mysqli_num_rows($r) > 0)
                {
                    
                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                    {
                        if ($row['item_id'] == 1 or  $row['item_id'] == 3 or $row['item_id'] == 8 or $row['item_id'] == 9 or $row['item_id'] == 4 or $row['item_id'] == 18)
                        {
                            echo '
                            <div class="justify-content-center" style="padding-bottom:50px">
                                <div class="col-sm">
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
        </div>
    </div>

<!-- Footer element which displays at the bottom of every page. List element displaying pseudo website links. -->
    <?php
    
    include('includes/footer.html');

    ?>

</body>

</html>