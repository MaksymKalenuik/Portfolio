<div class="general_content">
    <div class="container registration-block">
        <div class="block block-user-login col-sm-6 col-xs-12">
            <div class="page-header">
                <h2>Edit account</h2>
            </div>
            <div class="block-content">
                <form method="post" action="/kaleniyk/shop/users/edit">

                    <fieldset class="fieldset">
                        <div class="form-group">
                            <label for="login"><span>Login</span></label>
                            <input type="text" name="login"
                                   value="<?= $userData['login']; ?>" id="login"
                                   disabled
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="email"><span>Email</span></label>
                            <input type="email" name="email"
                                   value="<?= $userData['email'] ?>" id="email"
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="firstname"><span>Firstname</span></label>
                            <input type="text" name="firstname"
                                   value="<?= $userData['firstname'] ?>"
                                   id="firstname" class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="lastname"><span>Lastname</span></label>
                            <input type="text" name="lastname"
                                   value="<?= $userData['lastname'] ?>" id="lastname"
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="phone"><span>Phone</span></label>

                            <input type="text" name="phone"
                                   value="<?= $userData['phone'] ?>"
                                   id="phone" class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="age"><span>Age</span></label>

                            <input type="number" name="age"
                                   value="<?= $userData['age'] ?>"
                                   id="age" min="0" max="120"
                                   class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="sex"><span>Sex</span></label>
                            <div class="control">
                                <div class="form-group">
                                    <input type="radio" name="sex" value="1"
                                           id="male" <?= ($userData['sex'] == 1) ? 'checked' : ''; ?>
                                           class="form-control input-text">
                                    <label for="male"><span>Male</span></label>

                                    <input type="radio" name="sex" value="2"
                                           id="female" <?= ($userData['sex'] == 2) ? 'checked' : ''; ?>
                                           class="form-control input-text">
                                    <label for="female"><span>Female</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country"><span>Country</span></label>
                        <input type="text" name="country"
                               value="<?= $userData['country'] ?>" id="country"
                               class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="city"><span>City</span></label>
                        <input type="text" name="city"
                               value="<?= $userData['city'] ?>"
                               id="city" class="form-control input-text">
                        </div>
                        <div class="form-group">
                            <label for="address"><span>Address</span></label>
                        <input type="text" name="address"
                               value="<?= $userData['address'] ?>" id="address"
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

        <div class="block block-new-user col-sm-6 col-xs-12">
            <div class="page-header">
                <h2>Go back?</h2>
            </div>
            <div class="block-content">
                <div class="actions-toolbar">
                    <a href="/kaleniyk/shop/users/account/"
                       class="btn btn-link"><span>Back</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
