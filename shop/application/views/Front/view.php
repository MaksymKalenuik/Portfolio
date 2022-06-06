<div class="general_content">
    <div class="container">
        <div class="page-header">
            <h2>Products from category <span class="label label-primary"> <?= $categoryName ?></span></h2>
        </div>
        <div class="col-xs-12 category-page">
            <div class="list-unstyled list-group">
                <?php if (!empty($childrenCategories)) : ?>
                <h4>Subcategories</h4>
                    <?php foreach ($childrenCategories as $childrenCategory) : ?>
                        <a class="list-group-item" href="/kaleniyk/shop/front/view/?id=<?= $childrenCategory['id']; ?>"><?= $childrenCategory['category_name']; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <h4>Products</h4>
            <div class="list-unstyled list-group products-list">
                <?php foreach ($products as $product) : ?>
                    <li class="list-group-item col-xs-3">
                        <a href="/kaleniyk/shop/front/viewProduct/?id=<?= $product['id'] ?>" class="photo-block">
                            <img src="<?= '/kaleniyk/shop/source/images/' . $product['image']; ?>" >
                        </a>
                        <a href="/kaleniyk/shop/front/viewProduct/?id=<?= $product['id'] ?>"><?= $product['product_name']; ?></a>
                        <span>
                            $ <?= $product['price']; ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>