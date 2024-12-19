<?php
require_once 'C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\model\ProfileModel.php';
session_start(); 
require_once('C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\core\Controller.php');
class ProfileController extends Controller {
    private $model;

    public function __construct() {
        $this->model = new ProfileModel();    
    }
    
    public function Default() {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];  
        } else {
            header("Location: login.php");
            exit();
        }
        $userId = $_SESSION['user_id'];

        $userData = $this->model->getUserById($userId);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Cập nhật thông tin người dùng
            $message = $this->updateProfile($userId, $userData);
        }
        require_once 'C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\views\Profile.php';
    }

    // Lấy thông tin người dùng
    public function getProfile($userId) {
        return $this->model->getUserById($userId);
    }


    public function updateProfile($userId, $userData) {
        $username = $_POST['username'] ?? $userData['username'];
        $address = $_POST['address'] ?? $userData['address'];
        $email = $_POST['email'] ?? $userData['email'];
        $phone = $_POST['phone'] ?? $userData['phone'];

        // Xử lý upload avatar
        $avatar = $userData['avatar'];
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $avatar = $this->uploadAvatar();
        }

        // Cập nhật thông tin người dùng
        $result = $this->model->updateUser($userId, $username, $address, $email, $phone, $avatar);
        return $result ? "Cập nhật thành công!" : "Cập nhật thất bại!";
    }
    public function uploadAvatar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
            $avatar = $_FILES['avatar'];

            if ($avatar['error'] === UPLOAD_ERR_OK) {
                // Kiểm tra file ảnh hợp lệ
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (in_array($avatar['type'], $allowedTypes)) {
                    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/Public/Image/'; 
                    echo "Document ". $_SERVER['DOCUMENT_ROOT'];

                    if (!is_dir($targetDir)) { 
                        mkdir($targetDir, 0777, true); 
                        }

                    $fileName = basename($avatar['name']); 
                    $targetFilePath = $targetDir . $fileName;

                    if (move_uploaded_file($avatar['tmp_name'], $targetFilePath)) {
                        // Cập nhật avatar trong cơ sở dữ liệu
                        return $fileName; 
                    } else {
                        return "Không thể lưu ảnh.";
                    }
                } else {
                    return "Chỉ chấp nhận file ảnh JPG, PNG, GIF";
                }
            } else {
                return "Lỗi khi tải ảnh lên.";
            }
        }
        return null;
    }

    // Thay đổi mật khẩu
    public function changePassword($userId, $currentPassword, $newPassword) {
        return $this->model->changePassword($userId, $currentPassword, $newPassword);
    }

    // Xử lý yêu cầu thay đổi mật khẩu từ View 
    public function handleChangePassword() { 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            if (isset($_POST['current-password']) && isset($_POST['new-password']) && isset($_POST['confirm-password'])) { 
                $userId = $_SESSION['user_id']; 
                $currentPassword = $_POST['current-password']; 
                $newPassword = $_POST['new-password']; 
                $confirmPassword = $_POST['confirm-password']; 
                if ($newPassword === $confirmPassword) { 
                    $result = $this->changePassword($userId, $currentPassword, $newPassword); 
                } 
            }
        }
    }
}
