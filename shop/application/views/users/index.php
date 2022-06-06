<div class="general_content">
    <div class="container login-block">
        <div class="block block-user-login col-sm-6 col-xs-12">
            <div class="page-header">
                <h2>Log In</h2>
            </div>
            <div class="block-content">
                <form class="form form-login" action="" method="post">
                    <fieldset class="fieldset">
                        <div class="field note">
                            If you have an account, please log in with your login.
                        </div>


                        <div class="form-group">
                            <label for="login"><span>Login</span></label>
                            <div class="control">
                                <input type="text" name="login" value="" id="login" class="form-control input-text">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password"><span>Password</span></label>
                            <div class="control">
                                <input type="password" name="password" value="" id="password"
                                       class="form-control input-text">
                            </div>
                        </div>

                        <div class="actions-toolbar">
                            <input type="submit" class="btn btn-default" name="send" value="Send"/>
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
        <div class="block block-new-user col-sm-6 col-xs-12">
            <div class="page-header">
                <h2>New at Store? Join Now</h2>
            </div>
            <div class="block-content">
                <p>There are many benefits to registering:
                    faster ordering, multiple address storage, tracking and
                    more.</p>
                <div class="actions-toolbar">
                    <a href="/kaleniyk/shop/users/registration/"
                       class="btn btn-default"><span>Create an account</span></a>
                </div>
            </div>
        </div>
    </div>
</div>