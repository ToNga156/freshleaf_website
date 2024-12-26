<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\ProductModel.php');
class ProductController extends Controller{
    public $ProductModel;
    public function index(){
        $productModel = new ProductModel();
        $productModel = $productModel->getAllProduct();  
        return $productModel;

    }
    public function ListProducts(){
        $productModel = new ProductModel();
        $categories= $productModel->getAllProductCategories();
        if(!$categories){
            echo "Không có danh mục nào";
        }
        else{
            $this->view("./Product/Products",["allCategories"=> $categories]);
        }
        
    }
    public function detail($id) {
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);
        
        // Kiểm tra sản phẩm tồn tại
        if (!$product) {
            die("Sản phẩm không tồn tại");
        }
        
        $relatedProducts= $productModel->getProductCategory($product['category_id']);
        $this->view("./Product/Detail", ["product" => $product, "categories" => $relatedProducts]);
    }
    public function filterProducts(){
        $productModel = new ProductModel();
        $min_price = isset($_GET['min_price']) ? (float)$_GET['min_price'] : 0;
        $max_price = isset($_GET['max_price']) ? (float)$_GET['max_price'] : PHP_INT_MAX;
        $filteredProducts = $productModel->getProductByPriceRange($min_price,$max_price);


        $productsByCategory = [];
        while ($product = $filteredProducts->fetch_assoc()) {
            if (!isset($productsByCategory[$product['category_name']])) {
                $productsByCategory[$product['category_name']] = [];
            }
            $productsByCategory[$product['category_name']][] = $product;
        }

        $this->view('./Product/filterProduct', ['productsByCategory' => $productsByCategory]);
    }
}
?>