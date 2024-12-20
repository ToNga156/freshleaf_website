<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Public/Css/shoppingCart.css">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>My Shopping Cart</h1>
    <div class="container">
        
        <div class="cart-content">
            <!-- Bảng sản phẩm -->
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="green-capsicum.png" alt="Green Capsicum">
                            <span>Green Capsicum</span>
                        </td>
                        <td>$14.00</td>
                        <td>
                            <div class="quantity-box">
                                <button class="quantity-btn minus">-</button>
                                <span class="quantity" data-price="14">5</span>
                                <button class="quantity-btn plus">+</button>
                            </div>
                        </td>
                        <td>$70.00</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="red-capsicum.png" alt="Red Capsicum">
                            <span>Red Capsicum</span>
                        </td>
                        <td>$14.00</td>
                        <td>
                            <div class="quantity-box">
                                <button class="quantity-btn minus">-</button>
                                <span class="quantity" data-price="14">1</span>
                                <button class="quantity-btn plus">+</button>
                            </div>
                        </td>
                        <td class="subtotal">$14.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tổng đơn hàng -->
        <div class="cart-summary">
            <h2>Cart Total</h2>
            <div class="summary-content">
                <div class="sc1">
                    <p class="p1">Subtotal: </p> <span>$84.00</span>
                </div>
                <div class="sc2">
                    <p>Total: </p><strong>$84.00</strong>
                </div>
            </div>
            <button class="btn-green">Proceed to checkout</button>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../Public/js/shoppingCart.js"></script>
</body>
</html>