<?php
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
    <link rel="stylesheet" href="../../freshleaf_website/public/css/sidebar.css?v=<?php echo time(); ?>">
</head>
<body>
        <div class="sidebar">
            <div class="account">
                <img alt="User Avatar" height="50" src="/Public/Image/<?php echo htmlspecialchars($userData['avatar']); ?>" width="50"/>
                <div class="account-info">
                    <h3><?php echo $userData['user_name']; ?></h3>
                    <p><?php echo $userData['email']; ?></p>
                </div>
            </div>
            <div class="underline"></div>
            <div class="menu-profile">
                <a href="/freshleaf_website/User/profile"><i class="fas fa-user"></i>My Profile</a>
                <a href="/freshleaf_website/OrderHistory/orderHistory"><i class="fas fa-file-alt"></i>My Orders History</a>
                <a href="/freshleaf_website/ShoppingCart/viewCart"><i class="fas fa-shopping-cart"></i>My Shopping Cart</a>
            </div>
        </div>
</body>
</html>