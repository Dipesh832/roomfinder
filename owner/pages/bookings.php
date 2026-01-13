<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'owner') {
    die("Access denied.");
}

$owner_id = $_SESSION["user"]["id"];



$sql = "SELECT b.id as booking_id,r.title,r.location,u.name as tenant_name,b.booking_date, b.status, b.created_at 
        FROM bookings b 
        JOIN rooms r ON b.room_id = r.id 
        JOIN users u ON b.tenant_id = u.id
        WHERE r.user_id = $owner_id 
        ORDER BY b.created_at DESC";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

if (isset($_GET['approve'])) {
    $booking_id = (int) $_GET['approve'];

    $update_sql = "UPDATE bookings SET status='approved' WHERE id=$booking_id";
    if (mysqli_query($conn, $update_sql)) {
        header("Location: " . base_url('/owner/pages/bookings.php?message=approved'));
        exit();
    } else {
        echo "Error approving booking: " . mysqli_error($conn);
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>

<body>
    <section class="container mt-4">
        <h2>Booking Requests</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Room Title</th>
                    <th>Location</th>
                    <th>Tenant Name</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                    <th>Requested on</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['booking_id']); ?></td>
                            <td><?= htmlspecialchars($row['title']); ?></td>
                            <td><?= htmlspecialchars($row['location']); ?></td>
                            <td><?= htmlspecialchars($row['tenant_name']); ?></td>
                            <td><?= htmlspecialchars($row['booking_date']); ?></td>
                            <td><?= htmlspecialchars($row['status']); ?></td>
                            <td><?= htmlspecialchars($row['created_at']); ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="<?= base_url('/owner/pages/bookings.php?approve=' . $row['booking_id']); ?>" class="btn btn-sm btn-success">Approve</a>
                                <a href="#" class="btn btn-sm btn-danger">Reject</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No booking requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>