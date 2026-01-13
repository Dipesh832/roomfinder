<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';


if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'tenant') {
    die("Access denied. You must be logged in as a tenant to book a room.");
}
// $_SESSION['room_id'] = $_GET['room_id'];

$tenant_id = $_SESSION["user"]["id"];
$room_id = $_GET["id"] ?? null;
if (!$room_id) {
    die("No room selected for booking.");
}

$sql = "SELECT * FROM bookings WHERE tenant_id = $tenant_id AND room_id = $room_id AND (status = 'pending' OR status = 'confirmed')";
$check = mysqli_query($conn, $sql);
if(mysqli_num_rows($check) > 0) {
    header("Location: " . base_url('/tenant/dashboard.php?already_booked=1'));
    exit;
}


$sql = "INSERT INTO bookings (tenant_id, room_id, booking_date, status, created_at) 
        VALUES ('$tenant_id', '$room_id', CURDATE(), 'pending', NOW())";

$res = mysqli_query($conn, $sql);
if($res){
    header("Location: " . base_url('/tenant/dashboard.php?success=1'));
    exit;
}else{
    header("Location: " . base_url('/tenant/dashboard.php?failed=1'));
    exit;
}

?>