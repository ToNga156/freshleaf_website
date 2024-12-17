<?php
require_once('../core/Database.php');
require_once('../controllers/RegisterController.php');
class Register{
    public function registerUser($username,$hashedPassword,$email,$phone,$address,$role = null){
        global $conn;
        $checkAccount = "SELECT * FROM users WHERE  email=?";
        $stmt = $conn->prepare($checkAccount);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows>0){
            return '';
        }
        $countQuery = "SELECT COUNT(*) AS user_count FROM users";
        $stmt = $conn->prepare($countQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $row = $result->fetch_assoc()) {
            $userCount = $row['user_count'];
        } else {
            return "Error: Unable to fetch user count.";
        }

        // Xác định vai trò (role)
        if ($userCount == 0) {
            $role = 'Admin';
        } else {
            $role = $role ?: 'User';
        }

        // Insert data in Databaserole
        $sql = "INSERT INTO Users(user_name,password,email,phone,role,address) VALUES (?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("sssiss", $username, $hashedPassword, $email, $phone, $role, $address);
        if ($stmt->execute()){
            return true;
        }
        else{
            return "error".$stmt->error;
        }
    }
}
?>