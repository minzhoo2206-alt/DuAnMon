<?php
require_once __DIR__ . '/../../Config/db.php';
require_once __DIR__ . '/../Models/ProductModel.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $db = new DB();
        $this->productModel = new ProductModel($db->connect());
    }

    public function index()
    {
        $products = $this->productModel->getAllProducts();
        include __DIR__ . '/../admin/product.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        include __DIR__ . '/../Views/pages/product_detail.php';
    }

    public function detail($id)
    {
        if ($id) {
            $product = $this->productModel->getProductById($id);
            if ($product) {
                include __DIR__ . '/../Views/pages/product_detail.php';
            } else {
                echo "Không tìm thấy sản phẩm.";
            }
        } else {
            echo "Thiếu ID sản phẩm.";
        }
    }
}

