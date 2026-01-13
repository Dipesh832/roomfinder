<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$sql = "SELECT * FROM rooms";
$roomsData = mysqli_query($conn, $sql);

?>



<section class="py-5" id="rooms-listings">
    <div class="container">
        <h2 class="text-center fw-bold text-primary mb-4">Available Rooms</h2>
        <div class="row g-4">
            <?php foreach ($roomsData as $rooms): ?>
                <div class="col-md-4">
                    <div class="card" style="width: 24rem;">
                        <img src="<?= base_url('public/rooms/' . $rooms['image']); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <?= htmlspecialchars($rooms['title']) ?></h5>
                            <p class="card-text">
                                <strong>Type:</strong> <?= ucfirst($rooms['type']) ?><br>
                                <strong>Location:</strong> <?= htmlspecialchars($rooms['location']) ?><br>
                                <strong>Rent:</strong> <?= number_format($rooms['rent']) ?><br>
                            </p>
                            <a href="<?=base_url('/tenant/pages/rooms-details.php?id='.$rooms['id'])?>" class="btn btn-primary">Details</a>
                            <a href="<?=base_url('/tenant/pages/book-now.php?id='.$rooms['id'])?>" class="btn btn-success">Book Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>