<div class="general_content">
    <div class="container registration-block">
        <div class="block block-user-login col-md-9 col-xs-12">
            <div class="page-header">
                <h2>Add new category</h2>
            </div>
            <div class="block-content">
                <form class="form" method="post" action="">
                    <fieldset class="fieldset">

                        <div class="form-group">
                            <label for="category_name"><span>Name</span></label>
                            <div class="control">
                                <input type="text" name="category_name" value=""
                                       id="category_name"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="parent"><span>Parents</span></label>
                            <div class="control">
                                <select name="parent" id="parent"
                                        class="form-control input-select">
                                    <option value="0">Please, select parent...
                                    </option>
                                    <?php if (!empty($categories)) : ?>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>

                            </div>
                        </div>
                        <div class="actions-toolbar">
                            <input type="submit" class="btn btn-default"
                                   name="send" value="Send"/>
                        </div>
                    </fieldset>
                </form>
                <?php
                foreach ($errors as $error) {
                    echo $error . '<br>';
                }
                ?>
            </div>
        </div>
        <div class="block block-new-user col-md-3 col-xs-12">
            <div class="page-header">
                <h2>Site navigation</h2>
            </div>
            <div class="actions">
                <a class="btn btn-link"
                   href="/kaleniyk/shop/categories/listCategories">
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
