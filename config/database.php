<?php

$conn=mysqli_connect('localhost','root','','roomfinder');
if(!$conn){
    die("Failed Connection:" . mysqli_connect_error());
}

?>