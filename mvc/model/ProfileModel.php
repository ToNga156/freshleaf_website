<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Db.php');

class ProfileModel extends Db{
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
    public function updateUser($userId, $username, $address, $email, $phone, $avatar ) {
        if ($avatar) {
            $query = "
                UPDATE users 
                SET user_name = ?, address = ?, email = ?, phone = ?, avatar = ? 
                WHERE user_id = ?
            ";
            $stmt = $this->conn->prepare($query);
            if ($stmt === false) {
                die('Chuẩn bị câu truy vấn bị lỗi: ' . $this->conn->error);
            }
            $stmt->bind_param("sssssi", $username,$address, $email, $phone, $avatar, $userId);
        } else {
            $query = "
                UPDATE users 
                SET user_name = ?, address = ?, email = ?, phone = ? 
                WHERE user_id = ?
            ";
            $stmt = $this->conn->prepare($query);
            if ($stmt === false) {
                die('Chuẩn bị câu truy vấn bị lỗi: ' . $this->conn->error);
            }
            $stmt->bind_param("sssssi", $username, $address, $email, $phone,$avatar, $userId);
        }
        $result = $stmt->execute();
        if (!$result) {
            die('Lỗi thực thi câu truy vấn: ' . $stmt->error);
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

        // Kiểm tra mật khẩu đã mã hóa 
        if (!$user || !password_verify($currentPassword, $user['password'])) { 
            return false; 
        }
        
        // Mã hóa mật khẩu mới 
        $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Cập nhật mật khẩu mới
        $query = "UPDATE users SET password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $hashedNewPassword, $userId);
        return $stmt->execute();
    }
}

?>
