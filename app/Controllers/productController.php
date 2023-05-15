<?php 

class ProductController {

    public function index(){
        $db = new Product();
        $result['products'] = $db->gettAllProduct();
        
        View::load('Product/index',$result);
    }


    // add new product
    public function add(){
        View::load('product/add');
       
    }

    // get Data 
    public function store(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];

            $data = Array ( 
                    "name" => $name,
                    "description" => "$description",
                    "qty" => "$qty",
                    "price" => "$price");
            $db = new Product(); 
            if(  $db->inset_product($data)){
                View::load('product/add',['success'=>'Done Data Submited']);

            }else{
                echo '';
            }
            
      
        }
        View::load('product/store',$data);
       
    }


     // delete products
     public function delete($id){
        $db = new Product();
        if($db->delete_product($id)){
            View::load('product/delete');

        }else{
            echo "Erorr when we try to delete ";
        }
       
    }

     // edit products
     public function edit($id){
        $db = new Product();
        // var_dump($db->get_row($id));
        $data = $db->get_row($id);
        $allData = ['name' => $data['name'],
                    'description'=> $data['description'],
                    'qty'=> $data['qty'],
                    'price'=> $data['price'],
                    'id' => $data['id']
                    ];

        // print_r($allData);
        if($data){
        View::load('product/edit',$allData);

        }

    }

    public function update($id){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description']; 
            $qty = $_POST['qty'];
            $price = $_POST['price'];

            $dataInsert = Array ( "name" => $name ,
                            "description" => $description ,
                            "price" => $price ,
                            "qty" => $qty 
                            );

            $db = new Product(); 

            if(  $db->update_product($id,$dataInsert )){
                $data['row'] = $db->get_row($id);
                View::load('product/edit',[ $dataInsert ,'success'=>'Done Data Submited','row'=>$db->get_row($id)]);
            }else{
                  View::load('product/edit', $db->get_row($id));
                
            }
            
      
        }
       
    }

}


?>