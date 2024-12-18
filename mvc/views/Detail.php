<?php
    require_once('C:\xampp\htdocs\MY_PHP\freshleaf_website\mvc\controller\ProductController.php');
    $product = $data['product'];
    $relatedProducts = $data['categories'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cải Thìa - Organic</title>
    <!-- Nhúng file CSS -->
     <link rel="stylesheet" href="../../public/css/homepage.css">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    line-height: 1.6;
    background-color: #f9f9f9;
}
header{
    padding-bottom: 400px;
}
.product-detail {
    display: flex;
    padding: 20px;
    background-color: white;
    justify-content: space-between;
    gap: 30px;
    margin: 20px auto;
    border-radius: 10px;
    align-items: center;

}
.description{
    flex: 0 0 45%;
}
.related-products{
    display: flex;
    justify-content: space-between;

}
.product-card {
    border: 1px solid #ddd; /* Viền nhẹ */
    border-radius: 10px; /* Bo tròn góc */
    width: 20%;
    text-align: center;
    overflow: hidden; /* Đảm bảo nội dung không tràn */
    background-color: #fff; /* Màu nền trắng */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
    margin: 10px; 
}

.product-card img {
    width: 100%; /* Ảnh full chiều rộng */
    height: 150px; /* Chiều cao cố định */
    object-fit: cover; /* Giữ tỉ lệ ảnh, cắt phần dư */
    border-bottom: 1px solid #ddd; /* Viền phân cách */
}

.product-card h3 {
    font-size: 18px;
    color: #333;
    margin: 10px 0;
}

.product-card .price {
    color:rgb(208, 24, 24); /* Màu xanh cho giá */
    font-weight: bold;
    font-size: 16px;
    margin: 5px 0;
}

.product-card:hover {
    transform: translateY(-10px); /* Nổi lên khi hover */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Tăng đổ bóng */
}
.product-image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.quantity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.quantity-btn {
    background-color: #4CAF50; /* Màu nền */
    color: white;
    border: none;
    padding: 5px 10px;
    font-size: 20px;
    cursor: pointer;
    border-radius: 40%;
    transition: background-color 0.3s ease;
}

.quantity-btn:hover {
    background-color: #45a049; /* Màu khi hover */
}

.quantity-input {
    width: 50px;
    text-align: center;
    font-size: 18px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px;
}
.quantity-input::-webkit-outer-spin-button,
.quantity-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.quantity-input[type="number"] {
    -moz-appearance: textfield; /* Ẩn nút spinner trên Firefox */
    appearance: textfield; /* Ẩn nút spinner trên các trình duyệt khác */
}
.product-content{
    width: 500px;
}
.same-product{
    display: flex;
    justify-content: center;
    gap: 30px;
}
.same-product button{
    border-radius: 20px;
    width: 30%;
    background-color: white;
}
.same-product button:hover{
    background-color: #45a049;
}
.product-card img{
    width: 100%;
    object-fit: contain;
}
.related-title{
    text-align: center;
    font-weight: bold;
}
</style>
<body>
    <header><?php include('C:\xampp\htdocs\MVC-Test\mvc\views\layout\homepage.php') ?></header>
    <div class="container">
        <div class="product-detail">
            <div class="product-image">
                <img src="<?php echo htmlspecialchars($product['product_image']) ?>" alt="Cải Thìa">
            </div>
            <div class="product-content">
                <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                <h4>Details information</h4>
                <p><strong>Vegetable</strong><br>
                    Growing area: Da Nang</p>
                <p class="price"><?php echo htmlspecialchars($product['price']) ?></p>
            
            
                <div class="quantity">
                    <button type="button" class="quantity-btn" id="increase">+</button>
                    <input type="number" value="1" min="1" id="quantity" class="quantity-input">
                    <button type="button" class="quantity-btn" id="decrease">-</button>
                </div>
            </div>
        
            <div class="description">
                <p>
                    <?php echo htmlspecialchars($product['description']) ?>
                </p>
            </div>

        </div>

        <!-- Phần sản phẩm liên quan -->
        <h3 class="related-title">RELATED PRODUCTS</h3>
        <div class="related-products">
        <?php foreach ($relatedProducts as $product): ?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                <p><?php echo htmlspecialchars($product['product_name']); ?></p>
                <div class="same-product">
                    <p class="price"><?php echo htmlspecialchars($product['price']); ?></p>
                    <button>Chi tiết</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
<script src="../../public/js/detail.js"></script>
</body>
</html>
