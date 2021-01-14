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
}
?>