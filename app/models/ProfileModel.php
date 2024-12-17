<?php

use LDAP\Result;

require_once('../core/Database.php');

class ProfileModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Lấy thông tin người dùng theo ID
    public function getUserById($userId) {
        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?? null; // Trả về null nếu không tìm thấy
    }

    // Cập nhật thông tin người dùng
    public function updateUser($userId, $username,$fullname, $address, $email, $phone, $avatar = null) {
        if($avatar){
            $query = "
                UPDATE users 
                SET user_name = ?, fullname = ?, address = ?, email = ?, phone = ?, avatar = ? 
                WHERE user_id = ?
            ";
            $stmt = $this->conn->prepare($query);
            if($stmt === false){
                die('chuan bi cau truy bi loi: ' . $this->conn->error);
            }
            $stmt->bind_param("ssssssi", $username,$fullname, $address, $email, $phone,$avatar, $userId);
        } else {
            $query = "
                UPDATE users 
                SET user_name = ?, address = ?, email = ?, phone = ? 
                WHERE user_id = ?
            ";
            $stmt = $this->conn->prepare($query);
            if($stmt === false){
                die('chuan bi cau truy van: ' . $this->conn->error);
            }
            $stmt->bind_param("sssssi", $username,$fullname, $address, $email, $phone,$avatar, $userId);
        }
        $result = $stmt->execute();
        if(!$result){
            die('loi thuc thi cau truy van: ' . $stmt->error);
        }
        return $result;
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

        if (!$user || $user['password'] !== $currentPassword) {
            return false; // Mật khẩu hiện tại không đúng
        }

        // Cập nhật mật khẩu mới
        $query = "UPDATE users SET password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $newPassword, $userId);
        return $stmt->execute();
    }
}
?>
