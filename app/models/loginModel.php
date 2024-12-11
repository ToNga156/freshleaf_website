<?php
require_once '../models/connect.php';

class LoginUser {
    public function getUserInfor($conn, $username) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }
}
?>