<?php
    require_once '../models/loginModel.php';

    class LoginController {
        public function login() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                $loginModel = new Login();
    
                $userInfo = $loginModel->getUserInfor($username, $email, $password);

                if ($userInfo) {
                    if (trim($userInfo['email']) === trim($email) && trim($userInfo['user_name']) === trim($username) && trim($userInfo['password']) === trim($password)) {
                        session_start();
                        $_SESSION['user_id'] = $userInfo['user_id'];
                        $_SESSION['username'] = $userInfo['user_name'];
                        $_SESSION['email'] = $userInfo['email'];

                        echo "Đăng nhập thành công!";
                        // header('Location: ../views/homepage.php');
                        exit();
                    } else {
                        echo "Email hoặc mật khẩu sai.";
                        // header('Location: ../views/login.php');
                        exit();
                    }
                } else {
                    echo "User không tồn tại.";
                    // header('Location: ../views/login.php');
                    exit();
                } 
            }
        }
    }
    $controller = new LoginController();
    $controller->login();
?>
