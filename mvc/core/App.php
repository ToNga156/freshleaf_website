
<?php
class App {
    protected $controller = 'HomepageHomepageController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        if (file_exists('./mvc/controller/' . $url[0] . 'Controller.php')) {
            $this->controller = $url[0] . "Controller";
            unset($url[0]);
        }
        // require_once './mvc/core/Db.php'; 
        // $dbConnection = new Db(); 

        require_once './mvc/controller/' . $this->controller . '.php';
        $controller = new $this->controller;

        if (isset($url[1]) && method_exists($controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
?>
