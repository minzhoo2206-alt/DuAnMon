<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// ket noi database
require_once __DIR__ . '/Config/db.php';

// Views - layout
require __DIR__ . '/App/Views/layout/header.php';




$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'home':
        require __DIR__ . '/App/Controllers/HomeController.php';
        break;
    case 'dashboard':
        require __DIR__ . '/App/Controllers/DashboardController.php';
        break;
    case 'product':
        require __DIR__ . '/App/Controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index();
        break;
    case 'product_detail':
        require_once __DIR__ . '/App/Controllers/ProductController.php';
        $controller = new ProductController();
        $id = $_GET['id'] ?? null;
        $controller->detail($id);
        break;
    case 'product_add':
        require __DIR__ . '/App/Controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->add();
        break;

    case 'product_edit':
        require __DIR__ . '/App/Controllers/DashboardController.php';
        $controller = new DashboardController();
        $id = $_GET['id'] ?? null;
        $controller->edit($id);
        break;

    case 'product_delete':
        require __DIR__ . '/App/Controllers/DashboardController.php';
        $controller = new DashboardController();
        $id = $_GET['id'] ?? null;
        $controller->delete($id);
        break;
    default:
        echo "Khong co trang nay !!!";
        break;
}



// Views - layout
require __DIR__ . '/App/Views/layout/footer.php';
