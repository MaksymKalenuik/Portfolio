<div class="general_content">
    <div class="container">
        <div class="page-header">
            <h2>Account Information</h2>
        </div>
        <div class="block col-sm-8 col-xs-12">
            <div class="account_information">
                <dl class="dl-horizontal">
                    <?php foreach ($userData as $key => $value) : ?>
                        <dt><span><?= ucfirst($key) ?></span></dt>
                        <dd><span><?= $value ?></span></dd>
                    <?php endforeach; ?>
                </dl>
            </div>
        </div>
        <div class="block col-sm-4 col-xs-12">
            <div class="actions">
                <h5>Edit account information</h5>
                <a class="btn btn-link" href="/kaleniyk/shop/users/edit">Edit</a>
            </div>
            <?php if ($isAdmin) : ?>
                <h5>Manage your Store</h5>
                <ul class="list-unstyled">
                    <li><a class="btn btn-link" href="/kaleniyk/shop/categories/listCategories">List
                            Categories</a></li>
                    <li><a class="btn btn-link" href="/kaleniyk/shop/products/listProducts">List
                            Products</a></li>
                    <li><a class="btn btn-link" href="/kaleniyk/shop/customers/listCustomers">List
                            Customers</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>