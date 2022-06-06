<div class="general_content">
    <div class="container registration-block">
        <div class="block block-user-login col-md-9 col-xs-12">
            <div class="page-header">
                <h2>Add new product</h2>
            </div>
            <div class="block-content">
                <form class="form" method="post" action=""
                      enctype="multipart/form-data">
                    <fieldset class="fieldset">
                        <div class="form-group">
                            <label for="product_name"><span>Name</span></label>
                            <div class="control">
                                <input type="text" name="product_name" value=""
                                       id="product_name"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sku"><span>Sku</span></label>
                            <div class="control">
                                <input type="text" name="sku" value=""
                                       id="sku"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price"><span>Price</span></label>
                            <div class="control">
                                <input type="number" name="price" value=""
                                       id="price" step="0.01"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qty"><span>Qty</span></label>
                            <div class="control">
                                <input type="number" name="qty" value=""
                                       id="qty"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"><span>Description</span></label>
                            <div class="control">
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="images"><span>Image</span></label>
                            <div class="control">
                                <input type="file" id="images" name="images" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category_id"><span>Category</span></label>
                            <div class="control">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="0">Please, select category...</option>
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
                   href="/kaleniyk/shop/products/listProducts">
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
