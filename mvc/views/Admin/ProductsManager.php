<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\controller\AdminController.php');
$product = $data['product'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/freshleaf_website/public/css/productManager.css?v=<?php echo time();?>">
    <title>Products Manager</title>
</head>
<body>
    <div class="title">
        <h1>Products Manager</h1>
    </div>
    <div class="content">
        <div class="navigation">
            <button class="btn">
                <a href="/freshleaf_website/Admin/UserManager"><i class="fa fa-user-circle-o" style="font-size:36px"></i>Users Manager</a>
            </button>
            <button class="btn">
            <a href="/freshleaf_website/Admin/ProductManager">
            <i class="fas fa-cube" style="font-size:36px"></i>
                Product Manager
            </a>
            </button>
        </div>
        <div class="tableContent">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Decription</th>
                        <th>Unit</th>
                        <th>Image</th>
                        <th>Categories</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($product as $products): ?>
                    <tr class="product_content">
                        <td><?php echo $products['product_id'] ?></td>
                        <td><?php echo $products['product_name'] ?></td>
                        <td><?php echo $products['price'] ?></td>
                        <td class="decription"><?php echo $products['description'] ?></td>
                        <td><?php echo $products['unit'] ?></td>
                        <td class="img"><img src="<?php echo htmlspecialchars($products['product_image']) ?>" alt="product_image" class="product_image"></td>
                        <td>Vegestable</td>
                        <td>
                            <button class="edit-btn"><i class="fa fa-pencil-square-o" style="font-size:30px"></i></button>
                            <button class="delete-btn"><i class="fa fa-trash-o" style="font-size:30px"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
