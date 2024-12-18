<?php
require_once 'C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\model\ProfileModel.php';
session_start(); // Đảm bảo session đã được khởi tạo
require_once('C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\core\Controller.php');
class ProfileController extends Controller {
    private $model;

    public function __construct() {
        $this->model = new ProfileModel();    
    }
    
    public function Default() {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];  // Lấy ID người dùng từ session
            // Truyền thông tin người dùng tới view
        } else {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
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

    // Cập nhật thông tin người dùng
    // public function updateProfile($userId, $username, $fullname, $address, $email, $phone, $avatar = null) {
    //     return $this->model->updateUser($userId, $username, $fullname, $address, $email, $phone, $avatar);
    // }

    public function updateProfile($userId, $userData) {
        $username = $_POST['username'] ?? $userData['username'];
        // $fullname = $_POST['fullname'] ?? $userData['fullname'];
        $address = $_POST['address'] ?? $userData['address'];
        $email = $_POST['email'] ?? $userData['email'];
        $phone = $_POST['phone'] ?? $userData['phone'];

        // Xử lý upload avatar
        // $avatar = $userData['avatar'];
        // if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        //     $avatar = $this->uploadAvatar();
        // }

        // Cập nhật thông tin người dùng
        $result = $this->model->updateUser($userId, $username, $address, $email, $phone);

        return $result ? "Cập nhật thành công!" : "Cập nhật thất bại!";
    }
    public function uploadAvatar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadClick'])) {
            $avatar = $_FILES['uploadClick'];

            if ($avatar['error'] === UPLOAD_ERR_OK) {
                // Kiểm tra file ảnh hợp lệ
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (in_array($avatar['type'], $allowedTypes)) {
                    $targetDir = './Public/image/'; // Đường dẫn lưu ảnh
                    $fileName = uniqid() . "_" . basename($avatar['name']); // Tạo tên file duy nhất
                    $targetFilePath = $targetDir . $fileName;

                    if (move_uploaded_file($avatar['tmp_name'], $targetFilePath)) {
                        // Cập nhật avatar trong cơ sở dữ liệu
                        return $fileName; // Trả về đường dẫn ảnh
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
}
