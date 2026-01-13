<?php include_once __DIR__ . '/../includes/header.php'; ?>

<?php include_once __DIR__ . '/../includes/user-navbar.php'; ?>
<?php require_once __DIR__ . '/../middleware/require_tenant.php'; ?>
<?php
$tenant_id = $_SESSION['user']['id'];
$query = "
    SELECT b.*, r.title, r.location
    FROM bookings b
    JOIN rooms r ON b.room_id = r.id
    WHERE b.tenant_id = $tenant_id
    ORDER BY b.created_at DESC
";
$res = mysqli_query($conn, $query);
?>

<section class="container mt-4">

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success text-center" id="success-msg">
            Booking request sent successfully!
        </div>
        <script>
            setTimeout(() => document.getElementById("success-msg").style.display = "none", 3000);
        </script>
    <?php elseif (isset($_GET['already_booked'])): ?>
        <div class="alert alert-warning text-center">
            You've already requested or booked this room.
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center">
            Something went wrong. Try again.
        </div>
    <?php endif; ?>


    <?php include_once __DIR__ . '/pages/rooms-card.php'; ?>



</section>











<?php include_once __DIR__ . '/../includes/footer.php'; ?>