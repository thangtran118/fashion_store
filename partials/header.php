<?php
$totalPrice = 0;
$totalQuantity = 0;

if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $id => $item) {
        $totalQuantity += $item["quantity"];
        $totalPrice += $item["price"] * $item["quantity"];
    }
}
?>
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="index.php" class="logo">
                    <img src="images/icons/logo-01.png" alt="IMG-LOGO" />
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu nav-home">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="nav-shop">
                            <a href="product.php">Shop</a>
                        </li>
                        <li class="nav-cart">
                            <a href="cart.php">Cart</a>
                        </li>
                        <li class="nav-contact">
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="
                  icon-header-item
                  cl2
                  hov-cl1
                  trans-04
                  p-l-22 p-r-11
                  js-show-modal-search
                ">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="
                  icon-header-item
                  cl2
                  hov-cl1
                  trans-04
                  p-l-22 p-r-11
                  icon-header-noti
                  js-show-cart
                " data-notify="<?php echo $totalQuantity ?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO" /></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="
              icon-header-item
              cl2
              hov-cl1
              trans-04
              p-r-11
              js-show-modal-search
            ">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="
              icon-header-item
              cl2
              hov-cl1
              trans-04
              p-r-11 p-l-10
              icon-header-noti
              js-show-cart
            " data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="
              dis-block
              icon-header-item
              cl2
              hov-cl1
              trans-04
              p-r-11 p-l-10
              icon-header-noti
            " data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04"> Help & FAQs </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04"> My Account </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04"> EN </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04"> USD </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="index.php">Home</a>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="product.php">Shop</a>
            </li>
            <li class="nav-cart">
                <a href="cart.php">Cart</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE" />
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search..." />
            </form>
        </div>
    </div>
</header>

<!-- Cart -->

<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2"> Your Cart </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <?php
                if (isset($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $id => $item) { ?>

                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="./<?php echo $item['photo'] ?>" alt="IMG" />
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    <?php echo $item['name'] ?>
                                </a>

                                <span class="header-cart-item-info"> <?php echo $item['quantity'] ?> x $<?php echo $item['price'] ?> </span>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">Total: $<?php echo $totalPrice ?></div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="cart.php" class="
                  flex-c-m
                  stext-101
                  cl0
                  size-107
                  bg3
                  bor2
                  hov-btn3
                  p-lr-15
                  trans-04
                  m-r-8 m-b-10
                ">
                        View Cart
                    </a>

                    <a href="cart.php" class="
                  flex-c-m
                  stext-101
                  cl0
                  size-107
                  bg3
                  bor2
                  hov-btn3
                  p-lr-15
                  trans-04
                  m-b-10
                ">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>