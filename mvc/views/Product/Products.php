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
        <div class="filter-form">
            <form method="GET" action="/freshleaf_website/Product/filterProducts">
                <div class="min_price">
                    <label for="min_price">Giá tối thiểu</label>
                    <input type="text" id="min_price" name="min_price" min="0" step="0.01" placeholder="Nhập giá tối thiểu">
                </div>
                <div class="max_price">
                    <label for="max_price">Giá tối đa</label>
                    <input type="text" id="max_price" name="max_price" max="100000"  step="0.01" placeholder="Nhập giá tối đa">
                </div>
                <button type="submit">Lọc</button>
            </form>
        </div>
        <div class="allProducts">
        <h1>Tất cả sản phẩm</h1>
        <?php 
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
                                <button class="add-button">+</button>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
                
            
        <?php endforeach; ?>
        </div>
        
    </div>

    
<?php include 'C:\xampp\htdocs\freshleaf_website\mvc\views\layout\footer.php' ?>

</body>
</html>