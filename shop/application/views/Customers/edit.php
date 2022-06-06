<div class="general_content">
    <div class="container registration-block">
        <div class="block block-user-login col-md-9 col-xs-12">
            <div class="page-header">
                <h2>Edit customer</h2>
            </div>
            <div class="block-content">
                <form method="post" action="">

                    <fieldset class="fieldset">
                        <div class="form-group">
                            <label for="login"><span>Login</span></label>
                            <input type="text" name="login"
                                   value="<?= $currentCustomer['login']; ?>" id="login"
                                   disabled
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="email"><span>Email</span></label>
                            <input type="email" name="email"
                                   value="<?= $currentCustomer['email'] ?>" id="email"
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="firstname"><span>Firstname</span></label>
                            <input type="text" name="firstname"
                                   value="<?= $currentCustomer['firstname'] ?>"
                                   id="firstname" class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="lastname"><span>Lastname</span></label>
                            <input type="text" name="lastname"
                                   value="<?= $currentCustomer['lastname'] ?>" id="lastname"
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="phone"><span>Phone</span></label>

                            <input type="text" name="phone"
                                   value="<?= $currentCustomer['phone'] ?>"
                                   id="phone" class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="age"><span>Age</span></label>

                            <input type="number" name="age"
                                   value="<?= $currentCustomer['age'] ?>"
                                   id="age" min="0" max="120"
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="sex"><span>Sex</span></label>
                            <div class="control">
                                <div class="form-group">
                                    <input type="radio" name="sex" value="1"
                                           id="male" <?= ($currentCustomer['sex'] == 1) ? 'checked' : ''; ?>
                                           class="form-control input-text">
                                    <label for="male"><span>Male</span></label>

                                    <input type="radio" name="sex" value="2"
                                           id="female" <?= ($currentCustomer['sex'] == 2) ? 'checked' : ''; ?>
                                           class="form-control input-text">
                                    <label for="female"><span>Female</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country"><span>Country</span></label>
                            <input type="text" name="country"
                                   value="<?= $currentCustomer['country'] ?>" id="country"
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="city"><span>City</span></label>
                            <input type="text" name="city"
                                   value="<?= $currentCustomer['city'] ?>"
                                   id="city" class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="address"><span>Address</span></label>
                            <input type="text" name="address"
                                   value="<?= $currentCustomer['address'] ?>" id="address"
                                   class="form-control input-text">
                        </div>
                        <input type="submit" name="send" value="Send"  class="btn btn-default" >
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
                <a class="btn btn-link" href="/kaleniyk/shop/customers/listCustomers">
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
