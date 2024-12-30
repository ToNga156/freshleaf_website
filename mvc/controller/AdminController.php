<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\UserModel.php');
session_start();
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
    class AdminController extends Controller{
        private $model;
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
    }
?>