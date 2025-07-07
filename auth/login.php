



<?php
require_once __DIR__ . '/../config/config.php'; 
require_once __DIR__ .'/../config/database.php';





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

    <div class="container mt-5" style="max-width: 600px">
       
        <h2 class="mb-4 text-center">Login to RoomFinder</h2>
        <?php
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']); // clear after showing
}
?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
    
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
             <div class="mb-3">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label for="remember" class="form-check-label">Remember Me</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-success">Login</button>
            </div>
            <div class="mt-3 text-center">
                <small><p>Don't have an account?</p><a href="<?=base_url('/auth/register.php')?>">Register</a></small>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const alertEl = document.getElementById('success-alert');
    if (alertEl) {
      setTimeout(() => {
        // Triggers Bootstrap’s fade‐out animation, then removes the element
        bootstrap.Alert.getOrCreateInstance(alertEl).close();
      }, 3000); // 3 seconds
    }
  });
</script>

</body>

</html>