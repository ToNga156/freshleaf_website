<?php
require_once 'C:\xampp\htdocs\ProjectWeb-TV\freshleaf_website\mvc\model\ProfileModel.php';
session_start(); 
require_once('C:\xampp\htdocs\ProjectWeb-TV\freshleaf_website\mvc\core\Controller.php');
class ProfileController extends Controller {
    private $model;

    public function __construct() {
        $this->model = new ProfileModel();    
    }
    
    public function Default() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }
        $userId = $_SESSION['user_id'];
        $userData = $this->model->getUserById($userId);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $message = $this->updateProfile($userId, $userData);
        }
        require_once 'C:\xampp\htdocs\freshleaf_website\mvc\views\Profile.php';
    }

    public function getProfile($userId) {
        return $this->model->getUserById($userId);
    }

    public function updateProfile($userId, $userData) {
        $username = $_POST['username'] ?? $userData['username'];
        $address = $_POST['address'] ?? $userData['address'];
        $email = $_POST['email'] ?? $userData['email'];
        $phone = $_POST['phone'] ?? $userData['phone'];

        $avatar = $userData['avatar'];
        if(!empty($_FILES['avatar']['name'])){
            $avatarResult = $this->uploadAvatar();
            if($avatarResult['succsess']){
                $avatar = $avatarResult['fileName'];
            }else{
                return $avatarResult['message'];
            }
        }

        $result = $this->model->updateUser($userId, $username, $address, $email, $phone, $avatar);
        return $result ? "Cập nhật thành công!" : "Cập nhật thất bại!";
    }

    public function uploadAvatar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
            $avatar = $_FILES['avatar'];

            if ($avatar['error'] === UPLOAD_ERR_OK) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (in_array($avatar['type'], $allowedTypes)) {
                    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/Public/Image/'; 

                    if (!is_dir($targetDir)) { 
                        mkdir($targetDir, 0777, true); 
                    }

                    $fileName = basename($avatar['name']); 
                    $targetFilePath = $targetDir . $fileName;

                    if (move_uploaded_file($avatar['tmp_name'], $targetFilePath)) {
                        return['success' => true, 'fileName' => $fileName]; 
                    } return['success' => false, 'message' => "Không thể lưu ảnh"];
                }    
                return ['success' => false, 'message' => "Chỉ chấp nhận file ảnh JPG, PNG, GIF"];
            }
        }
    }

    public function changePassword($userId, $currentPassword, $newPassword) {
        return $this->model->changePassword($userId, $currentPassword, $newPassword);
    }

    public function handleChangePassword() { 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            if (isset($_POST['current-password']) && isset($_POST['new-password']) && isset($_POST['confirm-password'])) { 
                $userId = $_SESSION['user_id']; 
                $currentPassword = $_POST['current-password']; 
                $newPassword = $_POST['new-password']; 
                $confirmPassword = $_POST['confirm-password']; 
                if ($newPassword === $confirmPassword) { 
                    $result = $this->changePassword($userId, $currentPassword, $newPassword); 
                    return $result ? "Đổi mật khẩu thành công!" : "Đổi mật khẩu thất bại!";
                } 
                return "Mật khẩu không khớp.";
            }
        }
    }
}

