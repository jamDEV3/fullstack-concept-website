<?php

include('includes/header.php');
include ('includes/nav.php') ;

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

    <div style="padding: 50px ; min-height: 630px">

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            foreach ($_POST['qty'] as $item_id => $item_qty)
            {
            $id = (int) $item_id;
            $qty = (int) $item_qty;

                if ($qty == 0) 
                {
                    unset ($_SESSION['cart'][$id]);
                }

                elseif ($qty > 0) {
                    $_SESSION['cart'][$id]['quantity'] = $qty;
                }
            }
        }

        $total = 0;

        if (!empty($_SESSION['cart']))
        {

        require ('connect_db.php');

        $q = "SELECT * FROM products_table WHERE item_id IN (";

        foreach ($_SESSION['cart'] as $id => $value) 
        {
            $q .= $id.',';
        }

        $q = substr($q, 0, -1).') ORDER BY item_id ASC';
        $r = mysqli_query ($link, $q);

        echo 
        '
        <form action="cart.php" method="post">
            <table class="table">
                <thead>
                <tr><th>Items in your cart</th></tr>
                </thead>
                <tbody>
                <tr>
        ';

        while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
        {

        $subtotal=$_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
        $total += $subtotal;

        echo 
        "
        <tr>
            <div>
                <td> <img src='". $row["item_img"]."' alt='". $row["item_name"]."' style='width:100px'>
                <br> 
                {$row['item_name']}</td>
            </div>

            <td> <input type=\"text\" size=\"3\" name=\"qty[{$row['item_id']}]\" value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\"></td>
            <td> &pound ".number_format ($subtotal, 2)."</td>
        </tr>
        ";
        }

        mysqli_close($link);

        echo 
        '
            <tr>
                <td>Total = &pound '.number_format($total,2).'</td>

                <td><input class="formButton" type="submit" name="submit" value="UPDATE CART"></td>

                <td><a class="formButton" href="checkout.php?total='.$total.' ">Checkout Now</a></td>
            <tr>


            </table>
        </form>';
        }

        else
        { 
            echo '<p>Your cart is currently empty.</p>';
        }

        ?>

    </div>

    <?php

        include('includes/footer.html');

    ?>
    
</body>
</html>