<?php
require_once '../models/ProfileModel.php';

class ProfileController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new ProfileModel($dbConnection);
    }

    // Lấy thông tin người dùng
    public function getProfile($userId) {
        return $this->model->getUserById($userId);
    }

    // Cập nhật thông tin người dùng
    public function updateProfile($userId, $username,$fullname, $address, $email, $phone, $avatar = null) {
        return $this->model->updateUser($userId, $username,$fullname, $address, $email, $phone, $avatar);
    }

    public function uploadAvatar($userId,$username, $fullname, $address, $email, $phone,$avatar){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])){
            $avatar = $_FILES['avatar'];

            if($avatar['error'] === UPLOAD_ERR_OK){
                    // Kiểm tra file ảnh hợp lệ
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (in_array($avatar['type'], $allowedTypes)) {
                    $targetDir = '../../Public/images/'; // Đường dẫn lưu ảnh
                    $fileName = uniqid() . "_" . basename($avatar['name']); // Tạo tên file duy nhất
                    $targetFilePath = $targetDir . $fileName;
    
                    if (move_uploaded_file($avatar['tmp_name'], $targetFilePath)) {
                        // Cập nhật avatar trong cơ sở dữ liệu
                        $this->model->updateUser($userId, $username,$fullname, $address, $email, $phone, $fileName);
                        return $fileName; // Trả về đường dẫn ảnh
                    } else {
                        return "Không thể lưu ảnh.";
                    }
                }else {
                    return "chỉ chấp nhận file ảnh JPG, PNG, GIF";
                }
            }else{
                return "Lỗi khi tải ảnh lên.";
            }
        }
        return null;
    }


    // Thay đổi mật khẩu
    public function changePassword($userId, $currentPassword, $newPassword) {
        return $this->model->changePassword($userId, $currentPassword, $newPassword);
    }
}
?>
