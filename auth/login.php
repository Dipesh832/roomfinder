<?php
require_once __DIR__ . '/../config/config.php'; 

require_once __DIR__ .'/../config/database.php';
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];

    if ($role === 'admin') {
        redirect('admin/index.php');
    } elseif ($role === 'owner') {
        redirect('owner/dashboard.php');
    } elseif ($role === 'tenant') {
        redirect('tenant/dashboard.php');
    } else {
        redirect('/');
    }
}
$errors = [
    'email' => '',
    'password' => ''
];
$old = [
    'email' => ''
];

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $errors[$key] = 'This field is required';
        } else {
            $old[$key] = htmlspecialchars($value); // keep old values
        }
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if(empty($email)){
        $errors['email']="This field is required";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if (!array_filter($errors)) {
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $res = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($res);

        // ✅ Use password_verify to check the hashed password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;

            // Redirect based on user role
            if ($user['role'] == 'admin') {
                redirect("/admin/dashboard.php");
            } elseif ($user['role'] == 'owner') {
                redirect("/owner/dashboard.php");
            } elseif ($user['role'] == 'tenant') {
                redirect("/tenant/dashboard.php");
            } else {
                redirect("/"); // fallback
            }
        } else {
            $_SESSION['error'] = "Invalid email or password.";
        }
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

    <div class="container mt-5" style="max-width: 600px">

        <h2 class="mb-4 text-center">Login to RoomFinder</h2>
        <?= messages(); ?>
        <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" id="success-alert">
            <?= $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:<span class="text-danger">
                        <?=$errors['email'];?>
                    </span></label>
                <input type="text" class="form-control" value="<?=$old['email'];?>" name="email" id="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:<span class="text-danger">
                        <?=$errors['password'];?>
                    </span></label>
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
                <small>
                    <p>Don't have an account?</p><a href="<?=base_url('/auth/register.php')?>">Register</a>
                </small>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const alertEl = document.getElementById('success-alert');
            if (alertEl) {
                setTimeout(() => {
                    alertEl.classList.remove("show");
                    alertEl.classList.add("fade");
                    setTimeout(() => alertEl.remove(), 300); // removes after fade-out
                }, 3000); // show for 3 sec
            }
        });
    </script>

</body>

</html>