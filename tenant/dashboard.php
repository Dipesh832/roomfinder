<?php include_once __DIR__ . '/../includes/header.php'; ?>

<?php include_once __DIR__ . '/../includes/user-navbar.php'; ?>
<?php require_once __DIR__ . '/../middleware/require_tenant.php'; ?>

<section class="container mt-4">

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success text-center">
            Booking request sent successfully!
        </div>
    <?php endif; ?>

    <?php include_once __DIR__ . '/pages/rooms-card.php'; ?>



</section>











<?php include_once __DIR__ . '/../includes/footer.php'; ?>