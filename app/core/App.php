<?php

class App {
    // properti untuk tampilan default dari class App
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    //method
    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if(file_exists('../app/controllers/'. $url[0].'.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;;

        // method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if(!empty($url)){
            $this->params = array_values($url);
        }

        // Jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if(isset($_GET['url'])){
            // Menghapus tanda '/' di akhir URL yang ditulis
            $url = rtrim($_GET['url'], '/');
            // Bersih dari karakter aneh / memungkinkan di hack 
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Memecah berdasarkan tanda '/'
            $url = explode('/', $url);
            return $url;
        }
    }
}