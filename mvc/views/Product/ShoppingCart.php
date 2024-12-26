<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/shoppingCart.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Cormorant+Upright:wght@300;400;500;600;700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="shopping-cart">
        <div class="shopping-cart-container1">
            <div class="cart-header">
                <h2>Shopping Cart</h2>
                <p>( <span>2</span> products )</p>
            </div>  
            <div class="cart-title">
                <h4 class="cart-title1">Product</h4>
                <h4 class="cart-title2">Unit Price</h4>
                <h4 class="cart-title3">Quantity</h4>
                <h4 class="cart-title4">Line Total</h4>
            </div>
        
            <div class="cart-item"> 
                <button class="delete-cart-item"><ion-icon name="trash-outline"></ion-icon></button>

                <div class="product-info">
                    <img src="https://i.pinimg.com/736x/2b/39/a3/2b39a367156d1a57ff11f9137ff92991.jpg" alt="Lime">
                    <div>
                        <p>Cà rốt Hàn Quốc ( <span>Kg</span> )</p>
                        <p class="category">Category: Fruit</p>
                    </div>
                </div>

                <div class="unit-price">50.000đ</div>

                <div class="quantity">
                    <button class="quantity-btn"><ion-icon name="remove-outline"></ion-icon></button>
                    <span>01</span>
                    <button class="quantity-btn"><ion-icon name="add-outline"></ion-icon></button>
                </div>

                <div class="line-total">50.000đ</div>
            </div>

            <div class="cart-item">
                <button class="delete-cart-item"><ion-icon name="trash-outline"></ion-icon></button>

                <div class="product-info">
                    <img src="https://i.pinimg.com/736x/83/02/cb/8302cb21c646b117e03ca4a51552f4dc.jpg" alt="Carrot">
                    <div>
                        <p>Chanh tươi (kg)</p>
                        <p class="category">Category: Tuber</p>
                    </div>
                </div>

                <div class="unit-price">50.000đ</div>
                
                <div class="quantity">
                    <button class="quantity-btn"><ion-icon name="remove-outline"></ion-icon></button>
                    <span>01</span>
                    <button class="quantity-btn"><ion-icon name="add-outline"></ion-icon></button>
                </div>

                <div class="line-total">100.000đ</div>
            </div>

            <div class="cart-footer">
                <button class="order-btn">Order</button>
                <p class="total-amount">Total Amount: <span>150.000đ</span></p>
            </div>
        </div>
        
        <!-- <div class="shopping-cart-container2">
            <ion-icon name="cart-outline"></ion-icon>
            <h1>Chưa có sản phẩm nào trong giỏ hàng</h1>
        </div>

        <button class="backtohome">Quay lại trang chủ</button> -->
    </div>
</body>
</html>