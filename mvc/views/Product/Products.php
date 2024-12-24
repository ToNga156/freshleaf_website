<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\ProductController.php');
    $products_by_category = $data['products_by_category'];  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>All Products by Category</h1>
    <?php foreach ($products_by_category as $category_name => $products): ?>
        <div class="category">
            <h2><?= htmlspecialchars($category_name['category_name']) ?></h2>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                        <p><?php echo htmlspecialchars($product['product_name']); ?></p>
                        <div class="same-product">
                            <p class="price"><?php echo htmlspecialchars($product['price']); ?></p>
                            <button><a href="<?php echo htmlspecialchars($product['product_id']); ?>">Chi tiết</a></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products available in this category.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</body>
</html>