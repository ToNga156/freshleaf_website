

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-image: url("./public/image/background_regis_login.jpg");
            background-size: cover;
            background-position: center center; 
        }

        .container_register {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
            margin-top: 100px;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .container_register h2 {
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: bold;
        }
        .container_register input[type="text"],
        .container_register input[type="email"],
        .container_register input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px;
            margin-left: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;   
            font-size: 18px;
        }
        .container_register .checkbox_register {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .container_register .checkbox_register input {
            margin-right: 10px;
        }
        .container_register .checkbox_register label {
            font-size: 14px;
        }
        .container_register button {
            width: 60%;
            padding: 10px;
            margin-top: 10px;
            background-color: #00b300;
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .container_register button:hover {
            transform: scale(1.05);
            background-color: #009900;
        }
        .container_register .footer_register {
            margin-top: 30px;
            font-size: 18px;
        }
        .container_register .footer_register a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }
        .container_register .footer_register a:hover {
            color: blue;
            text-decoration: none;
        }
        .input_register {
            position: relative;
        }
        .input_register .bi-eye-slash, 
        .input_register .bi-eye { 
            position: absolute; 
            right: 30px; top: 50%; 
            transform: translateY(-50%); 
            cursor: pointer; 
        } 
        .input_register .hidden { 
            display: none; 
        }
    </style>
</head>
<body>
    <div class="container_register">
        
        <form action="./Register" method="POST">
            <h2>Sign In</h2>
            <?php if (!empty($data['error'])): ?>
                <p style="color: red;"><?php echo $data['error']; ?></p>
            <?php endif; ?>
            <div class="input_register">
                <input type="text" name="username" placeholder="User name" required>
            </div>
            <div class="input_register">
                <input type="text"  name="phone" placeholder="Phone" required>
            </div>
            <div class="input_register">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input_register">
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <div class="input_register">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="bi bi-eye-slash" id="close-password"></i> 
                <i class="bi bi-eye hidden" id="open-password"></i>
            </div>
            <div class="input_register">
                <input type="text" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
                <i class="bi bi-eye-slash" id="close-confirmpassword"></i> 
                <i class="bi bi-eye hidden" id="open-confirmpassword"></i>
            </div>
            <button class="btt_signin" type="submit">Sign In</button>
            <div class="footer_register">
                Already have an account? <a href="C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\views\Login.php">Log in</a>
            </div>
        </form>
    </div>
    <script>
        const closePassword = document.getElementById('close-password'); 
        const openPassword = document.getElementById('open-password'); 
        const passwordInput = document.querySelector('input[name="password"]'); 

        closePassword.addEventListener('click', function() { 
            passwordInput.setAttribute('type', 'text'); 
            closePassword.classList.add('hidden'); 
            openPassword.classList.remove('hidden'); 
        }); 
        openPassword.addEventListener('click', function() { 
            passwordInput.setAttribute('type', 'password'); 
            closePassword.classList.remove('hidden'); 
            openPassword.classList.add('hidden'); 
        }); 
        const closeConfirmPassword = document.getElementById('close-confirmpassword'); 
        const openConfirmPassword = document.getElementById('open-confirmpassword'); 
        const confirmPasswordInput = document.querySelector('input[name="confirm_password"]'); 
        closeConfirmPassword.addEventListener('click', function() { 
            confirmPasswordInput.setAttribute('type', 'text'); 
            closeConfirmPassword.classList.add('hidden'); 
            openConfirmPassword.classList.remove('hidden'); 
        }); 
        openConfirmPassword.addEventListener('click', function() { 
            confirmPasswordInput.setAttribute('type', 'password'); 
            closeConfirmPassword.classList.remove('hidden'); 
            openConfirmPassword.classList.add('hidden'); 
        }); 
    </script>
</body>
</html>