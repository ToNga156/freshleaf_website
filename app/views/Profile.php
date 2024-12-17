<?php
require_once '../core/Database.php';
require_once '../controllers/ProfileController.php';
// include '../views/homepage.html';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../Login.php');
    exit;
}

global $conn;
$controller = new ProfileController($conn);
$userId = $_SESSION['user_id'];
$user = $controller->getProfile($userId);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $result = $controller->uploadAvatar($userId);

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
    
</head>
<body>
<div class="container_profile">
        <div class="sidebar">
            <img alt="User Avatar" height="50" src="https://storage.googleapis.com/a1aa/image/xRrHW3WI6urBLRpqtBVGbjet4XWgJna1AfZvIn5srQ7b9Z6TA.jpg" width="50"/>
            <h3><?php echo $user['user_name']; ?></h3>
            <p><?php echo $user['email']; ?></p>
            <div class="menu">
                <a href="#"><i class="fas fa-user"></i>My Profile</a>
                <a href="#"><i class="fas fa-file-alt"></i>My Orders</a>
                <a href="#"><i class="fas fa-shopping-cart"></i>My Shopping Cart</a>
            </div>
        </div>
        <div class="container_infor">
            <div class="container_inforUser">
                <div class="section-title">My Profile</div>
                <div class="form-group">
                    <label>User name</label>
                    <input name="username" type="text" value="<?php echo $user['user_name']; ?>"/>
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input name="fullname" type="text" value=""/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" value="<?php echo $user['email']; ?>"/>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input name="phone" type="text" value="<?php echo $user['phone']; ?>"/>
                </div>
                <div class="form-userAvatar">
                    <img alt="Profile image" height="100" src="../../Public/images/<?php echo $user['avatar']; ?>" />
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="avatar" />
                        <button type="submit" name="uploadClick"  accept="images/*" >Choose Image</button>
                    </form>
                </div>

                <div class="form-group">
                    <button class="save-changes">Save Changes</button>
                </div>
            </div>
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