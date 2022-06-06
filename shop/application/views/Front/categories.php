<div class="general_content">
    <div class="container">
        <div class="page-header">
            <h2>Categories</h2>
        </div>
        <div class="col-xs-12">

            <div class="list-unstyled list-group">
                <?php foreach ($categories as $category) : ?>
<!--                    <li >-->
                        <a class="list-group-item" href="/kaleniyk/shop/front/view/?id=<?= $category['id'] ?>"><?= $category['category_name']; ?></a>
<!--                    </li>-->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>