<?php if (!empty($product)): ?>
    <h1 class="text-center mb-4"><?= htmlspecialchars($product['title']) ?></h1>

    <div class="card mx-auto" style="max-width: 400px;">
        <img src="<?= htmlspecialchars($product['image']) ?>" 
             class="card-img-top img-fluid" 
             alt="<?= htmlspecialchars($product['title']) ?>">
        <div class="card-body">
            <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
        </div>
    </div>

    <div class="text-center mt-4">
        <?php if (isset($_GET['from']) && $_GET['from'] === 'dashboard'): ?>
            <a href="index.php?url=dashboard" class="btn btn-secondary">⬅️ Quay lại Dashboard</a>
        <?php else: ?>
            <a href="index.php?url=home" class="btn btn-secondary">⬅️ Quay lại Home</a>
        <?php endif; ?>
    </div>
<?php else: ?>
    <p>Không tìm thấy sản phẩm.</p>
<?php endif; ?>
