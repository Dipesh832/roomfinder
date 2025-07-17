<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users where id=$id";
$res = mysqli_query($conn, $sql);
$usersData = mysqli_fetch_array($res);

if (!empty($_POST)) {
    $name = $_POST["name"];
    $email = $_POST["email"];

    $role = $_POST["role"];

    $rSql = "UPDATE users SET 
        name='$name',
        email='$email',
        role='$role'
        WHERE id=$id";

    $res = mysqli_query($conn, $rSql);

    if (!$res) {
        echo "Not updated";
        die();
    } else {
        redirect('/admin/index.php');
        exit();
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
    <div class="container my-4">
        <div class="row">
            <h3 class="text-center text-primary fw-bold">Update Your Post</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $usersData['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $usersData['email'] ?>"
                        placeholder="e.g.,user@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Select Role</option>
                        <option value="admin" <?= $usersData['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="owner" <?= $usersData['role'] == 'owner' ? 'selected' : '' ?>>Owner</option>
                        <option value="tenant" <?= $usersData['role'] == 'tenant' ? 'selected' : '' ?>>Tenant</option>

                    </select>
                </div>

                <button class="btn btn-primary w-100">Update</button>
            </form>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>