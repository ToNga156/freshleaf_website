<?php
require_once('../core/Database.php');

class ProfileModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getUserById($userId) {
        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?? null; 
    }

    // Cập nhật thông tin người dùng
    public function updateUser($userId, $username, $address, $email, $phone, $avatar = null) {
        if ($avatar) {
            $query = "
                UPDATE users 
                SET user_name = ?, address = ?, email = ?, phone = ?, avatar = ? 
                WHERE user_id = ?
            ";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssssi", $username, $address, $email, $phone, $avatar, $userId);
        } else {
            $query = "
                UPDATE users 
                SET user_name = ?, address = ?, email = ?, phone = ? 
                WHERE user_id = ?
            ";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssssi", $username, $address, $email, $phone, $userId);
        }
        return $stmt->execute();
    }

    // Thay đổi mật khẩu
    public function changePassword($userId, $currentPassword, $newPassword) {
        // Kiểm tra mật khẩu hiện tại
        $query = "SELECT password FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!$user || !password_verify($currentPassword, $user['password'])) {
            return false; // Mật khẩu hiện tại không đúng
        }

        // Cập nhật mật khẩu mới
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $hashedPassword, $userId);
        return $stmt->execute();
    }
}
?>
