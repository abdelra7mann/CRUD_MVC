<?php 
    /* front end controller */

// require_once('C:\xampp\htdocs\Abdo\mvc\app\Controllers\About.php');

class App{
    protected $controller = "HomeController";
    protected $action = "index";
    protected $param = [];
    

    public function __construct()
    {
        $this->prepareURL();
        $this->render(); 
   
        
    }
    /** 
    * Extract Controller , Method , Parametirs
    * Return void
    */ 
        private function prepareURL(){
        $Url = $_SERVER['QUERY_STRING'];
        if(!empty($Url)){
            $Url = trim($Url , '/');
            $Url = explode('/',$Url);
            //defind The Controller
            $this->controller = isset($Url[0]) ? ucwords($Url[0]).'Controller': 'HomeController' ;
            //defind The Action
            $this->action = isset($Url[1]) ? $Url[1] : 'index' ; 

            //defind The Paramters 
            unset($Url[0],$Url[1]);
            $this->param = !empty($Url)? array_values($Url) : [];
            // print_r(  $this->param );
            }

    }


        private function render(){
            if(class_exists($this->controller)){
                // TAKE CLONE FORM HomeControllerr Class
                $controller = new $this->controller;
                if(method_exists($controller,$this->action)){

                    call_user_func_array([$controller,$this->action],$this->param);
                    
                }else{
                    
                }
            }else{
                echo "this  ". $this->controller . '  not exsist'; 
            }
        }



}


?>