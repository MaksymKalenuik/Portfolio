<div class="general_content">
    <div class="container">
        <div class="block col-sm-9 col-xs-12">

            <div class="page-header">
                <h2>Categories list</h2>
            </div>
            <?php if (count($categories) > 0) : ?>

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2" class="active">Actions</th>
                    </tr>
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td><?= $category['id']; ?></td>
                            <td><?= $category['category_name']; ?></td>
                            <td class="active"><a
                                        href="/kaleniyk/shop/categories/edit/?id=<?= $category['id']; ?>">Edit</a>
                            </td>
                            <td class="active"><a
                                        href="/kaleniyk/shop/categories/delete/?id=<?= $category['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="/kaleniyk/shop/categories/add"
                   class="btn btn-default pull-right add-new-btn">Add new category</a>

            <?php else : ?>
                <span>You don't have any categories.
    Do you want to <a href="/kaleniyk/shop/categories/add">add</a> some one?</span>
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
