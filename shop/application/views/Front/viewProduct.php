<div class="general_content">
    <div class="container">
        <div class="page-header">
            <h2>
                <?= $product['product_name'] ?>
            </h2>
        </div>

        <div class="col-xs-6 product-details-photo">
            <img src="<?= '/kaleniyk/shop/source/images/' . $product['image']; ?>">
        </div>
        <div class="col-xs-6 product-details-page">
            <h4><?= $product['product_name'] ?></h4>
            <div class="product-information">
                <span>Sku: <?= $product['sku']; ?></span>
                <span>Price: <?= $product['price']; ?></span>
                <span>Qty: <?= $product['qty']; ?></span>
            </div>
            <a href="/kaleniyk/shop/front/view/?id=<?= $product['category_id'] ?>">
                Go to
                category </a>

        </div>

        <div class="col-xs-12 product-details-description">
            <h4>Description</h4>
            <?= $product['description']; ?>
        </div>
    </div>
</div>