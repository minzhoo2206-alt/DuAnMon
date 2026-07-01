<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4>➕ Thêm sản phẩm mới</h4>
        </div>
        <div class="card-body">
            <form method="post" action="index.php?url=product_add">
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh (URL)</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>

                <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                <a href="index.php?url=dashboard" class="btn btn-secondary">Quay lại Dashboard</a>
            </form>
        </div>
    </div>
</div>
