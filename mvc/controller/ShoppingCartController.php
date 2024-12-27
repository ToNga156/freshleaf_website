<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\ProductModel.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\OrderModel.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\OrderDetailModel.php');

class ShoppingCartController extends Controller {
    public function addToCart() {
        session_start();
    
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(["success" => false, "message" => "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng."]);
            return;
        }
    
        $user_id = $_SESSION['user_id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $product_id = $data['product_id'];
    
        $orderModel = new OrderModel();
        $orderDetailModel = new OrderDetailModel();
        $productModel = new ProductModel();
    
        $order_id = $orderModel->getPendingOrderId($user_id);
        if (!$order_id) {
            $order_id = $orderModel->createOrder($user_id);
        }

        $price = $productModel->getProductPrice($product_id);
    
        $existingProduct = $orderDetailModel->getOrderDetail($order_id, $product_id);
    
        if ($existingProduct) {
            $newQuantity = $existingProduct['quantity'] + 1;
            $orderDetailModel->updateQuantity($order_id, $product_id, $newQuantity);
            echo json_encode(["success" => true, "message" => "Đã cập nhật số lượng sản phẩm."]);
        } else {
            $orderDetailModel->addProductToOrder($order_id, $product_id, 1, $price);
            echo json_encode(["success" => true, "message" => "Đã thêm sản phẩm mới vào giỏ hàng."]);
        }
    }
    

    public function viewCart() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->view("ShoppingCart", ["cartItems" => []]);
            return;
        }

        $user_id = $_SESSION['user_id'];

        $orderModel = new OrderModel();
        $orderDetailModel = new OrderDetailModel();

        $order_id = $orderModel->getPendingOrderId($user_id);
        $cartItems = [];
        $totalQuantity = [];
        if ($order_id) {
            $cartItems = $orderDetailModel->getOrderDetails($order_id);
            $totalQuantity = $orderDetailModel->getTotalQuantityCart($order_id);
        }

        $this->view("ShoppingCart", ["cartItems" => $cartItems, "totalQuantity" => $totalQuantity]);
    }
}
