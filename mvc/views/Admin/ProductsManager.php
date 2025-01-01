
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
    <link rel="stylesheet" href="/freshleaf_website/public/css/productManager.css?v=<?php echo time();?>">
    <title>Products Manager</title>
</head>
<body>
    <div class="title">
        <img src="/freshleaf_website/public/images/logo_website.png" alt="">
        <h1>Products Manager</h1>
        <div class="logout"><a href="/freshleaf_website/User/Logout"><i class="fa fa-sign-out" style="font-size:36px"></i></a></div>
    </div>
    <div class="create">
        <a href="/freshleaf_website/Admin/CreateProduct">
            <button>Create
            <div class="icon"><i class='fas fa-plus-circle' style='font-size:30px;'></i></div>
            </button>
        </a>
        
        
        
    </div>
    <div class="content">
        
        <div class="navigation">
            <button class="btn">
                <a href="/freshleaf_website/Admin/UserManager"><i class="fa fa-user-circle-o" style="font-size:36px"></i>Users Manager</a>
            </button>
            <button class="btn">
                <a href="/freshleaf_website/Admin/ProductManager">
                    <i class="fas fa-cube" style="font-size:36px"></i> Product Manager
                </a>
            </button>
            <button class="btn">
                <a href="/freshleaf_website/Admin/Categories">
                    <i class="fa fa-list-alt" style="font-size:36px;"></i>Categories
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
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Stock Quantity</th>
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
                        <td class="description"><?php echo $products['description'] ?></td>
                        <td><?php echo $products['unit'] ?></td>
                        <td><?php echo $products['stock_quantity'] ?></td>
                        <td class="img"><img src="<?php echo htmlspecialchars($products['product_image']) ?>" alt="product_image" class="product_image"></td>
                        <td><?php echo $products['category_name'] ?></td>
                        <td class="action">
                            <form action="/freshleaf_website/Admin/deleteProduct" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                <input type="hidden" name="product_id" value="<?php echo $products['product_id']; ?>">
                                <button class="delete-btn" type="submit"><i class="fa fa-trash-o" style="font-size:20px"></i></button>
                            </form>
                            <a href="/freshleaf_website/Admin/editProduct?id=<?php echo $products['product_id'] ?>">
                                <button type="button" class="edit-btn">
                                    <i class="fa fa-pencil-square-o" style="font-size:20px"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
