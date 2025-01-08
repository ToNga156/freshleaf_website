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
    <link rel="stylesheet" href="/freshleaf_website/Public/Css/orderHistory.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="/freshleaf_website/Public/Css/sidebar.css?v=<?php echo time();?>">
</head>

<body>
    
    <div class="container_profile">
        <?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/sidebar.php') ?>

        <div class="container_infor">
            
        </div>
    </div>
</div>
<script src="\freshleaf_website\public\js\profile.js"></script>
</body>
</html>