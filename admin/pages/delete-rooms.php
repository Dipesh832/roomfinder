<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$id=$_GET['id'];

$sql = "DELETE FROM rooms WHERE id=$id";

$res=mysqli_query($conn,$sql);
if(!$res){
    echo 'Room not deleted';
}else{
    redirect('/admin/index.php');
    exit();
}

?>