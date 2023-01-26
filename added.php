<?php

include('includes/header.html');
include ('includes/nav.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet" > 
  <title>MK Time</title>

</head>

<body>
    <div style="padding: 50px; min-height:630px">
        <?php

        if (isset($_GET['id'])) $id = $_GET['id'];

        require ('connect_db.php') ;

        $q = "SELECT * FROM products_table WHERE item_id = $id";
        $r = mysqli_query($link, $q);

        if (mysqli_num_rows($r) == 1)
        {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

            if (isset($_SESSION['cart'][$id]))
            {
                $_SESSION['cart'][$id]['quantity']++; 
                echo '<p>Another '.$row["item_name"].' has been added to your cart</p>';
            }

            else
            {
                $_SESSION['cart'][$id]= array('quantity' => 1, 'price' => $row['item_price']);
                echo '<p>A '.$row["item_name"].' has been added to your cart</p>';
            }   
        }

        mysqli_close($link);  

        ?>
    </div>

    <?php

        include('includes/footer.html');

    ?>
</body>
</html>