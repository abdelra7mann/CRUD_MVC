<?php 



class AboutController {

    public function index(){
        $aboutUs['Info'] = 'we are a Big Comnpany' ;
        View::load('about',$aboutUs);

    }
}


?>