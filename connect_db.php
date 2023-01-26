<?php   

$link = mysqli_connect('server','username','password','database');  

if (!$link)
{  
    die("Could not connect to MySQL: ".mysqli_connect_error()); 
}   

?> 