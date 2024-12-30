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
            $getProduct = $this->productModel->getAllProduct();
            if (empty($getProduct)){
                echo "Không có sản phẩm nào trong Database";
            }
            else{
                $this->view("./Admin/ProductsManager",["product"=>$getProduct]);
            }
        }
        
        
    }
?>