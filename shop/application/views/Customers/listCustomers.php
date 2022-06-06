<div class="general_content">
    <div class="container">
        <div class="block col-sm-9 col-xs-12">


            <div class="page-header">
                <h2>Customers list</h2>
            </div>
            <?php if (count($customers) > 0) : ?>

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Login</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th colspan="2" class="active">Actions</th>
                    </tr>
                    <?php foreach ($customers as $customer) : ?>
                        <tr>
                            <td><?= $customer['id']; ?></td>
                            <td><?= $customer['login']; ?></td>
                            <td><?= $customer['firstname']; ?></td>
                            <td><?= $customer['lastname']; ?></td>
                            <td class="active">
                                <a href="/kaleniyk/shop/customers/edit/?id=<?= $customer['id']; ?>">Edit</a>
                            </td>
                            <td class="active">
                                <a href="/kaleniyk/shop/customers/delete/?id=<?= $customer['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <a href="/kaleniyk/shop/customers/add"
                   class="btn btn-default pull-right add-new-btn">Add new customer</a>
            <?php else : ?>
                <span>You don't have any customers.
    Do you want to <a href="/kaleniyk/shop/customers/add">add</a> some one?</span>
            <?php endif; ?>
        </div>
        <div class="block block-new-user col-sm-3 col-xs-12">
            <div class="page-header">
                <h2>Site navigation</h2>
            </div>
            <div class="actions">
                <a class="btn btn-link" href="/kaleniyk/shop/users/account">
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
