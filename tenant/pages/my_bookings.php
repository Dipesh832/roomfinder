<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'tenant') {
    die("Access denied.");
}

$tenant_id = $_SESSION["user"]["id"];

$sql = "SELECT b.id,r.title,r.location, b.booking_date, b.status, b.created_at 
        FROM bookings b 
        JOIN rooms r ON b.room_id = r.id 
        WHERE b.tenant_id = $tenant_id 
        ORDER BY b.created_at DESC";
$result = mysqli_query($conn, $sql);

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
        <h2>My Bookings</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Room Name</th>
                    <th>Address</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                    <th>Requested On</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($booking = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($booking['id']) ?></td>
                        <td><?= htmlspecialchars($booking['title']) ?></td>
                        <td><?= htmlspecialchars($booking['location']) ?></td>
                        <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                        <td>
                            <span class="badge
            <?php
            switch ($booking['status']) {
                case 'pending':
                    echo 'bg-warning';
                    break;
                case 'confirmed':
                    echo 'bg-success';
                    break;
                case 'rejected':
                    echo 'bg-danger';
                    break;
                default:
                    echo 'bg-secondary';
            }
            ?>
          ">
                                <?= ucfirst(htmlspecialchars($booking['status'])) ?>
                            </span>
                        </td>
                        <td><?= htmlspecialchars($booking['created_at']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


        <a href="<?= base_url('/tenant/dashboard.php') ?>" class="btn btn-primary">Back to Dashboard</a>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>