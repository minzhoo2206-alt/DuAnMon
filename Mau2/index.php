<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/Config/db.php';

$url = $_GET['url'] ?? 'home';
$protectedRoutes = ['admin', 'dashboard', 'product_add', 'product_edit', 'product_delete'];

if ($url === 'admin_logout') {
    require __DIR__ . '/App/admin/logout.php';
    exit;
}

if (in_array($url, $protectedRoutes, true) && !isset($_SESSION['admin'])) {
    require __DIR__ . '/App/admin/login.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && in_array($url, ['product_add', 'product_edit'], true)) {
    require __DIR__ . '/App/Controllers/DashboardController.php';
    $controller = new DashboardController();
    if ($url === 'product_add') {
        $controller->add();
    } else {
        $controller->edit($_GET['id'] ?? null);
    }
    exit;
}

if ($url === 'product_delete') {
    require __DIR__ . '/App/Controllers/DashboardController.php';
    $controller = new DashboardController();
    $controller->delete($_GET['id'] ?? null);
    exit;
}

require __DIR__ . '/App/Views/layout/header.php';

switch ($url) {
    case 'home':
        require __DIR__ . '/App/Controllers/HomeController.php';
        break;

    case 'admin':
    case 'dashboard':
        require __DIR__ . '/App/Controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'product':
        require __DIR__ . '/App/Controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index();
        break;

    case 'product_detail':
        require __DIR__ . '/App/Controllers/ProductController.php';
        $controller = new ProductController();
        $controller->detail($_GET['id'] ?? null);
        break;

    case 'product_add':
        require __DIR__ . '/App/Controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->add();
        break;

    case 'product_edit':
        require __DIR__ . '/App/Controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->edit($_GET['id'] ?? null);
        break;

    default:
        echo "Khong co trang nay!";
        break;
}

require __DIR__ . '/App/Views/layout/footer.php';
