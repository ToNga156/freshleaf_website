<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\ProductController.php');
    $product = $data['product'];
    $relatedProducts = $data['categories'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="/freshleaf_website/public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../public/css/detail.css?v=<?php echo time();?>">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<body>
    <header><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php') ?></header>  
       
    <div class="product-detail-container">
        <div class="product-detail">
            <img class="product-image" src="<?php echo htmlspecialchars($product['product_image']) ?>" alt="Cải Thìa">

            <div class="product-content">
                <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                <p class="category">Category: Vegetable</p>
                <div class="underline"></div>
                
                <p class="price"><?php echo htmlspecialchars($product['price']) ?>đ</p>
                <h4>Details Description</h4>
                <p class="description"><?php echo htmlspecialchars($product['description']) ?></p>
            
                <div class="quantity">Số lượng:
                    <button type="button" class="quantity-btn decrease">-</button>
                    <span class="quantity-value" data-price="30">1</span>
                    <button type="button" class="quantity-btn increase">+</button>
                </div>

                <div class="options">
                    <button class="buynow">Thanh toán</button>
                    <button class="addproduct">Thêm vào giỏ hàng</button>
                </div>

            </div>
        </div>

        <!-- Phần sản phẩm liên quan -->
        <h3 class="related-title">Sản phẩm tương tự</h3>
        <div class="related-products">
            <?php foreach ($relatedProducts as $product): ?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                <p><?php echo htmlspecialchars($product['product_name']); ?></p>
                <div class="same-product">
                    <p class="price"><?php echo htmlspecialchars($product['price']); ?>đ</p>
                    <button><a href="<?php echo htmlspecialchars($product['product_id']) ?>">Chi tiết</a></button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   -->
    <script src="\freshleaf_website\public\js\detail.js"></script>
    <?php include 'C:\xampp\htdocs\freshleaf_website\mvc\views\layout\footer.php' ?>
</body>
</html>
