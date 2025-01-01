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
            $checkAccount = "SELECT user_id, user_name, email, password, avatar, role FROM users WHERE email = ?";
            
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
        public function getAllUsers() {
            $sql = "SELECT user_id, user_name, email,avatar, password, phone,role, address  FROM users";
            $stmt = $this->conn->prepare($sql);
            
            if ($stmt->execute()) {
                $result = [];
                $stmt->bind_result($id, $username, $email,$avatar,$password,$phone,$role,$address);
                while ($stmt->fetch()) {
                    $result[] = [
                        "user_id" => $id,
                        "user_name" => $username,
                        "email" => $email,
                        "avatar"=>$avatar,
                        "password" =>$password,
                        "phone"=>$phone,
                        "role"=>$role,
                        "address"=>$address
                        
                        
                    ];
                }
                return $result;
            } else {
                return [];
            }
        }
        public function deleteUser($user_id){
            $sql = "DELETE  FROM users WHERE user_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }   
        
    }

?>