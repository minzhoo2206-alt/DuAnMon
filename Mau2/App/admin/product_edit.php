<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-warning text-dark">
            <h4>✏️ Sửa sản phẩm</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($product)): ?>
            <form method="post" action="index.php?url=product_edit&id=<?= $product['id'] ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="<?= htmlspecialchars($product['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($product['description']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh (URL)</label>
                    <input type="text" class="form-control" id="image" name="image" 
                           value="<?= htmlspecialchars($product['image']) ?>" required>
                </div>

                <button type="submit" class="btn btn-warning">Cập nhật</button>
                <a href="index.php?url=dashboard" class="btn btn-secondary">Quay lại Dashboard</a>
            </form>
            <?php else: ?>
                <p class="text-danger">Không tìm thấy sản phẩm.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
