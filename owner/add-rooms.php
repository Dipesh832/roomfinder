<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

$sql = "SELECT * FROM users";
$data = mysqli_query($conn, $sql);

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $errors[$key] = "Required";
        }
    }
    $userId = $_SESSION['user']['id'] ?? null;

    if (!$userId) {
        die("User not logged in");
    }
    $title = $_POST["title"];
    $location = $_POST["location"];
    $type = $_POST["type"];
    $description = trim($_POST["description"]);
    $rent = $_POST["rent"];
    $image = "";
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $imageName = md5(time() . rand(1000, 9999)) . '.' . $ext;
        $tmp = $_FILES['image']['tmp_name'];
        $uploadPath = __DIR__ . '/../../public/rooms/' . $imageName;
        if (move_uploaded_file($tmp, $uploadPath)) {
            $image = $imageName;
            echo "Image uploaded: " . $image;
        } else {
            $_SESSION['error'] = "Image upload failed.";
        }
    }
    $rSql = "INSERT INTO rooms(user_id,title,location,type,description,rent,image)VALUES('$userId','$title','$location','$type','$description','$rent','$image')";
    if (mysqli_query($conn, $rSql)) {
        $_SESSION['success'] = "Room added Successfully";
    } else {
        $_SESSION['error'] = "failed to add room";
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
    <div class="container mt-5" style="max-width:800px">
        <h2 class="text-center text-primary fw-bold">Add New Rooms</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title"
                    placeholder="e.g.,Double Room Available in Baneshwor">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" name="location" id="location" placeholder="e.g.,Kathmandu">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Room Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="">Select Room Type</option>
                    <option value="single">Single Room</option>
                    <option value="flat">Flat</option>
                    <option value="shared">Shared Room</option>
                    <option value="double">Double Room</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="rent" class="form-label">Monthly Rent (Rs.)</label>
                <input type="number" class="form-control" name="rent" id="rent" placeholder="e.g.,10000">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Room Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <button class="btn btn-primary w-100">Post Room</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>