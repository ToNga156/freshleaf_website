<?php
require_once 'C:\xampp\htdocs\freshleaf_website\mvc\core\Db.php';
require_once 'C:\xampp\htdocs\freshleaf_website\mvc\controller\UserController.php';
include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../Login.php');
    exit;
}

global $conn;
$controller = new UserController($conn);
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
    <link rel="stylesheet" href="/freshleaf_website/Public/Css/Profile.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="/freshleaf_website/Public/Css/sidebar.css?v=<?php echo time();?>">
</head>

<body>
    
    <div class="container_profile">
        <?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/sidebar.php') ?>

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
<script src="\freshleaf_website\public\js\profile.js"></script>
</body>
</html>