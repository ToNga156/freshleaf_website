<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-image: url('../../../Public/images/background_regis_login.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .ResetPass-container {
            position: relative;
            top: 190px;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .Reset-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .Reset-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .Reset-container input[type="email"],
        .Reset-container input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .Reset-container button {
            width: 90%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .Reset-container button:hover {
            background-color: #218838;
        }
        .Reset-container p {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
        .Reset-container p a {
            color: #007bff;
            text-decoration: none;
        }
        .Reset-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="ResetPass-container">
    <div class="Reset-container">
        <h1>Forget Password</h1>
        <form action="./ForgetPassword" method="POST">
            <input placeholder="Email" type="email" id="email" name="email" required>
            <input placeholder="New password" type="password" id="password" name="password" required>
            <input placeholder="Confirm password" type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Cập nhật mật khẩu</button>
        </form>
        <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    </div>
</div>
</body>
</html>