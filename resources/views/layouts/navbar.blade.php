 <!-- Top Bar Start -->
 <div class="top-bar d-none d-md-block">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-8">
                 <div class="top-bar-left">
                     <div class="text">
                         <i class="far fa-clock"></i>
                         <h2>8:00 - 9:00</h2>
                         <p>Mon - Fri</p>
                     </div>
                     <div class="text">
                         <i class="fa fa-phone-alt"></i>
                         <h2>+123 456 7890</h2>
                         <p>For Appointment</p>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="top-bar-right">
                     <div class="social">
                         <a href=""><i class="fab fa-twitter"></i></a>
                         <a href=""><i class="fab fa-facebook-f"></i></a>
                         <a href=""><i class="fab fa-linkedin-in"></i></a>
                         <a href=""><i class="fab fa-instagram"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Top Bar End -->

 <!-- Nav Bar Start -->
 <div class="navbar navbar-expand-lg bg-dark navbar-dark">
     <div class="container-fluid">
         <a href="/" class="navbar-brand">Vlad<span>&</span>Lora</a>
         <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
             <div class="navbar-nav ml-auto">
                 <a href="/" class="nav-item nav-link active">Home</a>
                 <a href="about.html" class="nav-item nav-link">About</a>
                 <a href="service.html" class="nav-item nav-link">Products</a>
                 <a href="price.html" class="nav-item nav-link">Price</a>
                 <a href="/shop" class="nav-item nav-link">Shop</a>
                 <a href="/contact" class="nav-item nav-link">Contact</a>
             </div>
         </div>        
        <!-- aici adaug check cart -->
        
        @if(Route::is('shop.store') )           
        @else
        <div class="navbar-right">
            <a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge1">
            <?php $total_q = session()->get('cart'); ?>
            <?php if($total_q !== null){ ?>
            <?= $total_q['total_quantity']['total']; ?>
            <?php  } else { ?>
            0
            <?php  } ?>
            </span></a>
            
             <div class="shopping-cart">
                 <div class="shopping-cart-header">                     
                     <i class="fa fa-shopping-cart cart-icon"></i><span class="badge1">
                     <?php $total_q = session()->get('cart'); ?>
                    <?php if($total_q !== null){ ?>
                    <?= $total_q['total_quantity']['total']; ?>
                    <?php  } else { ?>
                    0
                    <?php  } ?>
                    </span>
                     <div class="shopping-cart-total">
                         <span class="lighter-text">Total:</span>
                         <span class="main-color-text total">$
                          <?php $total_p = session()->get('cart'); ?>
                            <?php if($total_q !== null){ ?>
                            <?= $total_q['total_price']['total']; ?>
                            <?php  } else { ?>
                            0
                            <?php  } ?>
                        </span>
                     </div>
                 </div>
                 <!--end shopping-cart-header -->
                            
                 <ul class="shopping-cart-items" style="padding-left: 0!important; list-style-type: none;">
                            <?php $products = session()->get('cart'); ?>
                            <?php if($products !== null){ ?>
                                <?php  foreach($products['products'] as $prod){ ?>
                                    <li class="clearfix">
                                        <img  src="img/<?= $prod['img'] ?>" alt="item1" />
                                        <span class="item-name"><?= $prod['name'] ?></span>
                                        <span class="item-price">Price: $<?= $prod['price'] ?></span>
                                        <span class="item-quantity">Quantity: <?= $prod['quantity'] ?></span>
                                    </li>

                                <?php  } ?>                            
                            <?php  } else { ?>
                            No Products are in the shop-cart.
                            <?php  } ?>
                 </ul>                
                 <a href="#" class="button">Checkout <i class="fa fa-chevron-right"></i></a>
             </div>
             <!--end shopping-cart -->
         </div>
         @endif

         <!--end navbar-right -->
         <style>
             .lighter-text {
                 color: #abb0be;
             }

             .main-color-text {
                 color: #00c0cb;
             }

             

             .navbar-left {
                 float: left;
             }

              .navbar-right {
                 float: right;
                 position: relative;
             }

             .navbar-right a {
                 display: inline;
                 padding-left: 20px;
                 color: #ffffff;
                 text-decoration: none;
                 font-size: 14px;
                letter-spacing: 1px;
                text-transform: uppercase;
             }

             .navbar-right a:hover {
                background: rgba(256, 256, 256, .1);
                transition: none;
                padding: 10px 10px 8px 10px;
                color: #ffffff;
             }

            

             .container {
                 margin: auto;
                 width: 80%;
             }

             #addtocart {
                 width: 250px;
             }

             .badge1 {
                margin-top: -3px;
                 background-color: red;
                 border-radius: 10px;
                 color: white;
                 display: inline-block;
                 font-size: 12px;
                 line-height: 1;
                 padding: 3px 7px;
                 text-align: center;
                 vertical-align: middle;
                 white-space: nowrap;
             }

             .shopping-cart {
                 background: white;
                 width: 320px;
                 position: absolute;
                 top: 30px;
                 right: -10px;
                 border-radius: 3px;
                 padding: 20px;
                 overflow: hidden;
                 box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .26) !important;
                 -webkit-transition: all 0.2s ease;
                 transition: all 0.2s ease;
                 opacity: 0;
                 -webkit-transform-origin: right top 0;
                 -webkit-transform: scale(0);
                 transform-origin: right top 0;
                 transform: scale(0);
             }

             .shopping-cart.active {
                 opacity: 1;
                 -webkit-transform-origin: right top 0;
                 -webkit-transform: scale(1);
                 transform-origin: right top 0;
                 transform: scale(1);
             }

             .shopping-cart .shopping-cart-header {
                 border-bottom: 1px solid #e8e8e8;
                 padding-bottom: 15px;
             }

             .shopping-cart .shopping-cart-header .shopping-cart-total {
                 float: right;
             }

             .shopping-cart .shopping-cart-items {
                 padding-top: 20px;
             }

             .shopping-cart .shopping-cart-items li {
                 margin-bottom: 18px;
             }

             .shopping-cart .shopping-cart-items img {
                 float: left;
                 margin-right: 12px;
                 max-width: 70px;
                 max-height: 70px;
             }

             .shopping-cart .shopping-cart-items .item-name {
                 display: block;
                 font-size: 16px;
             }

             .shopping-cart .shopping-cart-items .item-detail {
                 display: block;
                 font-size: 12px;
                 text-overflow: ellipsis;
                 white-space: nowrap;
                 overflow: hidden;
             }

             .shopping-cart .shopping-cart-items .item-price {
                 color: #00c0cb;
                 margin-right: 8px;
             }

             .shopping-cart .shopping-cart-items .item-quantity {
                 color: #abb0be;
             }

             .shopping-cart:after {
                 bottom: 100%;
                 left: 89%;
                 border: solid transparent;
                 content: " ";
                 height: 0;
                 width: 0;
                 position: absolute;
                 pointer-events: none;
                 border-bottom-color: white;
                 border-width: 8px;
                 margin-left: -8px;
             }

             .cart-icon {
                 color: #515783;
                 font-size: 24px;
                 margin-right: 7px;
                 float: left;
             }

             .button {
                 background: #f8770c;
                 color: white;
                 text-align: center;
                 padding: 12px;
                 text-decoration: none;
                 display: block;
                 border-radius: 3px;
                 font-size: 16px;
                 margin: 25px 0 15px 0;
                 text-transform: uppercase;
             }

             .button:hover {
                 background: #f87f1b;
             }

             .button i {
                 padding-left: 5px;
             }

             .clearfix:after {
                 content: "";
                 display: table;
                 clear: both;
             }
         </style>

     </div>
 </div>
 <!-- Nav Bar End -->