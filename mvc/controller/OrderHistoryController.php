<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\OrderModel.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\OrderDetailModel.php');

class OrderHistoryController extends Controller {
    private $orderModel;
    private $orderDetailModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
    }

    public function OrderHistory($user_id) {
        // Lấy thông tin đơn hàng và sản phẩm
        $ordersWithProducts = $this->orderModel->getOrderHistoryWithProducts($user_id);
    
        $orders = [];
        foreach ($ordersWithProducts as $row) {
            $orderId = $row['order_id'];
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'order_id' => $orderId,
                    'status' => $row['status'],
                    'order_date' => $row['order_date'],
                    'details' => [],
                ];
            }

            // Lấy chi tiết của từng sản phẩm trong đơn hàng
            $orderDetails = $this->orderDetailModel->getOrderDetails($orderId);

            // Thêm chi tiết sản phẩm vào mảng đơn hàng
            foreach ($orderDetails as $detail) {
                $orders[$orderId]['details'][] = [
                    'category_name' => $detail['category_name'],
                    'product_name' => $detail['product_name'],
                    'product_image' => $detail['product_image'],
                    'quantity' => $detail['quantity'],
                    'price' => $detail['price'],
                    'line_total' => $detail['line_total'],  // Tổng tiền của từng sản phẩm
                ];
            }
        }

        var_dump($orders);
        // Gửi dữ liệu đến view
        $this->view("./Product/OrderHistory",['orders' => $orders]);
    }
}
?>
