<?php
require_once('C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\core\Db.php');

class RegisterModel extends Db {
    public function registerUser($username, $hashedPassword, $email, $phone, $address, $role = null, $avatar = null) {
        // Kiểm tra tài khoản đã tồn tại
        $checkAccount = "SELECT * FROM users WHERE email=?";
        $stmt = $this->conn->prepare($checkAccount);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return 'Username or email already exists';
        }

        // Kiểm tra số lượng người dùng
        $countQuery = "SELECT COUNT(*) AS user_count FROM users";
        $stmt = $this->conn->prepare($countQuery);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $row = $result->fetch_assoc()) {
            $userCount = $row['user_count'];
        } else {
            return "Error: Unable to fetch user count.";
        }

        $role = ($userCount == 0) ? "Admin" : ($role ?: "User");

        $sql = "INSERT INTO users (user_name, password, email, phone, role, avatar, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssisss", $username, $hashedPassword, $email, $phone, $role, $avatar, $address);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Error: " . $stmt->error;
        }
    }
}
?>
