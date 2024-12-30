<?php
require_once('C:\xampp\htdocs\freshleaf_website\mvc\model\UserModel.php');
session_start();
require_once('C:\xampp\htdocs\freshleaf_website\mvc\core\Controller.php');
    class AdminController extends Controller{
        private $model;
        public function __construct(){
            $this->model = new UserModel();
        }
        public function UserManager($user_id){
            $getAllUser =  $this->model->getUserId($user_id);
            if (!$getAllUser){
                echo "Không tòn tại tài khoản nào cả";
            }
            else{
                $this->view("./Admin/UsersManager",["getAllUser"=>$getAllUser]);
            }
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