<?php
require_once 'C:\xampp\htdocs\freshleaf_website\mvc\core\Db.php';
require_once 'C:\xampp\htdocs\freshleaf_website\mvc\controller\ProfileController.php';
include 'C:\xampp\htdocs\freshleaf_website\mvc\views\layout\header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../Login.php');
    exit;
}

global $conn;
$controller = new ProfileController($conn);
$userId = $_SESSION['user_id'];
$userData = $controller->getProfile($userId);
$controller->handleChangePassword();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/freshleaf_website/Public/Css/Profile.css">
</head>
<body>
<div class="container_profile">
        <div class="sidebar">
            <img alt="User Avatar" height="50" src="/Public/Image/<?php echo htmlspecialchars($userData['avatar']); ?>" width="50"/>
            <h3><?php echo $userData['user_name']; ?></h3>
            <p><?php echo $userData['email']; ?></p>
            <div class="menu-profile">
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
                    <div class="uploadImage">Choose Image</div>
                    <img id="avatarPreview" alt="Profile image" src="/Public/Image/<?php echo htmlspecialchars($userData['avatar']); ?>" />
                    <input id="chooseImage" type="file" name="avatar" accept="Image/*" onchange="previewAvatar(event)" />
                    
                </div>

                <div class="form-group">
                    <button class="save-changes" name="update">Save Changes</button>
                </div>
            </div>
            </form>
            <form method="POST" enctype="multipart/form-data">
            <div class="container_changePassword">
                <div class="section-title">Change Password</div>
                <div class="form-change">
                    <label for="current-password">Current Password</label>
                    <div class="current_password">
                        <input name="current-password" type="password" value=""/>
                        <i class="fas fa-eye-slash password-eye"></i>
                    </div>
                </div>
                <div class="changes-password">
                    <div class="form-changePass">
                        <label for="new-password">New Password </label>
                        <div class="password-container">
                            <input name="new-password" type="password" value=""/>
                            <i class="fas fa-eye-slash password-eye"></i>
                        </div>
                    </div>
                    <div class="form-changePass">
                        <label for="confirm-password">Confirm New Password</label>
                        <div class="password-container">
                            <input name="confirm-password" type="password" value=""/>
                            <i class="fas fa-eye-slash password-eye"></i>
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
    function previewAvatar(event) { 
        var reader = new FileReader(); 
        reader.onload = function() { 
            var output = document.getElementById('avatarPreview'); 
            output.src = reader.result; 
        }; 
        reader.readAsDataURL(event.target.files[0]); 
    }

    document.querySelectorAll('.password-eye').forEach(eye => {
            eye.addEventListener('click', function() {
                const input = this.previousElementSibling;
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.add('fa-eye');
                    this.classList.remove('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.add('fa-eye-slash');
                    this.classList.remove('fa-eye');
                }
            });
        });
        document.querySelector('.uploadImage').addEventListener('click', function() { 
            document.getElementById('chooseImage').click(); 
        });
</script>
</body>
</html>