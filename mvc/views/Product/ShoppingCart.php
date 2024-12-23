<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../public/css/shoppingCart.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<style>
    /* Reset cơ bản */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f9f9f9;
    color: #333;
    text-align:center;
    min-height: 100vh;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.container {
    display: flex;
    gap: 50px;
    width: 100%;
    align-items: center;
    justify-content:space-between;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

.cart-content {
    margin-bottom: 20px;
    border: 2px solid gray;
}
.cart-table {
    width: 100%;
    border-collapse: collapse;
    
}

.cart-table th, .cart-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.cart-table img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

.cart-table td span {
    vertical-align: middle;
    font-weight: bold;
}

.quantity-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}

.quantity-box button {
    width: 25px;
    height: 25px;
    border: 1px solid #ddd;
    background: #fff;
    cursor: pointer;
    font-weight: bold;
}

.quantity-box span {
    display: inline-block;
    width: 25px;
    text-align: center;
}

.buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.btn-gray {
    padding: 10px 15px;
    border: none;
    background-color: #e0e0e0;
    color: #333;
    cursor: pointer;
    border-radius: 3px;
}

.cart-summary {
    border-top: 2px solid #f0f0f0;
    padding-top: 20px;
    width:20%;
    height: 50%;
    border: 2px solid gray;
}
.cart-summary h2 {
    text-decoration: none; 
    border-bottom: 2px solid gray; 
    padding-bottom: 5px;
}

.summary-content p {
    margin: 5px 0;
    font-size: 1.1em;
    text-align: left;
}
.summary-content span, .summary-content strong {
    font-weight: bold;
}

.btn-green {
    margin-top: 10px;
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    background-color: #00a650;
    border: none;
    cursor: pointer;
    border-radius: 2px;
    font-size: 1em;
}
.sc1, .sc2{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-right: 20px;
}
.sc1{
    border-bottom: 2px solid gray;
}
.btn-green:hover {
    background-color: #00853e;
}

</style>
<body>
    <header><?php include('C:/xampp/htdocs/freshleaf_website/mvc/views/layout/header.php') ?></header>
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


<script src="../../Public/js/shoppingCart.js"></script>
<footer><?php include('C:\xampp\htdocs\freshleaf_website\mvc\views\layout\footer.php')?></footer>
</body>
</html>