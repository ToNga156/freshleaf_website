<?php
    // Nhận dữ liệu từ controller
    $products = $data['products'] ?? [];
    $searchKeyword = $data['searchKeyword'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../freshleaf_website/Public/Css/listProduct.css?v=<?php echo time(); ?>">
    <title>Kết quả tìm kiếm</title>
</head>
<body>
<header><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php'); ?></header>

<div class="products">
    <h3>Kết quả tìm kiếm cho từ khóa: " <strong><?php echo htmlspecialchars($searchKeyword); ?></strong>"</h3>

    <?php if (empty($products)): ?>
        <p>Không có sản phẩm nào phù hợp với từ khóa này.</p>
    <?php else: ?>
        <div class="allProduct">
            <?php foreach ($products as $product): ?>
                <div class="ListProducts">
                    <a href="/freshleaf_website/Product/detail/<?php echo htmlspecialchars($product['product_id']); ?>" class="product-card">
                        <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">    
                        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3> 
                        <div class="price">
                            <p class="price"><?php echo htmlspecialchars($product['price']); ?>đ</p>
                            <button class="add-button">+</button>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
