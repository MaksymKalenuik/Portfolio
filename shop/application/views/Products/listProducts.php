<div class="general_content">
    <div class="container">
        <div class="block col-sm-9 col-xs-12">


            <div class="page-header">
                <h2>Products list</h2>
            </div>
            <?php if (count($products) > 0) : ?>

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Sku</th>
                        <th>Price</th>
                        <th colspan="2" class="active">Actions</th>
                    </tr>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product['id']; ?></td>
                            <td><?= $product['product_name']; ?></td>
                            <td><?= $product['sku']; ?></td>
                            <td><?= $product['price']; ?></td>
                            <td class="active">
                                <a href="/kaleniyk/shop/products/edit/?id=<?= $product['id']; ?>">Edit</a>
                            </td>
                            <td class="active">
                                <a href="/kaleniyk/shop/products/delete/?id=<?= $product['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <a href="/kaleniyk/shop/products/add"
                   class="btn btn-default pull-right add-new-btn">Add new product</a>
            <?php else : ?>
                <span>You don't have any products.
    Do you want to <a href="/kaleniyk/shop/products/add">add</a> some one?</span>
            <?php endif; ?>
        </div>
        <div class="block block-new-user col-sm-3 col-xs-12">
            <div class="page-header">
                <h2>Site navigation</h2>
            </div>
            <div class="actions">
                <a class="btn btn-link" href="/kaleniyk/shop/users/account"><
                    Back</a>
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
