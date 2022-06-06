<div class="general_content">
    <div class="flexslider flexslider-auto">
        <ul class="slides">
            <li>
                <img src="/kaleniyk/shop/source/images/1234/logo/pop.jpg">
            </li>
            <li>
                <img src="/kaleniyk/shop/source/images/1234/logo/pips.gif">
            </li>
            <li>
                <img src="/kaleniyk/shop/source/images/1234/logo/paps.jpg">
            </li>
        </ul>
    </div>
    <div class="container center-block">
        <div class="categories">
            <h1 class="text-center">Our Categories</h1>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="cat-top">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <a href="/kaleniyk/shop/front/view/?id=3">
                                    <img src="/kaleniyk/shop/source/images/1234/categories/car.jpg"
                                         alt="">
                                </a>
                                <div class="cat bottom">
                                    <h5 class="text-center"><a href="/kaleniyk/shop/front/view/?id=3">Car</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="/kaleniyk/shop/front/view/?id=8">
                                    <img src="/kaleniyk/shop/source/images/1234/categories/acsesuars2.jpg"
                                         alt="">
                                </a>
                                <div class="cat bottom">
                                    <h5 class="text-center"><a href="/kaleniyk/shop/front/view/?id=8">Accessories for electronics</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a href="/kaleniyk/shop/front/view/?id=2">
                                    <img src="/kaleniyk/shop/source/images/1234/categories/menshoes.jpg"
                                         alt="">
                                </a>
                                <div class="cat bottom">
                                    <h5 class="text-center"><a href="/kaleniyk/shop/front/view/?id=2">Shoes men</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cat-top">
                        <div class="row">
                            <div class="cat-bottom">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <a href="/kaleniyk/shop/front/view/?id=9">
                                            <img src="/kaleniyk/shop/source/images/1234/categories/man.jpg"
                                                 alt="">
                                        </a>
                                        <div class="cat bottom">
                                            <h5 class="text-center"><a href="/kaleniyk/shop/front/view/?id=9">Men's clothing</a></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <a href="/kaleniyk/shop/front/view/?id=10">
                                            <img src="/kaleniyk/shop/source/images/1234/categories/65456.png"
                                                 alt="">
                                        </a>
                                        <div class="cat bottom">
                                            <h5 class="text-center"><a href="/kaleniyk/shop/front/view/?id=10">Hats men</a></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <a href="/kaleniyk/shop/front/view/?id=4">
                                            <img src="/kaleniyk/shop/source/images/1234/categories/123321.jpg"
                                                 alt="">
                                        </a>
                                        <div class="cat bottom">
                                            <h5 class="text-center"><a href="/kaleniyk/shop/front/view/?id=4">Shoes Women</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products-widget">
            <h2 class="text-center">Best Proposition</h2>
            <div class="widget owl-carousel">
                <?php foreach ($products as $product) : ?>
                <div class="item">
                    <a href="/kaleniyk/shop/front/viewProduct/?id=<?= $product['id']; ?>">
                        <img src="/kaleniyk/shop/source/images/<?= $product['image']; ?>">
                    </a>
                    <div class="product-details">
                        <a href="/kaleniyk/shop/front/viewProduct/?id=<?= $product['id']; ?>">
                            <?= $product['product_name']; ?>
                        </a>
                        <span class="price">
                            ₴ <?=$product['price']; ?>
                        </span>
                    </div>
                </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

