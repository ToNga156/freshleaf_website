<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../freshleaf_website/public/css/footer.css?v=<?php echo time(); ?>">

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

.footer {
    background-color: rgb(0, 0, 0);
    width: 100%;
    height: auto;
}

.footer-container {
    padding: 50px 140px;
    display: flex;
    justify-content: space-between;
    color: white;
}

.footer-container .title-footer h3 {
    margin: 12px 0 8px 0;
    font-size: 20px;
}

.footer-container .title-footer .underline {
    background-color: #009C52;
    width: 60px;
    height: 4px;
    border-radius: 2px;
}

.footer-container .title-footer .point {
    background-color: #009C52;
    margin: 0;
    width: 4px;
    height: 4px;
    border-radius: 2px;
}

.footer-container .intro-footer {
    /* background-color: aquamarine; */
    width: 25%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.footer-container .intro-footer .intro-footer-detail {
    display: flex; 
    align-items: center; 
    gap: 20px;
}

.footer-container .intro-footer .logoWebsite-footer {
    width: 50px; 
    height: 50px; 
    border-radius: 25px;
}

.footer-container .intro-footer .info-intro-detail {
    color: white; 
    line-height: 1.5;
}

.footer-container .explore-footer {
    width: 15%;
    margin-left: 40px;
}

.explore-footer .explore-detail-footer {
    margin-top: 35px;
    line-height: 2;
}

.explore-footer .explore-detail-footer span {
    margin-left: 8px;
}

.footer-container .news-footer {
    width: 20%;
    margin-left: 20px;
}

.news-footer .news-detail-footer {
    margin-top: 35px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    line-height: 1.5;
}

.news-footer .news-detail-footer p {
    margin: 5px 0;
    color: #EEC044;
}

.footer-container .contact-footer {
    width: 20%;
}

.contact-footer .info-contact {
    margin-top: 35px;
    line-height: 1.5;
}

.contact-footer .info-contact .info-contact-detail {
    display: flex;
    gap: 15px;
    margin-bottom: 8px;
}

.contact-footer .info-contact ion-icon {
    color: #EEC044;
    font-weight: bold;
}

.contact-footer .search-product-contact {
    margin-top: 30px;
    display: flex;
}

.search-product-contact .search-input-contact {
    padding: 0 0 0 15px;
    height: 40px;
    width: 78%;
    border: none;
    border-radius: 20px 0 0 20px;
}

input:focus {
    outline: none;
    border: none;
}

.search-product-contact .submit-search-contact {
    display: flex;
    justify-content: center;
    align-items: center;
    border: none;
    color: white;
    font-size: 18px;
    background-color: #009C52;
    border-radius: 0 20px 20px 0;
    width: 40px;
    cursor: pointer;
}


</style>
<body>
    <div class="footer">
        <div class="footer-container">
            <div class="intro-footer">
                <div class="intro-footer-detail">
                    <img class="logoWebsite-footer" src="../../freshleaf_website/public/images/logo_website.png" alt="">
                    <h1 style="margin: 0; font-family: 'Calistoga'; font-size: 30px; font-weight: lighter; color: #009C52;">FreshLeaf</h1>
                </div>

                <p class="info-intro-detail">Welcome to FreshLeaf - your destination for fresh, safe, and high-quality organic produce, delivered straight from the farm to your table. We are committed to providing top-quality products for your family's health and the environment! </p>
            </div>

            <div class="explore-footer">
                <div class="title-footer">
                    <h3>Explore</h3>
                    <div style="display: flex; gap: 7px;">
                        <div class="underline"></div>
                        <p class="point"></p>
                    </div>
                </div>

                <div class="explore-detail-footer">
                    <div>
                        <ion-icon name="leaf-outline"></ion-icon>
                        <span>About</span>
                    </div>

                    <div>
                        <ion-icon name="leaf-outline"></ion-icon>
                        <span>Our Projects</span>
                    </div>

                    <div>
                        <ion-icon name="leaf-outline"></ion-icon>
                        <span>Meet the Farmers</span>
                    </div>

                    <div>
                        <ion-icon name="leaf-outline"></ion-icon>
                        <span>Lastest News</span>
                    </div>

                    <div>
                        <ion-icon name="leaf-outline"></ion-icon>
                        <span>Contact</span>
                    </div>
                </div>
            </div>

            <div class="news-footer">
                <div class="title-footer">
                    <h3>News</h3>
                    <div style="display: flex; gap: 7px;">
                        <div class="underline"></div>
                        <p class="point"></p>
                    </div>
                </div>

                <div class="news-detail-footer">
                    <div>
                        <span>Bring Food Production <br> Back To Cities</span>
                        <p>December 18, 2024</p>
                    </div>
    
                    <div>
                        <span>The Future of Farming, <br> Smart Irrigation Solutions</span>
                        <p>December 18, 2024</p>
                    </div>
                </div>
            </div>

            <div class="contact-footer">
                <div class="title-footer">
                    <h3>Contact</h3>
                    <div style="display: flex; gap: 7px;">
                        <div class="underline"></div>
                        <p class="point"></p>
                    </div>
                </div>

                <div class="info-contact">
                    <div class="info-contact-detail">
                        <ion-icon name="call-outline"></ion-icon>
                        <span>+ 84 123 789 456</span>
                    </div>

                    <div class="info-contact-detail">
                        <ion-icon name="mail-outline"></ion-icon>
                        <span>freshleaf@gmail.com</span>
                    </div>

                    <div class="info-contact-detail">
                        <ion-icon name="map-outline"></ion-icon>
                        <span>Sơn Trà, Đà Nẵng</span>
                    </div>
                </div>

                <div class="search-product-contact">
                    <input type="text" class="search-input-contact" placeholder="Nhập sản phẩm cần tìm kiếm">
                    <button type="submit" class="submit-search-contact"><ion-icon name="search-outline"></ion-icon></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>