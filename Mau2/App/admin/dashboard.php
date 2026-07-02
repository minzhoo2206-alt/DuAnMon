<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?url=admin");
    exit;
}
?>

<div class="container mt-5">
    <h1 class="mb-4">Xin chào Admin <?= htmlspecialchars($_SESSION['admin']) ?>!</h1>
    <div class="mb-3">
        <a href="index.php?url=product_add" class="btn btn-success">Thêm sản phẩm</a>
        <a href="index.php?url=admin_logout" class="btn btn-danger">Đăng xuất</a>
    </div>

    <!-- Quản lý sản phẩm -->
    <?php if (!empty($products)): ?>
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="text-center"><?= $product['id'] ?></td>
                        <td><?= htmlspecialchars($product['title']) ?></td>
                        <td><?= htmlspecialchars($product['description']) ?></td>
                        <td class="text-center">
                            <img src="<?= htmlspecialchars($product['image']) ?>"
                                alt="<?= htmlspecialchars($product['title']) ?>"
                                style="width:80px; height:auto;">
                        </td>
                        <td class="text-center">
                            <a href="index.php?url=product_edit&id=<?= $product['id'] ?>"
                                class="btn btn-warning btn-sm mb-1">✏️ Sửa</a>
                            <a href="index.php?url=product_delete&id=<?= $product['id'] ?>"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">🗑️ Xóa</a>
                            <a href="index.php?url=product_detail&id=<?= $product['id'] ?>&from=admin"
                                class="btn btn-info btn-sm">👁️ Xem chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">Chưa có sản phẩm nào.</p>
    <?php endif; ?>
</div>
