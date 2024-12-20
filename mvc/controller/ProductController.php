<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\ProductModel.php');
class ProductController extends Controller{
    public $ProductModel;
    public function Default(){
        $productModel = new ProductModel();
        $productModel = $productModel->getAllProduct();  
        return $productModel;

    }
    public function detail($id) {
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);
        $relatedProducts= $productModel->getProductCategory($product['category_id']);

        // Kiểm tra sản phẩm tồn tại
        if (!$product) {
            die("Sản phẩm không tồn tại");
        }

        $this->view("Detail", ["product" => $product, "categories" => $relatedProducts]);
    }
}
?>