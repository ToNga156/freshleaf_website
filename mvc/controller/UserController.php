<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\UserModel.php');
session_start();
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');

class UserController extends Controller{
    private $model;
    
    
    public function Register(){
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $username = isset($_POST['username']) ? trim($_POST['username']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
            $address = isset($_POST['address']) ? trim($_POST['address']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            $confirmPassword = isset($_POST['confirmpassword']) ? trim($_POST['confirmpassword']) : '';
            
            
            $error = "";

            // Kiểm tra dữ liệu đầu vào
            if (empty($username) || empty($email) || empty($phone) || empty($address) || empty($password) || empty($confirmPassword)) {
                $error = "Please enter complete information.";
            } else {
                // Kiểm tra định dạng email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "Invalid email!";
                } elseif ($password !== $confirmPassword) {
                    // Kiểm tra xác nhận mật khẩu
                    $error = "Passwords do not match!";
                }
            }

            if (!empty($error)) {
                $this->view('./User/Register', ['error' => $error]);
                return; 
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $registerModel = $this->model("UserModel");
            $result = $registerModel->Register($username, $hashedPassword, $email, $phone, $address);

            if ($result === true) {
                // Điều hướng đến trang đăng nhập sau khi đăng ký thành công
                header("Location: ./user/Login");
                exit();
            } else {

                    $this->view('./User/Register', ['error' => $result]);

            }
        } else {
            // Hiển thị form đăng ký khi chưa có dữ liệu POST
            $this->view('./User/Register');
        }
    }
    public function Login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            $loginModel = $this->model("UserModel");
            $userInfo = $loginModel->getUserInfo($email);

            // Kiểm tra nếu tìm thấy người dùng
            if ($userInfo) {
                // Kiểm tra xem mật khẩu có hợp lệ hay không
                if (password_verify($password, $userInfo['password'])) {
                    // Đăng nhập thành công, lưu thông tin vào session
                    $_SESSION['user_id'] = $userInfo['user_id'];
                    $_SESSION['user_name'] = $userInfo['user_name'];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['role'] = $userInfo['role'];
                    $_SESSION['avatar'] = $userInfo['avatar'];
                
                    if (isset($_SESSION['user_name'])) {
                        echo "Session user_name: " . $_SESSION['user_name'];
                    } else {
                        echo "Session không tồn tại.";
                    }

                    // Điều hướng dựa trên vai trò
                    if ($userInfo['role'] === 'Admin') {
                        echo "Đây là Homepage Admin";
                    } else {
                        header("Location: /freshleaf_website/Home");
                    }
                    exit();
                }
                else {
                    // Nếu mật khẩu sai
                    $error = "Mật khẩu không chính xác!";
                    $this->view('./User/Login', ['error' => $error]);
                    exit();
                }
            } else {
                // Nếu không tìm thấy người dùng
                $error = "Email không tồn tại!";
                $this->view('./User/Login', ['error' => $error]);
                exit();
            }
        }
        else {
            // Hiển thị form đăng nhập khi chưa có dữ liệu POST
            $this->view('./User/Login');
        }
    }
    public function Logout(){
        session_start();

        // Xóa tất cả các session
        session_unset();
        session_destroy();

        // Chuyển hướng về trang đăng nhập
        header("Location: ./login");
        exit();
    }
    public function __construct() {
        $this->model = new UserModel();    
    }
    public function Profile(){
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: ./Login");
            exit();
        }
        $userId = $_SESSION['user_id'];
        $userData = $this->model->getUserId($userId);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $message = $this-> updateProfile($userId,$userData);
        }
        require_once 'C:\xampp\htdocs\freshleaf_website\mvc\views\User\Profile.php';
    }
    public function getProfile($userId) {
        return $this->model->getUserId($userId);
    }

    public function updateProfile($userId, $userData) {
        $username = $_POST['username'] ?? $userData['username'];
        $address = $_POST['address'] ?? $userData['address'];
        $email = $_POST['email'] ?? $userData['email'];
        $phone = $_POST['phone'] ?? $userData['phone'];

        $avatar = $userData['avatar'];
        if(!empty($_FILES['avatar']['name'])){
            $avatarResult = $this->uploadAvatar();
            if($avatarResult['success']){
                $avatar = $avatarResult['fileName'];
            }else{
                return $avatarResult['message'];
            }
        }

        $result = $this->model->updateUser($userId, $username, $address, $email, $phone, $avatar);
        $_SESSION['user_name'] = $username;
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

                    if (move_uploaded_file($avatar['tmp_name'], $targetFilePath)) {  // Khởi tạo session
                        $_SESSION['user_avatar'] = $fileName;
                        return['success' => true, 'fileName' => $fileName]; 
                    } 
                    return['success' => false, 'message' => "Không thể lưu ảnh"];
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
?>