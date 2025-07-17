<section class="container mt-4">
    <h3 class="mb-4 text-primary text-center fw-bold">Manage Rooms</h3>

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
            
                        <a href="<?=base_url('/admin/pages/edit-rooms.php?id=' . $room['id'])?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('/admin/pages/delete-rooms.php?id=' . $room['id']) ?>"
                            onclick="return confirm('Are you sure you want to delete this room?')"
                            class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</section>