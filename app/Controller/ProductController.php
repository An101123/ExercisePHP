<?php
require_once(__DIR__.'/../Models/product.php');

class ProductController{
    protected $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function handle(){
        $action = $_GET['action'];
        $id = $_GET['id'];
        switch ($action){
            case  '':
                $this->index();
                break;
            case 'detail':
                $this->detail($id);
                $this->addToCart($id);
                break;
            case 'showCart':
                $this->showCart();
                break;
            case 'cart':
                $this->addToCart($id);
                break;
            case 'deleteCartItem':
                $this->deleteCartItem($id);
                break;
            default:
                echo "404 Not Found!";
                break;
        }
    }
    public function index(){
        $listProduct = $this->product->getAllProduct();
       include_once(__DIR__. '/../Views/product.php');
    }
    public function detail($id){
        $product = $this->product->getProductById($id);
        // var_dump($product);
        include_once(__DIR__. '/../Views/productDetail.php');
    }
    
    public function addToCart($id){
        $product = $this->product->getProductById($id);
        $item_id= rand();
        if(isset($_POST['addToCart'])){
            if(isset($_SESSION['shoppingCart'])){
                // var_dump($_SESSION['shoppingCart']);
                $item_array_id = array_column($_SESSION['shoppingCart'], '$item_id');
                if (!in_array($_GET['id'], $item_array_id)){
                    $count= count($_SESSION['shoppingCart']);
                    $item_array = array(
                        'item_id' => $item_id,
                        'item_name'=>  $product['name'],
                        'item_quantity' => $_POST['quantity'],
                        'item_size' => $_POST['size'],
                        'item_price' =>$product['price']

                    );
                $_SESSION['shoppingCart'][$count] = $item_array;
                
                }
                else{
                    // echo "hihih";
                }
            }
            else{
                $item_array = array(
                    'item_id' => $_GET['id'],
                    'item_name'=>  $product['name'],
                    'item_quantity' => $_POST['quantity'],
                    'item_size' => $_POST['size'],
                    'item_price' =>$product['price']

                );
            $_SESSION['shoppingCart'][0] = $item_array;
            }
        }
        // if(isset($_GET['action'])){
        //     if ($_GET['action']='deleteCartItem'){
        //         foreach ($_SESSION['shoppingCart'] as $keys=>$values) {
        //             if($values['item_id']==$_GET['id']){
        //                 unset($_SESSION['shoppingCart'][$keys]);
        //             }
        //         }
        //     }
        // }
        
        include_once(__DIR__. '/../Views/productDetail.php');
    }
    public function showCart(){
        $vouchers = $this->product->getVoucher();
        // var_dump($vouchers);
        

        if(isset($_GET['action'])){
            if ($_GET['action']='showCart'){
                $id =null;
                if (isset($_POST['submitVoucher'])){
                    $id = $_POST['voucher'];
                    // var_dump ($_POST['voucher']);
                    
                }
                // var_dump($id);
                $getVoucher = $this->product->getVoucherById($id);
                // var_dump($getVoucher,'?????????');
        include_once(__DIR__. '/../Views/cart.php');
            }
        } 
       
        
    }
    public function deleteCartItem(){
          if(isset($_GET['action'])){
            if ($_GET['action']='deleteCartItem'){
                foreach ($_SESSION['shoppingCart'] as $keys=>$values) {
                    if($values['item_id']==$_GET['id']){
                        unset($_SESSION['shoppingCart'][$keys]);
                        echo '<script>window.location="http://localhost:8080?action=showCart"</script>';
                    }
                }
            }
        }
    }

}