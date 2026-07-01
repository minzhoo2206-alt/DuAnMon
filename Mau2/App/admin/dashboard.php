<div class="container mt-5">
    <h1 class="mb-4">Quản lý sản phẩm</h1>

    <!-- Nút thêm sản phẩm -->
    <div class="mb-3">
        <a href="index.php?url=product_add" class="btn btn-success">
            ➕ Thêm sản phẩm
        </a>
    </div>

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
                            <!-- Các nút điều hướng sang page riêng -->
                            <a href="index.php?url=product_edit&id=<?= $product['id'] ?>"
                                class="btn btn-warning btn-sm mb-1">✏️ Sửa</a>
                            <a href="index.php?url=product_delete&id=<?= $product['id'] ?>"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">🗑️ Xóa</a>
                            <a href="index.php?url=product_detail&id=<?= $product['id'] ?>&from=dashboard"
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