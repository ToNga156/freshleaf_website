<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/freshleaf_website/public/css/shoppingCart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/freshleaf_website/public/css/header.css?v=<?php echo time(); ?>">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Cormorant+Upright:wght@300;400;500;600;700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <header><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php') ?></header>  

    <?php
        $cartItems = $data['cartItems'];
    ?>
    <div class="shopping-cart">
        <?php if (empty($cartItems)): ?>
            <div class="shopping-cart-container2">
                <ion-icon name="cart-outline"></ion-icon>
                <h1>Chưa có sản phẩm nào trong giỏ hàng</h1>
            </div>

            <a href="/freshleaf_website"><button class="backtohome">Quay lại trang chủ</button></a>
        <?php else: ?>
            <div class="shopping-cart-container1">
                <div class="cart-header">
                    <h2>Shopping Cart</h2>
                    <p>( <span>4</span> products )</p>
                </div>  
                
                <div class="cart-title">
                    <h4 class="cart-title1">Product</h4>
                    <h4 class="cart-title2">Unit Price</h4>
                    <h4 class="cart-title3">Quantity</h4>
                    <h4 class="cart-title4">Line Total</h4>
                </div>

                <?php 
                    $totalAmount = 0;
                ?>
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item"> 
                        <button class="delete-cart-item"><ion-icon name="trash-outline"></ion-icon></button>

                        <div class="product-info">
                            <img src="<?php echo htmlspecialchars($item['product_image']); ?>" alt="Lime">
                            <div>
                                <p><?php echo htmlspecialchars($item['product_name']); ?> ( <span><?php echo htmlspecialchars($item['unit']); ?></span> )</p>
                                <p class="category">Category: <?php echo htmlspecialchars($item['category_name']); ?></p>
                            </div>
                        </div>

                        <div class="unit-price"><?php echo htmlspecialchars($item['price']); ?></div>

                        <div class="quantity">
                            <button class="quantity-btn"><ion-icon name="remove-outline"></ion-icon></button>
                            <span><?php echo htmlspecialchars($item['quantity']); ?></span>
                            <button class="quantity-btn"><ion-icon name="add-outline"></ion-icon></button>
                        </div>

                        <div class="line-total"><?php echo htmlspecialchars($item['line_total']); ?></div>
                    </div>
                    <?php $totalAmount += htmlspecialchars($item['line_total']);?>
                <?php endforeach; ?>

                <div class="cart-footer">
                    <button class="order-btn">Order</button>
                    <p class="total-amount">Total Amount: <span><?php echo $totalAmount?>.000đ</span></p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'C:\xampp\htdocs\freshleaf_website\mvc\views\layout\footer.php' ?>
</body>
</html>