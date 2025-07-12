
<?php 
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
?>



<?php
$sql = 'SELECT * FROM rooms';
$roomData = mysqli_query($conn, $sql);

$page = $_GET['page'] ?? 'rooms-card';
$page = str_replace('.php', '', $page);
$title = ucfirst($page);
$page = $page . '.php';
$pagePath = __DIR__ . "/pages/" . $page;
?>
<?php include_once __DIR__ . '/../includes/header.php'; ?>
<?php include_once __DIR__ . '/../includes/user-navbar.php';?>

<section class="container mt-4" id="room-listings">


    <?php include_once __DIR__ . '/pages/rooms-card.php'; ?>

    <div class="text-center  my-3">
        <button class="btn btn-success" onclick="toggleAddRoom()">+ Add New Room</button>
    </div>


    <div id="addRoomSection" style="display: none;">
        <?php include_once __DIR__ . '/pages/add-rooms.php'; ?>
    </div>
</section>
<section class="container mt-4">
    <h3 class="mb-4 text-primary text-center fw-bold">My Listed Rooms</h3>

    <table class="table table-hovert table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>SN</th>
                <th>Room Title</th>
                <th>Type</th>
                <th>Location</th>
                <th>Monthly rent (Rs)</th>
                <th>Facilities</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roomData as $key => $room): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $room['title']; ?></td>
                    <td><?= ucfirst($room['type']); ?></td>
                    <td><?= $room['location']; ?></td>
                    <td><?= $room['rent']; ?></td>
                    <td><?= substr($room['facilities'], 0, 36) . '...'; ?></td>
                    <td>
                        <?php if (!empty($room['image'])): ?>
                            <img src="<?= base_url('/public/rooms/' . $room['image']); ?>" width="80" alt="Room Image">
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('/owner/pages/rooms-details.php?id=' . $room['id']) ?>" class="btn btn-sm btn-info">View</a>
                        <a href="<?=base_url('owner/pages/edit-rooms.php?id=' . $room['id'])?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('/owner/pages/delete-rooms.php?id=' . $room['id']) ?>"
                            onclick="return confirm('Are you sure you want to delete this room?')"
                            class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</section>


<script>
    function toggleAddRoom() {
        const form = document.getElementById('addRoomSection');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>



<?php include_once __DIR__ . '/../includes/footer.php'; ?>