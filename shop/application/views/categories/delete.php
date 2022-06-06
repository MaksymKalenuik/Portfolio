<div class="general_content">
    <div class="container">
        <div class="block col-md-9 col-xs-12">
            <div class="page-header">
                <h2>Delete category</h2>
            </div>
            <span class="delete-comment">Do you really want to delete <?= $categoryName; ?> category?</span>
            <div class="block-content delete-forms">
                <form action="" method="post" class="col-xs-1">
                    <fieldset class="fieldset">
                        <div class="form-group">
                            <input type="submit" value="Yes" name="yes"
                                   class="btn btn-default">
                        </div>
                    </fieldset>
                </form>
                <form action="" method="post" class="col-xs-1">
                    <fieldset class="fieldset">
                        <div class="form-group">

                            <input type="submit" value="No" name="no"
                                   class="btn btn-default">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="block block-new-user col-md-3 col-xs-12">
            <div class="page-header">
                <h2>Site navigation</h2>
            </div>
            <div class="actions">
                <a class="btn btn-link" href="/kaleniyk/shop/categories/listCategories">
                    < Back
                </a>
            </div>
            <h5>Manage your Store</h5>
            <ul class="list-unstyled">
                <li><a class="btn btn-link"
                       href="/kaleniyk/shop/categories/listCategories">List
                        Categories</a></li>
                <li><a class="btn btn-link"
                       href="/kaleniyk/shop/products/listProducts">List
                        Products</a></li>
                <li><a class="btn btn-link"
                       href="/kaleniyk/shop/customers/listCustomers">List
                        Customers</a></li>
            </ul>
        </div>
    </div>
</div>