 <?php
 require_once __DIR__ . '/../../config/database.php';
$sql="SELECT * FROM users";
$data=mysqli_query($conn,$sql);

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
  <div class="container">
      <h2 class="text-center ">Users Data</h2>
<table class="table table-hover mt-5">
    <thead>
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($data as $key=>$user) : ?>
        <tr>
            <td><?=++$key?></td>
            <td><?=$user['name'];?></td>
            <td><?=$user['email'];?></td>
            <td><?=$user['password'];?></td>
            <td><?=$user['role'];?></td>
            <td>
                <a href="" class="btn btn-info">View</a>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>