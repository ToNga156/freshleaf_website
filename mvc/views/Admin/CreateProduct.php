<?php 
require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\AdminController.php');
$categories = $data['categories'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/freshleaf_website/public/css/createProduct.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
    <h1>Thêm sản phẩm</h1>
        <form action="" method="POST">
            <label for="product_name">Tên sản phẩm:</label>
            <input type="text" name="product_name" id="product_name" required><br>

            <label for="price">Giá:</label>
            <input type="text" name="price" id="price" required><br>

            <label for="description">Mô tả:</label>
            <textarea name="description" id="description" required></textarea><br>

            <label for="unit">Đơn vị:</label>
            <input type="text" name="unit" id="unit"  required><br>

            <label for="unit">Số lượng:</label>
            <input type="text" name="stock_quantity" id="stock_quantity"  required><br>


            <label for="image">Hình ảnh:</label>
            <input type="text" name="product_image" id="product_image" required><br>

            <label for="category_name">Danh mục:</label>
            <select name="category_id" id="id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['category_id'] ?>">
                        <?php echo $category['category_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Lưu thay đổi</button> 
        </form>
</body>
</html>