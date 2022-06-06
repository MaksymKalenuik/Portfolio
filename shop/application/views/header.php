<div class="header">
    <nav class="logo col-md-2 col-xs-12 navbar">
        <a href="/kaleniyk/shop/front/home">
            <img src="/kaleniyk/shop/source/images/1234/logo/1.png"/>
            <!--            <img src="/kaleniyk/shop/source/images/photo_2017-12-01_13-57-24.jpg">-->
        </a>
    </nav>
    <!--    <div class=" col-sm-6 col-xs-12">-->
    <nav class="menu col-md-5 col-xs-12 navbar">
        <div class="container-fluid">
            <ul class="list-unstyled list-inline">
                <li><a class="btn btn-link"
                       href="/kaleniyk/shop/front/home">Home</a></li>
                <li><a class="btn btn-link"
                       href="/kaleniyk/shop/front/categories">Categories</a></li>
                <li><a class="btn btn-link"
                       href="/kaleniyk/shop/front/about">About us</a>
                <li><a class="btn btn-link"
                       href="/kaleniyk/shop/front/contact">Contact us</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--    </div>-->
    <nav class="account_links col-md-5 col-xs-12 navbar">
        <?php if (!empty($_SESSION['loggedUser'])) : ?>
            <a class="btn btn-link col-xs-3 col-xs-12" href="/kaleniyk/shop/users/account">Account</a>
            <a class="btn btn-link col-xs-3 col-xs-12" href="/kaleniyk/shop/users/logout">LogOut</a>

            <div class="social col-xs-6 col-xs-12">
                <a class="btn btn-link facebook" href="https://facebook.com">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a class="btn btn-link twitter" href="https://twitter.com">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a class="btn btn-link instagram" href="https://instagram.com">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </div>
        <?php else : ?>
            <a class="btn btn-link col-xs-3 col-xs-12" href="/kaleniyk/shop/users/index">LogIn</a>
            <a class="btn btn-link col-xs-3 col-xs-12" href="/kaleniyk/shop/users/registration">SignUp</a>
            <div class="social col-xs-6 col-xs-12">
                <a class="btn btn-link facebook" href="https://facebook.com">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a class="btn btn-link twitter" href="https://twitter.com">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a class="btn btn-link instagram" href="https://instagram.com">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </div>
        <?php endif; ?>
    </nav>
</div>