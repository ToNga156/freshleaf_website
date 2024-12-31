<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../../public/css/payment.css">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Calistoga&family=Cormorant+Upright:wght@300;400;500;600;700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="payment">
        <div class="payment-container">
            <div class="purchased-items">
                <h1>Purchased Items</h1>
                <div class="underline"></div>
                <div class="items-detail">
                    <img src="../../public/images/chanh.jpg" alt="">
                    <div class="item-info">
                        <div>
                            <h5>Chanh tươi <span>( Kg )</span></h5>
                            <p class="item-price">100.000đ</p>
                        </div>
                        <p class="item-category">Category: Tuber</p>
                        <p class="item-quantity">Số lượng : 2</p>
                    </div>
                </div>

                <div class="items-detail">
                    <img src="../../public/images/chanh.jpg" alt="">
                    <div class="item-info">
                        <div>
                            <h5>Cà rốt Hàn Quốc <span>( Kg )</span></h5>
                            <p class="item-price">50.000đ</p>
                        </div>
                        <p class="item-category">Category: Tuber</p>
                        <p class="item-quantity">Số lượng : 1</p>
                    </div>
                </div>

                <div class="subtotal">
                    <h3>Subtotal</h3>
                    <span>100.000đ</span>
                </div>
                <div class="shipping-fee">
                    <h3>Shipping Fee</h3>
                    <span>30.000đ</span>
                </div>
                <div class="total">
                    <h2>Total</h2>
                    <span>130.000đ</span>
                </div>
                <button>Pay Now</button>
            </div>

            <div class="payment-info">
                <form action="" method="POST">
                    <h1>Payment Information</h1>
                    <div class="infor-personal">
                        <label>Full name <span class="required">*</span></label>
                        <input type="text" placeholder="Enter your full name">
                    </div>
                    <div class="infor-personal">
                        <label>Email <span class="required">*</span></label>
                        <input type="text" placeholder="Enter your email">
                    </div>
                    <div class="infor-personal">
                        <label>Phone <span class="required">*</span></label>
                        <input type="text" placeholder="Enter your phone number">
                    </div>
                    <div class="infor-personal">
                        <label>Note (Option)</label>
                        <input type="text" placeholder="Enter the note">
                    </div>
                    <div class="infor-personal">
                        <label>Provice / City <span class="required">*</span></label>
                        <input type="text" placeholder="Enter your provice / City">
                    </div>
                    <div class="infor-personal">
                        <label>Address <span class="required">*</span></label>
                        <input type="text" placeholder="Enter your address">
                    </div>

                    <div class="different-info">
                        <h3>Ship to a different address</h3>
                        <label><input type="radio" name="choice" value="yes">Yes</label>
                        <label><input type="radio" name="choice" value="no">No</label>
                    </div>
                    
                    <h1>Payment Method</h1>
                    <div class="option-method">
                        <a href="#">
                            <img src="../../public/images/ATM.jpg" alt="">
                            <p>Bank Transfer</p>
                        </a>
                        <a href="#">
                            <img src="../../public/images/coin.jpg" alt="">
                            <p>Cash on Delivery</p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>