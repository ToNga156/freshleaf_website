<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../freshleaf_website/public/css/header.css?v=<?php echo time(); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Cormorant+Upright:wght@300;400;500;600;700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="header-container">
            <div class="top-header">
                <div class="left-top-header"></div>
                <div class="middle-top-header"></div>
                <div class="right-top-header"></div>
            </div>
    
            <div class="middle-header">
                <div class="info-LogoNameWeb">
                    <a href="http://localhost/freshleaf_website/homepage/index">
                        <img src="/freshleaf_website/public/images/logo_website.png" alt="">
                    </a>
                    <a style="text-decoration: none;" href="http://localhost/freshleaf_website/homepage/index">
                        <h1>FreshLeaf</h1>
                    </a>
                </div>

                <div class="info-ContactWeb">
                    <div class="info-Detail">
                        <ion-icon name="call-outline"></ion-icon>
                        <div>
                            <p>Call anytime</p>
                            <h6>+ 84 123 789 456</h6>
                        </div>
                    </div>

                    <div class="info-Detail">
                        <ion-icon name="mail-outline"></ion-icon>
                        <div class="div-info-Detail2">
                            <p>Send email</p>
                            <h6>freshleaf@gmail.com</h6>
                        </div>
                    </div>

                    <div class="info-Detail">
                        <ion-icon name="map-outline"></ion-icon>
                        <div>
                            <p>Address</p>
                            <h6>Sơn Trà, Đà Nẵng</h6>
                        </div>
                    </div>
                </div>


                <?php if (isset($_SESSION['user_name'])): ?>
                    <div class="info-Account">
                        <a href="http://localhost/freshleaf_website/profile/index">
                            <img src="/Public/Image/<?php echo isset($_SESSION['avatar']) ? htmlspecialchars($_SESSION['avatar']) : 'avatar-default.jpg'; ?>" alt="Avt">
                        </a>
                        <div>
                            <p><?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
                            <a href="http://localhost/freshleaf_website/logout">Đăng xuất</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="info-Account">
                        <a href="http://localhost/freshleaf_website/profile/index">
                            <img src="../../freshleaf_website/public/images/avatar-default.jpg" alt="Avatar mặc định">
                        </a>
                        <div>
                            <p>Tài khoản</p>
                            <a href="http://localhost/freshleaf_website/Register">Đăng nhập</a>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- <div class="info-Account">
                    <a href="http://localhost/freshleaf_website/profile/index">
                        <img src="../../freshleaf_website/public/images/avatar-default.jpg" alt="Avatar mặc định">
                    </a>
                    <div>
                        <p>Tài khoản</p>
                        <a href="http://localhost/freshleaf_website/Register">Đăng nhập</a>
                    </div>
                </div> -->
            </div>
    
            <div class="bottom-header">
                <ul class="navigate-header">
                    <li><a href="http://localhost/freshleaf_website/Homepage/index">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <div class="search-bar-container">
                    <input type="text" class="input-search-bar" placeholder="Nhập sản phẩm cần tìm kiếm">
                    <button type="submit" class="submit-search-bar"><ion-icon name="search-outline"></ion-icon></button>
                </div>

                <div class="icon-shopping-cart">
                    <p class="quantity-icon-shopping-cart">0</p>
                    <a href="#"><ion-icon name="cart-outline"></ion-icon></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>