<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Db.php');

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
        $sql = "
            select *, sum(order_detail.quantity) as total_quantity from products
            join order_detail on products.product_id = order_detail.product_id
            group by order_detail.product_id
            order by total_quantity desc 
            limit 10;
        ";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

?>