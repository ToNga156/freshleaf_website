<?php  
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Db.php');
    class UserModel extends Db{
        public function Register($username, $hashedPassword, $email, $phone, $address, $role = null, $avatar = null){
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
        public function getUserId($user_id){
            $query = "SELECT * FROM users WHERE user_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc() ?? null;
        }
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
        public function updateUser($userId, $username, $address, $email, $phone, $avatar){
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
        public function generateResetCode($email) {
            if (!$this->conn) {
                return "Error: Unable to connect to the database.";
            }
        
            $query = "SELECT user_id FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($query);
        
            if (!$stmt) {
                return "Error preparing statement: " . $this->conn->error;
            }
        
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $userId = $user['user_id'];
        
                // Tạo mã reset ngẫu nhiên và thời gian hết hạn
                $resetCode = bin2hex(random_bytes(16));
                $expiresAt = date('Y-m-d H:i:s', strtotime('+3 minutes')); // Mã reset hết hạn sau 3 phút
        
                // Lưu mã reset vào cơ sở dữ liệu
                $insertQuery = "INSERT INTO password_resets (user_id, reset_code, expires_at) VALUES (?, ?, ?)";
                $stmt = $this->conn->prepare($insertQuery);
        
                if (!$stmt) {
                    return "Error preparing insert statement: " . $this->conn->error;
                }
        
                $stmt->bind_param("iss", $userId, $resetCode, $expiresAt);
        
                if ($stmt->execute()) {
                    return $resetCode;
                } else {
                    return "Error inserting reset code: " . $stmt->error;
                }
            } else {
                return "Email không tồn tại.";
            }
        }        
        public function resetPassword($resetCode, $newPassword) {
            // Kiểm tra độ dài mật khẩu mới
            if (strlen($newPassword) < 6) {
                return "Mật khẩu phải có ít nhất 6 ký tự.";
            }
        
            $query = "SELECT user_id FROM password_resets WHERE reset_code = ? AND expires_at > NOW()";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $resetCode);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $userId = $user['user_id'];
        
                // Mã hóa mật khẩu mới
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
                // Cập nhật mật khẩu mới
                $updateQuery = "UPDATE users SET password = ? WHERE user_id = ?";
                $stmt = $this->conn->prepare($updateQuery);
                $stmt->bind_param("si", $hashedPassword, $userId);
        
                if ($stmt->execute()) {
                    // Xóa mã reset sau khi dùng
                    $deleteQuery = "DELETE FROM password_resets WHERE reset_code = ?";
                    $stmt = $this->conn->prepare($deleteQuery);
                    $stmt->bind_param("s", $resetCode);
                    $stmt->execute();
        
                    return true;
                } else {
                    return "Lỗi cập nhật mật khẩu: " . $stmt->error;
                }
            } else {
                return "Mã reset không hợp lệ hoặc đã hết hạn.";
            }
        }
        
    }

?>