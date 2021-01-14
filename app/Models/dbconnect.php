<?php
class Connect
{
    public function DbConnect()
    {
        $conn = new PDO("mysql:host=mysql; dbname=product", 'root', 'htactive');
        return $conn;
    }
}
?>