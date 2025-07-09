<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';



$page=$_GET['page'] ?? 'dashboard';
$page=str_replace('.php','',$page);
$title=ucfirst($page);
$page=$page . '.php';
$pagePath= __DIR__ . "/" .$page;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>
<body>
    <header>
        <div class="container">
            <div class="text-center fw-bold">
                    <a href="dashboard.php"><h1>Admin Panel: RoomFinder</h1></a>
            </div>
            <div class="row">
                <ul class="list-unstyled">
                    <li><a href="rooms.php" class="text-decoration-none">Manage Rooms</a></li>
                    <li><a href="users.php" class="text-decoration-none">Manage Users</a></li>
                    <li><a href="" class="text-decoration-none">Manage Rooms</a></li>
                    <li><a href="" class="text-decoration-none">logout</a></li>
                </ul>
            </div>
        </div>
    </header>

<?php
if(file_exists($pagePath) && is_file($pagePath)){
    require $pagePath;
}else{
    echo "404 page not found";
}

?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>