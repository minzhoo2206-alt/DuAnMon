<h1>Chào mừng bạn đến với website</h1>
<p>Dưới đây là danh sách sản phẩm:</p>

<div class="row row-cols-1 row-cols-md-4 g-4 px-5">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $product['image'] ?>" class="card-img-top w-25 mx-auto" alt="<?= $product['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['title'] ?></h5>
                        <p class="card-text"><?= $product['description'] ?></p>
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