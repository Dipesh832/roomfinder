
<?php
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/database.php';

$errors=[
    'name'=>'',
    'email'=>'',
    'role'=>'',
    'password'=>'',
    'confirm_password'=>''
];
$old=[
    'name'=>'',
    'email'=>'',
    'role'=>''
];

if(!empty($_POST)){
    foreach($_POST as $key => $value){
        if(empty($value)){
            $errors[$key]="This field is required.";
        }else{
            $old[$key]=htmlspecialchars($value);
        }
    }
    if (empty($_POST['role'])) {
        $errors['role'] = "Please select your role.";
    }
    $name=$_POST['name'];
$email=$_POST['email'];
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']="Invalid email format";
}
$role=$_POST['role'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
if($password !== $confirm_password){
    $errors['confirm_password']="Password do not match";
}
if(!array_filter($errors)){
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sql="INSERT INTO users(name,email,role,password)VALUES('$name','$email','$role','$password')";
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['success']="User Added Successfully";
        redirect("/auth/login.php");
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
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <div class="container mt-5" style="max-width: 600px">
        <h2 class="mb-4 text-center">Add Users</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name: <span class="text-danger"><?=$errors['name'];?></span></label>
                <input type="text" class="form-control" value="<?=$old['name'];?>" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:<span class="text-danger"><?=$errors['email'];?></span></label>
                <input type="email" class="form-control" value="<?=$old['email'];?>" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">I am a</label>
                <select name="role" id="role">
                    <option value="" selected>--Select Role--</option>
                    <option value="admin"  <?=$old['role']=='admin' ? 'selected':''?>>Admin</option>
                    <option value="tenant" <?=$old['role']=='tenant' ? 'selected':''?>>Room Seeker</option>
                    <option value="owner"<?=$old['role']=='owner' ? 'selected':''?>>Room Owner</option>
                </select>
                <span class="text-danger"><?=$errors['role'];?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:<span class="text-danger"><?=$errors['password'];?></span></label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password:<span class="text-danger"><?=$errors['confirm_password'];?></span></label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
            </div>
            <div class="d-grid">
                <button class="btn btn-success">Add</button>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>