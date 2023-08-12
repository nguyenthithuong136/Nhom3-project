<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="50"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about-us.php">About</a>
            </li>
                 <li class="nav-item">
              <a class="nav-link" href="index.php">News</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="contact-us.php">Contact us</a>
            </li>
            <?php if (!isset($_SESSION['user_id'])) { ?>
                                <li class="nav-item">
                                    <a href="?url=login.php" class="nav-link">
                                        Đăng nhập
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    </li>
                                <li class="nav-item">
                                    <a href="?url=register.php" class="nav-link">
                                        Đăng ký
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                </li>
                                <?php } ?>
  
  
          <!-- </ul> -->
        </div>
      </div>
    </nav>
                                <!-- Header Language -->
                                <!-- <li>
                                    <a class="header__link" href="#">
                                        <i class="icon fa-solid fa-earth-asia"></i>
                                        eng
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul class="header__sub-menu">
                                        <li><a href="#">bengali</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">french</a></li>
                                        <li><a href="#">german</a></li>
                                        <li><a href="#">spanish</a></li>
                                    </ul>
                                </li> -->
                                <!-- Header Currency -->
                                <!-- <li>
                                    <a class="header__link" href="#">
                                        <i class="icon fa-solid fa-dollar-sign"></i>
                                        usd
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul class="header__sub-menu">
                                        <li><a href="#">usd</a></li>
                                        <li><a href="#">uero</a></li>
                                        <li><a href="#">taka</a></li>
                                        <li><a href="#">pound</a></li>
                                        <li><a href="#">rupi</a></li>
                                    </ul>
                                </li> -->
                            <!-- </ul>
                        </div> -->
                        <!-- menu -->
                        <!-- <div class="col-sm-6 col-xs-4 header__top-controll">
                            <ul class="header__top-menu-list">
                                <?php if (!isset($_SESSION['user_id'])) { ?>
                                <li class="header__top-menu-item">
                                    <a href="#" class="header__top-menu-link">
                                        Đăng nhập
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <div class="header__sub-menu login">
                                        <h5>Đăng nhập or đăng ký</h5>
                                        <div class="header__log">
                                            <a href="?url=login.php" class="header__log-btn btn-login">Đăng nhập</a>
                                            <h3>OR</h3>
                                            <a href="?url=register.php" class="header__log-btn btn-register">Đăng ký</a>
                                        </div>
                                    </div>
                                </li>
                                <?php } else { ?>
                                <li class="header__top-menu-item">
                                    <a href="#" class="header__top-menu-link">
                                        Thông tin
                                        <i class="icon fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul class="header__sub-menu">
                                        <li><a href="?url=cart.php">Giỏ hàng</a></li>
                                        <li><a href="?url=info.php">Cá nhân</a></li>
                                        <?php if($_SESSION['user_id'] == 1 || $_SESSION['user_id'] == 2) { ?>
                                            <li><a href="admin">Quản trị</a></li>
                                        <?php }?>
                                    </ul>
                                </li>
                                <li class="header__top-menu-item">
                                    <a href="?url=logout.php" class="header__top-menu-link">
                                        Đăng xuất
                                        <i class="icon fa-solid fa-sign-out"></i>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            <ul class="header__top-menu-list cart">
                                <li class="header__top-menu-item">
                                    <a href="?url=cart.php" class="header__top-menu-link">
                                        <i class="fa-brands fa-opencart"></i>
                                        <span class="cart__quantity_view"><?php $carts = isset($_SESSION['carts']) ? count($_SESSION['carts']) : "0";
                                                                            echo $carts; ?></span>
                                    </a>
                                    <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['carts'])) { ?>
                                    <ul class="header__sub-menu">
                                        <?php $i = 1;
                                            foreach ($_SESSION['carts'] as $value) : ?>
                                        <?php if ($i++ < 5) { ?>
                                        <li>
                                            <a href="?url=cart.php" class="cart__item-menu-link">
                                                <div class="cart__item-menu-img">
                                                    <img src="admin/public/front-end/images/products/<?php echo $value['picture'] ?>"
                                                        class="cart__mini" alt="">
                                                </div>
                                                <div class="cart__item-menu-list">
                                                    <h5 class=""><?php echo $value['name'] ?></h5>
                                                    <span
                                                        class=""><?php echo $value['quantity'] . 'x $ ' . $value['price'] . '.00'; ?></span>
                                                    <button class="cart__remove-btn">
                                                        <a
                                                            href="?url=delete_item_from_cart&id_product=<?php echo $value['id'] ?>">
                                                            <i class="icon fa-solid fa-trash"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php endforeach ?>
                                    </ul>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div> -->

            <!-- header - bottom -->
            <!-- <div class="header__bottom">
                <div class="container">
                    <div class="row">
                        <!-- menu 
                        <div class="header__menu-bottom"> -->
                            <!-- logo -->
                            <!-- <a class="col-sm-2 logo__shop">
                                <img src="public/layout/images/logo-3.png" alt="" class="logo__shop-img">
                            </a>
                            <ul class="col-lg-8 header__menu-bottom-list">
                                <li><a class="header__menu-bottom-link" href="?url=home">Trang chủ</a></li>
                                <li>
                                    <a class="header__menu-bottom-link" href="?url=product.php">
                                        Sản phẩm
                                    </a>
                                </li> -->
                                <!-- <li><a class="header__menu-bottom-link" href="#">contact</a></li> -->
                            <!-- </ul> -->
                            <!-- search -->
                            <!-- <div class="col-sm-8 col-lg-2 header__search">
                                <form action="" method="GET" class="header__search-form">
                                    <input type="text" name="url" value="product.php" hidden>
                                    <input type="search" name="search" class="header__search-input"
                                        placeholder="Tìm kiếm ....">
                                    <button class="header__search-btn">
                                        <i class="icon fa-solid fa-search"></i>
                                    </button>
                                </form>
                            </div> -->

                            <!-- menu mobile tablet -->
                            <!-- <div class="col-sm-2 header__menu-responsive">
                                <div class="header__menu-responsive-btn">                            
                                    <i class="icon fa-solid fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            <!-- </div>
        </div>  -->

        <!-- menu mega click -->
        <!-- <div class="collapse navbar-collapse" id="navbarResponsive">
                  
                        <a class="nav-link" href="?url=home">Trang chủ</a>
               
                </div>
                <div class="col-sm-12">
                    <div class="header__menu-responsive-item">
                        <a class="header__menu-responsive-link" href="?url=product.php">
                            Sản phẩm
                        </a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="header__menu-responsive-item">
                        <a class="header__menu-responsive-link" href="?url=cart.php">Giỏ hàng</a>
                    </div>
                </div>
                <?php if(isset($_SESSION['user_id'])) {?>
                    <div class="col-sm-12">
                        <div class="header__menu-responsive-item">
                            <a class="header__menu-responsive-link" href="?url=info.php">
                                Cá nhân
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="header__menu-responsive-item">
                            <a class="header__menu-responsive-link" href="?url=logout.php">Đăng xuất</a>
                        </div>
                    </div>
                <?php } else {?>
                    <div class="col-sm-12">
                        <div class="header__menu-responsive-item">
                            <a class="header__menu-responsive-link" href="?url=logout.php">Đăng ký</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="header__menu-responsive-item">
                            <a class="header__menu-responsive-link" href="?url=logout.php">Đăng nhập</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div> -->