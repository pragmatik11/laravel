<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts/header')
    <link href="css/product.css" rel="stylesheet">
</head>
@include('layouts/navbar')

<body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <div id="wrapper">
        <div class="row">
            <div class="col-10">
                <div id="grid-selector">
                    <div id="grid-menu">
                        View:
                        <ul>
                            <li class="largeGrid"><a href=""></a></li>
                            <li class="smallGrid"><a class="active" href=""></a></li>
                        </ul>
                    </div>

                    Showing 1–9 of 48 results
                </div>

                <div id="grid">
                    <div class="row">
                        <?php foreach ($data['cat_products'] as $cat_prod) {  ?>
                            <h1 class="product_cat"><?= $cat_prod->name  ?></h1>
                            <?php foreach ($cat_prod->products as $prod) { ?>

                                <div class="product">
                                    <div class="info-large">
                                        <h4><?= $prod->name  ?></h4>
                                        <div class="sku">
                                            PRODUCT SKU: <strong>89356</strong>
                                        </div>

                                        <div class="price-big">
                                            <span>$43</span> <?= $data['currency']; ?> <?= number_format($prod->price, 2) ?>
                                        </div>
                                        <button class="add-cart-large">Add To Cart</button>

                                    </div>
                                    <div class="make3D">
                                        <div class="product-front">
                                            <div class="shadow"></div>
                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1.jpg" alt="" />
                                            <div class="image_overlay"></div>
                                            <input style="display:none" id="product_id" value="<?= $prod->id ?>">
                                            <div class="add_to_cart">Add to cart</div>
                                            <div class="view_gallery">View gallery</div>
                                            <div class="stats">
                                                <div class="stats-container">
                                                    <span class="product_price"><?= $data['currency']; ?> <?= number_format($prod->price, 2) ?></span>
                                                    <span class="product_name"><?= $prod->name  ?></span>
                                                    <p><?= $prod->description  ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-back">
                                            <div class="shadow"></div>
                                            <div class="carousel">
                                                <ul class="carousel-container">
                                                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1.jpg" alt="" /></li>
                                                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/2.jpg" alt="" /></li>
                                                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/3.jpg" alt="" /></li>
                                                </ul>
                                                <div class="arrows-perspective">
                                                    <div class="carouselPrev">
                                                        <div class="y"></div>
                                                        <div class="x"></div>
                                                    </div>
                                                    <div class="carouselNext">
                                                        <div class="y"></div>
                                                        <div class="x"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flip-back">
                                                <div class="cy"></div>
                                                <div class="cx"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            <?php  } ?>
                        <?php   }  ?>



                    </div>
                </div>
            </div>
            <div class="col-2">
                <div id="sidebar">
                    <div class="cart-icon-top">
                    </div>

                    <div class="cart-icon-bottom">
                    </div>

                    <div id="checkout">
                        CHECKOUT
                    </div>
                    <h3>CART</h3>
                    <div id="cart">

                    <?php $products = session()->get('cart'); ?>
                            <?php if($products !== null){ ?>
                                <?php  foreach($products['products'] as $k=>$v){ ?>
                                   
                                    <div class="cart-item">
                                        <input style="display:none" value="<?= $k ?>" id="car_prod_id">
                                        <div class="img-wrap"><img src="img/<?= $v['img'] ?>" alt=""></div><span><?= $v['name'] ?></span><strong>$<?= $v['price'] ?></strong>
                                        <div class="cart-item-border"></div>
                                        <div class="delete-item"></div>
                                    </div>

                                <?php  } ?>                            
                            <?php  } else { ?>
                                <span class="empty">No items in cart.</span>
                            <?php  } ?>
                    </div>

                    <h3>CATEGORIES</h3>
                    <div class="checklist categories">
                        <ul>
                            <?php foreach ($data['categories'] as $cat) {  ?>
                                <li><a href=""><span></span><?= $cat->name ?></a></li>
                            <?php  } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</body>

<script src="js/product.js"></script>

@include('layouts/footer')

</html>