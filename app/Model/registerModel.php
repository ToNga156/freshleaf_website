<?php
    require_once('../config.php');

class Register{
    public function registerUser($username,$email,$hashedPassword,$phone,$role = null,$address){
        global $conn;
        $checkAccount = "SELECT * FROM Users WHERE username =? OR email=?";
        $stmt = $conn->prepare($checkAccount);
        $stmt->bind_param("ss",$username,$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows>0){
            return 'User name or email already exists';
        }
        $countQuery = "SELECT COUNT(*) AS user_count FROM Users";
        $result = $conn->prepare($countQuery);
        $row = $result->fetch_assoc();
        $userCount = $row['user_count'];
        if ($userCount == 0){
            $role = 'Admin';
        }
        else{
            $role = $role?:'User';
        }
        // Insert data in Database
        $sql = "INSERT INTO Users($username,$email,$hashedPassword,$phone,$role,$address) VALUES (?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("sssiss",$username,$email,$hashedPassword,$phone,$role,$address);
        if ($stmt->execute()){
            return true;
        }
        else{
            return "error".$stmt->error;
        }
    }
}
?>