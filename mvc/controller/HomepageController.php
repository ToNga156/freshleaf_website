<?php
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
    require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\ProductModel.php');

    class HomepageController extends Controller {
        public $ProductModel;

        public function Default() {
            $productModel = new ProductModel();
            $bestSaleProduct = $productModel->getBestSaleProduct();

            // Kiểm tra sản phẩm tồn tại
            if (!$bestSaleProduct) {
                die("Sản phẩm không tồn tại");
            }

            $this->view("homepage", ["bestSaleProduct" => $bestSaleProduct]);
        }
    }
?>