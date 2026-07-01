<h1>Danh sách sản phẩm</h1>

<div class="row row-cols-1 row-cols-md-4 g-4 px-5">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= htmlspecialchars($product['image']) ?>" 
                         class="card-img-top img-fluid w-50 mx-auto" 
                         alt="<?= htmlspecialchars($product['title']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                    </div>
                    <a href="index.php?url=product_detail&id=<?= $product['id'] ?>" 
                       class="btn btn-info">
                       Xem chi tiết
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Chưa có sản phẩm nào.</p>
    <?php endif; ?>
</div>
