<?php
require_once 'C:\xampp\htdocs\freshleaf_website\mvc\controller\UserController.php';
require_once 'C:\xampp\htdocs\freshleaf_website\mvc\controller\OrderHistoryController.php';
if (!empty($_SESSION['alert'])) {
    echo "<script>alert('" . htmlspecialchars($_SESSION['alert']) . "');</script>";
    unset($_SESSION['alert']); 
}

$categories = $data['orders'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/freshleaf_website/Public/Css/orderHistory.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="/freshleaf_website/Public/Css/sidebar.css?v=<?php echo time();?>">
</head>

<body>
    <?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php') ?>
    <div class="container_profile">
        <?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/sidebar.php') ?>

        <div class="container_infor">
            <div class="orderHistory">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $orderId => $orderDetails): ?>
                    <div class="orderHistory-container">
                        <div class="orderHistory-title">
                            <p id="orderTime">Time : <span  style="font-size: 16px;"><?php echo $orderDetails['order_date'];?></span></p>
                            <div>
                                <span id="status"><?php echo $orderDetails['status'];?></span>
                                <!-- <ion-icon id="reviewAll" name="create-outline"></ion-icon> -->
                            </div>
                        </div>

                        <div class="orderHistory-content">
                            <?php $orderTotal = 0; ?>
                            <?php foreach ($orderDetails['details'] as $index=>$detail): ?>
                            <?php
                                $lineTotal = $detail['price'] * $detail['quantity'];
                                $orderTotal += $lineTotal;
                            ?>

                            <div class="orderHistory-item">
                                <div style="display: flex;">
                                    <img src="<?php echo $detail['product_image']; ?>" alt="Product Image">
                                    <div class="item-info">
                                        <h5 id="productName"><?php echo $detail['product_name']; ?> ( <span><?php echo $detail['unit']; ?></span> )</h5>
                                        <p id="item-category">Category: <?php echo $detail['category_name']; ?></p>
                                        <p id="item-quantity">Quantity: <?php echo $detail['quantity']; ?></p>
                                    </div>
                                </div>
                                <p id="item-price"><?php echo $detail['price']; ?></p>
                                <a href="/freshleaf_website/Review/addReview?order_id=<?php echo $orderId; ?>&product_id=<?php echo $detail['product_id']; ?>">
                                    <ion-icon id="review" name="create-outline"></ion-icon>
                                </a>
                                
                            </div>

                            <?php endforeach; ?>
                            
                            <div class="orderHistory-summary">
                                <p>Total Amount : <span id="totalAmount"><?php echo $orderTotal; ?>.000đ</span></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No orders found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<script src="\freshleaf_website\public\js\profile.js"></script>
</body>
</html>