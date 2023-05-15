<?php 



require_once (LIBS.'DB/MysqliDb.php');
// require_once (CONFIG);
class DB{
     protected $db ; 
     
     public function connect(){
        $database = new MysqliDb (HOST, USER, PASSWORD, DB_NANE);
        if(!$database->connect()){
         $this->db = $database ;
          return $this->db ; 
        }else{
         echo "Erorr";
        }


     }
}


?>