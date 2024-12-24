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
    public function Products(){
        $productModel = new ProductModel();
        $categories= $productModel->getAllCategories();
        $products_by_category = [];
        foreach ($categories as $category) {
            $category_id = $category['category_id'];
            $category_name = $category['category_name'];
            $products_by_category[$category_name] = $productModel->getAllProductCategory($category_id);
        }
        $this->view("Product/Products", ["products_by_category" => $products_by_category]);
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
}
?>