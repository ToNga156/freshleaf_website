<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Epilogue:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Cormorant+Upright:wght@300;400;500;600;700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<style>
.banner-homepage {
    /* background-color: rgb(251, 248, 198); */
    margin-top: 113px;
    padding: 30px 70px;
}

.banner-homepage .banner-homepage-container {
    color: #009C52;
    position: relative;
    height: 550px;
    /* width: 90%; */
    /* background-color: violet; */
}

.banner-homepage-container .main-img {
    width: 100%;
    height: 100%;
    border-radius: 35px;
    object-fit: cover;
    object-position: 0% 46%;
    opacity: 0.3;
}

.banner-homepage-container .extra-img {
    width: 30%;
    height: auto;
    position: absolute;
    left: -50px;
    top: 185px;
}

.banner-homepage-container h2 {
    position: absolute;
    right: 315px;
    top: 100px;
    font-size: 31px;
}

.banner-homepage-container h1 {
    position: absolute;
    font-family: "Cormorant Upright";
    right: 190px;
    top: 150px;
    font-size: 85px;
    letter-spacing: 5px;
    line-height: 1;
}

.discount-homepage {
    /* background-color: pink; */
    padding: 20px 70px;
}

.discount-homepage .discount-homepage-container {
    display: flex;
    /* gap: 20px; */
    justify-content: space-between;
    /* background-color: #009C52; */
    position: relative;
    /* height: 150px; */
}

.discount-homepage-container .discount-small {
    width: 24%;
    height: 180px;
    border-radius: 30px;
    position: relative;
}

.discount-small .half-circle-left {
    position: absolute;
    top: 55px;
    left: 0;
    width: 35px;
    height: 70px;
    border-radius: 0 50px 50px 0;
    background-color: white;
}

.discount-small .half-circle-right {
    position: absolute;
    top: 55px;
    right: 0;
    width: 35px;
    height: 70px;
    border-radius: 50px 0 0 50px;
    background-color: white;
}

.discount-small h1 {
    position: absolute;
    top: 10px;
    left: 50px;
    font-size: 22px;
}

.discount-small p {
    position: absolute;
    top: 45px;
    left: 50px;
    font-size: 16px;
}

.discount-small h2 {
    position: absolute;
    bottom: 8px;
    left: 50px;
    font-size: 22px;
}

.discount-small button {
    position: absolute;
    bottom: 22px;
    right: 40px;
    font-weight: bold;
    font-size: 15px;
    color: white;
    border: none;
    width: 92px;
    height: 35px;
    border-radius: 18px;
    font-family: Quicksand;
}

.discount-homepage-container #discount-small1 {
    /* background-color: #FFE1F9; */
    background-color: #D2FFFE;
}

.discount-homepage-container #discount-small1 h1, #discount-small1 h2 {
    color: #006866;
}

.discount-homepage-container #discount-small1 button {
    background-color: #85D8E1;
}

.discount-homepage-container #discount-small2 {
    background-color: #FFE1F9;
}

.discount-homepage-container #discount-small2 h1, #discount-small2 h2 {
    color: #740E72;
}

.discount-homepage-container #discount-small2 button {
    background-color: #D579D4;
}

.discount-homepage-container #discount-small3 {
    background-color: #FAF3E0;
}

.discount-homepage-container #discount-small3 h1, #discount-small3 h2 {
    color: #945105;
}

.discount-homepage-container #discount-small3 button {
    background-color: #D5AD79;
}

.discount-homepage-container #discount-small4 {
    background-color: #D7FFDB;
}

.discount-homepage-container #discount-small4 h1, #discount-small4 h2 {
    color: #228507;
}

.discount-homepage-container #discount-small4 button {
    background-color: #97E689;
}

.bestSale-product-homepage {
    padding: 20px 70px;
}

.bestSale-product-homepage .bestSale-product-container {
    display: flex;
    flex-direction: column;
    /* background-color: pink; */
    /* position: relative; */
    /* height: 150px; */
}

