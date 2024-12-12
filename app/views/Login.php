<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Public/Css/Login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('../../Public/images/background_regis_login.jpg'); /* Đường dẫn tới ảnh nền */
        background-size: cover; /* Phóng to để phủ kín màn hình */
        background-position: center; /* Căn giữa ảnh */
        background-repeat: no-repeat; /* Không lặp lại ảnh */
        height: 100vh; /* Chiều cao toàn màn hình */
        display: flex; /* Sử dụng Flexbox */
        justify-content: center; /* Căn giữa theo chiều ngang */
        align-items: center; /* Căn giữa theo chiều dọc */
    }
    .container{
        display:flex;
        justify-content: center; 
        align-items: center;
    }
    .login-form {
        background: rgba(255, 255, 255, 0.5); 
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        width: 400px; 
        max-width: 100%;
    }

    .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .input-container {
        position: relative;
    }


    .form-group input {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.8);
        transition: border-color 0.3s ease;
        padding-right: 40px;
    }

    .bi-eye {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        cursor: pointer;
        color: #333;
    }

    /* Khi mắt được nhấn */
    .bi-eye-slash {
        color: #007bff;
    }

    /* Thêm hiệu ứng hover khi icon con mắt được di chuột vào */
    .bi-eye:hover {
        color: #007bff;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    button {
        width: 100px;
        border-radius: 20px;
        background: #007bff;
        color: #fff;
        padding: 10px;
        border:none;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    button:hover {
        background: #0056b3;
    }
    .submit{
        display:flex;
        justify-content: center; 
        align-items: center;  
    }
    .footer_login{
        text-align: center;
    }
    .footer_login a{
        font-weight: bold;
        text-decoration: none;
        color:red;
    }
</style>
<body>
    <div class="container">
        <form class="login-form" action="../controllers/LoginController.php" method="POST">
            <h2>Login</h2>
            <?php if (isset($_SESSION['login_error'])): ?>
                <p style="color:red;"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
            <?php endif; ?>

            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" placeholder="User Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-container">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="bi bi-eye" id="togglePassword"></i>
                </div>
            </div>
            <div class="submit"><button type="submit">Login</button></div>
            <div class="footer_login">
                You do not have an account? <a href="../views/register.php">Register</a>
            </div>

        </form>
    </div>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    
    togglePassword.addEventListener('click', function() {
        // Kiểm tra trạng thái của mật khẩu
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        // Thay đổi biểu tượng con mắt
        this.classList.toggle('bi-eye-slash');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>