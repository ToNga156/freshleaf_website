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
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
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
    public function getAllProductCategories() {
        $sql = "
        SELECT 
            p.product_id, 
            p.product_name,
            p.product_image, 
            p.price, 
            c.category_id, 
            c.category_name 
        FROM products p
        INNER JOIN categories c ON p.category_id = c.category_id
        ";
        $stmt = $this->conn->prepare($sql);
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
    public function getProductByPriceRange($minPrice, $maxPrice){
        $sql = "
            SELECT 
                p.product_id, 
                p.product_name,
                p.product_image, 
                p.price, 
                c.category_id, 
                c.category_name 
            FROM products p
            INNER JOIN categories c ON p.category_id = c.category_id
            WHERE price BETWEEN ? AND ?
            ";
    $stmt = $this->conn->prepare($sql);
    

    $stmt->bind_param("dd", $minPrice, $maxPrice);
    
    $stmt->execute();

    return $stmt->get_result();
    }
    public function searchProducts($keyword) {
        // Sử dụng LIKE để tìm kiếm tên sản phẩm và tên danh mục
        $sql = "
        SELECT p.*, c.category_name
        FROM Products p
        JOIN Categories c ON p.category_id = c.category_id
        WHERE p.product_name LIKE ? OR c.category_name LIKE ?
    ";
    $stmt = $this->conn->prepare($sql);
    $searchItem = "%" . $keyword . "%";
    $stmt->bind_param("ss", $searchItem, $searchItem);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
        }
}

?>