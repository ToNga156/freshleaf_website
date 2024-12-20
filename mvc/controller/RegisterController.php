<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');

class RegisterController extends Controller {

    public function index() {
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
                $this->view('Register', ['error' => $error]);
                return; 
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $registerModel = $this->model("RegisterModel");
            $result = $registerModel->registerUser($username, $hashedPassword, $email, $phone, $address);

            if ($result === true) {
                // Điều hướng đến trang đăng nhập sau khi đăng ký thành công
                header("Location: ./Login");
                exit();
            } else {

                    $this->view('Register', ['error' => $result]);

            }
        } else {
            // Hiển thị form đăng ký khi chưa có dữ liệu POST
            $this->view('Register');
        }
    }
}
?>
