<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\ProductController.php');
    $allCategories = $data['allCategories'];

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
    <?php foreach ($allCategories as $category): ?>
            <li><?= htmlspecialchars($category['category_name']) ?> (ID: <?= htmlspecialchars($category['category_id']) ?>)</li>
        <?php endforeach; ?>
</body>
</html>