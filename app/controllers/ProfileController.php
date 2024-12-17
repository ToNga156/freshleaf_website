<?php
require_once '../models/ProfileModel.php';

class ProfileController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new ProfileModel($dbConnection);
    }

    // Lấy thông tin người dùng
    public function getProfile($userId) {
        return $this->model->getUserById($userId);
    }

    // Cập nhật thông tin người dùng
    public function updateProfile($userId, $username, $address, $email, $phone, $avatar = null) {
        return $this->model->updateUser($userId, $username, $address, $email, $phone, $avatar);
    }

    // Thay đổi mật khẩu
    public function changePassword($userId, $currentPassword, $newPassword) {
        return $this->model->changePassword($userId, $currentPassword, $newPassword);
    }
}
?>
