<?php
require_once __DIR__ . '/../../Config/db.php';
require_once __DIR__ . '/../Models/ProductModel.php';

class HomeController {
    private $productModel;

    public function __construct() {
        $db = new DB();
        $this->productModel = new ProductModel($db->connect());
    }

    public function index() {
        // Lấy danh sách sản phẩm
        $products = $this->productModel->getAllProducts();

        // Truyền sang view home.php
        include __DIR__ . '/../Views/pages/home.php';
    }
}



$controller = new HomeController();
$controller->index();
