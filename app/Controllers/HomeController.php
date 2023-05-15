<?php 

class HomeController{

    public function index(){
         
        $data['title'] = 'Mvc Course';
        $data['content'] = "eempoly-daata";
        View::load('home',$data);
     
    }


}

?>