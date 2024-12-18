<?php
// session_start();

require_once 'C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\core\Db.php';
require_once 'C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\controller\ProfileController.php';
// include '../views/homepage.html';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../../Login.php');
    exit;
}

global $conn;
$controller = new ProfileController($conn);
$userId = $_SESSION['user_id'];
$userData = $controller->getProfile($userId);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $result = $controller->uploadAvatar($userData);

    if($result && !is_string($result)){
        $user['avatar'] = $result;
    }else{
        $error = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../../Public/Css/Profile.css">
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    margin: 10px;
    padding: 10px;
}
.container_profile {
    margin-top: 100px;
    display: flex;
    padding: 20px;
}
.sidebar {
    width: 20%;
    background-color:rgb(73, 212, 96);
    padding: 20px;
    border-radius: 10px;
}
.sidebar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.sidebar h3 {
    margin: 10px 0 5px;
    font-size: 18px;
}
.sidebar p {
    margin: 0;
    color: #666;
}
.sidebar .menu {
    margin-top: 20px;
}
.sidebar .menu a {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: #333;
    padding: 10px 0;
    font-size: 16px;
}
.sidebar .menu a:hover {
    color: #4caf50;
}
.section-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}
.container_infor {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 90%;
    margin: 20px ;
    padding: 20px;
    padding-right: 30px;
    position: relative;
}
.container_inforUser {
    display: flex;
    flex-direction: column;
    border: 1px grey solid;
    border-radius: 10px;
    padding: 10px;
}
.form-group {
    margin-bottom: 15px;
}
.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 15px;
}
.form-group input {
    width: 50%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
.form-group .save-changes {
    width: 14%;
    padding: 5px;
    font-size: 15px;
    border: 2px solid #28a745;
    border-radius: 20px;
    background-color: #28a745;
    color:white;
    font-weight: bold;
    cursor: pointer;
}
.form-userAvatar img {
    position: absolute;
    top: 15%;
    margin-left: 70%;
    border-radius: 50%;
    width: 150px;
    height: 150px;
}
.form-userAvatar .choose-image {
    position: absolute;
    top: 36%;
    margin-left: 71%;
    width: 10%;
    padding: 10px;
    border: 2px solid #28a745;
    border-radius: 20px;
    color: #28a745;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
}
.form-group .choose-image:hover {
    background-color: #28a745;
    color: #fff;
}
.container_changePassword {
    display: flex;
    flex-direction: column;
    border: 1px grey solid;
    border-radius: 10px;
    padding: 20px;
}
.form-change label {
    display: block;
    margin-bottom: 5px;
    font-size: 15px;
}
.form-change input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
.current_password {
    position: relative;
}
.current_password input {
    width:90%;
}
.changes-password {
    display: flex;
    gap: 200px;
}
.form-changePass {
    width: 400px;
    margin-top: 15px;
}
.changes-password .password-container input{
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
.password-container {
    position: relative;
}
.form-change .change-password {
    margin-top: 10px;
    width: 15%;
    font-size: 15px;
    padding: 5px;
    border: 2px solid #28a745;
    border-radius: 20px;
    background-color: #28a745;
    color:white;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
}
.container_changePassword .current_password .password-eye {
   position: absolute;
   left: 88%;
   top: 11px;
}
.password-container .password-eye {
    position: absolute;
    top: 11px;
    left: 95%;
}
    </style>
    
</head>
<body>
<div class="container_profile">
        <div class="sidebar">
            <img alt="User Avatar" height="50" src="https://storage.googleapis.com/a1aa/image/xRrHW3WI6urBLRpqtBVGbjet4XWgJna1AfZvIn5srQ7b9Z6TA.jpg" width="50"/>
            <h3><?php echo $userData['user_name']; ?></h3>
            <p><?php echo $userData['email']; ?></p>
            <div class="menu">
                <a href="#"><i class="fas fa-user"></i>My Profile</a>
                <a href="#"><i class="fas fa-file-alt"></i>My Orders</a>
                <a href="#"><i class="fas fa-shopping-cart"></i>My Shopping Cart</a>
            </div>
        </div>
        <div class="container_infor">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="container_inforUser">
                <div class="section-title">My Profile</div>
                <div class="form-group">
                    <label>User name</label>
                    <input name="username" type="text" value="<?php echo $userData['user_name']; ?>"/>
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input name="fullname" type="text" value="<?php echo $userData['user_name'] ?>"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" value="<?php echo $userData['email']; ?>"/>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input name="phone" type="text" value="<?php echo $userData['phone']; ?>"/>
                </div>
                <div class="form-userAvatar">
                    <img alt="Profile image" height="100" src="../../Public/images/<?php echo $userData['avatar']; ?>" />
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="avatar" />
                        <button type="submit" name="uploadClick"  accept="images/*" >Choose Image</button>
                    </form>
                </div>

                <div class="form-group">
                    <button class="save-changes" name="update">Save Changes</button>
                </div>
            </div>
            </form>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="container_changePassword">
                <div class="section-title">Change Password</div>
                <div class="form-change">
                    <label for="current-password">Current Password</label>
                    <div class="current_password">
                        <input name="current-password" type="password" value=""/>
                        <i class="fas fa-eye password-eye"></i>
                    </div>
                </div>
                <div class="changes-password">
                    <div class="form-changePass">
                        <label for="new-password">New Password Password</label>
                        <div class="password-container">
                            <input name="new-password" type="password" value=""/>
                            <i class="fas fa-eye password-eye"></i>
                        </div>
                    </div>
                    <div class="form-changePass">
                        <label for="confirm-password">Confirm Password</label>
                        <div class="password-container">
                            <input name="confirm-password" type="password" value=""/>
                            <i class="fas fa-eye password-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="form-change">
                    <button class="change-password">Change Password</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.password-eye').forEach(eye => {
            eye.addEventListener('click', function() {
                const input = this.previousElementSibling;
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
</script>
</body>
</html>