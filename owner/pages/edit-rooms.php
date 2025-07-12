<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM rooms where id=$id";
$res = mysqli_query($conn, $sql);
$roomsData = mysqli_fetch_array($res);

if (!empty($_POST)) {
    $title = $_POST["title"];
    $location = $_POST["location"];
    $rent = $_POST["rent"];
    $facilities = $_POST["facilities"];
    $type = $_POST["type"];
    $image = $roomsData['image'];

    if (!empty($_FILES['image']['name'])) {
        $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetDir = __DIR__ . '/../../public/rooms/';
        $targetFile = $targetDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo "Failed to upload image.";
            exit;
        }

       
        $image = $imageName;
    }

    $rSql = "UPDATE rooms SET 
        title='$title',
        location='$location',
        rent='$rent',
        facilities='$facilities',
        type='$type',
        image='$image'
        WHERE id=$id";

    $res = mysqli_query($conn, $rSql);

    if (!$res) {
        echo "Not updated";
        die();
    } else {
        redirect('/owner/dashboard.php');
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
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="<?= htmlspecialchars($roomsData['title']) ?>"
                        placeholder="e.g.,Double Room Available in Baneshwor">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location:</label>
                    <input type="text" class="form-control" name="location" id="location"
                        value="<?= htmlspecialchars($roomsData['location']) ?>" placeholder="e.g.,Kathmandu">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Room Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Select Room Type</option>
                        <option value="single" <?= $roomsData['type'] == 'single' ? 'selected' : '' ?>>Single Room</option>
                        <option value="flat" <?= $roomsData['type'] == 'flat' ? 'selected' : '' ?>>Flat</option>
                        <option value="shared" <?= $roomsData['type'] == 'shared' ? 'selected' : '' ?>>Shared Room</option>
                        <option value="double" <?= $roomsData['type'] == 'double' ? 'selected' : '' ?>>Double Room</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="facilities" class="form-label">Facilities:<span class="text-danger"></label>
                    <textarea name="facilities" id="facilities" class="form-control"
                        rows="5"> <?= htmlspecialchars($roomsData['facilities']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="rent" class="form-label">Monthly Rent (Rs.):</label>
                    <input type="number" class="form-control" name="rent" value="<?= $roomsData['rent'] ?>" id="rent"
                        placeholder="e.g.,10000">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Room Image:</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <?php if (!empty($roomsData['image'])): ?>
                        <img src="<?= base_url('/public/rooms/' . $roomsData['image']) ?>" width="100" class="mt-2 rounded"
                            alt="Current Image">
                    <?php endif; ?>

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