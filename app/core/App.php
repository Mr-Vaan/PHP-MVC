<?php 
// parseURL adalah untuk membuat link, contoh : index.php?url=login.
// ROUTING 
class App {
    protected $controller = 'Home'; // default controller
    protected $method = 'index'; // default method
    protected $params = [];

    public function __construct() {

        
        $url = $this->parseURL();

        // dibawah ini istilahnya, ada ga file yang namanya .php didalam file controllers ini. kalo ada kita timpa, controllers yang di atas(protected $controller = 'Home';) menjadi controllers yang baru 
        
        // Controller
        if ( file_exists('../app/controllers/' . $url[0] . '.php') ) {
            # code...
            // controllers yang baru : $this->controller = $url[0];
            $this->controller = $url[0];
            // lalu hilangkan controllernya dari element arraynya:
            unset($url[0]); // ini buat apa? nanti supaya kita bisa mengambil parameternya( protected $param = [];)
        }
        // kita required :
        require_once '../app/controllers/'. $this->controller . '.php' ; // $this->controller . '.php' ini digabungkan.
            
        // baru kita instansiasi : 
        $this->controller = new $this->controller; // jadi sekarang kelasnya di instansiasi. kenapa? supaya kita bisa manggil methodnya nanti
    
        // method
        if ( isset($url[1])) {      
            # code...
            if ( method_exists($this->controller, $url[1])) { //  $url[1] -> method_name
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // parameter 
        if ( !empty($url) ) {
            # code...
            $this->params = array_values($url);
        }
        // Jalankan Controller & method, serta kirimkan params jika ada:
        call_user_func_array([$this->controller, $this->method], $this->params);        
    }
    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // rtrim adalah untuk menghapus
            $url = filter_var($url, FILTER_SANITIZE_URL); // filter_var untuk membersihkan karakter-karakter aneh
            $url = explode('/', $url); // delimiter adalah '/', string adalah $url.
            return $url;
        }
    }


}