<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $id = $userModel->decodeUserId($_GET['id']);
    $user = $userModel->findUserById($id);
    $_id = $id; // Gán ID cho biến $_id
}

$errors = []; // Khởi tạo mảng lỗi

if (!empty($_POST['submit'])) {

    // Validate name
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    } elseif (!preg_match('/^[A-Za-z0-9]{5,15}$/', $_POST['name'])) {
        $errors['name'] = 'Là ký tự hợp lệ: A->Z, a->z, 0->9, chiều dài từ 5 đến 15 ký tự';
    }

    // Validate password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/', $_POST['password'])) {
        $errors['password'] = 'Phải bao gồm: chữ thường (a->z), chữ HOA (A->Z), số (0-9) và ký tự đặc biệt: ~!@#$%^&*(), chiều dài từ 5 đến 10 ký tự';
    }

    // If no errors, proceed with insert or update
    if (empty($errors)) {
        if (!empty($_id)) {
            // Cập nhật người dùng
            $userModel->updateUser($_POST);
            header('location: list_users.php');
        } else {
            // Thêm mới người dùng
            $userModel->insertUser($_POST);
            header('location: login.php');
        }

        exit();
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value='<?php if (!empty($user[0]['name'])) echo htmlspecialchars($user[0]['name']); ?>'>
                <?php if (!empty($errors['name'])) { ?>
                <span class="text-danger"><?php echo $errors['name'] ?></span>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <?php if (!empty($errors['password'])) { ?>
                <span class="text-danger"><?php echo $errors['password'] ?></span>
                <?php } ?>

            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
        <?php } ?>
    </div>
</body>

</html>