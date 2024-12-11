<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Public/Css/register.css">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="registration-form" action="../controllers/registerController.php" method="POST">
        <h2>Đăng Ký Tài Khoản</h2>
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" placeholder="User Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="Phone" id="Phone" name="Phone" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <label for="phone">Address</label>
            <input type="Address" id="Address" name="Address" placeholder="Address" required>
        </div>
        <div class="form-group">    
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
        </div>
        <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>