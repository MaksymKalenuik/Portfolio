<div class="general_content">
    <div class="container registration-block">
        <div class="block block-user-login col-md-9 col-xs-12">
            <div class="page-header">
                <h2>Add new customer</h2>
            </div>
            <div class="block-content">
                <form class="form form-registration" method="post" action="">
                    <fieldset class="fieldset">
                        <div class="form-group">
                            <label for="login"><span>Login</span></label>
                            <div class="control">
                                <input type="text" name="login" value="" id="login"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password"><span>Password</span></label>
                            <div class="control">
                                <input type="password" name="password" value=""
                                       id="password" class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password"><span>Confirm Password</span></label>
                            <div class="control">
                                <input type="password" name="confirm_password"
                                       value="" id="confirm_password"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email"><span>Email</span></label>
                            <div class="control">
                                <input type="email" name="email" value="" id="email"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname"><span>Firstname</span></label>
                            <div class="control">
                                <input type="text" name="firstname" value=""
                                       id="firstname"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><span>Lastname</span></label>
                            <div class="control">
                                <input type="text" name="lastname" value=""
                                       id="lastname" class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone"><span>Phone</span></label>
                            <div class="control">
                                <input type="text" name="phone" value="" id="phone"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age"><span>Age</span></label>
                            <div class="control">
                                <input type="number" name="age" value="" id="age"
                                       min="0" max="120"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex"><span>Sex</span></label>
                            <div class="control">
                                <div class="form-group">

                                    <input type="radio" name="sex" value="1"
                                           id="male" class="form-control">
                                    <label for="male">Male</label>
                                </div>
                                <div class="form-group">

                                    <input type="radio" name="sex" value="2"
                                           id="female" class="form-control">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country"><span>Country</span></label>
                            <div class="control">
                                <input type="text" name="country" value=""
                                       id="country" class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city"><span>City</span></label>
                            <div class="control">
                                <input type="text" name="city" value="" id="city"
                                       class="form-control input-text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address"><span>Address</span></label>
                            <div class="control">
                                <input type="text" name="address" value=""
                                       id="address" class="form-control input-text">
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
