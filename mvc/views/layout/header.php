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
<style>
    body {
    background-color: white;
    font-family: Quicksand;
    margin: 0;
    padding: 0;
}

.header {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    width: 100%;
    height: auto;
}

.header-container {
    display: flex;
    flex-direction: column;
}

.header-container .top-header {
    /* background-color: pink; */
    width: 100%;
    display: flex;
}

.top-header .left-top-header {
    background-color: #4BAF47;
    width: 33.33%;
    height: 3px;
}

.top-header .middle-top-header {
    background-color: #C5CE38;
    height: 3px;
    width: 33.33%;
}

.top-header .right-top-header {
    background-color: #EEC044;
    width: 33.33%;
    height: 3px;
}

.header-container .middle-header {
    width: 100%;
    /* height: 70px; */
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.middle-header .info-LogoNameWeb {
    display: flex;
    align-items: center;
    width: 37%;
    height: 65px;
}

.middle-header .info-LogoNameWeb img {
    margin-left: 80px;
    width: 40px;
    height: 40px;
    border-radius: 20px;
}

.middle-header .info-LogoNameWeb h1 {
    color: #009C52;
    margin-left: 15px;
    font-size: 28px;
    font-family: Calistoga;
    font-weight: lighter;
}

.middle-header .info-ContactWeb {
    width: 47%;
    height: 65px;
    display: flex;
    /* justify-content: space-between; */
}

.info-ContactWeb .info-Detail {
    width: 219px;
    gap: 20px;
    /* padding-left: 35px; */
    display: flex;
    align-items: center;
}

.info-ContactWeb .info-Detail:first-child {
    padding-left: 35px;
}

.info-ContactWeb .info-Detail:last-child {
    padding-left: 35px;
}

.info-ContactWeb .info-Detail:first-child div {
    margin-left: 10px;
}

.info-ContactWeb .info-Detail:last-child {
    margin-left: -10px;
}

.info-ContactWeb .info-Detail ion-icon {
    color: #009C52;
    font-size: 24px;
}

.info-ContactWeb .info-Detail:first-child div {
    border-right: 1px solid #E4E2D7;
    padding-right: 30px;
    height: 46px;
}

.info-ContactWeb .div-info-Detail2 {
    border-right: 1px solid #E4E2D7;
    padding-right: 29px;
}

.info-ContactWeb .info-Detail p {
    font-weight: bold;
    margin: 8px 0 4px 0;
    color: #878680;
    font-size: 12px;
}

.info-ContactWeb .info-Detail h6 {
    margin: 4px 0 8px 0;
    color: #009C52;
    font-size: 14px;
}

.middle-header .info-Account {
    width: 16%;
    height: 65px;
    display: flex;
    align-items: center;
    gap: 20px;
}

.middle-header .info-Account img {
    border: 3px solid #009C52;
    width: 35px;
    height: 35px;
    border-radius: 22px;
}

.middle-header .info-Account div {
    height: 46px;
}

.middle-header .info-Account div p {
    margin: 5px 0 4px 0;
    font-weight: bold;
    color: #878680;
    font-size: 12px;
}

.middle-header .info-Account div a {
    margin: 4px 0 9px 0;
    color: #009C52;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
}

.header-container .bottom-header {
    width: 100%;
    height: 45px;
    background-color: #67D463;
    display: flex;
    align-items: center;
}

.bottom-header .navigate-header {
    display: flex;
    justify-content: end;
    align-items: center;
    gap: 70px;
    color: white;
    font-size: 16px;
    width: 65%;
    height: 35px;
}

.bottom-header .navigate-header li {
    list-style: none;
    font-weight: 550;
    margin: 0; 
    padding: 0;
}

.bottom-header .search-bar-container {
    position: relative;
    width: 28%;
    height: 35px;
    display: flex;
    align-items: center;
}

.search-bar-container .input-search-bar {
    border: none;
    width: 65%;
    height: 30px;
    border-radius: 25px;
    margin: 0 20px 0 80px;
    padding: 2.5px 0 0 25px;
}

input:focus {
    border: none;  /* Ẩn viền khi có focus */
    outline: none; /* Loại bỏ outline mặc định khi focus */
  }

.search-bar-container .submit-search-bar {
    position: absolute;
    right: 28px;
    width: 7%;
    height: 32px;
    background-color: #D7FFDB;
    border-radius: 0 20px 20px 0;
    border: none;
    cursor: pointer;
}


.search-bar-container ion-icon {
    position: absolute;
    right: 8px;
    top: 10px;
}

.bottom-header .icon-shopping-cart {
    width: 12%;
    height: 35px;
}

.bottom-header .icon-shopping-cart p {
    display: flex;
    justify-content: center;
    z-index: 1;
    position: absolute;
    right: 108px;
    top: 62px;
    width: 15px;
    height: 15px;
    color: white;
    font-size: 12px;
    font-weight: bold;
    border-radius: 7px;
    background-color: #4BAF47;
}

.bottom-header .icon-shopping-cart ion-icon {
    position: absolute;
    right: 113px;
    top: 75px;
    color: #009C52;
    font-size: 32px;
}
</style>
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
                    <img src="../../freshleaf_website/public/images/logo_website.png" alt="">
                    <h1>FreshLeaf</h1>
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

                <div class="info-Account">
                    <img src="../../freshleaf_website/public/images/avatar-default.jpg" alt="Avatar mặc định">
                    <div>
                        <p>Tài khoản</p>
                        <a href="http://localhost/freshleaf_website/Register">Đăng nhập</a>
                    </div>
                </div>
            </div>
    
            <div class="bottom-header">
                <ul class="navigate-header">
                    <li>Home</li>
                    <li>Products</li>
                    <li>About us</li>
                    <li>Contact</li>
                </ul>

                <div class="search-bar-container">
                    <input type="text" class="input-search-bar" placeholder="Nhập sản phẩm cần tìm kiếm">
                    <button type="submit" class="submit-search-bar"><ion-icon name="search-outline"></ion-icon></button>
                </div>

                <div class="icon-shopping-cart">
                    <p class="quantity-icon-shopping-cart">0</p>
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
</body>
</html>