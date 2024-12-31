<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\UserModel.php');
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\ProductModel.php');
session_start();
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
    class AdminController extends Controller{
        private $model;
        private $productModel;
        public function __construct(){
            $this->model = new UserModel();
        }
        public function UserManager(){
            $getUser = $this->model->getAllUsers();
            if (empty($getUser)){
                echo "Không có tài khoản nào trong Database";
            }
            $this->view("./Admin/UsersManager",["user"=>$getUser]);
        }
        // public function showAllUser() {
        //     return $this->userModel->getAllUsers();
        // }
        // // 3. Lấy thông tin người dùng
        // public function getUser($user_id) {
        //     return $this->userModel->getUserById($user_id);
        // }
        public function deleteUser() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
                $userId = intval($_POST['user_id']);
                $isDelete = $this->model->deleteUser($userId);
                if ($isDelete) {
                    header("Location: /freshleaf_website/Admin/UserManager");
                    exit();
                } else {
                    header("Location: /freshleaf_website/Admin/UserManager");
                    exit();
                }
            } else {
                echo "Invalid request.";
            }
        }

        public function ProductManager(){
            $this->productModel = new ProductModel();
            $getProduct = $this->productModel->getAllProductCategories();
            if (empty($getProduct)){
                echo "Không có sản phẩm nào trong Database";
            }
            else{
                $this->view("./Admin/ProductsManager",["product"=>$getProduct]);
            }
        }
        public function deleteProduct(){
            $this->productModel = new ProductModel();
            if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['product_id'])){
                $product_id = intval($_POST['product_id']);
                $isdelete = $this->productModel->deleteProduct($product_id);
                if($isdelete){
                    header("Location: /freshleaf_website/Admin/ProductManager");
                    exit();
                }else{
                    header("Location: /freshleaf_website/Admin/ProductManager");
                    exit();
                }
            }else{
                echo "Invalid request.";
            }
        }
        public function editProduct() {
            // Lấy dữ liệu sản phẩm theo ID từ URL
            $this->productModel = new ProductModel();
            if (isset($_GET['id'])) {
                $product_id = $_GET['id'];
                $product = $this->productModel->getProductById($product_id);
                $categories = $this->productModel->getAllCategories();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $product_name = $_POST['product_name'] ?? '';
                    $price = $_POST['price'] ?? '';
                    $description = $_POST['description'] ?? '';
                    $unit = $_POST['unit'] ?? '';
                    $image = $_POST['product_image'] ?? '';
                    $category_id = $_POST['category_id'] ?? '';
        
                    // Gọi hàm update sản phẩm
                    $result = $this->productModel->editProduct(
                        $product_id,
                        $product_name,
                        $price,
                        $description,
                        $unit,
                        $image,
                        $category_id
                    );
        
        
                    if ($result) {
                        // Redirect đến trang quản lý sản phẩm
                        header("Location: /freshleaf_website/Admin/ProductManager");
                        exit();
                    } else {
                        echo "Cập nhật sản phẩm thất bại!";
                    }
                }
        
                // Hiển thị form chỉnh sửa
                $this->view("/Admin/EditProduct",['edit' => $product, 'categories' => $categories]);
            } else {
                echo "Không tìm thấy sản phẩm!";
            }
        }
        
        
    }
?>