<?php
require_once('../core/Database.php');
require_once('../controllers/LoginController.php');

class Login {
    public function getUserInfor($username, $email, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ? AND email = ? AND password = ?");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }
    
}
?>