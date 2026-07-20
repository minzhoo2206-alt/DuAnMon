<?php
include_once "./Mau2/App/Views/pages/catergory.php";
// 1. Khai báo thông tin kết nối Database
$host = '103.57.220.210';
$dbname = 'fnxxiqfbhosting_ASM'; // Thay tên database của bạn vào đây
$username = 'fnxxiqfbhosting_Group_NMN';        // Thay tên tài khoản của bạn (mặc định XAMPP/WAMP là root)
$password = '_}%I;bXl^8*+/tb'; // Thay mật khẩu của bạn (mặc định XAMPP để trống '')

try {
    // 2. Kết nối đến Database sử dụng PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Tự động trả về mảng kết hợp
    ]);

    // 3. Viết câu lệnh SQL lấy dữ liệu từ bảng category
    $sql = "SELECT * FROM `Products`;";
    $stmt = $pdo->query($sql);

    // 4. Lấy tất cả dữ liệu xuống dưới dạng mảng
    $categories = $stmt->fetchAll();

} catch (PDOException $e) {
    // Xử lý nếu kết nối hoặc truy vấn lỗi
    die("Lỗi kết nối database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Category</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        tr:hover { background-color: #f9f9f9; }
    </style>
</head>
<body>

    <h2>Danh sách dữ liệu từ bảng Product</h2>

    <?php if (count($categories) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Product_id</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Catergory_id</th>

                </tr>
            </thead>
            <tbody>
                <!-- 5. Duyệt mảng dữ liệu để hiển thị ra các dòng trong bảng -->
                <?php foreach ($categories as $cat): ?>
                    <tr>
                        <td><?= htmlspecialchars($cat['product_id']) ?></td>
                        <td><?= htmlspecialchars($cat['product_name']) ?></td>
                        <td><?= htmlspecialchars($cat['price']) ?></td>
                        <td><?= htmlspecialchars($cat['category_id']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có dữ liệu nào trong bảng category.</p>
    <?php endif; ?>

</body>
</html>