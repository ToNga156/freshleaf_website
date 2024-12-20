<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\ProductController.php');
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\HomepageController.php');
    $bestSaleProduct = $data['bestSaleProduct'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../../Public/Css/homepage.css?v=<?php echo time(); ?>">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

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
    text-decoration: none;
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
    text-decoration: none;
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
    color: black;
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
    cursor: pointer;
}

/* brand-banner-homepage */
.brand-banner-homepage {
    margin-top: 100px;
    padding: 20px 0 0 0;
}

.brand-banner-homepage .brand-banner-container {
    display: flex;
    flex-direction: column;
    position: relative;
}

.brand-banner-container .big-line-brand {
    display: flex;
    align-items: center;
    height: 55px;
    gap: 60px;
    background-color: #009C52;
}

.brand-banner-container .big-line-brand .repeat-brand {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 35px;
    width: 160px;
}

.brand-banner-container .big-line-brand .repeat-brand:first-child {
    margin-left: 40px;
}

.big-line-brand .repeat-brand .brand-img {
    width: 40px;
    height: 35px;
}

.big-line-brand .repeat-brand h5 {
    font-size: 22px;
    color: white;
}

.brand-banner-container .small-line-brand {
    height: 20px;
    background-color: #67D463;
}

.brand-banner-homepage .brand-banner-container .other-brandWebsite {
    position: absolute;
    top: -132px;
    right: 40px;
    width: 400px;
    height: auto;

}

/* CSS advertise-homepage  */
.advertise-homepage {
    background-color: #EFFFF0;
}

.advertise-container {
    position: relative;
    width: 100%;
    height: 500px;
}

.advertise-container h2 {
    position: absolute;
    top: 100px;
    left: 110px;
    font-size: 40px;
    margin: 0;
    color: #009C52;
}

.advertise-container span {
    color: #00562D;
}

.advertise-container h1 {
    position: absolute;
    top: 140px;
    left: 100px;
    color: #00562D;
    font-size: 80px;
}

.advertise-container div {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 220px;
    height: 50px;
    border-radius: 25px;
    font-weight: bold;
    background-color: rgba(255, 236, 171, 0.5);
}

.advertise-container #voucher {
    position: absolute;
    top: 145px;
    right: 100px;
}

.advertise-container #product {
    position: absolute;
    top: 275px;
    right: 285px;
    z-index: 1;
}

.advertise-container #customer {
    position: absolute;
    right: 370px;
    bottom: 40px;
    z-index: 1;
}

.advertise-container .advertise-homepage-img {
    position: absolute;
    right: 0;
    bottom: 0;
}
</style>
<body>
    <?php include 'C:\xampp\htdocs\freshleaf_website\mvc\views\layout\header.php' ?>
    

    <div class="banner-homepage">
        <div class="banner-homepage-container">
            <img class="main-img" src="../../freshleaf_website/Public/images/banner-homepage.jpg" alt="banner-homepage-img">
            <img class="extra-img" src="../../freshleaf_website/Public/images/raucuqua.png" alt="raucuqua-img">
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
                <?php foreach ($bestSaleProduct as $product): ?>
                    <a href="#" class="product-card">
                        <img src="<?php echo htmlspecialchars($product['product_image']);?>" alt="<?php echo htmlspecialchars($product['product_name']);?>">
                        <h3><?php echo htmlspecialchars($product['product_name']);?></h3>
                        <span class="label">Bán chạy</span>
                        <div>
                            <p class="price"><?php echo htmlspecialchars($product['price']);?>đ</p>
                            <button class="add-button">+</button>
                        </div>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <div class="brand-banner-homepage">
        <div class="brand-banner-container">
            <div class="big-line-brand">
                <div class="repeat-brand">
                    <img class="brand-img" src="../../freshleaf_website/public/images/brand-img.png" alt="">
                    <h5>Freshleaf</h5>
                </div>

                <div class="repeat-brand">
                    <img class="brand-img" src="../../freshleaf_website/public/images/brand-img.png" alt="">
                    <h5>Freshleaf</h5>
                </div>

                <div class="repeat-brand">
                    <img class="brand-img" src="../../freshleaf_website/public/images/brand-img.png" alt="">
                    <h5>Freshleaf</h5>
                </div>

                <div class="repeat-brand">
                    <img class="brand-img" src="../../freshleaf_website/public/images/brand-img.png" alt="">
                    <h5>Freshleaf</h5>
                </div>

                <div class="repeat-brand">
                    <img class="brand-img" src="../../freshleaf_website/public/images/brand-img.png" alt="">
                    <h5>Freshleaf</h5>
                </div>
            </div>
            <div class="small-line-brand"></div>
            <img class="other-brandWebsite" src="../../freshleaf_website/public/images/raucuqua1.png" alt="">
        </div>
    </div>

    <div class="advertise-homepage">
        <div class="advertise-container">
            <h2>Ưu đãi <span>giảm giá</span> đến 50%</h2>
            <h1>Tài khoản mới</h1>
            <div id="voucher">
                <i class="fa-solid fa-ticket-simple"></i>
                <span>Vô vàn khuyến mãi</span>
            </div>
            <div id="product">
                <!-- <i class="fa-solid fa-lemon"></i> -->
                <span>Đa dạng sản phẩm</span>
            </div>
            <div id="customer">
                <!-- <i class="fa-solid fa-user"></i> -->
                <span>Khách hàng tin tưởng</span>
            </div>
            <img class="advertise-homepage-img" src="../../freshleaf_website/public/images/advertise.png" alt="">
        </div>
    </div>

    <footer><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/footer.php')?></footer>
</body>
</html>