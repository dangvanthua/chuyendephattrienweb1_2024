<?php
session_start();
require_once 'models/UserModel.php';


$userModel = new UserModel();

if (empty($_SESSION['id'])) {
    die('Bạn phải đăng nhập để thực hiện hành động này.');
}

// Kiểm tra nếu có id trong GET request
if (!empty($_GET['id'])) {
    $idToDelete = $userModel->decodeUserId($_GET['id']); // Giải mã id của user cần xóa

    // Kiểm tra xem id hiện tại có khác với id gửi lên không
    if ($_SESSION['id'] != $idToDelete) {
        die('Bạn không có quyển xóa tài khoản này.');
    }

    // Thực hiện xóa user nếu là chính mình
    $userModel->deleteUserById($idToDelete);
}

// Chuyển hướng về trang danh sách người dùng sau khi xóa
header('location: list_users.php');
exit();