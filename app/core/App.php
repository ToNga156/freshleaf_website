<?php
    class App {
        //http://localhost/freshleaf_website/Home/SayHi/1/2/3
        protected $controller = "Home";
        protected $action = "SayHi";
        protected $params = [];

        function __construct() {
            //Array ( [0] => Home [1] => SayHi [2] => 1 [3] => 2 [4] => 3 )
            $arr = $this->UrlProcess();
            // print_r($arr);

            //Xử lý controller
            //".app/controllers/Home.php"
            if (file_exists("./app/controllers/".$arr[0].".php")) {
                $this->controller = $arr[0];
                //Sau khi xử lý và gán giá trị cho controller thì cần phải hủy để khi xuống xử lý action hoặc params sẽ không còn dư Controller nữa
                unset($arr[0]);
            }
            require_once("./app/controllers/" . $this->controller . ".php");

            //Tạo một đối tượng từ controller
            $controllerObj = new $this->controller();

            //Xử lý Action
            if (isset($arr[1])) {
                //Kiểm tra function có tồn tại trong file không
                if (method_exists($this->controller, $arr[1])) {
                    $this->action = $arr[1];
                }
                //Tương tự với hủy Controller
                unset($arr[1]);
            }

            //Xử lý Params
            // $this->params = $arr ? array_values($arr) : [];
            if ($arr) {
                $this->params = array_values($arr);
            } else {
                $this->params = [];
            }

            call_user_func_array([$controllerObj, $this->action], $this->params);
        }
        
        function UrlProcess() {
            if (isset($_GET["url"])) {
                //tách url
                //filter_var: loại bỏ các ký tự lạ
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
            
        }
    }
?>