<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

// Get user ID from query string
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "User ID not provided.";
    exit;
}

// Fetch user details
$sql = "SELECT * FROM users WHERE id = $id";
$res = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($res);

if (!$user) {
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center text-primary mb-4">User Details</h2>
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <td><?= $user['id'] ?></td>
    </tr>
    <tr>
      <th>Name</th>
      <td><?= htmlspecialchars($user['name']) ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?= htmlspecialchars($user['email']) ?></td>
    </tr>
    <tr>
      <th>Role</th>
      <td><?= $user['role'] ?></td>
    </tr>
    <tr>
      <th>Created At</th>
      <td><?= $user['created_at'] ?></td>
    </tr>
    <tr>
      <th>Updated At</th>
      <td><?= $user['updated_at'] ?></td>
    </tr>
  </table>

  <a href="<?= base_url('/admin/index.php?page=users') ?>" class="btn btn-secondary">Back to Users</a>
</div>
</body>
</html>
