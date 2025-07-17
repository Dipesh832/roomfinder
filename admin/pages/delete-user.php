<?php
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$id=$_GET['id'];
$sqlCheck = "SELECT role FROM users WHERE id = $id LIMIT 1";
$resCheck = mysqli_query($conn, $sqlCheck);
$user = mysqli_fetch_assoc($resCheck);

if (!$user) {
    $_SESSION['error'] = "User not found.";
} elseif ($user['role'] === 'admin') {
    $_SESSION['error'] = "You cannot delete an admin user.";
} else {
$sql = "DELETE FROM users WHERE id=$id";

$res=mysqli_query($conn,$sql);
if(!$res){
    echo 'User not deleted';
}else{
    redirect('/admin/index.php?page=users');
    exit();
}
}
?>