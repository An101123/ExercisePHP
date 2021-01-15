<?php
require_once(__DIR__. '/dbconnect.php');
class Product extends Connect{
    protected $conn;
    public function __construct()
    {
        $this->conn = $this->DbConnect();
        
    }
    public function getAllProduct(){

        $sql = $this->conn->prepare('SELECT * FROM product');
        $sql->execute();
        $product = $sql->fetchAll();
        return $product;
    }
    public function getProductById($id){
        $sql = $this->conn->prepare('SELECT * FROM product WHERE id=:id');
        $sql->execute(['id' => $id]);
        $product = $sql->fetch();
        return $product;
    }
    public function getVoucher(){
        $sql = $this->conn->prepare('SELECT * FROM voucher');
        $sql->execute();
        $vouchers = $sql->fetchAll();
        return $vouchers;
    }
    public function getVoucherById($id)
    {
        $sql = $this->conn->prepare('SELECT * FROM voucher WHERE id=:id');
        $sql->execute(['id' => $id]);
        $voucherById = $sql->fetch();
        return $voucherById;
    }
    public function addOrder(){
        if (!empty($_SESSION['shoppingCart'])) {
            foreach ($_SESSION['shoppingCart'] as $values) {
                // var_dump($values);
                $data = [
                    'id' => $values['item_id'],
                    'item_name' => $values['item_name'],
                    'price' => $values['item_price'],
                    'quantity' => $values['item_quantity'],
                    'size' => $values['item_size'],
                ];
                $sql = "INSERT INTO orderdetail (id, name, quantity, size, price) VALUES (:id, :item_name, :quantity, :size, :price)";
                $order= $this->conn->prepare($sql);
                $order->execute($data);
            }
        }
       
    }
}
?>