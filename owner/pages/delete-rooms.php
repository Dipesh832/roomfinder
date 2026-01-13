<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$Room_id=$_GET['id'];

$sql = "DELETE FROM rooms WHERE id=$Room_id";

$res=mysqli_query($conn,$sql);
if(!$res){
    echo 'Room not deleted';
}else{
    redirect('/owner/dashboard.php');
    exit();
}

?>