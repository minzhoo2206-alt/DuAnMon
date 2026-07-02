<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../Config/db.php';

$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
if (substr($basePath, -10) === '/App/admin') {
    $basePath = dirname(dirname($basePath));
}
$basePath = $basePath === '/' ? '' : $basePath;
$adminLoginAction = $basePath . '/index.php?url=admin';

$db = new DB();
$pdo = $db->connect();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM Admin WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    $passwordMatches = false;
    if ($admin) {
        $storedPassword = (string) ($admin['password'] ?? '');
        $passwordMatches = password_verify($password, $storedPassword);

        if (!$passwordMatches && hash_equals($storedPassword, $password)) {
            $passwordMatches = true;
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $updateStmt = $pdo->prepare("UPDATE Admin SET password = ? WHERE username = ?");
            $updateStmt->execute([$newHash, $admin['username']]);
        }
    }

    if ($admin && $passwordMatches) {
        $_SESSION['admin'] = $admin['username'];
        header("Location: " . $adminLoginAction);
        exit;
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}

include 'formLogin.php';
