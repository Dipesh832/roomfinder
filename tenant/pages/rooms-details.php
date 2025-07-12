<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Room ID not provided.";
    exit;
}
$sql = "SELECT * FROM rooms where id=$id";
$res = mysqli_query($conn, $sql);
$rooms = mysqli_fetch_assoc($res);
if (!$rooms) {
    echo "Room not found";
    exit;
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
    <section class="my-5">
        <div class="container border border-success p-2 border-opacity-10">
            <h2 class="text-center text-primary fw-bold mb-3"><?= htmlspecialchars($rooms['title']) ?></h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url('/public/rooms/' . $rooms['image']) ?>" class="img-fluid rounded"
                        alt="Room Image">
                </div>
                <div class="col-md-6">
                    <p><strong class>Type:</strong> <?= ucfirst($rooms['type']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($rooms['location']) ?></p>
                    <p><strong>Monthly Rent(Rs.):</strong> <?= number_format($rooms['rent']) ?></p>
                    <p><strong>Facilities:</strong> <?= htmlspecialchars($rooms['facilities']) ?></p>
                    <a href="" class="btn btn-success">Book Now</a>
                </div>
            </div>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>