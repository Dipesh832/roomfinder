<?php include_once __DIR__ . '/../includes/header.php'; ?>
<?php include_once __DIR__ . '/../includes/user-navbar.php';

require_once __DIR__ . '/../config/database.php';
$sql = 'SELECT * FROM rooms';
$roomData = mysqli_query($conn, $sql);
?>

<section class="container mt-4">
    <h3 class="mb-4 text-primary text-center fw-bold">My Listed Rooms</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>SN</th>
                <th>Room Title</th>
                <th>Type</th>
                <th>Location</th>
                <th>Monthly rent (Rs)</th>
                <th>description</th>
                <th>image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roomData as $key => $room): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $user['title']; ?></td>
                    <td><?= $user['type']; ?></td>
                    <td><?= $user['location']; ?></td>
                    <td><?= $user['rent']; ?></td>
                    <td><?= $user['description']; ?></td>
                    <td><?= $user['image']; ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">View</a>
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>






<?php include_once __DIR__ . '/../includes/footer.php'; ?>