<?php
require_once(__DIR__ . '/../Models/product.php');

class ProductController
{
    protected $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function handle()
    {
        $action = $_GET['action'];
        $id = $_GET['id'];
        switch ($action) {
            case  '':
                $this->index();
                // var_dump($_POST['buyNow']);
                break;
            case 'detail':
                $this->detail($id);
                $this->addToCart($id);
                break;
            case 'showCart':
                $this->showCart();
                if (isset($_POST['deleteItem'])) {
                    $this->deleteCartItem();
                }
                if (isset($_POST['buy'])) {
                    $this->order();
                }
                break;
            case 'cart':
                $this->addToCart($id);
                break;
            case 'deleteCartItem':
                $this->deleteCartItem($id);
                break;
                // case 'admin':
                //     $this->indexAdmin();
                //     break;
            default:
                echo "404 Not Found!";
                break;
        }
    }
    public function index()
    {
        $listProduct = $this->product->getAllProduct();
        include_once(__DIR__ . '/../Views/product.php');
    }
    public function detail($id)
    {
        $product = $this->product->getProductById($id);
        // var_dump($product);
        include_once(__DIR__ . '/../Views/productDetail.php');
    }
    public function buyNow($id_product)
    {
        $product = $this->product->getProductById($id_product);
        $id = $_POST['product_id'];
        $item_id = rand();

        if (isset($_POST['buyNow'])) {
            if (isset($_SESSION['shoppingCart'])) {
                // var_dump($_SESSION['shoppingCart']);
                $item_array_id = array_column($_SESSION['shoppingCart'], '$item_id');
                if (!in_array($id, $item_array_id)) {
                    $count = count($_SESSION['shoppingCart']);
                    $item_array = array(
                        'item_id' => $item_id,
                        'item_name' =>  $product['name'],
                        'item_image' => $product['image'],
                        'item_quantity' => '1',
                        'item_size' => 'S',
                        'item_price' => $product['price']

                    );
                    $_SESSION['shoppingCart'][$count] = $item_array;
                } else {
                    // echo "hihih";
                }
            } else {
                $item_array = array(
                    'item_id' => $item_id,
                    'item_name' =>  $product['name'],
                    'item_quantity' => '1',
                    'item_size' => 'S',
                    'item_price' => $product['price']

                );
                $_SESSION['shoppingCart'][0] = $item_array;
            }
        }
    }
    public function addToCart($id)
    {
        $product = $this->product->getProductById($id);
        $item_id = rand();
        // var_dump($product);
        if (isset($_POST['addToCart'])) {
            if (isset($_SESSION['shoppingCart'])) {
                // var_dump($_SESSION['shoppingCart']);
                $item_array_id = array_column($_SESSION['shoppingCart'], '$item_id');
                if (!in_array($_GET['id'], $item_array_id)) {
                    $count = count($_SESSION['shoppingCart']);

                    $item_array = array(
                        'item_id' => $item_id,
                        'item_name' =>  $product['name'],
                        'item_image' => $product['image'],
                        'item_quantity' => $_POST['quantity'],
                        'item_size' => $_POST['size'],
                        'item_price' => $product['price']

                    );

                    $_SESSION['shoppingCart'][$count] = $item_array;
                } else {
                    // echo "hihih";
                }
            } else {
                $item_array = array(
                    'item_id' => $item_id,
                    'item_name' =>  $product['name'],
                    'item_quantity' => $_POST['quantity'],
                    'item_size' => $_POST['size'],
                    'item_price' => $product['price']

                );
                $_SESSION['shoppingCart'][0] = $item_array;
            }
            echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng!")</script>';
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

        include_once(__DIR__ . '/../Views/productDetail.php');
    }
    public function showCart()
    {
        $vouchers = $this->product->getVoucher();
        // var_dump($vouchers);


        if (isset($_GET['action'])) {
            if ($_GET['action'] = 'showCart') {
                if (isset($_POST['buyNow'])) {
                    $id_product = $_POST['product_id'];
                    $this->buyNow($id_product);
                }
                $id = null;
                if (isset($_POST['submitVoucher'])) {
                    $id = $_POST['voucher'];
                    // var_dump ($_POST['voucher']);

                }
                // var_dump($id);
                $getVoucher = $this->product->getVoucherById($id);
                // var_dump($getVoucher,'?????????');
                include_once(__DIR__ . '/../Views/cart.php');
            }
        }
    }
    public function deleteCartItem()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] = 'showCart') {
                if (isset($_POST['deleteItem']))
                    foreach ($_SESSION['shoppingCart'] as $keys => $values) {
                        if ($values['item_id'] == $_POST['delete_item_id']) {
                            unset($_SESSION['shoppingCart'][$keys]);
                            echo '<script>window.location="http://localhost:8080?action=showCart"</script>';
                        }
                    }
            }
        }
    }
    public function order()
    {
        $orders = $this->product->addOrder();
        echo '<script>alert("Đặt hàng thành công!")</script>';
    }
}
