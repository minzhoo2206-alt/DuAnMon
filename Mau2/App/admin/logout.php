<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
if (substr($basePath, -10) === '/App/admin') {
    $basePath = dirname(dirname($basePath));
}
$basePath = $basePath === '/' ? '' : $basePath;

session_unset();
session_destroy();
header("Location: " . $basePath . "/index.php?url=admin");
exit;
