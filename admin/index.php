<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

require_once __DIR__ . '/../middleware/require_admin.php';

$sql = 'SELECT * FROM rooms';
$roomData = mysqli_query($conn, $sql);

$page = $_GET['page'] ?? 'dashboard';
$page = str_replace('.php', '', $page);
$title = ucfirst($page);
$page = $page . '.php';
$pagePath = __DIR__ . "/pages/" . $page;


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
    <header>
        <div class="container">
            <div class="text-center fw-bold">
                <h2 class="fw-bold d-4">Admin Panel</h2>
            </div>
            <div class="row">
                <ul class="d-flex justify-content-center gap-3 list-unstyled">
                    <li><a href="<?= base_url('admin/index.php?page=rooms') ?>"
                            class="text-decoration-none btn btn-primary">Manage Rooms</a></li>
                    <li><a href="<?= base_url('admin/index.php?page=users') ?>"
                            class="text-decoration-none btn btn-primary">Manage Users</a></li>
                    <li><a href="<?= base_url('admin/index.php?page=register_user') ?>"
                            class="text-decoration-none btn btn-primary">Add/Register Users</a></li>
                    <li><a href="<?= base_url('auth/logout.php') ?>"
                            class="text-decoration-none btn btn-primary">logout</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </header>

    <?php
    if (file_exists($pagePath) && is_file($pagePath)) {
        require $pagePath;
    } else {
        echo "404 page not found";
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>