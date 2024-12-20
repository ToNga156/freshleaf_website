<?php
require_once('C:\xampp\htdocs\ProjectWeb-TV\freshleaf_website\mvc\core\Db.php');

class ProductModel extends Db{
    public function getAllProduct(){
        $sql = "SELECT * FROM Products";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function getProductById($id) {
        $sql = "SELECT * FROM Products WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Trả về một sản phẩm
    }
    public function getProductCategory($category_id) {
        // Prepare the SQL statement
        $sql = "SELECT * FROM Products WHERE category_id = ? LIMIT 4";
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("i", $category_id); 
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ToNga
    public function getBestSaleProduct() {
        // Câu truy vấn SQL lấy 10 sản phẩm bán chạy nhất
        $sql ="SELECT Products.*, SUM(order_detail.quantity) AS total_quantity 
        FROM Products 
        JOIN order_detail 
        ON products.product_id = order_detail.product_id 
        GROUP BY Products.product_id 
        GROUP BY total_quantity DESC 
        LIMIT 10";
        // Thực thi truy vấn
        $result = mysqli_query($this->conn, $sql);
    
        // Kiểm tra nếu truy vấn thất bại
        if (!$result) {
            die("Query failed: " . mysqli_error($this->conn));
        }
    
        // Trả về tất cả các kết quả dưới dạng mảng liên kết
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
}

?>