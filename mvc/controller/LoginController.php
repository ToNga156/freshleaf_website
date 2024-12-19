<?php
error_reporting(E_ALL);  // Báo cáo tất cả lỗi
ini_set('display_errors', 1);  // Hiển thị lỗi lên trình duyệt

session_start(); // Đảm bảo session đã được khởi tạo
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');

class LoginController extends Controller {

    public function Default() {
        // Kiểm tra xem yêu cầu là POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            $loginModel = $this->model("LoginModel");
            $userInfo = $loginModel->getUserInfo($email);

            // Kiểm tra nếu tìm thấy người dùng
            if ($userInfo) {
                // Kiểm tra xem mật khẩu có hợp lệ hay không
                if (password_verify($password, $userInfo['password'])) {
                    // Đăng nhập thành công, lưu thông tin vào session
                    $_SESSION['user_id'] = $userInfo['user_id'];
                    $_SESSION['user_name'] = $userInfo['user_name'];
                    $_SESSION['email'] = $userInfo['email'];

                    if ($userInfo['role'] == 'Admin') {
                        header('Location: http://localhost/freshleaf_website/');
                    }
                    // Check role để chuyển hướng đến trang homepage hoặc dashboard
                    echo 'đăng nhập thành công';
                    exit();
                }
                else {
                    // Nếu mật khẩu sai
                    $error = "Mật khẩu không chính xác!";
                    $this->view('Login', ['error' => $error]);
                    exit();
                }
            } else {
                // Nếu không tìm thấy người dùng
                $error = "Email không tồn tại!";
                $this->view('Login', ['error' => $error]);
                exit();
            }
        }
        else {
            // Hiển thị form đăng nhập khi chưa có dữ liệu POST
            $this->view('Login');
        }
    }
}
?>
