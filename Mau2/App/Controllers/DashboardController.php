<?php
require_once __DIR__ . '/../../Config/db.php';
require_once __DIR__ . '/../Models/ProductModel.php';

class DashboardController {
    private $productModel;

    public function __construct() {
        $db = new DB();
        $this->productModel = new ProductModel($db->connect());
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        include __DIR__ . '/../admin/dashboard.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $this->productModel->createProduct($title, $description, $image);
            header("Location: index.php?url=dashboard");
        } else {
            include __DIR__ . '/../admin/product_add.php';
        }
    }

    public function edit($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $this->productModel->updateProduct($id, $title, $description, $image);
        header("Location: index.php?url=dashboard");
    } else {
        // Lấy sản phẩm theo ID
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include __DIR__ . '/../admin/product_edit.php';
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    }
}

    public function delete($id) {
        $this->productModel->deleteProduct($id);
        header("Location: index.php?url=dashboard");
    }
}

$controller = new DashboardController();
$controller->index();