.bestSale-product-container .title-bestSale {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.bestSale-product-container .title-bestSale h1 {
    color: #009C52;
    font-size: 28px;
}

.bestSale-product-container .title-bestSale a {
    display: flex;
    align-items: center;
    text-decoration: none; /* Loại bỏ gạch chân */
    color: #009C52;
    font-weight: bolder;
}

.bestSale-detail {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 30px;
    padding: 20px 0;
}

.bestSale-detail .product-card {
    border: 1px solid #D1D1D1; 
    /* border: 1px solid black; */
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    height: 340px;
}

.bestSale-detail .product-card img {
    border-radius: 20px;
    width: 220px;
    height: 180px;
    object-fit: cover;
    margin: 14px 0 0 14px;
}

.bestSale-detail .product-card h3 {
    margin: 12px 20px;
}

.bestSale-detail .product-card span {
    display: flex;
    justify-content: center;
    width: 80px;
    height: 20px;
    padding: 5px 3px;
    margin: 5px 0 0 20px;
    border-radius: 5px;
    background-color: #D2F0D4;
    color: #006837;
    font-size: 14px;
    font-weight: bold;
}

.bestSale-detail .product-card div {
    margin: 10px 15px 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #006837;
    font-weight: bold;
    font-size: 22px;
}

.bestSale-detail .product-card div p {
    margin: 10px 0 14px 0;
}

.bestSale-detail .product-card div button {
    width: 35px;
    height: 35px; 
    background-color: white;
    color: #006837;
    font-size: 20px;
    border: 2px solid #006837;
    border-radius: 18px;
    margin: 10px 0 11px 0;
}
</style>
<body>
    <header><?php include('D:\sampp\htdocs\freshleaf_website\mvc\views\layout\header.php') ?></header>

    <div class="banner-homepage">
        <div class="banner-homepage-container">
            <img class="main-img" src="../../Public/images/banner-homepage.jpg" alt="banner-homepage-img">
            <img class="extra-img" src="../../Public/images/raucuqua.png" alt="raucuqua-img">
            <h2>WELCOME TO FRESHLEAF</h2> 
            <h1>Choose clean, <br>Life healthy</h1>
        </div>
    </div>

    <div class="discount-homepage">
        <div class="discount-homepage-container">
            <div id="discount-small1" class="discount-small">
                <div class="half-circle-left"></div>
                <h1>#ABCDEF</h1>
                <p>Hóa đơn trên 50.000đ</p>
                <h2>#ABCDEF</h2>
                <button>Lưu lại</button>
                <div class="half-circle-right"></div>
            </div>
            <div id="discount-small2" class="discount-small">
                <div class="half-circle-left"></div>
                <h1>#ABCDEF</h1>
                <p>Hóa đơn trên 50.000đ</p>
                <h2>#ABCDEF</h2>
                <button>Lưu lại</button>
                <div class="half-circle-right"></div>
            </div>
            <div id="discount-small3" class="discount-small">
                <div class="half-circle-left"></div>
                <h1>#ABCDEF</h1>
                <p>Hóa đơn trên 50.000đ</p>
                <h2>#ABCDEF</h2>
                <button>Lưu lại</button>
                <div class="half-circle-right"></div>
            </div>
            <div id="discount-small4" class="discount-small">
                <div class="half-circle-left"></div>
                <h1>#ABCDEF</h1>
                <p>Hóa đơn trên 50.000đ</p>
                <h2>#ABCDEF</h2>
                <button>Lưu lại</button>
                <div class="half-circle-right"></div>
            </div>
        </div>
    </div>

    <div class="bestSale-product-homepage">
        <div class="bestSale-product-container">
            <div class="title-bestSale">
                <h1>Sản phẩm bán chạy</h1>
                <a href="#">Show all product <ion-icon name="arrow-forward-outline"></ion-icon></a>
            </div>

            <div class="bestSale-detail">
                <a class="product-card">
                    <img src="../../Public/images/rau_xalach.jpg" alt="Rau xà lách Nhật">
                    <h3>Rau xà lách Nhật</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">15.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/bapngo.jpg" alt="Bắp ngô nếp vàng">
                    <h3>Bắp ngô nếp vàng</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">20.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/suplo.jpg" alt="Súp lơ xanh">
                    <h3>Súp lơ xanh</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">25.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/carot.jpg" alt="Cà rốt Hàn Quốc">
                    <h3>Cà rốt Hàn Quốc</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">50.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/caithia.jpg" alt="Cải thìa 1 bó">
                    <h3>Cải thìa 1 bó</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">25.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/curendo.jpg" alt="Củ dền đỏ">
                    <h3>Củ dền đỏ</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">15.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/raumuong.jpg" alt="Rau muống">
                    <h3>Rau muống</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">20.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/otchuong.jpg" alt="Ớt chuông">
                    <h3>Ớt chuông</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">25.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/chanh.jpg" alt="Chanh tươi">
                    <h3>Chanh tươi</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">50.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
              
                  <a class="product-card">
                    <img src="../../Public/images/catim.jpg" alt="Cà tím">
                    <h3>Cà tím</h3>
                    <span class="label">Bán chạy</span>
                    <div>
                        <p class="price">25.000đ</p>
                        <button class="add-button">+</button>
                    </div>
                  </a>
            </div>
        </div>
    </div>
</body>
</html>