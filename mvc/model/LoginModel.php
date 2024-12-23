<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Db.php');

class LoginModel extends Db {

    // Phương thức kiểm tra thông tin đăng nhập
    public function getUserInfo($email) {
        // Truy vấn SQL kiểm tra người dùng với email và mật khẩu
        $checkAccount = "SELECT user_id, user_name, email, password, avatar role FROM users WHERE email = ?";
        
        // Chuẩn bị câu truy vấn
        $stmt = $this->conn->prepare($checkAccount);
        $stmt->bind_param("s", $email); 
        $stmt->execute();
        $result = $stmt->get_result();

        // Kiểm tra nếu có dữ liệu người dùng
        if ($result->num_rows > 0) {
            // Lấy thông tin người dùng
            return $result->fetch_assoc();
        } else {
            return null; // Nếu không tìm thấy người dùng
        }
    }
}
?>
