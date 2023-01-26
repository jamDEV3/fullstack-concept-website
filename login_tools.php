<?php

function load($page = 'login.php')
{
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url,'/\\');
    $url .= '/'.$page;
    header("Location: $url"); 
    exit();
}

function validate($link, $email = '', $pwd = '')
{
    $errors = array();

    if (empty($email)) 
    {
        $errors[] = 'Enter your email address.' ;
    }

    else  
    {
        $e = mysqli_real_escape_string($link, trim($email));
    }

    if (empty($pwd)) 
    { 
        $errors[] = 'Enter your password.';
    } 

    else 
    { 
        $p = mysqli_real_escape_string($link, trim($pwd));
    }

    if (empty($errors)) 
    {
    $q = "SELECT user_id, first_name, last_name FROM user_table WHERE email='$e' AND pass='$p'";  
    $r = mysqli_query ($link, $q);

        if (@mysqli_num_rows($r) == 1) 
        {
            $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
            return array(true, $row);
        }

        else 
        {
            $errors[] = 'Email address and password not found.' ;
        }
    }

    return array(false, $errors); 
}


?>