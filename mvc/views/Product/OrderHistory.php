<?php
require_once 'C:\xampp\htdocs\freshleaf_website\mvc\controller\OrderHistoryController.php';
// Kiểm tra và hiển thị thông tin orders
var_dump($categories);  // Kiểm tra dữ liệu orders được truyền vào
$categories = $data['orders'] ?? ['orders'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="/freshleaf_website/public/css/header.css?v=<?php echo time(); ?>">
    <style>
        .history_container {
            margin-top: 120px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="history_container">
        <h1>Order History</h1>
        <?php if (!empty($categories)): ?>  <!-- Sử dụng $orders thay vì $data['orders'] -->
            <?php foreach ($categories as $order): ?>
                <!-- <h3>Order ID: <?php echo $order['order_id']; ?></h3> -->
                <p>Status: <?php echo $order['status']; ?></p>
                <p>Date: <?php echo $order['order_date']; ?></p>
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['details'] as $detail): ?>
                            <tr>
                                <td><?php echo $detail['category_name']; ?></td>
                                <td><?php echo $detail['product_name']; ?></td>
                                <td><img src="<?php echo $detail['product_image']; ?>" alt="Product Image"></td>
                                <td><?php echo number_format($detail['price'], 2); ?></td>
                                <td><?php echo $detail['quantity']; ?></td>
                                <td><?php echo number_format($detail['line_total'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
