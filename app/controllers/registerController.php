<?php
    require_once('../Model/registerModel.php');
class registerController{
    public function register(){
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['Phone']);
            $address = trim($_POST['address']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmpassword']);
            if (empty($username)||empty($email)||empty($phone)||empty($address)||empty($password)||empty($confirmPassword)){
                return "Please enter complete information";
            }
            else{
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $error = "Invalid email!";
                    require_once('../View/register.php');
                    return;
                }
                else{
                    if ($password!= $confirmPassword){
                        $error = "Invalid confirm Password!";
                        require_once('../View/register.php');
                        return;
                    }
                }
            }
            if (empty($error)){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $registerModel = new Register();
                $result = $registerModel->registerUser($username,$password,$email,$phone,$address);
                if ($result === true){
                    echo "Account registration successful";
                }
                else{
                    echo "error: ".$error = $result;
                    require_once('../View/register.php');
                }
                
            }
        }
    }
}
$controller = new RegisterController();
$controller->register();
?>