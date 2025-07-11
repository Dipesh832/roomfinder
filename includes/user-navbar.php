<?php require_once __DIR__ . '/../config/config.php';

$userRole = $_SESSION['user']['role'] ?? '';
?>


<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid gap-5 mx-5">
        <a class="navbar-brand text-primary fw-bold" href="">RoomFinder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse gap-2" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <?php if($userRole === 'owner') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Room Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add New Room</a>
                </li>
                <?php elseif($userRole === 'tenant') : ?>

                     <li class="nav-item">
                    <a class="nav-link" href="#">Browse Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My bookings</a>
                </li>

                <?php endif; ?>

            </ul>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url('/image/avatar.jpg');?>" alt="Avatar" class="rounded-circle" width="32"
                        height="32">
                    <span>Profile</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <h6 class="dropdown-header">Welcome!</h6>
                    </li>
                    <li><span class="dropdown-item-text"><strong>Name:</strong> Dipesh Tharu</span></li>
                    <li><span class="dropdown-item-text"><strong>Email:</strong> dipesh@example.com</span></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="redirect('logout.php');">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>