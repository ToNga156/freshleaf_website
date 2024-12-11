

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-image: url(/app/views/image/background_regis_login.jpg);
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
            margin-top: 80px;
        }
        .container_register h2 {
            margin-bottom: 20px;
            font-size: 24px;
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
            background-color: #009900;
        }
        .container_register .footer_register {
            margin-top: 30px;
            font-size: 18px;
        }
        .container_register .footer a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }
        .container_register .footer a:hover {
            text-decoration: underline;
        }
        .input_register {
            position: relative;
        }
        .input_register .fa-eye {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container_register">
        <h2>Sign In</h2>
        <form action="" method="post">
            <div class="input_register">
                <input type="text" name="fullname" placeholder="Fullname" required>
            </div>
            <div class="input_register">
                <input type="text" name="phone" placeholder="Phone" required>
            </div>
            <div class="input_register">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input_register">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="input_register">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <i class="fas fa-eye"></i>
            </div>
            <button class="btt_signin">Sign In</button>
            <div class="footer_register">
                Already have an account? <a href="#">Log in</a>
            </div>
        </form>
    </div>
</body>
</html>