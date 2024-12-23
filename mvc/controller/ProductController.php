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
        $categories= $productModel->getAllCategories();
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
}
?>