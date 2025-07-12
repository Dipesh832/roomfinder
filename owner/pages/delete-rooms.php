<?php
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$id=$_GET['id'];

$sql = "DELETE FROM rooms WHERE id=$id";

$res=mysqli_query($conn,$sql);
if(!$res){
    echo 'Room not deleted';
}else{
    redirect('/owner/dashboard.php');
    exit();
}

?>