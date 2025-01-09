<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Cormorant+Upright:wght@300;400;500;600;700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/freshleaf_website/public/css/aboutUs.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/freshleaf_website/public/css/header.css?v=<?php echo time(); ?>">

</head>
<body>
<header><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php') ?></header>
<div class="about-us">
    <div class="container-banner">
        <img class="img-banner" src="https://cdn.fpt-is.com/vi/nong-nghiep-tuan-hoan-1-1717258755.png" alt="FreshLeaf">
        <div class="title-slogan">
            <p class="slogan">WELCOM TO FRESHLEAF</p>
            <p class="slogans">Choose clean, Life healthy</p>
        </div>
    </div>
    <div class="midle-banner">
        <div class="left-side">
            <h2>About us</h2>
            <p>FreshLeaf specializes in providing clean fruits and vegetables. 
                We are committed to the quality of clean, natural products without chemicals. 
            </p>
            <p>Use advanced technology in care. We ensure that the fruits and vegetables 
                we bring to customers will be a quality, fresh product and a trustworthy brand. 
                We look forward to having the opportunity to serve you and contribute to the development 
                of clean agricultural products in Vietnam.
            </p>
            <div class="container-data">
                <div class="sub-data">
                    <h2 class="sub-h2">1.000+</h2>
                    <p class="sub-p">Quality products</p>
                </div>
                <div class="sub-data">
                    <h2 class="sub-h2">5.000+</h2>
                    <p class="sub-p">Customers</p>
                </div>
            </div>
        </div>
        <div class="right-side">
            <img class="img-right-before" src="https://keep-it-fresh.vn/wp-content/uploads/2023/02/cong-nghe-sau-thu-hoach-rau-qua-anh-dai-dien.jpg" alt="">
            <img class="img-right-after" src="https://hongthaigroup.com/wp-content/uploads/2022/10/Giai-phap-che-bien-nong-san-300x225.jpg" alt="">
        </div>
    </div>
    <div class="brand-banner-container">
        <div class="big-line-brand">
            <div class="repeat-brand">
                <img class="brand-img" src="/freshleaf_website/public/images/brand-img.png" alt="brand-img">
                <h5>Freshleaf</h5>
            </div>

            <div class="repeat-brand">
                <img class="brand-img" src="/freshleaf_website/public/images/brand-img.png" alt="brand-img">
                <h5>Freshleaf</h5>
            </div>

            <div class="repeat-brand">
                <img class="brand-img" src="/freshleaf_website/public/images/brand-img.png" alt="brand-img">
                <h5>Freshleaf</h5>
            </div>

            <div class="repeat-brand">
                <img class="brand-img" src="/freshleaf_website/public/images/brand-img.png" alt="brand-img">
                <h5>Freshleaf</h5>
            </div>

            <div class="repeat-brand">
                <img class="brand-img" src="/freshleaf_website/public/images/brand-img.png" alt="brand-img">
                <h5>Freshleaf</h5>
            </div>
        </div>
        <div class="small-line-brand"></div>
        <img class="other-brandWebsite" src="/freshleaf_website/public/images/raucuqua1.png" alt="brand-img">
    </div>
    <div class="container-developer">
        <div class="title-developer">
            <h2>Meet the Team That Makes Miracles Happen</h2>
        </div>
        <div class="img-developer">
            <div class="img-for-developer">
                <img src="\freshleaf_website\Public\images\kim.jpg" alt="Team leader">
                <h3 class="h3">Ho Thi Kim</h3>
                <p class="p">Team Leader</p>
            </div>
            <div class="img-for-developer">
                <img src="\freshleaf_website\Public\images\nga.jpg" alt="Fullstack Developer">
                <h3 class="h3">Nguyen Thi To Nga</h3>
                <p class="p">Fullstack Developer</p>
            </div>
            <div class="img-for-developer">
                <img src="\freshleaf_website\Public\images\dat.jpg" alt="Fullstack Developer">
                <h3>Nguyen Van Dat</h3>
                <p>Fullstack Developer</p>
            </div>
        </div>
    </div>
</div>
<footer><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/footer.php')?></footer>
</body>
</html>