<?php

include('includes/header.html');
include ('includes/nav.php');

if (isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart'])))
{

    require ('connect_db.php');

    $q = "INSERT INTO orders_table (user_id, total, order_date) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW())";
    $r = mysqli_query ($link, $q);

    $order_id = mysqli_insert_id($link);

    $q = "SELECT * FROM products_table WHERE item_id IN (";
    
    foreach ($_SESSION['cart'] as $id => $value)
    { 
        $q .= $id.',';
    }

    $q = substr($q, 0, -1) .') ORDER BY item_id ASC';
    $r = mysqli_query ($link, $q);

    while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
    {
        $query = "INSERT INTO order_contents_table (order_id, item_id, quantity, price) VALUES ( $order_id, ".$row['item_id'].",".$_SESSION['cart'][$row['item_id']]['quantity'].",".$_SESSION['cart'][$row['item_id']]['price'].")";
        $result = mysqli_query($link,$query);
    }

    mysqli_close($link);

    echo "<p>Thanks for your order. Your Order Number Is #".$order_id."</p>";
    $_SESSION['cart'] = NULL;
}

else 
{ 
    echo '<p>There are no items in your cart.</p>';
}  

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
    
</body>
</html>