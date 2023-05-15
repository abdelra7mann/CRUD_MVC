<?php 
// هيتعامل مع الداتا بيز بشكل مباشر 
class Product extends DB {
    private $table = "products";
    private $conn ; 

    public function __construct()    
    {
       $this->conn =  $this->connect();
   
        
    }
    public function gettAllProduct(){
        
        return $this->conn->get($this->table);
    }

    public function inset_product($data){
        return $this->conn->insert($this->table,$data);
    
    }



    public function update_product($id,$data){
        $db = $this->conn->where ("id", $id);
        return $db->update ($this->table, $data);
    
    }


    


    public function update($data){
        return $this->conn->update($this->table,$data);
    
    }
    public function get_row($id){
        $db = $this->conn->where ("id", $id);
        return $db->getOne ($this->table);


    
    }

    public function delete_product($id){
        $db = $this->conn->where('id', $id);
        return $db->delete($this->table);
    
    }

    

}


?>