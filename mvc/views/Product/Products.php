<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\ProductController.php');
    $allCategories = $data['allCategories'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../freshleaf_website/Public/Css/listProduct.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<style>
    
</style>
<body>
<header><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php') ?></header>
<div class="products">
    <h1>All Products by Category</h1>
    <?php 
        // Nhóm sản phẩm theo danh mục
        $productsByCategory = [];
        foreach ($allCategories as $product) {
            $productsByCategory[$product['category_name']][] = $product;
        }
    ?>

    <?php foreach ($productsByCategory as $categoryName => $products): ?>
        <h2><?= htmlspecialchars($categoryName) ?></h2>
        <div class="allProduct">
            <?php foreach ($products as $product): ?>
                <div class="ListProducts">
                    <a href="/freshleaf_website/Product/detail/<?php echo htmlspecialchars($product['product_id']); ?>" class="product-card">
                        <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">    
                        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3> 
                        <div class="price">
                            <p class="price"><?php echo htmlspecialchars($product['price']); ?>đ</p>
                            <button class="add-button">Mua ngay</button>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
            
        
    <?php endforeach; ?>
</div>

</body>
</html>