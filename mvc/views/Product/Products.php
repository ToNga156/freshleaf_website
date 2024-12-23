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
        
            <?php foreach ($products as $product): ?>
                <div class="ListProducts">
                    <a href="/freshleaf_website/Product/detail/<?php echo htmlspecialchars($product['product_id']); ?>" class="product-card"></a>
                    <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">    
                    <h3><?php echo htmlspecialchars($product['product_name']); ?></h3> 
                    <div>
                        <p class="price"><?php echo htmlspecialchars($product['price']); ?>đ</p>
                        <button class="add-button">+</button>
                    </div>
                </div>
            <?php endforeach; ?>
        
    <?php endforeach; ?>
</body>
</html>