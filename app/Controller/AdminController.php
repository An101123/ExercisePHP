<?php
// require_once(__DIR__.'/../Models/product.php');
class Route{
    public function handle(){
    switch ($_SERVER['REQUEST_URI']) {
        case '/' :
            require __DIR__ . '../Views/index.php';
            break;
   
        case '/admin' :
            require __DIR__ . '../Views/Admin/index.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/views/404.php';
            break;
    }
}
}